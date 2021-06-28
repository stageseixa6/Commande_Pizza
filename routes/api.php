<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//Routes pour toutes les commandes
Route::get('/commandes', ['App\Http\Controllers\ApiController', 'AfficherCommandes']);

Route::delete('/commandes', ['App\Http\Controllers\ApiController', 'SupprimerCommandes']);

//Routes pour le détail d'une commande
Route::get('/commandes/{id}', ['App\Http\Controllers\ApiController', 'AfficherDetail']);

Route::delete('/commandes/{id}', ['App\Http\Controllers\ApiController', 'SupprimerDetail']);

//Route pour les creneaux
Route::get('/creneau', ['App\Http\Controllers\ApiController', 'AfficherCreneau']);

Route::delete('/creneau/{$id}', ['App\Http\Controllers\ApiController', 'SupprimerHoraire']);

Route::post('/creneau', ['App\Http\Controllers\ApiController', 'CreerCreneau']);

Route::delete('/creneau', ['App\Http\Controllers\ApiController', 'SupprimerCreneau']);


