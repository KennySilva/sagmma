<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlaceTraderTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('place_trader', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('place_id')->unsigned();
            $table->integer('trader_id')->unsigned();
            $table->boolean('status')->default('1');
            $table->float('rate');
            $table->string('author', 50);
            $table->timestamps();


            // Chaves estrangeiras;
            $table->foreign('place_id')->references('id')->on('places');
            $table->foreign('trader_id')->references('id')->on('traders');

        });
    }

    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
        Schema::drop('place_trader');
    }
}
