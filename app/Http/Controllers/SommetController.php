<?php

namespace App\Http\Controllers;

use App\Models\Sommet;
use Illuminate\Http\Request;

class SommetController extends Controller
{
    // Get and show all sommets
    public function index()
    {
        return view('sommets.index', [
            'sommets' => Sommet::all(),
        ]);
    }

    // Show create form
    public function create()
    {
        return view('sommets.create');
    }

    // Insert new sommet
    public function store(Request $req)
    {
        $fields = $req->validate([
            'nom_Sommets' => 'required|max:255', // unique ?
            'altitude_Sommets' => 'required|integer|lte:8900',
        ]);

        Sommet::create($fields);

        return redirect('/sommets');
    }

    // Show edit form
    public function edit(Sommet $sommet)
    {
        return view('sommets.edit', [
            'sommet' => $sommet,
        ]);
    }

    // Update sommet
    public function update(Request $req, Sommet $sommet)
    {
        $fields = $req->validate([
            'nom_Sommets' => 'required|max:255', // unique ?
            'altitude_Sommets' => 'required|integer|lte:8900',
        ]);

        $sommet->update($fields);

        return redirect('/sommets');
    }

    // Delete sommet
    public function delete(Sommet $sommet)
    {
        $sommet->delete();

        return redirect('/sommets');
    }
}
