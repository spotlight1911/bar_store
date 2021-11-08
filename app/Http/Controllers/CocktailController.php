<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CocktailController extends Controller
{
    public function ingridientId($request){

    }
    public function getCocktails($request){

        $ingridCocktail = \App\Model\Ingridients_cocktail::wherein('ingridient_id', $request['ingridienеs'])->pluck('cocktail_id');
//        $ingridCocktailUniq = array_unique($ingridCocktail);
//        $cocktails = \App\Model\Cocktail::where('id', $ingridCocktailUniq)->get();
//        dd($cocktails['name']);
        dd($ingridCocktail);
//        foreach ($cocktails as $cocktail){
//
//        }
    }
}
