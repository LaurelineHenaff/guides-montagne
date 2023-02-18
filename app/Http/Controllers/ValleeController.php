<?php

namespace App\Http\Controllers;

use App\Models\Abri;
use App\Models\Vallee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ValleeController extends Controller
{
    // Get and show all vallees
    public function index()
    {
        return view('vallees.index', [
            'vallees' => Vallee::all(),
        ]);
    }

    // Show create form
    public function create()
    {
        return view('vallees.create');
    }

    // Insert new vallee
    public function store(Request $req)
    {
        $fields = $req->validate([
            'nom_Vallees' => 'required|unique:vallees,nom_Vallees|max:255',
        ]);

        Vallee::create($fields);

        return redirect('/vallees')
            ->with('toastTitle', 'Succès')
            ->with('toastMessage', 'Nouvelle vallée ajouté !');
    }

    // Show edit form
    public function edit(Vallee $vallee)
    {
        return view('vallees.edit', [
            'vallee' => $vallee,
        ]);
    }

    // Update vallee
    public function update(Request $req, Vallee $vallee)
    {
        $fields = $req->validate([
            'nom_Vallees' => 'required|max:255|unique:vallees,nom_Vallees,' . $vallee->code_Vallees . ',code_Vallees', // unique ?
        ]);

        $vallee->update($fields);

        return redirect('/vallees')
            ->with('toastTitle', 'Succès')
            ->with('toastMessage', 'Vallée modifiée !');
    }

    // Show delete confirmation
    public function delete(Vallee $vallee)
    {
        // Récupérer les ascenssions associées à la vallée
        // TODO: 
        $ascensions = DB::select(
            "SELECT abris.nom_Abris, sommets.nom_Sommets
             FROM ascension
             JOIN abris ON abris.code_Abris = ascension.code_Abris
             JOIN vallees ON vallees.code_Vallees = abris.code_Vallees
             JOIN sommets ON sommets.code_Sommets = ascension.code_Sommets
             WHERE vallees.code_Vallees = ?",
            [$vallee->code_Vallees]
        );

        $randonnees = DB::select(
            "SELECT CONCAT(guides.nom_Guides, ' ', guides.prenom_Guides) AS nom_guide,
                    rando1.dateDebut_Randonnees,
                    rando1.dateFin_Randonnees,
                    (SELECT COUNT(reserver.code_Randonnees)
                    FROM randonnees AS rando2
                    JOIN reserver ON rando2.code_Randonnees = reserver.code_Randonnees
                    JOIN guides ON rando2.code_Guides = guides.code_Guides
                    JOIN abris ON reserver.code_Abris = abris.code_Abris
                    JOIN vallees ON abris.code_Vallees = vallees.code_Vallees
                    WHERE rando2.code_Randonnees = rando1.code_Randonnees) AS nombre_reservations
             FROM randonnees AS rando1
             JOIN guides ON rando1.code_Guides = guides.code_Guides
             WHERE rando1.code_Randonnees IN (
                 SELECT reserver.code_Randonnees
                 FROM reserver
                 JOIN abris ON reserver.code_Abris = abris.code_Abris
                 JOIN vallees ON abris.code_Vallees = vallees.code_Vallees
                 AND vallees.code_Vallees = ?);",
            [$vallee->code_Vallees]
        );

        return view('vallees.delete', [
            'vallee' => $vallee,
            'abris' => Abri::where('code_Vallees', $vallee->code_Vallees)->get(),
            'randonnees' => $randonnees,
            'ascensions' => $ascensions,
        ]);
    }

    // Delete vallee
    public function destroy(Vallee $vallee)
    {
        DB::delete(
            "DELETE
             FROM randonnees
             WHERE randonnees.code_Randonnees IN (
                 SELECT reserver.code_Randonnees
                 FROM reserver, abris, vallees
                 WHERE reserver.code_Abris = abris.code_Abris
                 AND abris.code_Vallees = vallees.code_Vallees
                 AND vallees.code_Vallees = ?);",
            [$vallee->code_Vallees]
        );

        $vallee->delete();

        return redirect('/vallees')
            ->with('toastTitle', 'Succès')
            ->with('toastMessage', 'Vallée supprimée !');
    }
}
