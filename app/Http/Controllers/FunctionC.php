<?php

namespace App\Http\Controllers;
use App\Models\Plan;
use App\Models\Annee;
use App\Models\Activite;
use App\Models\Sous_activite;
use App\Models\Affectation_effet;
use App\Models\Affectation_produit;
use App\Models\Affectation_activite;
use App\Http\Controllers\FunctionC;

use Illuminate\Http\Request;

class FunctionC extends Controller
{
    public static function infos($data, $var){

        return compact('data', 'var');
    }

    public static function getEffet($plan){
        $data=Affectation_effet::where('affectation_effets.plan',$plan)
                               ->join('effets','effets.id','affectation_effets.effet')
                               ->join('plans','plans.id','affectation_effets.plan')
                               ->join('strategie_nationales','strategie_nationales.id','plans.strategie')
                               ->join('annees','annees.id','plans.annee')
                               ->select('*','affectation_effets.id as id','effets.libelle as libelle_effet','strategie_nationales.libelle as libelle_strategie','annees.libelle as libelle_annee')
                               ->get();
        return $data;

    }

    public static function getProduit($effet){
        $data=Affectation_produit::where('affectation_produits.affectation_effet',$effet)
                               ->join('produits','produits.id','affectation_produits.produit')
                               ->join('affectation_effets','affectation_effets.id','affectation_produits.affectation_effet')
                               ->join('effets','effets.id','affectation_effets.effet')
                               ->join('plans','plans.id','affectation_effets.plan')
                               ->join('strategie_nationales','strategie_nationales.id','plans.strategie')
                               ->join('annees','annees.id','plans.annee')
                               ->select('*','affectation_produits.id as id','produits.libelle as libelle_produit','effets.libelle as libelle_effet','strategie_nationales.libelle as libelle_strategie','annees.libelle as libelle_annee')
                               ->get();
        return $data;

    }

    public static function getAffectation_produitInfos($affectation_produit){
        $val=Affectation_produit::where('affectation_produits.id',$affectation_produit)
                                                  ->join('affectation_effets','affectation_effets.id','affectation_produits.affectation_effet')
                                                  ->join('produits','produits.id','affectation_produits.produit')
                                                   ->join('effets','effets.id','affectation_effets.effet')
                                                   ->join('plans','plans.id','affectation_effets.plan')
                                                   ->join('annees','annees.id','plans.annee')
                                                   ->join('strategie_nationales','strategie_nationales.id','plans.strategie')
                                                   ->select('*','affectation_produits.id as id','annees.libelle as libelle_annee','strategie_nationales.libelle as libelle_strategie','effets.libelle as libelle_effet',
                                                    'effets.code as code_effet','produits.code as code_produit','produits.libelle as libelle_produit')
                                                   ->first();
        return $val;
    }

    public static function getAffectation_activiteInfos($affectation_activite){
        $val=Affectation_activite::where('affectation_activites.id',$affectation_activite)
                                                ->join('activites','activites.id','affectation_activites.activite')
                                                ->join('affectation_produits','affectation_produits.id','affectation_activites.affectation_produit')
                                                  ->join('affectation_effets','affectation_effets.id','affectation_produits.affectation_effet')
                                                  ->join('produits','produits.id','affectation_produits.produit')
                                                   ->join('effets','effets.id','affectation_effets.effet')
                                                   ->join('plans','plans.id','affectation_effets.plan')
                                                   ->join('annees','annees.id','plans.annee')
                                                   ->join('strategie_nationales','strategie_nationales.id','plans.strategie')
                                                   ->select('*','affectation_activites.id as id','annees.libelle as libelle_annee','strategie_nationales.libelle as libelle_strategie','effets.libelle as libelle_effet',
                                                    'effets.code as code_effet','produits.code as code_produit','produits.libelle as libelle_produit','activites.libelle as libelle_activite','activites.code as code_activite')
                                                   ->first();
        return $val;
    }

    public static function getAffectation_sous_activiteInfos($sous_activite){
        $val=Sous_activite::where('sous_activites.id',$sous_activite)
                                                ->join('affectation_activites','affectation_activites.id','sous_activites.affectation_activite')
                                                ->join('activites','activites.id','affectation_activites.activite')
                                                ->join('affectation_produits','affectation_produits.id','affectation_activites.affectation_produit')
                                                  ->join('affectation_effets','affectation_effets.id','affectation_produits.affectation_effet')
                                                  ->join('produits','produits.id','affectation_produits.produit')
                                                   ->join('effets','effets.id','affectation_effets.effet')
                                                   ->join('plans','plans.id','affectation_effets.plan')
                                                   ->join('annees','annees.id','plans.annee')
                                                   ->join('strategie_nationales','strategie_nationales.id','plans.strategie')
                                                   ->select('*','sous_activites.id as id','annees.libelle as libelle_annee','strategie_nationales.libelle as libelle_strategie','effets.libelle as libelle_effet',
                                                    'effets.code as code_effet','produits.code as code_produit','produits.libelle as libelle_produit','activites.libelle as libelle_activite','activites.code as code_activite','sous_activites.libelle as libelle_sous_activite','sous_activites.code as code_sous_activite')
                                                   ->first();
        return $val;
    }

    public static function uploadFichier($var,$dossier,$rename)
    {
        $date=date_create();
        $date=date_timestamp_get($date);
        $file = $var;
        $extension=$file->getClientOriginalExtension();
        //$filename=$file->getClientOriginalName();
        $filename=$dossier.$rename.$date.".".$extension;
        $size=$file->getSize();
        $mimeType=$file->getMimeType();
        $file->move($dossier,$filename);
        return $filename;
    }

    public static function deleteFichier($chemin){
        unlink($chemin);
    }

}
