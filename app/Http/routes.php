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

Route::get('/', function () {
    return view('welcome');
});

//ログイン
Route::get('/login', 'LoginController@index');
Route::get('/login/google', 'LoginController@loginWithGoogle');
Route::get('/login/twitter', 'LoginController@loginWithTwitter');
Route::get('/login/facebook', 'LoginController@loginWithFacebook');

//質問
Route::get('/questions', 'QuestionsController@index');
Route::get('/questions/create', 'QuestionsController@create');