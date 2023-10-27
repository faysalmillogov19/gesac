<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Activite;
use App\Models\Realisation_activite;

use App\Http\Controllers\FunctionC;

class Realisation_activiteC extends Controller
{
    public function index(){
    }

    public function store(Request $request){
        if($request->id >0 ){
            $element=Realisation_activite::where('id',$request->id)->first();
        }
        else{
            $element=new Realisation_activite();
            $element->affectation_activite=$request->affectation_activite;
        }
        
        $element->debut=$request->debut;
        $element->fin=$request->fin;
        $element->libelle=$request->libelle;
        $element->taux=$request->taux;
        $element->save();
        return back()->with('alert', ['Crée avec Succès','alert-success']);

    }

    public function show($affectation_activite){
        
        $data=Realisation_activite::where('Realisation_activites.affectation_activite',$affectation_activite)
                               ->select('*','Realisation_activites.id as id')
                               ->orderBy('debut')->get();

        $var['plan']=FunctionC::getAffectation_activiteInfos($affectation_activite);

        $result=FunctionC::infos($data,$var);
        return view("realisation_activite\List",$result);
    }

    public function edit($id){
        $element=Realisation_activite::where('id',$id)->first();
        $element->delete();
        return back()->with('alert', ['Supprimé avec Succès','alert-success']);
    }

}
