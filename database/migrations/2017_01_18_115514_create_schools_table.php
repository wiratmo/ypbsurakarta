<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('keyword')->nullable();
            $table->integer('grade')->nullable();
            $table->string('name')->nullable();
            $table->string('logo')->nullable();
            $table->string('picture')->nullable();
            $table->string('website')->nullable();
            $table->string('address')->nullable();
            $table->text('visions')->nullable();
            $table->text('missions')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('schools');
    }
}
