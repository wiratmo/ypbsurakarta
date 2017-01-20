<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoundationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foundations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('keyword')->nullable();
            $table->string('logo_location')->nullable();
            $table->string('founder_image')->nullable();
            $table->string('founder')->nullable();
            $table->text('description')->nullable();
            $table->text('motto')->nullable();
            $table->text('visions')->nullable();
            $table->text('missions')->nullable();
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
        Schema::dropIfExists('foundations');
    }
}
