<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activite;
use App\Models\Source_financement;
use App\Models\Financement;

class FinancementC extends Controller
{
    public function index(){
    }

    public function store(Request $request){
        $exist=Financement::where('source',$request->source)->where('affectation_activite',$request->affectation_activite)->first();
        if($request->id >0 ){
            $element=Financement::where('id',$request->id)->first();
            if( isset($exist) && $exist->id!=$element->id ){
                return back()->with('alert', ['Cet élement existe déjà','alert-danger']);
            }

        }
        else if(isset($exist)){
           return back()->with('alert', ['Cet élement existe déjà','alert-danger']);
        } 
        else{
            $element=new Financement();
            $element->affectation_activite=$request->affectation_activite;
        }
        
        $element->source=$request->source;
        $element->montant=$request->montant;
        $element->save();
        return back()->with('alert', ['Crée avec Succès','alert-success']);


    }

    public function show($affectation_activite){
        
        
        $data=Financement::where('financements.affectation_activite',$affectation_activite)
                               ->join('source_financements','source_financements.id','financements.source')
                               ->select('*','financements.id as id')
                               ->get();

        $var['plan']=FunctionC::getAffectation_activiteInfos($affectation_activite);

        $var['source_financements']=Source_financement::all();

        $result=FunctionC::infos($data,$var);
        return view("financement\List",$result);
    }

    public function edit($id){
        $element=Financement::where('id',$id)->first();
        $element->delete();
        return back()->with('alert', ['Supprimé avec Succès','alert-success']);
    }
}
