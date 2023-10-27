<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activite;
use App\Http\Controllers\FunctionC;

class ActiviteC extends Controller
{
    public function index(){
        $data=Activite::all();
        $result=FunctionC::infos($data,[]);
        return view("activites\List",$result);
    }

    public function store(Request $request){
        if($request->id >0 ){
            $element=Activite::where('id',$request->id)->first();
        }
        else{
            $element=new Activite();
        }
        $element->code=$request->code;
        $element->libelle=$request->libelle;
        $element->description=$request->description;
        $element->save();
        return back()->with('alert', 'Crée avec Succès');

    }

    public function show($produit){
        $data=Activite::where('activites.produit',$produit)
                      ->Join('produits','produits.id','activites.produit')
                      ->Join('effets','effets.id','produits.effet')
                      ->select('*','activites.id as id','activites.libelle as libelle','activites.code as code',
                            'activites.description as description','produits.libelle as libelle_produit','effets.libelle as libelle_effet'
                        )
                        ->get();
        $var['id_produit']=$produit;
        $result=FunctionC::infos($data,$var);
        return view("activites\List",$result);
    }

    public function edit($id){
        $element=Activite::where('id',$id)->first();
        $element->delete();
        return back()->with('alert', 'Supprimé');
    }

}
