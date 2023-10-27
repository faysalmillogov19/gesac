<?php

namespace App\Http\Controllers;
use App\Models\Sous_activite;
use App\Models\Realisation_sous_activite;

use App\Http\Controllers\FunctionC;


use Illuminate\Http\Request;

class Realisation_sous_activiteC extends Controller
{
    public function index(){
    }

    public function store(Request $request){
        if($request->id >0 ){
            $element=Realisation_sous_activite::where('id',$request->id)->first();
        }
        else{
            $element=new Realisation_sous_activite();
            $element->sous_activite=$request->sous_activite;
        }
        
        $element->debut=$request->debut;
        $element->fin=$request->fin;
        $element->libelle=$request->libelle;
        $element->taux=$request->taux;
        $element->save();
        return back()->with('alert', ['Crée avec Succès','alert-success']);

    }

    public function show($sous_activite){
        
        $data=Realisation_sous_activite::where('realisation_sous_activites.sous_activite',$sous_activite)
                               ->select('*','realisation_sous_activites.id as id')
                               ->orderBy('debut')->get();

        $var['plan']=FunctionC::getAffectation_sous_activiteInfos($sous_activite);

        $result=FunctionC::infos($data,$var);
        return view("realisation_sous_activite\List",$result);
    }

    public function edit($id){
        $element=Realisation_sous_activite::where('id',$id)->first();
        $element->delete();
        return back()->with('alert', ['Supprimé avec Succès','alert-success']);
    }

}
