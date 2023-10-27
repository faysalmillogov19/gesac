<?php

namespace App\Http\Controllers;
use App\Models\Plan;
use App\Models\Annee;
use App\Models\Activite;
use App\Models\Affectation_effet;
use App\Models\Affectation_produit;
use App\Models\Affectation_activite;
use App\Models\Sous_activite;
use App\Http\Controllers\FunctionC;

use Illuminate\Http\Request;

class Meo_sous_activiteC extends Controller
{
    public function index(){
       
        
    }

    public function store(Request $request){
        
        
    }

    public function show($affectation_activite){

        $data=Sous_activite::where('sous_activites.affectation_activite',$affectation_activite)
                               ->join('affectation_activites','affectation_activites.id','sous_activites.affectation_activite')
                               ->select('*','sous_activites.id as id')
                               ->get();


        $var['plan']=FunctionC::getAffectation_activiteInfos($affectation_activite);
                                                   
        $result=FunctionC::infos($data,$var);
        return view("Meo\sous_activite_Meo",$result);

    }

    public function edit($id){      
        
    }
}
