<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tel['l Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => 'login'], function(){

Route::get('home', 'HomeController@index');

Route::get('venues/{city}/{name}', 'VenueController@show');

Route::get('city', 'VenueController@city');

});
Route::get('/', 'PageController@home');

Route::get('login', 'UserController@login');

Route::get('logout', 'UserController@logout');

Route::get('login/code', 'UserController@loginCode');

//Route::get('locallogin/{token}/{first_name}', 'UserController@locallogin');

// API

Route::group(['prefix' => 'api/v1'], function(){

	Route::get('venues/{city}/{name}', 'ApiVenueController@show');

	Route::get('city', 'ApiVenueController@city');

});


