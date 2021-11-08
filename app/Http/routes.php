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

Route::get('/', function () {
    return view('welcome');
});

Route::auth();
Route::group(['middleware' => ['auth', 'isadmin'], 'namespace' => 'Admin', 'prefix' => 'admin', 'as' => 'admin.'], function ()
{
    Route::resource('tasks', 'AdminController');
});

Route::get('/home', 'HomeController@index');
