<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeePlaceTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('employee_place', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id')->unsigned();
            $table->integer('place_id')->unsigned();
            $table->float('income');
            $table->enum('type', ['1', '2', '3', '4', '5','6','7'])->default('1');
            $table->string('author', 50);
            $table->timestamps();
            
            // Chaves estrangeiras;
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('place_id')->references('id')->on('places');
        });
    }

    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
        Schema::drop('employee_place');
    }
}
