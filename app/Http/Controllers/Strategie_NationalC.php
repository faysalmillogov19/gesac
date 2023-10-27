<?php

namespace App\Http\Controllers;
use App\Models\Strategie_nationale;
use App\Http\Controllers\FunctionC;
use Illuminate\Http\Request;

class Strategie_NationalC extends Controller
{
    public function index(){
        $data=Strategie_nationale::all();

        $result=FunctionC::infos($data,[]);
        return view("strategie_nationale\List",$result);
    }

    public function store(Request $request){
        if($request->id){
            $element=Strategie_nationale::where('id', $request->id)->first();
        }
        else{
            $element= new Strategie_nationale();
        }
        $element->code=$request->code;
        $element->libelle=$request->libelle;
        $element->description=$request->description;
        $element->save();
        return redirect("strategie_nationale");
    }

    public function show($id){
        $element=Strategie_nationale::where('id', $id)->first();
        $element->delete();
        return redirect("strategie_nationale");
    }
}
