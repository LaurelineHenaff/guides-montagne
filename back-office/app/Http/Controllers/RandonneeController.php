<?php

namespace App\Http\Controllers;

use App\Models\Randonnee;
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
        $concerner = DB::select(
            "SELECT randonnees.code_Randonnees,
                    randonnees.dateDebut_Randonnees,
                    randonnees.dateFin_Randonnees,
                    randonnees.nbPersonnes_Randonnees,
                    concerner.date_Concerner,
                    sommets.nom_Sommets,
                    guides.prenom_Guides,
                    guides.nom_Guides,
                    abris.code_Abris,
                    abris.nom_Abris,
                    reserver.statut_Reserver
             FROM randonnees, concerner, sommets, guides, reserver, abris
             WHERE randonnees.code_Randonnees = concerner.code_Randonnees
             AND concerner.code_Sommets = sommets.code_Sommets
             AND randonnees.code_Guides = guides.code_Guides
             AND reserver.code_Abris = abris.code_Abris
             AND concerner.date_Concerner = reserver.date_Reserver
             AND randonnees.code_Randonnees = ?
             ORDER BY concerner.date_Concerner",
            [$randonnee->code_Randonnees]
        );

        $data = [
            'concerner' => $concerner,
        ];

        if (is_array($concerner) && count($concerner) > 0) {
            $data['debut'] = $concerner[0]->dateDebut_Randonnees;
            $data['fin'] = $concerner[0]->dateFin_Randonnees;
            $data['nbPersonnes'] = $concerner[0]->nbPersonnes_Randonnees;
            $data['guide'] = $concerner[0]->prenom_Guides . " " . $concerner[0]->nom_Guides;
        }

        return view('randonnees.show', $data);
    }
}
