<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlacesTable extends Migration
{

    public function up()
    {
        Schema::create('places', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50)->unique();
            $table->int('dimension');
            $table->float('price');
            $table->text('description', 255);
            $table->boolean('status');
            $table->integer('typeofplace_id')->unsigned();
            $table->timestamps();
            // -----------------------------------------------------------------------------------------
            $table->foreign('typeofplace_id')->references('id')->on('typeofplaces')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::drop('places');
    }
}
