<?php

namespace App\Http\Controllers;

use App\Http\Requests;
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
        return view('main/listOfCoctails');
    }
}
