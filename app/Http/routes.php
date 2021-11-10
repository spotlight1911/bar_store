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

use Illuminate\Http\Request;

//Route::get('/', function () {
//    return view('welcome');
//});

Route::auth();

Route::get('/admin/add', 'AdminController@index')->middleware('is.admin');


Route::get('/', 'HomeController@index');


Route::get('/main/bars', 'HomeController@bars');
Route::get('/cocktails/cocktails', 'CocktailController@cocktailsView');
Route::get('/cocktails/ingridients', 'CocktailController@getIngridientToCocktail');
Route::get('/main/ingridients', 'IngredientsController@index');

Route::get('/main/listOfCoctails', function (){
    $coctails = \App\Models\Coctail::all();
    return view('main.listOfCoctails',
        [
            'coctails'=> $coctails,
        ]);
});