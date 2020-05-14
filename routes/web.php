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
Route::get('/home/tournaments', 'TournamentController@index')->name('tournaments');
Route::get('/home/tournaments/crear', 'TournamentController@create')->name('tournament.create');
Route::post('/home/tournaments/store', 'TournamentController@store')->name('tournament.store');
Route::get('/home/tournaments/{tournament}', 'TournamentController@show')->name('tournament.show');
Route::get('/home/tournaments/{tournament}', 'TournamentController@update')->name('tournament.update');
Route::delete('/home/tournaments/{tournament}', 'TournamentController@destroy')->name('tournament.destroy');
/*Route::get('/home/tournaments','TournamentController@index')->name('tournaments');*/
