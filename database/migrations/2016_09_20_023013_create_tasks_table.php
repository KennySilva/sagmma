<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 50)->unique();
            $table->text('description', 255);
            $table->integer('user_id')->unsigned();
            $table->timestamps();


            // -----------------------------------------------------------------------------------
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
        Schema::drop('tasks');
    }
}
