<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Show create form
    public function create()
    {
        return view('users.create');
    }

    // Insert new user
    public function store(Request $req)
    {
        $fields = $req->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:3',
        ]);

        $fields['password'] = bcrypt($fields['password']);

        $user = User::create($fields);

        // Connecter l'utilisateur
        auth()->login($user);

        return redirect('/')
            ->with('toastTitle', 'Succès')
            ->with('toastMessage', 'Utilisateur créé et connecté !');
    }

    // Show login form
    public function login()
    {
        return view('users.login');
    }

    // Authenticate user
    public function authenticate(Request $req)
    {
        $fields = $req->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        if (auth()->attempt($fields)) {
            $req->session()->regenerate();

            return redirect('/');
        }

        return back()
            ->withErrors(['name' => 'Nom ou mot de passe non valide.'])
            ->onlyInput('name');
    }

    // Logout user
    public function logout(Request $req)
    {
        auth()->logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();

        return redirect('/');
    }
}
