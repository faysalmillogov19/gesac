<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group([], function(){
    Route::resource('/annee','App\Http\Controllers\AnneeC');
    Route::resource('/responsable','App\Http\Controllers\ResponsableC');
    Route::resource('/source_financement','App\Http\Controllers\Source_financementC');
    Route::resource('/strategie_nationale','App\Http\Controllers\Strategie_nationalC');
    
    
});
Route::group([], function(){
    Route::resource('/activite','App\Http\Controllers\ActiviteC');
    Route::resource('/effet','App\Http\Controllers\EffetC');
    Route::resource('/produit','App\Http\Controllers\ProduitC');
    
});

Route::group([], function(){
    Route::resource('/plan','App\Http\Controllers\PlanC');
    Route::resource('/affectation_effet','App\Http\Controllers\Affectation_effetC');
    Route::resource('/affectation_produit','App\Http\Controllers\Affectation_produitC');
    Route::resource('/affectation_activite','App\Http\Controllers\Affectation_activiteC');
    Route::resource('/sous_activite','App\Http\Controllers\Sous_activiteC');
    Route::resource('/periode_activite','App\Http\Controllers\Periode_activiteC');
    Route::resource('/financement','App\Http\Controllers\FinancementC');

    Route::resource('/financement_sous_activite','App\Http\Controllers\Financement_sous_activiteC');
    Route::resource('/periode_sous_activite','App\Http\Controllers\Periode_sous_activiteC');

    
});

Route::group([], function(){
    Route::resource('/meo','App\Http\Controllers\MeoC');

    Route::get('/getEffet/{plan}', 'App\Http\Controllers\MeoC@getEffet' );

    Route::get('/getProduit/{effet}', 'App\Http\Controllers\MeoC@getProduit' ); 

    Route::resource('/depense_activite','App\Http\Controllers\Depense_activiteC');
    Route::resource('/depense_sous_activite','App\Http\Controllers\Depense_sous_activiteC');

    Route::resource('/realisation_activite','App\Http\Controllers\Realisation_activiteC');
    Route::resource('/realisation_sous_activite','App\Http\Controllers\Realisation_sous_activiteC');

    Route::resource('/sous_activite_meo','App\Http\Controllers\Meo_sous_activiteC');
});
