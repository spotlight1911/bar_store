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

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');



Route::get('/cocktails/ingridients', function (Request $request){
    $ingridients = \App\Model\Ingridient::all();
    return view('cocktails.cocktailsIngredients',
        [
            'ingridients'=>$ingridients
        ]);
})->name('cocktails.ingredients');

Route::post('/cocktails/cocktails',function (){
    //TODO get cocktails with added ingridients
})->name('cocktails.cocktails');