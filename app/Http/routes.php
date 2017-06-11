<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ['uses' => 'WelcomeController@index', 'as' => 'home']);

/*
Route::get('{n}', function($n) {
    return Response::make('Je suis la page ' . $n . ' !', 200);
})->where('n', '[1-3]');

Route::get('article/{n}', 'ArticleController@show')->where('n', '[0-9]+');

Route::get('facture/{n}', function($n) {
    return view('facture')->with('numero', $n);
})->where('n', '[0-9]+');

Route::get('users', 'UsersController@getInfos');
Route::post('users', 'UsersController@postInfos');

Route::get('contact', 'ContactController@getForm');
Route::post('contact', 'ContactController@postForm');

Route::get('photo', 'PhotoController@getForm');
Route::post('photo', 'PhotoController@postForm');

Route::get('email', 'EmailController@getForm');
Route::post('email', ['uses' => 'EmailController@postForm', 'as' => 'storeEmail']);

Route::resource('user', 'UserController');

Route::get('admin', ['middleware' => ['auth', 'admin'], 'uses' => 'AdminController@show']);

Route::group(['middleware' => ['auth', 'admin']], function()
{
    Route::resource('admin/user', 'UserController');
});

*/

// Routes de l'authentification Laravel par défaut
Route::auth();

// Routes pour le côté administrateur
Route::get('admin', 'AdminController@show');

Route::get('admin/donnees', 'AdminController@donnees');

Route::post('admin/donnees/fiches', ['uses' => 'ResearchController@selectfiches_adm', 'as' => 'admin.donnees.fiches']);
Route::post('admin/donnees/fiches/resultats', ['uses' => 'ResearchController@resultfiches_adm', 'as' => 'admin.donnees.fiches.resultats']);

Route::get('admin/donnees/resultat1', ['uses' => 'AdminController@listmed', 'as' => 'admin.donnees.resultat1']);
Route::get('admin/donnees/resultat2', ['uses' => 'AdminController@listcentre', 'as' => 'admin.donnees.resultat2']);
Route::get('admin/donnees/resultat3', ['uses' => 'AdminController@listpat', 'as' => 'admin.donnees.resultat3']);

Route::resource('admin/user', 'UserController');

// Route pour le côté utilisateur
Route::get('utilisateur', 'UtilisateurController@index');

Route::get('informations', 'UtilisateurController@infos');
Route::get('informations/edit', ['uses' => 'UserController@edit2', 'as' => 'informations.edit']);
Route::put('informations', ['uses' => 'UserController@update2', 'as' => 'informations.update']);

Route::get('motdepasse/edit', ['uses' => 'UserController@edit3', 'as' => 'motdepasse.edit']);
Route::put('motdepasse', ['uses' => 'UserController@update3', 'as' => 'motdepasse.update']);

Route::get('donnees', 'UtilisateurController@donnees');

Route::post('donnees/fiches', ['uses' => 'ResearchController@selectfiches', 'as' => 'donnees.fiches']);
Route::post('donnees/fiches/resultats', ['uses' => 'ResearchController@resultfiches', 'as' => 'donnees.fiches.resultats']);

Route::get('donnees/stat1', ['uses' => 'UtilisateurController@stat1', 'as' => 'donnees.stat1']);
Route::get('donnees/stat2', ['uses' => 'UtilisateurController@stat2', 'as' => 'donnees.stat2']);
Route::get('donnees/stat3', ['uses' => 'UtilisateurController@stat3', 'as' => 'donnees.stat3']);

