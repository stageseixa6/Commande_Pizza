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
        $detail = DB::connection('main')->delete('delete from commandes where id=?;', [$id]);// Detail::query('SELECT * FROM detail WHERE id = ? ', [$id]);//todo
        if($detail){
            return response()->json(["status" => "success"]);
        }else{
            return response()->json(["status" => "error"]);
        }
    }
    //affiche une commande par id
    public function AfficherDetail($id){
        $detail =DB::select('SELECT FROM commandes WHERE id=?;', [$id]);//todo
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
    public function ModifierCreneau($id){
        //todo
    }
    //supprimer un horaire par id
    public function SupprimerHoraire($id){
        $horaire = DB::connection('main')->delete('delete from creneau where id=?;', [$id]);// Detail::query('SELECT * FROM detail WHERE id = ? ', [$id]);//todo
        if($horaire){
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
