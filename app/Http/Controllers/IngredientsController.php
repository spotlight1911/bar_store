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
    public function index(Ingredient $ingredients){
//        return view('ingredients.index', ['ingredients' => $ingredients]);
        return view('ingredients.index');
    }
}
