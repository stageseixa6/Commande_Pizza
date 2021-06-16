<?php

namespace App\Http\Controllers;

use App\Models\Commandes;
use App\Models\Creneau;
use App\Models\Detail;
use http\Env\Response;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //affiche toutes les commandes
    public function AfficherCommandes():
    {
        return response()->json(Commandes::all());
    }
    //supprime toutes les commandes
    public function SupprimerCommandes(){
        $commandes = Commandes::all();
        $commandes->delete();
        return response()->json(["status"=>"success"]);
    }

    //supprime une commande par id
    public function SupprimerDetail($id){
        $detail = Detail::find($id);
        if($detail){
            $detail->delete();
            return response()->json(["status" => "success"]);
        }else{
            return response()->json(["status" => "error"]);
        }
    }
    //affiche une commande par id
    public function AfficherDetail($id){
        $detail = Detail::find($id);
        if ($detail){
            return response()->json(Detail::all($id));
        }
        else{
            return Response()->json(["status" => "error"]);
        }
    }

    //affiche les creneaux
    public function AfficherCreneau(){
        return response()->json(Creneau::all());
    }
    //creer un nouveau creneau
    public function CreerCreneau(){
        $name = $request->input('name');
        $date = $request->input('date');

        if($name){
            $creneau = new Creneau();
            $creneau->name = $name;
            $creneau->date = $date;
            $creneau->save();
            return response()->json(["status" => "success"]);
        }else{
            return response()->json(["status" => "error"]);
        }
    }
    //modifier un creneau
    public function ModifierCreneau($id){
        //todo
    }
    //supprimer creneau
    public function SupprimerCreneau($id){
        //todo
    }

}
