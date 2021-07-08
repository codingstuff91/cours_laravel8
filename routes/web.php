<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// Appel d'une vue par une route
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Exemple de route basée sur une fonction de type Closure
Route::get('/bienvenue', function(){
    return 'bienvenue sur mon application laravel';
});

// Exemple de route liée à une méthode d'un controller
Route::get('/user', 'UserController@index');

// Exemple de route liée à une méthode de controller - nouveauté Laravel 8
Route::get('/user/create', [UserController::class, 'create' ])->name('user.create');

// Créer une route nommée  
Route::post('/user/create', 'UserController@store')->name('user.store');

// Utiliser un parametre dynamique dans une route
// Par exemple : récupérer l'utilisateur en envoyant un ID comme paramètre d'URL
// Route::get('/user/{id}', 'UserController@show');

// Préciser un paramètre bien précis d'un Model pour le récupérer
// Par exemple : récupérer l'utilisateur par son adresse email
Route::get('/user/{user:email}', 'UserController@show');

/**
 * Créer des routes avec un préfixe 
 * Par ex : on veut que toutes nos routes commencent par "admin"
 */
Route::prefix('/admin')->group(function(){
    // Cette route correspondra à l'URL "/admin/users"
    Route::get('/users', 'UserController@index')->name('admin.index');
});

/**
 * Créer des routes nommées avec préfixe
 * Par exemple : faire en sorte qu'un groupe de route commencent par "admin." dans tous les noms
 */
Route::name('annonce.')->group(function(){
    // Cette route aura le nom automatiquement défini à "admin.users"
    Route::get('/annonce',function(){
        return 'Voici la liste de toutes les annonces';
    })->name('index');

    Route::get('/annonce/detail', function(){
        return 'Voici le détail des annnonces';
    })->name('details');
});