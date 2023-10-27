<?php

namespace App\Http\Controllers;
use App\Models\Plan;
use App\Models\Annee;
use App\Models\Affectation_effet;
use App\Models\Strategie_nationale;
use App\Http\Controllers\FunctionC;
use Illuminate\Http\Request;

class PlanC extends Controller
{
    public function index(){
        $data=Plan::join('annees','annees.id','plans.annee')
                  ->join('strategie_nationales','strategie_nationales.id','plans.strategie')
                  ->select('*','plans.id as id','annees.libelle as libelle_annee','strategie_nationales.libelle as libelle_strategie')
                  ->get();
        $var['strategies']=Strategie_nationale::all();
        $var['annees']=Annee::all();
        $result=FunctionC::infos($data,$var);
        return view("plan\List",$result);
    }

    public function store(Request $request){

        $exist=Plan::where('annee',$request->annee)->where('strategie',$request->strategie)->first();

        if($request->id){
            $element=Plan::where('id', $request->id)->first();
            if( isset($exist) && $exist->id!=$element->id ){
                return back()->with('alert', ['Cet élement existe déjà','alert-danger']);
            }
        }
        else if(isset($exist)){
           return back()->with('alert', ['Cet élement existe déjà','alert-danger']);
        }     
        else{
            $element= new Plan();
        }
        $element->annee=$request->annee;
        $element->strategie=$request->strategie;
        $element->save();
        return back()->with('alert', ['Crée avec Succès','alert-success']);
    }

    public function edit($id){
        $exist=Affectation_effet::where('plan',$id)->first();
        if(isset($exist)){
            return back()->with('alert', ['Impossible: Cet élément est affecté à un effet','alert-danger']);
        }
        else{
            $element=Plan::where('id', $id)->first();
            $element->delete();
            return back()->with('alert',  ['Supprimé avec Succès','alert-success']);
        }
        
    }
}
