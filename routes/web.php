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
		return view('admin/home');
	});
	Route::group(['prefix'=>'article'], function(){
		Route::get('/', 'ArticleController@indexContributor');
		Route::get('/baru', 'ArticleController@createContributor');
		Route::post('/baru', 'ArticleController@storeContributor');
		Route::get('/{id}', 'ArticleController@editContributor');
		Route::post('/{id}', 'ArticleController@update');
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
		Route::get('/api', 'CategoryController@datajson');
		Route::get('/baru', 'CategoryController@create');
		Route::post('/baru', 'CategoryController@store');
		Route::get('/{id}', 'CategoryController@edit');
		Route::post('/{id}', 'CategoryController@update');
	});
	Route::group(['prefix'=>'tag'], function(){
		Route::get('/', 'TagController@indexTag');
		Route::get('/api', 'TagController@datajson');
		Route::get('/baru', 'TagController@create');
		Route::post('/baru', 'TagController@store');
		Route::get('/{id}', 'TagController@edit');
		Route::post('/{id}', 'TagController@update');
	});
	Route::group(['prefix'=>'agenda'], function(){
		Route::get('/', 'AgendaController@indexContributor');
		Route::get('/baru', 'AgendaController@create');
		Route::post('/baru', 'AgendaController@store');
		Route::get('{id}', 'AgendaController@editContributor');
		Route::post('/{id}', 'AgendaController@updateContributor');
	});
});

Route::group(['middleware'=>'admin','prefix'=>'admin'], function(){
	Route::get('/', function(){
		return view('admin/home');
	});
	Route::group(['prefix'=>'article'], function(){
		Route::get('/', 'ArticleController@indexAdmin');
		Route::get('/{id}', 'ArticleController@editAdmin');
		Route::post('/{id}', 'ArticleController@update');
		Route::delete('/delete', 'ArticleController@delete');
		Route::post('/accept', 'ArticleController@accept');
	});
	Route::group(['prefix'=>'picture'], function(){
		Route::get('/', 'PictureController@indexContributor');
		Route::get('/{id}', 'PictureController@edit');
		Route::post('/{id}', 'PictureController@update');
		Route::delete('/delete', 'PictureController@delete');
	});
	Route::group(['prefix'=>'category'], function(){
		Route::get('/', 'CategoryController@indexCategory');
		Route::get('/api', 'CategoryController@datajson');
		Route::get('/{id}', 'CategoryController@edit');
		Route::post('/{id}', 'CategoryController@update');
		Route::delete('/delete', 'CategoryController@delete');
	});
	Route::group(['prefix'=>'tag'], function(){
		Route::get('/', 'TagController@indexTag');
		Route::get('/api', 'TagController@datajson');
		Route::get('/{id}', 'TagController@edit');
		Route::post('/{id}', 'TagController@update');
		Route::delete('/delete', 'TagController@delete');
	});
	Route::group(['prefix'=>'slider'], function(){
		Route::get('/', 'PictureController@indexContributorSlider');
		Route::get('/baru', 'PictureController@createContributorSlider');
		Route::post('/baru', 'PictureController@storeContributor');
		Route::get('/{id}', 'PictureController@editslider');
		Route::post('/{id}', 'PictureController@update');
		Route::delete('/delete', 'PictureController@delete');
	});
	Route::group(['prefix'=>'agenda'], function(){
		Route::get('/', 'AgendaController@index');
		Route::get('/baru', 'AgendaController@create');
		Route::post('/baru', 'AgendaController@store');
		Route::get('{id}', 'AgendaController@edit');
		Route::post('/{id}', 'AgendaController@update');
		Route::delete('/delete', 'AgendaController@delete');
	});
	Route::group(['prefix'=>'yayasan'], function(){
		Route::get('/', 'FoundationController@index');
		Route::post('/', 'FoundationController@update');
		Route::delete('/delete', 'FoundationController@delete');
	});
	Route::group(['prefix'=>'sekolah'], function(){
		Route::get('/', 'SchoolController@index');
		Route::get('/baru', 'SchoolController@create');
		Route::post('/baru', 'SchoolController@store');
		Route::get('{id}', 'SchoolController@edit');
		Route::post('/{id}', 'SchoolController@update');
		Route::delete('/delete', 'SchoolController@delete');
	});
});

Route::get('/','DashboardController@index');
Route::get('/blog','ArticleController@all');
Route::get('/galeri','PictureController@all');
Route::get('/profil','FoundationController@profil');
Route::get('/agenda','AgendaController@dashboard');
Route::get('/unit-pendukung/radio-streaming','RadioController@all');
Route::get('/unit-pendukung/tv-streaming','TvController@all');
Route::get('/unit-pendukung/batieksolo-tv','VideoController@index');
Route::get('/unit-pendukung/batieksolo-tv/{slug}','VideoController@slug');
Route::get('/{slug}','ArticleController@index');
Route::get('/tag/{tag}', 'TagController@index');
Route::get('/category/{category}','CategoryController@index');
Route::get('/galeri/{slug}', 'PictureController@index');