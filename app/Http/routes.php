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

Route::get('/', 'PagesController@index');

Route::get('logout', function () {
    Auth::logout();
    return Redirect::to('/');
});

//ログイン
Route::get('/login', 'LoginController@index');
Route::get('/login/google', 'LoginController@loginWithGoogle');
Route::get('/login/twitter', 'LoginController@loginWithTwitter');
Route::get('/login/facebook', 'LoginController@loginWithFacebook');
Route::post('/login/complete', 'LoginController@complete');


Route::group(['middleware' => 'auth'], function () {

    //アカウント
    Route::get('/account', 'AccountController@index');
    Route::get('/account/create', 'AccountController@create');
    Route::get('/account/create/google', 'AccountController@google');

    //質問
    Route::get('/comments', 'CommentsController@index');
    Route::get('/comments/create', 'CommentsController@create');
    Route::post('/comments/create', 'CommentsController@create');
});