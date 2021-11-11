<?php

namespace App\Http\Controllers;

use App\Models\Coctail;
use App\Models\Ingridient;
use App\Models\Ingridients_coctail;
use Illuminate\Http\Request;

use App\Http\Requests;

class CocktailController extends Controller
{
    private function cocktailId($request){
        return \App\Models\Ingridients_coctail::wherein('ingridient_id', $request['ingridienеs'])
            ->pluck('coctail_id')
            ->unique();
    }
    public function getCocktails($request){
        $ingridCocktail = $this->cocktailId($request);
        return \App\Models\Coctail::wherein('id', $ingridCocktail)->get();
    }
    public function getMissingIngredients($request){
//        $ingridients = \App\Models\Coctail::cocktailIngridients($request['ingridienеs']);
        $ingridCocktail = $this->cocktailId($request);
        $ingridients=[];
        foreach($ingridCocktail as $id => $value){
            $allIngr = \App\Models\Ingridients_coctail::where('coctail_id', $ingridCocktail[$id])
                ->pluck('ingridient_id');
            $ingWithoutSelect = ($allIngr->diff($request['ingridienеs']))->toArray();
            if(count($ingWithoutSelect)>0){
                foreach ($ingWithoutSelect as $kye => $item) {
                    $ingridientName = Ingridient::where('id', $item)
                        ->pluck('name');
                    $countOfIngridient=\App\Models\Ingridients_coctail::where('ingridient_id', $item)
                        ->pluck('count_of_ingridient');
                    $ingridients[$value][$ingridientName[0]] = $countOfIngridient[0];
                }
            } else{
                $ingridients[$value]=[];
            }
        }
//        dd($ingridCocktail);
        return $ingridients;
    }
    public function getIngridientName($request){
        $ingridCocktail = $this->cocktailId($request);
        $ingridients=[];
        foreach($ingridCocktail as $id => $value){
            $allIngr = \App\Models\Ingridients_coctail::where('coctail_id', $ingridCocktail[$id])
                ->pluck('ingridient_id');
            $ingWithoutSelect = ($allIngr->intersect($request['ingridienеs']))->toArray();
            if(count($ingWithoutSelect)>0){
                foreach ($ingWithoutSelect as $kye => $item) {
                    $ingridientName = Ingridient::where('id', $item)
                        ->pluck('name');
                    $countOfIngridient=\App\Models\Ingridients_coctail::where('ingridient_id', $item)
                        ->pluck('count_of_ingridient');
                    $ingridients[$value][$ingridientName[0]] = $countOfIngridient[0];
                }
            } else{
                $ingridients[$value]=[];
            }
        }
//        dd($ingridCocktail);
        return $ingridients;
//       $ingridientsName =  Ingridient::where('id', $request['ingridienеs'])
//           ->pluck('name');
//       $cocktailsId = $this->cocktailId($request);
//       dd($ingridientsName);
    }
    public function getIngridientToCocktail(){
        $ingridients = \App\Models\Ingridient::all();
        return view('cocktails.cocktailsIngredients',
            [
                'ingridients'=>$ingridients,
            ]);
    }
    public function cocktailsView(Request $request){
        $cocktails = $this->getCocktails($request);
        $ingridients = $this->getMissingIngredients($request);
        $ingridientsName = $this->getIngridientName($request);
        return view('cocktails.cocktailsWithIngredients',
            [
                'cocktails' => $cocktails,
                'ingridients'=>$ingridients,
                'ingridientsName'=>$ingridientsName,
            ]);
    }
}
