<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserBindConnectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_bind_connect', function (Blueprint $table) {
            $table->increments('bind_id');
            $table->integer('bind_type');
            $table->integer('user_id');
            $table->dateTime('bind_time');
            $table->string('bind_nickname');
            $table->string('bind_avator');
            $table->integer('bind_gender');
            $table->string('bind_openid');
            $table->string('bind_unionid');
            $table->string('bind_token');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_bind_connect');
    }
}
