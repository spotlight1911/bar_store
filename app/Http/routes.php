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
Route::get('/cocktails/cocktails', function (\App\Http\Controllers\CocktailController $cocktailController, Request $request){
    $cocktailController->getCocktails($request);
})->name('cocktails.ingridientId');


Route::get('/main/bars', 'HomeController@bars');
Route::get('/main/ingridients', function () {
        $ingridients = \App\Models\Ingridient::all();
        return view('main.ingridients',
            [
                'ingridients' => $ingridients,
            ]);
    }
);

Route::get('/main/listOfCoctails', function (){
    $coctails = \App\Models\Coctail::all();
    return view('main.listOfCoctails',
        [
            'coctails'=> $coctails,
        ]);
});


Route::get('/cocktails/ingridients', function (){
    $ingridients = \App\Models\Ingridient::all();
    return view('cocktails.cocktailsIngredients',
        [
            'ingridients'=>$ingridients,
            'ingridientId'=>session('ingridient-id')
        ]);
})->name('cocktails.ingredients');