<?php

namespace App\Http\Controllers;

use App\Models\Abri;
use App\Models\Vallee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AbriController extends Controller
{
    // Get and show all abris
    public function index()
    {
        // $abris = DB::select("SELECT abris.*, vallees.nom_Vallees
        //                      FROM abris, vallees
        //                      WHERE abris.code_Vallees = vallees.code_Vallees;");

        // $abris = Abri::join('vallees', 'vallees.code_Vallees', 'abris.code_Vallees')
        //     ->get(['abris.*', 'vallees.nom_Vallees']);

        // dd(Abri::all());

        return view('abris.index', [
            // 'abris' => Abri::with('vallee')->get(),
            'abris' => Abri::all(), // possible grâce à protected $with du model Abri
        ]);
    }

    // Show create form
    public function create()
    {
        return view('abris.create', [
            'vallees' => Vallee::all(),
        ]);
    }

    // Insert new abri
    public function store(Request $req)
    {
        $fields = $req->validate([
            'nom_Abris' => 'required|max:255|unique:abris,nom_Abris',
            'type_Abris' => 'in:cabane,refuge',
            'code_Vallees' => 'required',
            'altitude_Abris' => 'required',
            'places_Abris' => 'required',
            'prixNuit_Abris' => 'required',
            'prixRepas_Abris' => 'exclude_if:type_Abris,cabane|required|numeric',
            'telGardien_Abris' => 'exclude_if:type_Abris,cabane|required|regex:/^0[1-9][0-9]{8}$/',
        ]);

        Abri::create($fields);

        return redirect('/abris');
    }

    // Show edit form
    public function edit(Abri $abri) // $abri aura la relation vallee grâce à protected $with du model Abri
    {
        // dd($abri->code_Abris);

        // dd($abri->getAttribute('code_Abris'));
        // $currentAbris = DB::select(
        //     "SELECT abris.*, vallees.nom_Vallees
        //      FROM abris, vallees
        //      WHERE abris.code_Vallees = vallees.code_Vallees
        //      AND abris.code_Abris = ?;",
        //     [$abri->getAttribute('code_Abris')]
        // );
        // dd($abri/*->with('vallee')->get()*/);
        // dd(Abri::with('vallee')->where('code_Abris', $abri->code_Abris)->get());
        // dd($currentAbris[0]);
        // dd($abri);
        return view('abris.edit', [
            // 'abri' => $currentAbris[0],
            'abri' => $abri,
            'vallees' => Vallee::all(), // pour remplir le select
        ]);
    }

    // Update abri
    public function update(Request $req, Abri $abri)
    {
        $fields = $req->validate([
            'nom_Abris' => 'required|max:255|unique:abris,nom_Abris,' . $abri->code_Abris . ',code_Abris',
            'type_Abris' => 'in:cabane,refuge',
            'code_Vallees' => 'required',
            'altitude_Abris' => 'required',
            'places_Abris' => 'required',
            'prixNuit_Abris' => 'required',
            'prixRepas_Abris' => 'exclude_if:type_Abris,cabane|required|numeric',
            'telGardien_Abris' => 'exclude_if:type_Abris,cabane|required|regex:/^0[1-9][0-9]{8}$/',
        ]);

        if ($fields['type_Abris'] === 'cabane') {
            $fields['prixRepas_Abris'] = null;
            $fields['telGardien_Abris'] = null;
        }

        $abri->update($fields);

        return redirect('/abris');
    }

    // Delete abri
    public function delete(Abri $abri)
    {
        $abri->delete();

        return redirect('/abris');
    }
}
