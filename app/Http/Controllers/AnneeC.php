<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annee;
use App\Http\Controllers\FunctionC;
class AnneeC extends Controller
{
    public function index(){
        $data=Annee::all();
        $result=FunctionC::infos($data,[]);
        return view("annees\List",$result);
    }

    public function store(Request $request){
        if($request->id){
            $element=Annee::where('id', $request->id)->first();
        }
        else{
            $element= new Annee();
        }
        $element->libelle=$request->libelle;
        $element->description=$request->description;
        $element->save();
        return redirect("annee");
    }

    public function show($id){
        $element=Annee::where('id', $id)->first();
        $element->delete();
        return redirect("annee");
    }
}
