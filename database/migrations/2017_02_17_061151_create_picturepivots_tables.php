<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePicturepivotsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('picturecategories', function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->string('keyword');
            $table->string('description');
        });
        Schema::create('picture_picturecategory', function (Blueprint $table) {
            $table->integer('picture_id')->unsigned();
            $table->integer('picturecategory_id')->unsigned();
            $table->foreign('picture_id')->references('id')->on('pictures')->onDelete('cascade');
            $table->foreign('picturecategory_id')->references('id')->on('picturecategories')->onDelete('cascade');
            $table->primary(['picture_id','picturecategory_id']);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('picture_category');
    }
}
