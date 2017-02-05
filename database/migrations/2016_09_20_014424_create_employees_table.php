<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{

    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('ic', 7)->unique(); //Bilhete de identidade
            $table->integer('age');
            $table->enum('gender', ['M', 'F'])->nullable();
            $table->string('email', 60)->unique();
            $table->enum('state', ['1','2', '3', '4', '5', '6', '7', '8', '9'])->default('1');
            $table->string('council', 30);
            $table->string('parish', 30);
            $table->string('zone', 30);
            $table->string('phone', 8)->unique();
            $table->enum('echelon', ['A', 'B', 'C', 'D', 'E']);
            $table->date('service_beginning');
            $table->integer('typeofemployee_id')->unsigned();
            $table->string('photo', 50);
            $table->text('description', 255)->nullable();
            $table->timestamps();

            //chaves
            $table->foreign('typeofemployee_id')->references('id')->on('typeofemployees')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::drop('employees');
    }
}
