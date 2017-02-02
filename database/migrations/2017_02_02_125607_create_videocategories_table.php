<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideocategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videocategories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('keyword')->nullable();
            $table->string('name')->unique();
            $table->string('slug');
            $table->mediumText('description')->nullable();
        });

        Schema::create('video_videocategory', function (Blueprint $table) {
            $table->integer('video_id')->unsigned();
            $table->integer('videocategory_id')->unsigned();
            $table->primary('video_id', 'videocategory_id');

            $table->foreign('video_id')->references('id')->on('videos');
            $table->foreign('videocategory_id')->references('id')->on('videocategories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('video_videocategory');
        Schema::dropIfExists('videocategories');
    }
}
