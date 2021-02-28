<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnnonceController extends Controller
{
    public function index()
    {
        return 'Voici la liste de toutes les annonces';
    }

    public function show(Request $request)
    {
        return 'Voici la liste des annonces de l\'utilisateur'.$request->id;
    }
}
