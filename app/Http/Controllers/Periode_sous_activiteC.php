<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sous_activite;
use App\Models\Periode_sous_activite;


class Periode_sous_activiteC extends Controller
{
    public function index(){
    }

    public function store(Request $request){
        if($request->id >0 ){
            $element=Periode_sous_activite::where('id',$request->id)->first();
        }
        else{
            $element=new Periode_sous_activite();
            $element->sous_activite=$request->sous_activite;
        }
        
        $element->debut=$request->debut;
        $element->fin=$request->fin;
        $element->save();
        return back()->with('alert', ['Crée avec Succès','alert-success']);

    }

    public function show($sous_activite){
        
        $data=Periode_sous_activite::where('periode_sous_activites.sous_activite',$sous_activite)
                               ->select('*','periode_sous_activites.id as id')
                               ->orderBy('debut')->get();

        $var['plan']=FunctionC::getAffectation_sous_activiteInfos($sous_activite);

        $result=FunctionC::infos($data,$var);
        return view("periode_sous_activite\List",$result);
    }

    public function edit($id){
        $element=Periode_sous_activite::where('id',$id)->first();
        $element->delete();
        return back()->with('alert', ['Supprimé avec Succès','alert-success']);
    }

}
