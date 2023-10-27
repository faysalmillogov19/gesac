<?php

namespace App\Http\Controllers;
use App\Models\Plan;
use App\Models\Annee;
use App\Models\Produit;
use App\Models\Affectation_effet;
use App\Models\Affectation_produit;
use App\Models\Affectation_activite;
use App\Models\Strategie_nationale;
use App\Http\Controllers\FunctionC;


use Illuminate\Http\Request;

class Affectation_produitC extends Controller
{
    public function index(){
       
        
    }

    public function store(Request $request){
        
        $exist=Affectation_produit::where('produit',$request->produit)->where('affectation_effet',$request->affectation_effet)->first();

        if($request->id){
            $element=Affectation_produit::where('id', $request->id)->first();
            if( isset($exist) && $exist->id!=$element->id ){
                return back()->with('alert', ['Cet élement existe déjà','alert-danger']);
            }
        }
        else if(isset($exist)){
           return back()->with('alert', ['Cet élement existe déjà','alert-danger']);
        }     
        else{
            $element= new Affectation_produit();
        }
        $element->produit=$request->produit;
        $element->affectation_effet=$request->affectation_effet;
        $element->save();
        return back()->with('alert', ['Crée avec Succès','alert-success']);
    }

    public function show($affectation_effet){
        $data=Affectation_produit::where('affectation_produits.affectation_effet',$affectation_effet)
                               ->join('produits','produits.id','affectation_produits.produit')
                               ->select('*','affectation_produits.id as id')
                               ->get();

        $var['produits']=Produit::all();

        $var['plan']=Affectation_effet::where('affectation_effets.id',$affectation_effet)
                                                   ->join('effets','effets.id','affectation_effets.effet')
                                                   ->join('plans','plans.id','affectation_effets.plan')
                                                   ->join('annees','annees.id','plans.annee')
                                                   ->join('strategie_nationales','strategie_nationales.id','plans.strategie')
                                                   ->select('*','affectation_effets.id as id','annees.libelle as libelle_annee','strategie_nationales.libelle as libelle_strategie','effets.libelle as libelle_effet',
                                                    'effets.code as code_effet')
                                                   ->first();
                                                   //dd($var['plan']);

        $result=FunctionC::infos($data,$var);
        return view("affectation_produit\List",$result);


    }

    public function edit($id){
        $exist=Affectation_activite::where('affectation_produit',$id)->first();
        if(isset($exist)){
            return back()->with('alert', ['Impossible: Cet élément est affecté à un effet','alert-danger']);
        }
        else{
            $element=Affectation_produit::where('id', $id)->first();
            $element->delete();
            return back()->with('alert',  ['Supprimé avec Succès','alert-success']);
        }
        
    }
}
