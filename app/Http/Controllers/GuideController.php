<?php

namespace App\Http\Controllers;

use App\Models\Guide;
use Illuminate\Http\Request;

class GuideController extends Controller
{
    public function index()
    {
        return view('guides.index', [
            'guides' => Guide::all(),
        ]);
    }
}
