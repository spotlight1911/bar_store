<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Coctail extends Model
{
    static function cocktailIngridients(Array $id){
        return DB::table('coctails')
            ->whereNotIn('ingridients.id', $id)
            ->join('ingridients_coctails', 'coctails.id', '=', 'ingridients_coctails.coctail_id')
            ->join('ingridients', 'ingridients_coctails.ingridient_id', '=', 'ingridients.id')
            ->select('ingridients.name', 'ingridients_coctails.count_of_ingridient')
            ->get();
    }

}
