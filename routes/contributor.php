<?php
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
		Route::get('/api', 'PictureController@getapi');
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