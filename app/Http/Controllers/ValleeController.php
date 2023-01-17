<?php

namespace App\Http\Controllers;

use App\Models\Vallee;
use Illuminate\Http\Request;

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
            'nom_Vallees' => 'required|max:255', // unique ?
        ]);

        $vallee->update($fields);

        return redirect('/vallees')
            ->with('toastTitle', 'Succès')
            ->with('toastMessage', 'Vallée modifiée !');
    }

    // Delete vallee
    public function delete(Vallee $vallee)
    {
        $vallee->delete();

        return redirect('/vallees')
            ->with('toastTitle', 'Succès')
            ->with('toastMessage', 'Vallée supprimée !');
    }
}
