<?php

namespace App\Http\Controllers;
use App\Models\Plan;
use App\Models\Annee;
use App\Models\Activite;
use App\Models\Affectation_effet;
use App\Models\Affectation_produit;
use App\Models\Affectation_activite;
use App\Models\Sous_activite;
use App\Http\Controllers\FunctionC;

use Illuminate\Http\Request;

class Sous_activiteC extends Controller
{
    public function index(){
       
        
    }

    public function store(Request $request){
        
        if($request->id){
            $element=Sous_activite::where('id', $request->id)->first();
            
        }    
        else{
            $element= new Sous_activite();
        }
        $element->affectation_activite=$request->affectation_activite;
        $element->code=$request->code;
        $element->libelle=$request->libelle;
        $element->description=$request->description;
        $element->T1=boolval($request->T1);
        $element->T2=boolval($request->T2);
        $element->T3=boolval($request->T3);
        $element->T4=boolval($request->T4);
        $element->save();
        return back()->with('alert', ['Crée avec Succès','alert-success']);
    }

    public function show($affectation_activite){
        $data=Sous_activite::where('sous_activites.affectation_activite',$affectation_activite)
                               ->join('affectation_activites','affectation_activites.id','sous_activites.affectation_activite')
                               ->select('*','sous_activites.id as id')
                               ->get();


        $var['plan']=FunctionC::getAffectation_activiteInfos($affectation_activite);
                                                   
        $result=FunctionC::infos($data,$var);
        return view("sous_activite\List",$result);


    }

    public function edit($id){
        
            $element=Sous_activite::where('id', $id)->first();
            $element->delete();
            return back()->with('alert',  ['Supprimé avec Succès','alert-success']);
        
        
    }
}
