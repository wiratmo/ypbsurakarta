<?php

use Illuminate\Support\Facades\Schema;
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
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('role');
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });
        
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('title')->nullable();
            $table->string('keyword')->nullable();
            $table->string('username')->unique()->nullable();
            $table->string('photo_profile')->nullable();
            $table->text('description')->nullable();
            $table->string('website')->nullable();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_profiles');
        Schema::drop('users');
    }
}
