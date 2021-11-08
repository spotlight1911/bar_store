<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{
    /**
     * Display a ingredients of the resource.
     * @param Ingredient $ingredients
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('admin.add');
    }
}
