<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{

    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50)->unique();
            $table->boolean('status')->default(false);
            $table->integer('user_id')->unsigned();
            $table->integer('article_id')->unsigned();
            $table->timestamps();

            //Chaves primarias
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::drop('menus');
    }
}
