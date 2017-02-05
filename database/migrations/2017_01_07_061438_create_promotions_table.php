<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromotionsTable extends Migration
{

    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->text('description', 500);
            $table->date('begnning_date');
            $table->date('ending_date');
            $table->integer('trader_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->boolean('status');
            $table->timestamps();

            $table->foreign('trader_id')->references('id')->on('traders')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

        });
    }
    
    public function down()
    {
        Schema::drop('promotions');
    }
}
