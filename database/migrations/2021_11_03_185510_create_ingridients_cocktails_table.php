<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngridientsCocktailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingridients_cocktails', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ingridient_id')
                ->unsigned()
                ->index();
            $table->integer('cocktail_id')
                ->unsigned()
                ->index();
            $table->string('count_of_ingridient',50);

            $table->foreign('ingridient_id')
                ->references('id')
                ->on('ingridients');
            $table->foreign('cocktail_id')
                ->references('id')
                ->on('cocktails');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ingridients_coctails');
    }
}
