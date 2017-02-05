<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTradersTable extends Migration
{

    public function up()
    {
        Schema::create('traders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('ic', 7)->unique(); //Bilhete de identidade
            $table->integer('age');
            $table->enum('gender', ['M', 'F'])->nullable();
            $table->string('email', 60);
            $table->enum('state', ['1','2', '3', '4', '5', '6', '7', '8', '9'])->default('1');
            $table->string('council', 30);
            $table->string('parish', 30);
            $table->string('zone', 30);
            $table->string('phone', 8)->unique();
            $table->string('photo', 50);
            $table->text('description', 255)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('traders');
    }
}
