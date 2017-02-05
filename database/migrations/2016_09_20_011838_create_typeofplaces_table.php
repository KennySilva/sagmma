<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypeofplacesTable extends Migration
{
    
    public function up()
    {
        Schema::create('typeofplaces', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->text('description', 255);
        });
    }

    public function down()
    {
        Schema::drop('typeofplaces');
    }
}
