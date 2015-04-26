<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::group(array('prefix' => 'api/v1'), function()
{
    Route::get('info/{id}', ['uses' => 'ApiController@info']);
    Route::put('changePassword', ['uses' => 'ApiController@changePassword']);
});

Route::group(array('prefix' => 'ui'), function()
{
    Route::get('changePassword', ['uses' => 'GuiController@changePassword']);
});

