<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideotagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videotags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('keyword')->nullable();
            $table->string('name')->unique();
            $table->string('slug');
            $table->mediumText('description')->nullable();
        });

        Schema::create('video_videotag', function (Blueprint $table) {
            $table->integer('video_id')->unsigned();
            $table->integer('videotag_id')->unsigned();

            $table->foreign('video_id')->references('id')->on('videos');
            $table->foreign('videotag_id')->references('id')->on('videotags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('video_videotag');
        Schema::dropIfExists('videotags');
    }
}
