<?php

namespace App\Http\Controllers;

use App\Models\Randonnee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RandonneeController extends Controller
{
    // Get and show all randonnees
    public function index()
    {
        return view('randonnees.index', [
            'randonnees' => Randonnee::with('guide')->get(),
        ]);
    }

    // Get and show single randonnee
    public function show(Randonnee $randonnee)
    {
        $concerner = DB::table('randonnees')
            ->join('concerner', 'randonnees.code_Randonnees', 'concerner.code_Randonnees')
            ->join('sommets', 'concerner.code_Sommets', 'sommets.code_Sommets')
            ->join('guides', 'randonnees.code_Guides', 'guides.code_Guides')
            ->where('randonnees.code_Randonnees', $randonnee->code_Randonnees)
            ->get([
                'randonnees.code_Randonnees',
                'randonnees.dateDebut_Randonnees',
                'randonnees.dateFin_Randonnees',
                'randonnees.nbPersonnes_Randonnees',
                'concerner.date_Concerner',
                'sommets.nom_Sommets',
                'guides.prenom_Guides',
                'guides.nom_Guides'
            ]);
        return view('randonnees.show', [
            'concerner' => $concerner,
            'debut' => $concerner->first()->dateDebut_Randonnees,
            'fin' => $concerner->first()->dateFin_Randonnees,
            'nbPersonnes' => $concerner->first()->nbPersonnes_Randonnees,
            'guide' => $concerner->first()->prenom_Guides . " " . $concerner->first()->nom_Guides,
        ]);
    }
}
