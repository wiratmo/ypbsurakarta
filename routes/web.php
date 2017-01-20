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
Route::group(['middleware'=>'contributor','prefix'=>'contributor'], function(){
	Route::get('/', function(){
		return "contributor";
	});
	Route::group(['prefix'=>'article'], function(){
		Route::get('/', 'ArticleController@indexContributor');
		Route::get('/baru', 'ArticleController@createContributor');
		Route::post('/baru', 'ArticleController@storeContributor');
		Route::get('/{id}', 'ArticleController@editContributor');
		Route::post('/{id}', 'ArticleController@updateContributor');
	});
	Route::group(['prefix'=>'picture'], function(){
		Route::get('/', 'PictureController@indexContributor');
		Route::get('/baru', 'PictureController@createContributor');
		Route::post('/baru', 'PictureController@storeContributor');
		Route::get('/{id}', 'PictureController@edit');
		Route::post('/{id}', 'PictureController@update');
	});
	Route::group(['prefix'=>'category'], function(){
		Route::get('/', 'CategoryController@indexCategory');
		Route::get('/baru', 'CategoryController@create');
		Route::post('/baru', 'CategoryController@store');
		Route::get('/{id}', 'CategoryController@edit');
		Route::post('/{id}', 'CategoryController@update');
	});
	Route::group(['prefix'=>'tag'], function(){
		Route::get('/', 'TagController@indexTag');
		Route::get('/baru', 'TagController@create');
		Route::post('/baru', 'TagController@store');
		Route::get('/{id}', 'TagController@edit');
		Route::post('/{id}', 'TagController@update');
	});
});

Route::group(['middleware'=>'admin','prefix'=>'admin'], function(){
	Route::group(['prefix'=>'article'], function(){
		Route::get('/', 'ArticleController@indexAdmin');
		Route::get('/{id}', 'ArticleController@editAdmin');
		Route::post('/{id}', 'ArticleController@updateAdmin');
		Route::delete('/{id}', 'ArticleController@delete');
	});
	Route::group(['prefix'=>'picture'], function(){
		Route::get('/', 'PictureController@indexAdmin');
		Route::get('/{id}', 'PictureController@edit');
		Route::post('/{id}', 'PictureController@update');
		Route::delete('/{id}', 'PictureController@delete');
	});
	Route::group(['prefix'=>'category'], function(){
		Route::get('/', 'CategoryController@indexCategory');
		Route::get('/{id}', 'CategoryController@edit');
		Route::post('/{id}', 'CategoryController@update');
		Route::delete('/{id}', 'CategoryController@delete');
	});
	Route::group(['prefix'=>'tag'], function(){
		Route::get('/', 'TagController@indexTag');
		Route::get('/{id}', 'TagController@edit');
		Route::post('/{id}', 'TagController@update');
		Route::delete('/{id}', 'TagController@delete');
	});
});

Route::get('/','DashboardController@index');
Route::get('/blog','ArticleController@all');
Route::get('/picture','PictureController@all');
Route::get('/{slug}','ArticleController@index');
Route::get('/tag/{tag}', 'TagController@index');
Route::get('/category/{category}','CategoryController@index');
Route::get('/picture/{slug}', 'PictureController@index');