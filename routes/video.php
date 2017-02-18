<?php

Route::get('/','VideoController@index');
Route::get('{slug}','VideoController@slug');
Route::get('/cat/{slug}','VideoController@category');
Route::get('/tag/{slug}','VideoController@tag');