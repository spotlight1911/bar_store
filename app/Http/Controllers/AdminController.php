<?php

namespace App\Http\Controllers;

use App\Models\Ingridient;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

    public function indexIngredients(){
        $ingridient = \App\Models\Ingridient::all();

        return view('admin.ingredient',['ingridients'=>$ingridient]);
    }
    public function storeIngredients(Request $request){
        $this->validate($request,
            [
                'name' => 'required|max:255'
            ]);

        $ingredients = new Ingridient();
        $ingredients->name = $request->name;
        $ingredients->description = $request->description;
        $file_name = $request->photo->getClientOriginalName();
        Storage::disk('public_uploads')->put("images".DIRECTORY_SEPARATOR."ingridients".DIRECTORY_SEPARATOR.$file_name, file_get_contents($request->photo->getRealPath()));
        $ingredients->photo = "images/ingridients/".$file_name;
        $ingredients->save();
        return redirect('/admin/add');
    }
    public function editIngredients(){

    }
    public function deleteIngredients(Ingridient $ingridient){

        $ingridient->delete();
        return redirect('admin/add/ingredient');
    }
    public function updateIngredients(Ingridient $ingridient, Request $request){
        $this->validate($request,
            [
                'name' => 'required|max:255',
                'description' => 'required|max:255',
                'photo' => 'required|max:255'
            ]);
//        $ingredients = new Ingridient();
        $ingredient->name = $request->name;
        $ingredient->description = $request->description;
        $file_name = $request->photo->getClientOriginalName();
        Storage::disk('public_uploads')->put("images".DIRECTORY_SEPARATOR."ingridients".DIRECTORY_SEPARATOR.$file_name, file_get_contents($request->photo->getRealPath()));
        $ingredient->photo = "images/ingridients/".$file_name;
        $ingredient->save();
        return redirect('/admin/add');
    }
    }
}
