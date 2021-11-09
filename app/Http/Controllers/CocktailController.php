<?php

namespace App\Http\Controllers;

use App\Models\Ingridients_coctail;
use Illuminate\Http\Request;

use App\Http\Requests;

class CocktailController extends Controller
{
    public function ingridientId($request){

    }
    public function getCocktails($request){

        $cocktailsByIngredients = \App\Models\Ingridients_coctail::wherein('ingridient_id', $request['ingridienеs'])->pluck('coctail_id')->unique();
//        return \App\Models\Coctail::wherein('id', $ingridCocktail)->get();
//        $allIngrToCoctail = Ingridients_coctail::wherein('coctail_id', $cocktailsByIngredients)->value('count_of_ingridient','ingridient_id');
        $cocktails =  \App\Models\Coctail::wherein('id', $cocktailsByIngredients)->get();
//        $allIngrToCoctail = Ingridients_coctail::wherein('coctail_id', $cocktailsByIngredients)->pluck('count_of_ingridient','ingridient_id');
        $allIngrToCoctail = Ingridients_coctail::wherein('coctail_id', $cocktailsByIngredients)
            ->join('ingridients', 'id', '=', 'ingridient_id' );
        dd($allIngrToCoctail);
    }
}
