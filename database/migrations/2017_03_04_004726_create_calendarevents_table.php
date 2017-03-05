<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalendareventsTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('calendarevents', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('start')->nullable();
            $table->datetime('end')->nullable();
            $table->boolean('all_day')->nullable();
            $table->string('color')->nullable();
            $table->mediumText('title')->nullable();
            $table->timestamps();
        });
    }

    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
        Schema::drop('calendarevents');
    }
}
