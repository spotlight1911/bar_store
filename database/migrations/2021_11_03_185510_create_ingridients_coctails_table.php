<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngridientsCoctailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingridients_coctails', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ingridient_id')
                ->unsigned()
                ->index();
            $table->integer('coctail_id')
                ->unsigned()
                ->index();
            $table->string('count_of_ingridient',50);
            $table->timestamp();

            $table->foreign('ingridient_id')
                ->references('id')
                ->on('ingridients');
            $table->foreign('coctail_id')
                ->references('id')
                ->on('coctails');
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
