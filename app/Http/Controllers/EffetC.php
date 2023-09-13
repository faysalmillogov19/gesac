<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Effet;
use App\Models\Annee;
use App\Http\Controllers\FunctionC;

class EffetC extends Controller
{
    public function index(){
        $data=Effet::join('annees','annees.id','effets.annee')
                   ->select('*','effets.id as id','annees.libelle as libelle_annee','effets.libelle as libelle','effets.description as description')
                   ->get();

        $var['annees']=Annee::all();

        $result=FunctionC::infos($data,$var);
        return view("effets\List",$result);
    }

    public function store(Request $request){
        if($request->id){
            $element=Effet::where('id', $request->id)->first();
        }
        else{
            $element= new Effet();
        }
        $element->annee=$request->annee;
        $element->code=$request->code;
        $element->libelle=$request->libelle;
        $element->description=$request->description;
        $element->save();
        return redirect("effet");
    }

    public function show($id){
        $element=Effet::where('id', $id)->first();
        $element->delete();
        return redirect("effet");
    }
}
