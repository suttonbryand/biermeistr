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

Route::get('/', 'PageController@home');

Route::get('home', 'HomeController@index');

Route::get('login', 'UserController@login');

Route::get('logout', 'UserController@logout');

Route::get('login/code', 'UserController@loginCode');

Route::get('venues/{city}/{name}', 'VenueController@show');

Route::get('city', 'VenueController@city');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
