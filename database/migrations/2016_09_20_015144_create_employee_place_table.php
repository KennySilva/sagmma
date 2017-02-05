<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeePlaceTable extends Migration
{

    public function up()
    {
        Schema::create('employee_place', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id')->unsigned();
            $table->integer('place_id')->unsigned();
            $table->float('income');
            $table->enum('type', ['1', '2'])->default('1');
            $table->string('author', 50);
            $table->timestamps();

            // Chaves estrangeiras;
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('place_id')->references('id')->on('places');
        });
    }

    public function down()
    {
        Schema::drop('employee_place');
    }
}
