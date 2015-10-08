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

// Auth routes...
Route::group(['prefix' => 'auth'], function () {
    Route::get('login', 'FrontendController@login');
    Route::post('login', 'Auth\AuthController@postLogin');
    Route::get('logout', 'Auth\AuthController@getLogout');
    Route::get('register', 'FrontendController@signup');
    Route::post('register', 'Auth\AuthController@postRegister');
});

// Frontend routes...
Route::get('/', 'FrontendController@home');


// App routes...
Route::group(['middleware' => 'auth', 'prefix' => 'journal'], function() {
    Route::get('/', 'JournalController@home');
    Route::get('stats', 'JournalController@stats');
    Route::get('entries', 'EntryController@index');
    Route::post('entries', 'EntryController@store');
    Route::get('entries/{id}', 'EntryController@show');
    Route::post('entries/{id}', 'EntryController@update');
});
