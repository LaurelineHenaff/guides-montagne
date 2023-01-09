<?php

namespace App\Http\Controllers;

use App\Models\Guide;
use Illuminate\Http\Request;

class GuideController extends Controller
{
    // Get and show all guides
    public function index()
    {
        return view('guides.index', [
            'guides' => Guide::all(),
        ]);
    }

    // Show create form
    public function create()
    {
        return view('guides.create');
    }

    // Insert new guide
    public function store(Request $req)
    {
        $fields = $req->validate([
            'prenom_Guides' => 'nullable|max:255',
            'nom_Guides' => 'required|max:255',
            'email_Guides' => 'email|nullable|unique:guides,email_Guides',
            'motdepasse_Guides' => 'required'
        ]);

        Guide::create($fields);

        return redirect('/guides');
    }

    // Show edit form
    public function edit(Guide $guide)
    {
        return view('guides.edit', [
            'guide' => $guide,
        ]);
    }

    // Update guide
    public function update(Request $req, Guide $guide)
    {
        $fields = $req->validate([
            'prenom_Guides' => 'nullable|max:255',
            'nom_Guides' => 'required|max:255',
            'email_Guides' => 'email|nullable|unique:guides,email_Guides,' . $guide->code_Guides . ',code_Guides',
            'motdepasse_Guides' => 'required'
        ]);

        $guide->update($fields);

        return redirect('/guides');
    }

    // Delete guide
    public function delete(Guide $guide)
    {
        $guide->delete();

        return redirect('/guides');
    }
}
