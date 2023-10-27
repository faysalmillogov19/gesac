<?php

namespace App\Http\Controllers;
use App\Models\Sous_activite;
use App\Models\Source_financement;
use App\Models\Depense_sous_activite;
use App\Models\Financement_sous_activite;

use Illuminate\Http\Request;

class Depense_sous_activiteC extends Controller
{
    public function index(){

    }

    public function store(Request $request){

        if($request->id >0 ){
            $element=Depense_sous_activite::where('id',$request->id)->first();
           
        }
        else{
            $element=new Depense_sous_activite();
            $element->sous_activite=$request->sous_activite;
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

    public function show($sous_activite){
        
        
        $data=Depense_sous_activite::where('Depense_sous_activites.sous_activite',$sous_activite)
                               ->join('source_financements','source_financements.id','Depense_sous_activites.source')
                               ->select('*','Depense_sous_activites.id as id')
                               ->get();

        $var['cout']=Financement_sous_activite::where('sous_activite',$sous_activite)->sum('montant');

        $var['plan']=FunctionC::getAffectation_sous_activiteInfos($sous_activite);

        $var['source_financements']=Source_financement::all();

        //dd($var['plan']);

        $result=FunctionC::infos($data,$var);
        return view("depense_sous_activite\List",$result);
    }

    public function edit($id){
        $element=Depense_sous_activite::where('id',$id)->first();
        if( $element->piece ){
            $delete=FunctionC::deleteFichier($element->piece);
        }
        $element->delete();
        return back()->with('alert', ['Supprimé avec Succès','alert-success']);
    }

}
