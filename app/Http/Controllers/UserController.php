<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return 'Liste de tous les utilisateurs';
    }

    public function create()
    {
        return 'futur contenu de ma vue de création';
    }

    public function show()
    {
        return 'Utilisateur précis retourné';
    }

    public function find()
    {
        return 'Utilisateur retrouvé par son nom';
    }
}
