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

Route::get('/', 'DashboardController@index');
Route::get('/all', 'DashboardController@all');

Route::resource('eats', 'EatsController');
Route::resource('foods', 'FoodsController');
Route::resource('weight', 'WeightsController');
Route::resource('profile', 'UserController');

Route::resource('activities', 'ActivitiesController');

Route::resource('repeat', 'RepeatActivityController');
Route::post('repeat/{id}/apply/', 'RepeatActivityController@applyToLoggedInUser');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
