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

Route::get('/', 'PagesController@home');

Route::get('recipes/create/confirm', 'RecipesController@confirm');
Route::resource('recipes', 'RecipesController');

Route::get('formtest/stepone','FormsController@pageOne');
Route::post('formtest/steptwo','FormsController@pageTwo');
Route::get('formtest/steptwo', function(){
	return redirect('formtest/stepone');
});
Route::post('formtest/stepthree','FormsController@pageThree');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
