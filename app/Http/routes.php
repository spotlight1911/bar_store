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
Route::get('/admin/add/admin', 'AdminController@addAdmin')->middleware('is.superAdmin');
Route::get('/admin/add', 'AdminController@index')->middleware('is.admin');
Route::get('/admin/add/ingredient', 'AdminController@indexIngredients')->middleware('is.admin');
Route::post('/admin/add/ingredients', 'AdminController@storeIngredients')->middleware('is.admin');
Route::delete('/admin/add/ingredients/{ingridient}', 'AdminController@deleteIngredients')->middleware('is.admin')->name('ingredient.destroy');
Route::get('/admin/add/ingredients/{ingridient}/edit', 'AdminController@editIngredients')->middleware('is.admin')->name('ingredient.edit');
//Route::resource('/admin/add', 'AdminController')->middleware('is.admin');
Route::put('/admin/add/ingredients/{ingridient}', 'AdminController@updateIngredients')->middleware('is.admin')->name('ingredient.update');
Route::get('/', 'HomeController@index');

Route::get('/admin/add/cocktails', 'AdminController@indexCocktails')->middleware('is.admin');
Route::post('/admin/add/cocktails', 'AdminController@storeCocktail')->middleware('is.admin');
Route::delete('/admin/add/cocktails/{coctail}', 'AdminController@deleteCocktail')->middleware('is.admin')->name('cocktail.destroy');
Route::get('/admin/add/cocktails/{coctail}/edit', 'AdminController@editCocktail')->middleware('is.admin')->name('cocktail.edit');
Route::put('/admin/add/cocktails/{coctail}', 'AdminController@updateCocktail')->middleware('is.admin')->name('cocktail.update');


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