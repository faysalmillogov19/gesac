<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Source_financement;
use App\Http\Controllers\FunctionC;

class Source_financementC extends Controller
{
    public function index(){
        $data=Source_financement::all();
        $result=FunctionC::infos($data,[]);
        return view("source_financement\List",$result);
    }

    public function store(Request $request){
        if($request->id){
            $element=Source_financement::where('id', $request->id)->first();
        }
        else{
            $element= new Source_financement();
        }
        $element->libelle=$request->libelle;
        $element->description=$request->description;
        $element->save();
        return redirect("source_financement");
    }

    public function show($id){
        $element=Source_financement::where('id', $id)->first();
        $element->delete();
        return redirect("source_financement");
    }
}
