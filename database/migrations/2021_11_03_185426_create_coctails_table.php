<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoctailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coctails', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',255);
            $table->text('description',500);
            $table->text('recipe',500);
            $table->string('photo',255);
            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cocktails');
    }
}
