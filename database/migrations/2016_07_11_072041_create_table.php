<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('tb_user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('prefix');
            $table->string('firstname')->unique();
            $table->string('lastname');
            $table->string('address');
            $table->string('tel')->unique();
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('tb_category', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->timestamps();
        });

        Schema::create('tb_item', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category');
            $table->string('code');
            $table->string('title');
            $table->string('image_1');
            $table->string('image_2');
            $table->string('image_3');
            $table->integer('price');
            $table->timestamps();
        });

        Schema::create('tb_banner', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image_1');
            $table->string('image_2');
            $table->string('image_3');
            $table->string('image_4');
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
        //
        Schema::drop('tb_user');
    }
}
