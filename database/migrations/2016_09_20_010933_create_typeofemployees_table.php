<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypeofemployeesTable extends Migration
{

    public function up()
    {
        Schema::create('typeofemployees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50)->unique();
            $table->text('description', 255);
        });
    }

    public function down()
    {
        Schema::drop('typeofemployees');
    }
}
