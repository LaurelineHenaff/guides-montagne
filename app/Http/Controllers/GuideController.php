<?php

namespace App\Http\Controllers;

use App\Models\Guide;
use Illuminate\Http\Request;

class GuideController extends Controller
{
    /** 
     * Validation rules used for form data.
     */
    private static $fieldsValidationRules = [
        'prenom_Guides' => 'nullable|max:255',
        'nom_Guides' => 'required|max:255',
        'email_Guides' => 'email|nullable',
        'motdepasse_Guides' => 'required'
    ];

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
        $fields = $req->validate(static::$fieldsValidationRules);

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
        $fields = $req->validate(static::$fieldsValidationRules);

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
