<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('keyword')->nullable();
            $table->string('name')->unique();
            $table->string('slug');
            $table->mediumText('description')->nullable();
            $table->softDeletes();
        });
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('keyword')->nullable();
            $table->string('name')->unique();
            $table->string('slug');
            $table->mediumText('description')->nullable();
            $table->softDeletes();
        });
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('user_id')->unsigned();
            $table->string('keyword')->nullable();
            $table->mediumText('description')->nullable();
            $table->string('title')->unique();
            $table->string('slug');
            $table->longText('content');
            $table->integer('view')->nullable();
            $table->enum('status',['1','0'])->default('1');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
        Schema::create('article_category', function(Blueprint $table){
            $table->integer('category_id')->unsigned();
            $table->integer('article_id')->unsigned();
            $table->primary(['category_id', 'article_id']);

            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('article_id')->references('id')->on('articles');
        });
        Schema::create('article_tag', function(Blueprint $table){
            $table->integer('tag_id')->unsigned();
            $table->integer('article_id')->unsigned();
            $table->primary(['tag_id', 'article_id']);
            $table->foreign('tag_id')->references('id')->on('tags');
            $table->foreign('article_id')->references('id')->on('articles');
        });
        Schema::create('comments', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('article_id')->unsigned();
            $table->Integer('user_id')->unsigned();
            $table->mediumText('comment');
            $table->timestamp('create_at')->nullable();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('article_id')->references('id')->on('articles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
        Schema::dropIfExists('article_category');
        Schema::dropIfExists('article_tag');
        Schema::dropIfExists('articles');
        Schema::dropIfExists('tags');
        Schema::dropIfExists('categories');
    }
}
