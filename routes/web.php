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
    Route::resource('/activite','App\Http\Controllers\ActiviteC');
    Route::resource('/annee','App\Http\Controllers\AnneeC');
    Route::resource('/responsable','App\Http\Controllers\ResponsableC');
    Route::resource('/source_financement','App\Http\Controllers\Source_financementC');
    
});

Route::group([], function(){
    Route::resource('/effet','App\Http\Controllers\EffetC');
    Route::resource('/produit','App\Http\Controllers\ProduitC');


    
});
