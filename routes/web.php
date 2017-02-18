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
Route::post('editor-upload', 'DashboardController@upload');
Route::get('/api', 'PictureController@getapi');
Route::get('/','DashboardController@index');
Route::get('/blog','ArticleController@all');
Route::get('/galeri','PictureController@all');
Route::get('/galeri/cat/{slug}','PictureController@getPicture');
Route::get('/profil','FoundationController@profil');
Route::get('/agenda','AgendaController@dashboard');
Route::get('/unit-pendukung/radio-streaming','RadioController@all');
Route::get('/artikel/{slug}','ArticleController@index');
Route::get('/tag/{tag}', 'TagController@index');
Route::get('/category/{category}','CategoryController@index');
Route::get('/galeri/{slug}', 'PictureController@index');
Route::post('/picture', 'DashboardController@storeimage');