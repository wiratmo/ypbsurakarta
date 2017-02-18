<?php
	Route::get('/', function(){
		return view('admin/home');
	});
	Route::group(['prefix'=>'article'], function(){
		Route::post('/accept', 'ArticleController@accept');
		Route::get('/', 'ArticleController@indexAdmin');
		Route::get('/{id}', 'ArticleController@editAdmin');
		Route::post('/{id}', 'ArticleController@update');
		Route::delete('/delete', 'ArticleController@delete');
	});
	Route::group(['prefix'=>'picture'], function(){
		Route::get('/', 'PictureController@indexContributor');
		Route::get('/api', 'PictureController@getapi');
		Route::post('/accept', 'PictureController@getAccept');
		Route::get('/baru', 'PictureController@createContributor');
		Route::post('/baru', 'PictureController@storeContributor');
		Route::get('/{id}', 'PictureController@edit');
		Route::post('/{id}', 'PictureController@update');
		Route::delete('/delete', 'PictureController@delete');
	});
	Route::group(['prefix'=>'category'], function(){
		Route::get('/', 'CategoryController@indexCategory');
		Route::get('/api', 'CategoryController@datajson');
		Route::get('/baru', 'CategoryController@create');
		Route::post('/baru', 'CategoryController@store');
		Route::get('/{id}', 'CategoryController@edit');
		Route::post('/{id}', 'CategoryController@update');
		Route::delete('/delete', 'CategoryController@delete');
	});
	Route::group(['prefix'=>'tag'], function(){
		Route::get('/', 'TagController@indexTag');
		Route::get('/api', 'TagController@datajson');
		Route::get('/baru', 'TagController@create');
		Route::post('/baru', 'TagController@store');
		Route::get('/{id}', 'TagController@edit');
		Route::post('/{id}', 'TagController@update');
		Route::delete('/delete', 'TagController@delete');
	});
	Route::group(['prefix'=>'slider'], function(){
		Route::get('/', 'PictureController@indexSlider');
		Route::post('/accept', 'PictureController@getAccept');
		Route::get('/baru', 'PictureController@createSlider');
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
	Route::group(['prefix'=>'picturecategory'], function(){
		Route::get('/', 'PictureCategoryController@index');
	});