<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrateWareTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wares', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id');
            $table->string('summary');
            $table->string('title');
            $table->string('logo');
            $table->softDeletes();
            $table->timestamps();
            $table->text('desc');
            $table->text('trait');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
