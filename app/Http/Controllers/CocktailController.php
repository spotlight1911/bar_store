<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CocktailController extends Controller
{
    public function ingridientId($request){

    }
    public function getCocktails($request){

        $ingridCocktail = \App\Models\Ingridients_coctail::wherein('ingridient_id', $request['ingridienеs'])->pluck('coctail_id')->unique();
        $cocktails = \App\Models\Coctail::wherein('id', $ingridCocktail)->get();
        return view('cocktails.cocktailsWithIngredients',
            [
                'cocktails' => $cocktails,
            ]);
        dd($cocktails);
//        dd($request['ingridienеs']);
//        foreach ($cocktails as $cocktail){
//
//        }
    }
}
