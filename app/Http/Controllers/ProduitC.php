<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Effet;
use App\Models\Produit;
use App\Http\Controllers\FunctionC;

class ProduitC extends Controller
{
     public function index(){
        $data=Produit::all();

        $var=[];//$var['effets']=Effet::all();

        $result=FunctionC::infos($data,$var);
        return view("produits\List",$result);
    }

    public function store(Request $request){
        if($request->id){
            $element=Produit::where('id', $request->id)->first();
        }
        else{
            $element= new Produit();
        }
        $element->code=$request->code;
        $element->libelle=$request->libelle;
        $element->description=$request->description;
        $element->save();
        return back()->with('alert', 'Crée avec Succès');
    }

    public function show($effet){
        $data=Produit::where('produits.effet',$effet)->join('effets','effets.id','produits.effet')
                   ->select('*','produits.id as id','effets.libelle as libelle_effet','produits.libelle as libelle','produits.description as description','produits.code as code')
                   ->get();

        $var['effets']=Effet::all();
        $var['id_effet']=$effet;

        $result=FunctionC::infos($data,$var);
        return view("produits\List",$result);
    }

    public function edit($id){
        $element=Produit::where('id',$id)->first();
        $element->delete();
        return back()->with('alert', 'Supprimé');
    }
}
