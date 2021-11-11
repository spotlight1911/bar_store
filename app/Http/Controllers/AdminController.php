<?php

namespace App\Http\Controllers;

use App\Models\Coctail;
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
                'name' => 'required|max:255',
                'description' => 'required|max:255',
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
    public function deleteIngredients(Ingridient $ingridient){

        $ingridient->delete();
        return redirect('admin/add/ingredient');
    }
    public function editIngredients(Ingridient $ingridient){
        return view('admin.edit', ['ingredient' => $ingridient,]);
    }
    public function updateIngredients(Ingridient $ingridient, Request $request){
        $this->validate($request,
            [
                'name' => 'required|max:255',
                'description' => 'required|max:255',
//                'photo' => 'max:255'
            ]);

        $ingridient->name = $request->name;
        $ingridient->description = $request->description;
        if($request->photo){
        $file_name = $request->photo->getClientOriginalName();
        Storage::disk('public_uploads')->put("images".DIRECTORY_SEPARATOR."ingridients".DIRECTORY_SEPARATOR.$file_name, file_get_contents($request->photo->getRealPath()));
        $ingridient->photo = "images/ingridients/".$file_name;}
        $ingridient->save();
        return redirect('/admin/add/ingredient');
    }
    public function indexCocktails(){
        $cocktails = \App\Models\Coctail::all();

        return view('admin.cocktail',['cocktails'=>$cocktails]);
    }
    public function storeCocktail(Request $request){
        $this->validate($request,
            [
                'name' => 'required|max:255'
            ]);

        $cocktails = new Coctail();
        $cocktails->name = $request->name;
        $cocktails->description = $request->description;
        $cocktails->recipe = $request->recipe;
        $file_name = $request->photo->getClientOriginalName();
        Storage::disk('public_uploads')->put("images".DIRECTORY_SEPARATOR."cocktails".DIRECTORY_SEPARATOR.$file_name, file_get_contents($request->photo->getRealPath()));
        $cocktails->photo = "images/cocktails/".$file_name;
        $cocktails->save();
        return redirect('/admin/add/cocktails');
    }
    public function deleteCocktail(Coctail $coctail){

        $coctail->delete();
        return redirect('admin/add/cocktails');
    }
    public function editCocktail(Coctail $coctail){
        return view('admin.editCocktail', [
            'cocktail' => $coctail
        ]);
    }
    public function updateCocktail(Coctail $coctail, Request $request){
        $this->validate($request,
            [
                'name' => 'required|max:255',
                'description' => 'required|max:255',
                'recipe' => 'required|max:255',
//                'photo' => 'max:255'
            ]);

        $coctail->name = $request->name;
        $coctail->description = $request->description;
        $coctail->recipe = $request->recipe;
        if($request->photo){
            $file_name = $request->photo->getClientOriginalName();
            Storage::disk('public_uploads')->put("images".DIRECTORY_SEPARATOR."cocktails".DIRECTORY_SEPARATOR.$file_name, file_get_contents($request->photo->getRealPath()));
            $coctail->photo = "images/cocktails/".$file_name;}
        $coctail->save();
        return redirect('/admin/add/cocktails');
    }
}

