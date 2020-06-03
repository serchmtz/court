<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/all/users','UserController@fetchAll')->name('fetchAll');
Route::get('/all/players','PlayerController@fetchAll')->name('fetchAll');
Route::get('/all/teams','TeamController@fetchAll')->name('fetchAll');
Route::get('/all/members','MemberController@fetchAll')->name('fetchAll');
Route::get('/all/participants','ParticipantController@fetchAll')->name('fetchAll');
Route::get('/all/tournaments','TournamentController@fetchAll')->name('fetchAll');
Route::get('/all/inscriptions','InscriptionController@fetchAll')->name('fetchAll');
Route::get('/all/matches','MatchController@fetchAll')->name('fetchAll');
Route::get('/all/stats','StatController@fetchAll')->name('fetchAll');
Route::get('/all/sets','SetController@fetchAll')->name('fetchAll');

Route::middleware('auth:api')->group( function () {
    //------------Users and authentications------------//
    Route::get('users', 'UserController@index')->name('users.index');
    Route::get('users/{user}', 'UserController@show')->name('users.show');
    Route::post('users', 'API\RegisterController@register')->name('users.store');
    Route::put('users/{user}', 'UserController@update')->name('users.update');
    Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy');
    Route::post('logout', 'API\RegisterController@logout')->name('logout');
    Route::get('authuser','API\RegisterController@authuser')->name('authuser');

    //------------Inscriptions File Upload------------//
    Route::get('/inscription','InscriptionController@index')->name('inscriptions.inscription');
    Route::post('/subir','InscriptionController@subirArchivo')->name('subir');

    //-----------Matches,sets and stats---------------//
    Route::put('matches/{match}', 'MatchController@update')->name('matches.update');
    Route::put('sets/{id_match}', 'SetController@update')->name('sets.update');
    Route::put('stats/{id_match}', 'StatController@update')->name('stats.update');
    Route::get('sortmatches/{tournament}','TournamentController@sortmatches')->name('tournaments.sort');
});

//------------Results----------------------------//
Route::get('matches','MatchController@index')->name('matches.index');
Route::get('matches/{match}', 'MatchController@show')->name('matches.show');
Route::post('login', 'API\RegisterController@login')->name('login');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/home/tournaments', 'TournamentController@index')->name('tournaments.index');
Route::get('/home/tournaments/crear', 'TournamentController@create')->name('tournament.create');
Route::post('/home/tournaments/store', 'TournamentController@store')->name('tournament.store');
Route::put('/home/tournaments/update/{tournament}', 'TournamentController@update')->name('tournament.update');
Route::get('/home/tournaments/edit/{tournament}', 'TournamentController@edit')->name('tournament.edit');
Route::get('/home/tournaments/{tournament}', 'TournamentController@show')->name('tournament.show');
Route::delete('/home/tournaments/{tournament}', 'TournamentController@destroy')->name('tournament.destroy');

