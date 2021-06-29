<?php

namespace App\Http\Controllers;

use App\Models\Commandes;
use App\Models\Creneau;
use App\Models\Detail;
use http\Env\Response;
use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    //affiche toutes les commandes
    public function AfficherCommandes(){
        return response()->json(Commandes::all());
    }
    //supprime toutes les commandes
    public function SupprimerCommandes(){
        $commandes = Commandes::all();
        foreach ($commandes as $commande) {
            $commande->delete();
        }
        return response()->json(["status"=>"success"]);
    }

    //supprime une commande par id
    public function SupprimerDetail($id){
        $detail = Commandes::find($id);;
        if($detail){
            $detail->delete();
            return response()->json(["status" => "success"]);
        }else{
            return response()->json(["status" => "error"]);
        }
    }
    //affiche une commande par id
    public function AfficherDetail($id){
        $detail = Commandes::find($id);
        if ($detail){
            return response()->json($detail);
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
    public function CreerCreneau(Request $request){
        $horaire = $request->input('horaire');

        if($horaire){
            $creneau = new Creneau();
            $creneau->horaire = $horaire;
            $creneau->save();
            return response()->json(["status" => "success"]);
        }else{
            return response()->json(["status" => "error"]);
        }
    }
    //modifier un creneau
    public function ModifierCreneau(Request $request, $id){
       $creneau = Creneau::find($id);
        $horaire = $request->input('horaire');

       if($horaire && $creneau){
           $creneau->horaire = $horaire;
           $creneau->save();
          return response()->json(["status" => "success"]);
       }
       else{
           return response()->json(["status" => "error"]);
       }
    }
    //supprimer un horaire par id
    public function SupprimerHoraire($id){
        $horaire = Creneau::find($id);
        if($horaire){
            $horaire->delete();
            return response()->json(["status" => "success"]);
        }else{
            return response()->json(["status" => "error"]);
        }
    }

    //supprimer un creneau complet
    public function SupprimerCreneau(){
        $creneau = Creneau::all();
        foreach ($creneau as $creneau) {
            $creneau->delete();
        }
        return response()->json(["status"=>"success"]);
    }

}
