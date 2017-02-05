<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{

    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('username', 50)->unique();
            $table->string('ic', 7)->unique();
            $table->string('email', 60)->unique();
            $table->string('password', 60);
            $table->enum('gender', ['M', 'F'])->nullable();
            $table->integer('age');
            $table->enum('state', ['1', '2', '3', '4', '5','6','7','8','9'])->default('1');
            $table->string('council', 30)->nullable()->default('Santa Catarina');
            $table->string('parish', 30)->nullable()->default('Santa Catarina');
            $table->string('zone', 30)->nullable();
            $table->string('phone', 8)->nullable();
            $table->boolean('status')->default(false);
            $table->enum('type', ['member', 'emp', 'trad'])->default('member');
            $table->text('description', 255)->nullable();
            $table->string('avatar', 50)->default('default.png')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::drop('users');
    }
}
