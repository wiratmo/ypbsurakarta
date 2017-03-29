<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Auth::routes();
Route::get('/','DashboardController@index')->name('yayasan.dashboard');
Route::get('/api', 'PictureController@getapi');
Route::get('/blog','ArticleController@all')->name('yayasan.blog');
Route::get('/galeri','PictureController@all')->name('yayasan.galeri');
Route::get('/galeri/cat/{slug}','PictureController@getPicture')->name('yayasan.catgaleri');
Route::get('/sejarah','FoundationController@profil')->name('yayasan.sejarah');
Route::get('/susunan-pengurus','FoundationController@susunan')->name('yayasan.susunanpengurus');
Route::get('/unit-pendukung/radio-streaming','RadioController@all');
Route::get('/blog/{slug}','ArticleController@index')->name('yayasan.blog');
Route::get('/tag/{tag}', 'TagController@index')->name('yayasan.tag');
Route::get('/category/{category}','CategoryController@index')->name('yayasan.category');
Route::get('/galeri/{slug}', 'PictureController@index')->name('yayasan.detailgaleri');