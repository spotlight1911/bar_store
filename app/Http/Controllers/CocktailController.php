<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CocktailController extends Controller
{
    public function ingridientId($request){
        if(session('ingridient-id')==0){
            session(['ingridient-id' => $request['ingridient-id']]);
        } else
        {
            $id = session('ingridient-id').', '.$request['ingridient-id'];
            session(['ingridient-id' =>$id]);
        }
    }
}
