<?php

namespace App\Http\Controllers;

use App\Models\Activite;
use App\Models\Plan;
use App\Models\Sous_activite;
use App\Models\Affectation_effet;
use App\Models\Affectation_produit;
use App\Models\Affectation_activite;

use App\Http\Controllers\FunctionC;


use Illuminate\Http\Request;

class MeoC extends Controller
{
    public function index(){
        $data=[];
        $var['plan']=Plan::join('strategie_nationales','strategie_nationales.id','plans.strategie')
                         ->join('annees','annees.id','plans.annee')
                         ->select('plans.id as id','annees.libelle as libelle_annee','strategie_nationales.libelle as libelle_strategie')
                         ->get();
        $result=FunctionC::infos($data,$var);
        return view("Meo\Form",$result);

    }

    public function store(Request $request){
        $data= Affectation_activite::where('affectation_activites.affectation_produit',$request->produit)
                                   ->join('activites','activites.id','affectation_activites.activite')
                                   ->select('*','affectation_activites.id as id')
                                   ->get();
        $var['plan']=FunctionC::getAffectation_produitInfos($request->produit);
        $result=FunctionC::infos($data,$var);
        return view("Meo\activiteMoe",$result);
    }

    public function getEffet($plan){
        $data=FunctionC::getEffet($plan);
        return json_encode($data);
    }

    public function getProduit($effet){
        $data=FunctionC::getProduit($effet);
        return json_encode($data);
    }
}
