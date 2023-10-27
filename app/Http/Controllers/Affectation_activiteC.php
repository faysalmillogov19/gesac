<?php

namespace App\Http\Controllers;
use App\Models\Plan;
use App\Models\Annee;
use App\Models\Activite;
use App\Models\Affectation_effet;
use App\Models\Affectation_produit;
use App\Models\Affectation_activite;
use App\Models\Strategie_nationale;
use App\Models\Responsable;
use App\Http\Controllers\FunctionC;

use Illuminate\Http\Request;

class Affectation_activiteC extends Controller
{
    public function index(){
       
        
    }

    public function store(Request $request){
        
        $exist=Affectation_activite::where('activite',$request->activite)->where('affectation_produit',$request->affectation_produit)->first();

        if($request->id){
            $element=Affectation_activite::where('id', $request->id)->first();
            if( isset($exist) && $exist->id!=$element->id ){
                return back()->with('alert', ['Cet élement existe déjà','alert-danger']);
            }
        }
        else if(isset($exist)){
           return back()->with('alert', ['Cet élement existe déjà','alert-danger']);
        }     
        else{
            $element= new Affectation_activite();
        }
        $element->activite=$request->activite;
        $element->responsable=$request->responsable;
        $element->affectation_produit=$request->affectation_produit;
        $element->T1=boolval($request->T1);
        $element->T2=boolval($request->T2);
        $element->T3=boolval($request->T3);
        $element->T4=boolval($request->T4);
        $element->save();
        return back()->with('alert', ['Crée avec Succès','alert-success']);
    }

    public function show($affectation_produit){
        $data=Affectation_activite::where('affectation_activites.affectation_produit',$affectation_produit)
                               ->join('activites','activites.id','affectation_activites.activite')
                               ->join('responsables','responsables.id','affectation_activites.responsable')
                               ->select('*','affectation_activites.id as id','activites.description as description')
                               ->get();

        $var['activites']=Activite::all();
        $var['responsables']=Responsable::all();

        $var['plan']=Affectation_produit::where('affectation_produits.id',$affectation_produit)
                                                  ->join('affectation_effets','affectation_effets.id','affectation_produits.affectation_effet')
                                                  ->join('produits','produits.id','affectation_produits.produit')
                                                   ->join('effets','effets.id','affectation_effets.effet')
                                                   ->join('plans','plans.id','affectation_effets.plan')
                                                   ->join('annees','annees.id','plans.annee')
                                                   ->join('strategie_nationales','strategie_nationales.id','plans.strategie')
                                                   ->select('*','affectation_produits.id as id','annees.libelle as libelle_annee','strategie_nationales.libelle as libelle_strategie','effets.libelle as libelle_effet',
                                                    'effets.code as code_effet','produits.code as code_produit','produits.libelle as libelle_produit')
                                                   ->first();
        $result=FunctionC::infos($data,$var);
        return view("affectation_activite\List",$result);


    }

    public function edit($id){
        $exist=Sous_activite::where('activite',$id)->first();
        if(isset($exist)){
            return back()->with('alert', ['Impossible: Cet élément est affecté à un effet','alert-danger']);
        }
        else{
            $element=Affectation_activite::where('id', $id)->first();
            $element->delete();
            return back()->with('alert',  ['Supprimé avec Succès','alert-success']);
        }
        
    }
}
