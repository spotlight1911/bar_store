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

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/cocktails/cocktails', function (\App\Http\Controllers\CocktailController $cocktailController, Request $request){
    //$coctails =
    $cocktailController->addCocktails();
})->name('cocktails.ingridientId');



Route::get('/cocktails/ingridients', function (){
    $ingridients = \App\Model\Ingridient::all();
    return view('cocktails.cocktailsIngredients',
        [
            'ingridients'=>$ingridients,
            'ingridientId'=>session('ingridient-id')
        ]);
})->name('cocktails.ingredients');