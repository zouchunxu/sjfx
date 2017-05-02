<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        DB::statement('alter table users change password access_token varchar(255) ');

        DB::statement('alter table users add COLUMN full_address VARCHAR(255) DEFAULT "" not NULL ');
        DB::statement('alter table users add COLUMN super int DEFAULT 0 not NULL ');

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
