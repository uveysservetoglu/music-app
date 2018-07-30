<?php

use Illuminate\Http\Request;


Route::post('login', 'AuthController@login');
Route::post('signup', 'AuthController@signup');


Route::group(['middleware' => 'auth:api'], function() {
    Route::get('logout', 'AuthController@logout');
    Route::get('user', 'AuthController@user');
});