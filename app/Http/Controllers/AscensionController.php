<?php

namespace App\Http\Controllers;

use App\Models\Abri;
use App\Models\Sommet;
use App\Models\Ascension;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AscensionController extends Controller
{
    // Get and show all ascension
    public function index()
    {
        $ascensions = DB::table('ascension')
            ->join('sommets', 'ascension.code_Sommets', 'sommets.code_Sommets')
            ->join('abris', 'ascension.code_Abris', 'abris.code_Abris')
            ->select('abris.nom_Abris', 'sommets.nom_Sommets', 'ascension.*')
            ->get();
        // $ascensions = DB::select(
        //     "SELECT ascension.*, abris.nom_Abris, sommets.nom_Sommets
        //      FROM ascension, abris, sommets
        //      WHERE ascension.code_Abris = abris.code_Abris
        //      AND ascension.code_Sommets = sommets.code_Sommets;"
        // ); 
        return view('ascension.index', [
            'ascensions' => $ascensions,
        ]);
    }

    // Show create form
    public function create()
    {
        return view('ascension.create', [
            'abris' => Abri::all(),
            'sommets' => Sommet::all(),
        ]);
    }

    // Insert new ascension
    public function store(Request $req)
    {
        $fields = $req->validate([
            // S'assure que la clé composite (code_Abris, code_Sommets) est unique
            'code_Abris' => 'required|integer|unique:ascension,code_Abris,NULL,code_Abris,code_Sommets,' . $req->code_Sommets,
            'code_Sommets' => 'required|integer',
            'difficulte_Ascension' => 'required|in:débutant,confirmé,expert',
            'duree_Ascension' => 'required|numeric',
        ]);

        DB::table('ascension')
            ->insert([
                'code_Abris' => $fields['code_Abris'],
                'code_Sommets' => $fields['code_Sommets'],
                'difficulte_Ascension' => $fields['difficulte_Ascension'],
                'duree_Ascension' => $fields['duree_Ascension'],
            ]);

        return redirect('/ascension');
    }

    // Show edit form
    public function edit(Abri $abri, Sommet $sommet)
    {
        $ascension = DB::table('ascension')
            ->join('sommets', 'ascension.code_Sommets', 'sommets.code_Sommets')
            ->join('abris', 'ascension.code_Abris', 'abris.code_Abris')
            ->where('ascension.code_Abris', $abri->code_Abris)
            ->where('ascension.code_Sommets', $sommet->code_Sommets)->select('abris.nom_Abris', 'sommets.nom_Sommets', 'ascension.*')
            ->first();

        return view('ascension.edit', [
            'ascension' => $ascension,
            'abris' => Abri::all(),
            'sommets' => Sommet::all(),
        ]);
    }

    // Update ascension
    public function update(Request $req, Abri $abri, Sommet $sommet)
    {
        $fields = $req->validate([
            'difficulte_Ascension' => 'required|in:débutant,confirmé,expert',
            'duree_Ascension' => 'required|numeric',
        ]);

        DB::table('ascension')
            ->where('code_Abris', $abri->code_Abris)
            ->where('code_Sommets', $sommet->code_Sommets)
            ->update([
                'difficulte_Ascension' => $fields['difficulte_Ascension'],
                'duree_Ascension' => $fields['duree_Ascension'],
            ]);

        return redirect('/ascension');
    }

    // Delete ascension
    public function destroy(Abri $abri, Sommet $sommet)
    {
        DB::table('ascension')
            ->where('ascension.code_Abris', $abri->code_Abris)
            ->where('ascension.code_Sommets', $sommet->code_Sommets)
            ->delete();

        return redirect('/ascension');
    }
}
