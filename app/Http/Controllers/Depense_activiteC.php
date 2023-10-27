<?php

namespace App\Http\Controllers;
use App\Models\Affectation_activite;
use App\Models\Source_financement;
use App\Models\Depense_activite;
use App\Models\Financement;

use Illuminate\Http\Request;

class Depense_activiteC extends Controller
{
    public function index(){

    }

    public function store(Request $request){
        $exist=Depense_activite::where('source',$request->source)->where('affectation_activite',$request->affectation_activite)->first();
        if($request->id >0 ){
            $element=Depense_activite::where('id',$request->id)->first();
            if( isset($exist) && $exist->id!=$element->id ){
                return back()->with('alert', ['Cet élement existe déjà','alert-danger']);
            }

        }
        else if(isset($exist)){
           return back()->with('alert', ['Cet élement existe déjà','alert-danger']);
        } 
        else{
            $element=new Depense_activite();
            $element->affectation_activite=$request->affectation_activite;
        }
        
        $element->objet=$request->objet;
        $element->source=$request->source;
        $element->montant=$request->montant;

        if( $request->file('piece') ){
                if( $element->piece ){
                    $delete=FunctionC::deleteFichier($element->piece);
                }
                $element->piece=FunctionC::uploadFichier($request->file('piece'),"uploads/pieces/",date("m-d-y-h-i-s") );
        }

        $element->save();
        return back()->with('alert', ['Crée avec Succès','alert-success']);


    }

    public function show($affectation_activite){
        
        
        $data=Depense_activite::where('Depense_activites.affectation_activite',$affectation_activite)
                               ->join('source_financements','source_financements.id','Depense_activites.source')
                               ->select('*','Depense_activites.id as id')
                               ->get();

        $var['cout']=Financement::where('affectation_activite',$affectation_activite)->sum('montant');

        $var['plan']=FunctionC::getAffectation_activiteInfos($affectation_activite);

        $var['source_financements']=Source_financement::all();

        $result=FunctionC::infos($data,$var);
        return view("depense_activite\List",$result);
    }

    public function edit($id){
        $element=Depense_activite::where('id',$id)->first();
        if( $element->piece ){
            $delete=FunctionC::deleteFichier($element->piece);
        }
        $element->delete();
        return back()->with('alert', ['Supprimé avec Succès','alert-success']);
    }

}
