<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CocktailController extends Controller
{
    public function ingridientId($request){

    }
    public function getCocktails($request){

        $ingridCocktail = \App\Models\Ingridients_coctail::wherein('ingridient_id', $request['ingridienеs'])
            ->pluck('coctail_id')
            ->unique();
//        $ingridCocktailUniq = array_unique($ingridCocktail);
//        $coctails =  \App\Models\Coctail::where('id', $ingridCocktail)->get();
//        dd($request['ingridienеs']);
        return \App\Models\Coctail::wherein('id', $ingridCocktail)->get();
//        dd($cocktails['name']);
//        foreach ($cocktails as $cocktail){
//
//        }
    }
}
