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
Route::group(['prefix' => 'auth', 'middleware' => 'csrf'], function () {
    Route::get('login', 'FrontendController@login');
    Route::post('login', 'Auth\AuthController@postLogin');
    Route::get('logout', 'Auth\AuthController@getLogout');
    Route::get('register', 'FrontendController@signup');
    Route::post('register', 'Auth\AuthController@postRegister');
});

Route::get('verify/{confirmation_code}', 'RegistrationController@confirm');

// Frontend routes...
Route::get('/', 'FrontendController@home');
Route::get('about', 'FrontendController@about');
Route::get('privacy', 'FrontendController@privacy');
Route::get('security', 'FrontendController@security');
Route::get('support-journal', 'FrontendController@support');

Route::get('rid', 'EntryController@stats');

// App routes...
Route::group(['middleware' => ['auth', 'csrf'], 'prefix' => 'journal'], function() {
    Route::get('/', 'JournalController@home');
    Route::get('stats', 'JournalController@stats');
    Route::get('entries', 'EntryController@index');
    Route::post('entries', 'EntryController@store');
    Route::get('entries/{id}', 'EntryController@show');
    Route::post('entries/{id}', 'EntryController@update');
    Route::post('entries/{id}/sign', 'EntryController@sign');
    Route::get('entries/{id}/stats', 'StatController@show');
    Route::get('entries/handle/{date}', 'EntryController@findByDate');

    //Preferences routes...
    Route::group(['prefix' => 'preferences'], function() {
        Route::get('/', 'SettingController@render');
        Route::get('privacy', 'SettingController@renderPrivacy');
    });
});

// User API routes...
Route::group(['middleware' => ['auth', 'csrf'], 'prefix' => 'api/user'], function() {
    Route::get('contribs', 'APIController@contribs');
});
