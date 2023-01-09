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
            'email_Guides' => 'email|nullable',
            'motdepasse_Guides' => 'nullable'
        ]);

        Guide::create($fields);

        return redirect('/guides');
    }
}
