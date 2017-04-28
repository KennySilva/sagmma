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
            $table->enum('state', ['1', '2', '3', '4', '5','6','7','8','9'])->default('3');
            $table->enum('council', ['1', '2', '3', '4', '5','6','7','8','9','10', '11', '12', '13', '14', '15','16','17','18','19', '20', '21', '22'])->default('4');
            $table->enum('parish', ['1', '2', '3', '4', '5','6','7','8','9','10', '11', '12', '13', '14', '15','16','17','18','19', '20', '21', '22', '23', '24'])->default('1');
            $table->string('zone', 30)->nullable();
            $table->string('phone', 20)->nullable();
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
