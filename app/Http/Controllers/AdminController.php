<?php

namespace App\Http\Controllers;

use App\Models\Coctail;
use App\Models\Ingridient;
use App\Models\Ingridients_coctail;
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
    public function addAdmin(){
        echo 'Add admin';
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
        return redirect('/admin/add/ingredient');
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
            $ingridient->photo = "images/ingridients/".$file_name;
        }
        $ingridient->save();
        return redirect('/admin/add/ingredient');
    }
    public function indexCocktails(){
        $cocktails = \App\Models\Coctail::all()->pluck('id');
        $recipe = [];
        foreach ($cocktails as $key => $value){
            $ingridientsId = Ingridients_coctail::all()->where('coctail_id',$value)->pluck('ingridient_id')->toArray();
            $ingridientsname = Ingridient::all()->whereIn('id',$ingridientsId)->pluck('name');
            $ingridientsCount = Ingridients_coctail::all()->where('coctail_id',$value)->pluck('count_of_ingridient');
            $recipe[$value]=$ingridientsname->combine($ingridientsCount)->toArray();
        }
        $cocktails = \App\Models\Coctail::all();
        return view('admin.cocktail',
            [
                'cocktails'=>$cocktails,
                'recipe'=>$recipe
            ]);
    }
    public function storeCocktail(Request $request){
        $this->validate($request,
            [
                'name' => 'required|max:255',
                'description' => 'required|max:255',
            ]);
        $cocktails = new Coctail();
        $cocktails->name = $request->name;
        $cocktails->description = $request->description;
        $cocktails->photo = $request->photo;
        $cocktails->save();
        $cocktailsId = Coctail::all()->last();
        foreach ($request->ingridienеs as $key => $value){
            $ingridients_cocktail = new Ingridients_coctail();
            $count = 'countid'.$value;
            $ingridients_cocktail->ingridient_id = $value;
            $ingridients_cocktail->coctail_id = $cocktailsId->id;
            $ingridients_cocktail->count_of_ingridient = $request->$count;
            $ingridients_cocktail->save();
        }
        return redirect('/admin/add/cocktails');
    }
    public function addIngridientToCocktail(Request $request){
        $this->validate($request,
            [
                'name' => 'required|max:255',
                'description' => 'required|max:255',
            ]);

        $cocktails = new Coctail();
        $cocktails->name = $request->name;
        $cocktails->description = $request->description;
        $file_name = $request->photo->getClientOriginalName();
        Storage::disk('public_uploads')->put("images".DIRECTORY_SEPARATOR."cocktails".DIRECTORY_SEPARATOR.$file_name, file_get_contents($request->photo->getRealPath()));
        $cocktails->photo = "images/cocktails/".$file_name;
        $ingridients = \App\Models\Ingridient::all();
        return view('admin.ingridientsToCocktail',
            [
                'cocktail'=>$cocktails,
                'ingridients'=>$ingridients,
            ]);
    }
    public function deleteCocktail(Coctail $coctail){
        $ingridients_cocktailId = Ingridients_coctail::all()->where('coctail_id', $coctail->id);
        foreach ($ingridients_cocktailId as $key) {
            Ingridients_coctail::find($key->id)->delete();
        }
        $coctail->delete();
        return redirect('admin/add/cocktails');
    }
    public function editIngridientsToCocktails(Request $request){
        $this->validate($request,
            [
                'name' => 'required|max:255',
                'description' => 'required|max:255',
            ]);
        $ingridientsAndCount = Ingridients_coctail::where('coctail_id', $request->cocktailid)->whereIn(('ingridient_id'), Ingridients_coctail::where('coctail_id', $request->cocktailid)->pluck('ingridient_id'))->pluck('count_of_ingridient','ingridient_id');
        $cocktails = new Coctail();
        $cocktails->id = $request->cocktailid;
        $cocktails->name = $request->name;
        $cocktails->description = $request->description;
        if($request->photo){
            $file_name = $request->photo->getClientOriginalName();
            Storage::disk('public_uploads')->put("images".DIRECTORY_SEPARATOR."cocktails".DIRECTORY_SEPARATOR.$file_name, file_get_contents($request->photo->getRealPath()));
            $cocktails->photo = "images/cocktails/".$file_name;
        } else{
            $cocktails->photo = $request->oldPhoto;
        }
        $ingridients = \App\Models\Ingridient::all();
        return view('admin.editIngridientsToCocktail',
            [
                'ingridientsAndCount' =>$ingridientsAndCount,
                'cocktail'=>$cocktails,
                'ingridients'=>$ingridients,
            ]);
    }
    public function editCocktail(Coctail $coctail){
        return view('admin.editCocktail', [
            'cocktail' => $coctail
        ]);
    }
    public function updateCocktail(Coctail $coctail, Request $request){
        Ingridients_coctail::where('coctail_id',$request->cocktailid)->delete();
        $this->validate($request,
            [
                'name' => 'required|max:255',
                'description' => 'required|max:255',
            ]);
        if($request->ingridienеs) {
            foreach ($request->ingridienеs as $key => $value) {
                $ingridients_cocktail = new Ingridients_coctail();
                $count = 'countid' . $value;
                $ingridients_cocktail->ingridient_id = $value;
                $ingridients_cocktail->coctail_id = $request->cocktailid;
                $ingridients_cocktail->count_of_ingridient = $request->$count;
                $ingridients_cocktail->save();
            }
        }
        $coctail->name = $request->name;
        $coctail->description = $request->description;
        $coctail->photo = $request->photo;
        $coctail->save();
        return redirect('/admin/add/cocktails');
    }
}

