<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{

    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->float('price');
            $table->string('photo', 50)->default('default.png');
            $table->text('description', 255);
            $table->string('author', 60);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('products');
    }
}
