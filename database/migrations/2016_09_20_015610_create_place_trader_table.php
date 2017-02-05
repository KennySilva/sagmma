<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlaceTraderTable extends Migration
{

    public function up()
    {
        Schema::create('place_trader', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('place_id')->unsigned();
            $table->integer('trader_id')->unsigned();
            $table->boolean('status')->default('1');
            $table->float('rate');
            $table->string('author', 50);
            $table->date('ending_date');
            $table->timestamps();

            // Chaves estrangeiras;
            $table->foreign('place_id')->references('id')->on('places');
            $table->foreign('trader_id')->references('id')->on('traders');

        });
    }
    
    public function down()
    {
        Schema::drop('place_trader');
    }
}
