<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('uid');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone',32)->unique();
            $table->enum('sex',['男','女']);
            $table->string('actual_name','32');
            $table->string('nick_name','32');
            $table->string('password', 60);
            $table->string('id_card',32);
            $table->date('birthday');
            $table->string('qq_code','32');
            $table->string('head');
            $table->integer('integral');
            $table->string('topic');
            $table->rememberToken();
            $table->softDeletes();
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
        Schema::drop('users');
    }
}
