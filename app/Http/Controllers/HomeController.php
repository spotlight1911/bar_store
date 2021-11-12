<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Ingridient;
use App\Models\Ingridients_coctail;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cocktails.createcocktail');
//        return view('home');
    }

    public function bars()
    {
        return view('main/bars');
    }
    public function ingridients()
    {
        return view('main/ingridients');
    }

    public function listOfCoctails(){
//        return view('main/listOfCoctails',[
//
//        ]);
        $cocktailsid = \App\Models\Coctail::all()->pluck('id');
        $recipe = [];
        foreach ($cocktailsid as $key => $value){
            $ingridientsId = Ingridients_coctail::all()->where('coctail_id',$value)->pluck('ingridient_id')->toArray();
            $ingridientsname = Ingridient::all()->whereIn('id',$ingridientsId)->pluck('name');
            $ingridientsCount = Ingridients_coctail::all()->where('coctail_id',$value)->pluck('count_of_ingridient');
            $recipe[$value]=$ingridientsname->combine($ingridientsCount)->toArray();
        }
        $cocktails = \App\Models\Coctail::all();
        return view('main.listOfCoctails',
            [
                'cocktails'=>$cocktails,
                'recipe'=>$recipe
            ]);
    }
}
