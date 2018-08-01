<?php

use Illuminate\Http\Request;


Route::post('login', 'AuthController@login');
Route::post('signup', 'AuthController@signup');
Route::get('signup/activate/{token}', 'AuthController@signupActivate');

Route::group(['middleware' => 'auth:api'], function() {

    //Favorite Router
    Route::resource("favorite","FavoriteController");

    //libraries Router
    Route::resource('libraries', 'LibrariesController');

    //Song Router
    Route::resource('song', 'SongController');

    //play
    Route::get('libraries/play/{id}', 'LibrariesController@play');

    Route::get('logout', 'AuthController@logout');
    Route::get('user', 'AuthController@user');
});