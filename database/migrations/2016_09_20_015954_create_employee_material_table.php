<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeMaterialTable extends Migration
{

    public function up()
    {
        Schema::create('employee_material', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id')->unsigned();
            $table->integer('material_id')->unsigned();
            $table->boolean('status')->default('1');
            $table->string('author', 50);
            $table->timestamps();

            // Chaves estrangeiras;
            $table->foreign('employee_id')->references('id')->on('employees')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('material_id')->references('id')->on('materials')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::drop('employee_material');
    }
}
