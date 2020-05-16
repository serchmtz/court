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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/tournaments','TournamentController@index')->name('tournaments');
Route::get('/teams/{id}','TeamController@detalle')->name('teams');
Route::get('/participants/{id_team}','ParticipantController@detalle')->name('participants');
Route::get('/inscription','InscriptionController@index')->name('inscriptions.inscription');
Route::post('/subir','InscriptionController@subirArchivo')->name('subir');
Route::post('/participants/fileupload/','InscriptionController@fileupload')->name('inscriptions.addparticipants');
