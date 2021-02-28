<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Exemple de route basée sur une fonction de type Closure
Route::get('/bienvenue', function(){
    return 'bienvenue sur mon application laravel';
});

// Exemple de route liée à une méthode d'un controller
Route::get('/user', 'UserController@index');

// Créer une route nommée  
Route::post('/user/create', 'UserController@store')->name('user.store');

// Exemple de route liée à une méthode de controller - nouveauté Laravel 8
Route::get('/user/create',[ App\Http\Controllers\UserController::class, 'create' ])->name('user.create');

// Utiliser un parametre dynamique dans une route
// Par exemple : récupérer l'utilisateur qui porte l'ID 2
Route::get('/user/{id}', 'UserController@show');

// Envoyer des paramètres validés par une REGEX
Route::get('/user/{id}', 'UserController@show')->where('id','[0-9]')->name('user.show');

// Route avec parametre optionnnel par exemple le nom d'un User
Route::get('/user/{name?}', 'UserController@find');

/**
 * Créer des routes avec un préfixe 
 * Par ex : on veut que toutes nos routes commencent par "admin"
 */
Route::prefix('/admin')->group(function(){
    // Cette route correspondra à l'URL "/admin/users"
    Route::get('/users', 'UserController@index');
});

/**
 * Créer des routes nommées avec préfixe
 * Par exemple : faire en sorte qu'un groupe de route commencent par "admin." dans tous les noms
 */
Route::name('posts.')->group(function(){
    // Cette route aura le nom automatiquement défini à "admin.users"
    Route::get('/',function(){
        return 'La liste des tous les utilisateur de la page admin';
    })->name('index');
});