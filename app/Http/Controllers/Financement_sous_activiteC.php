<?php

namespace App\Http\Controllers;
use App\Models\Sous_activite;
use App\Models\Source_financement;
use App\Models\Financement_sous_activite;

use Illuminate\Http\Request;

class Financement_sous_activiteC extends Controller
{
    public function index(){
    }

    public function store(Request $request){
        $exist=Financement_sous_activite::where('source',$request->source)->where('sous_activite',$request->sous_activite)->first();
        if($request->id >0 ){
            $element=Financement_sous_activite::where('id',$request->id)->first();
            if( isset($exist) && $exist->id!=$element->id ){
                return back()->with('alert', ['Cet élement existe déjà','alert-danger']);
            }

        }
        else if(isset($exist)){
           return back()->with('alert', ['Cet élement existe déjà','alert-danger']);
        } 
        else{
            $element=new Financement_sous_activite();
            $element->sous_activite=$request->sous_activite;
        }
        
        $element->source=$request->source;
        $element->montant=$request->montant;
        $element->save();
        return back()->with('alert', ['Crée avec Succès','alert-success']);


    }

    public function show($sous_activite){
        
        
        $data=Financement_sous_activite::where('financement_sous_activites.sous_activite',$sous_activite)
                               ->join('source_financements','source_financements.id','financement_sous_activites.source')
                               ->select('*','financement_sous_activites.id as id')
                               ->get();

        $var['plan']=FunctionC::getAffectation_sous_activiteInfos($sous_activite);

        $var['source_financements']=Source_financement::all();

        $result=FunctionC::infos($data,$var);
        return view("financement_sous_activite\List",$result);
    }

    public function edit($id){
        $element=Financement_sous_activite::where('id',$id)->first();
        $element->delete();
        return back()->with('alert', ['Supprimé avec Succès','alert-success']);
    }


}
