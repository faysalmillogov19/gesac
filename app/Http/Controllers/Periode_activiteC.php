<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activite;
use App\Models\Periode_activite;

use App\Http\Controllers\FunctionC;


class Periode_activiteC extends Controller
{
    public function index(){
    }

    public function store(Request $request){
        if($request->id >0 ){
            $element=Periode_activite::where('id',$request->id)->first();
        }
        else{
            $element=new Periode_activite();
            $element->affectation_activite=$request->affectation_activite;
        }
        
        $element->debut=$request->debut;
        $element->fin=$request->fin;
        $element->save();
        return back()->with('alert', ['Crée avec Succès','alert-success']);

    }

    public function show($affectation_activite){
        
        $data=Periode_activite::where('periode_activites.affectation_activite',$affectation_activite)
                               ->select('*','periode_activites.id as id')
                               ->orderBy('debut')->get();

        $var['plan']=FunctionC::getAffectation_activiteInfos($affectation_activite);

        $result=FunctionC::infos($data,$var);
        return view("periode_activite\List",$result);
    }

    public function edit($id){
        $element=Periode_activite::where('id',$id)->first();
        $element->delete();
        return back()->with('alert', ['Supprimé avec Succès','alert-success']);
    }

}
