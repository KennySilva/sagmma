<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialsTable extends Migration
{

    public function up()
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->text('description', 255);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('materials');
    }
}
