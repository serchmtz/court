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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
