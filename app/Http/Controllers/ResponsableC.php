<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Responsable;
use App\Http\Controllers\FunctionC;

class ResponsableC extends Controller
{
    public function index(){
        $data=Responsable::all();
        $result=FunctionC::infos($data,[]);
        return view("responsables\List",$result);
    }

    public function store(Request $request){
        if($request->id){
            $element=Responsable::where('id', $request->id)->first();
        }
        else{
            $element= new Responsable();
        }
        $element->direction=$request->direction;
        $element->description=$request->description;
        $element->save();
        return redirect("responsable");
    }

    public function show($id){
        $element=Responsable::where('id', $id)->first();
        $element->delete();
        return redirect("responsable");
    }
}
