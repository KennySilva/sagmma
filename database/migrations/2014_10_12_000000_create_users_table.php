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
            $table->enum('state', ['1', '2', '3', '4', '5','6','7','8','9'])->default('3');
            $table->enum('council', ['1', '2', '3', '4', '5','6','7','8','9','10', '11', '12', '13', '14', '15','16','17','18','19', '20', '21', '22'])->default('4');
            $table->enum('parish', ['1', '2', '3', '4', '5','6','7','8','9','10', '11', '12', '13', '14', '15','16','17','18','19', '20', '21', '22', '23', '24'])->default('1');
            $table->string('zone', 30)->nullable();
            $table->string('phone', 20)->nullable();
            $table->boolean('status')->default(false);
            $table->enum('type', ['member', 'emp', 'trad'])->default('member');
            $table->text('description', 255)->nullable();
            $table->string('avatar', 50)->default('default.png')->nullable();
            $table->boolean('social')->default(false);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('users');
    }
}
