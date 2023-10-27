<?php

namespace App\Http\Controllers;
use App\Models\Plan;
use App\Models\Annee;
use App\Models\Effet;
use App\Models\Affectation_effet;
use App\Models\Affectation_produit;
use App\Models\Strategie_nationale;
use App\Http\Controllers\FunctionC;


use Illuminate\Http\Request;

class Affectation_effetC extends Controller
{
    public function index(){
       
        
    }

    public function store(Request $request){

        $exist=Affectation_effet::where('plan',$request->plan)->where('effet',$request->effet)->first();

        if($request->id){
            $element=Affectation_effet::where('id', $request->id)->first();
            if( isset($exist) && $exist->id!=$element->id ){
                return back()->with('alert', ['Cet élement existe déjà','alert-danger']);
            }
        }
        else if(isset($exist)){
           return back()->with('alert', ['Cet élement existe déjà','alert-danger']);
        }     
        else{
            $element= new Affectation_effet();
        }
        $element->effet=$request->effet;
        $element->plan=$request->plan;
        $element->save();
        return back()->with('alert', ['Crée avec Succès','alert-success']);
    }

    public function show($plan){
        $data=Affectation_effet::where('affectation_effets.plan',$plan)
                               ->join('effets','effets.id','affectation_effets.effet')
                               ->select('*','affectation_effets.id as id')
                               ->get();

        $var['effets']=Effet::all();

        $var['plan']=Plan::where('plans.id',$plan)
                           ->join('annees','annees.id','plans.annee')
                           ->join('strategie_nationales','strategie_nationales.id','plans.strategie')
                           ->select('*','plans.id as id','annees.libelle as libelle_annee','strategie_nationales.libelle as libelle_strategie')
                          ->first();
        $result=FunctionC::infos($data,$var);
        return view("affectation_effet\List",$result);


    }

    public function edit($id){
        $exist=Affectation_produit::where('affectation_effet',$id)->first();
        if(isset($exist)){
            return back()->with('alert', ['Impossible: Cet élément est affecté à un effet','alert-danger']);
        }
        else{
            $element=Affectation_effet::where('id', $id)->first();
            $element->delete();
            return back()->with('alert',  ['Supprimé avec Succès','alert-success']);
        }
        
    }
}
