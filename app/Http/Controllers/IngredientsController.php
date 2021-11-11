<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class IngredientsController extends Controller
{
    /**
     * Display a ingredients of the resource.
     * @param Ingredient $ingredients
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $ingridients = \App\Models\Ingridient::all();
        return view('main.ingridients',
            [
                'ingridients' => $ingridients,
            ]);
    }

}
