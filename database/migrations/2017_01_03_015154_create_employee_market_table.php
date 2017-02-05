<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeMarketTable extends Migration
{

    public function up()
    {
        Schema::create('employee_market', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id')->unsigned();
            $table->integer('market_id')->unsigned();
            $table->string('author', 50);
            $table->timestamps();

            // Chaves estrangeiras;
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('market_id')->references('id')->on('markets');
        });
    }
    

    public function down()
    {
        Schema::drop('employee_market');
    }
}
