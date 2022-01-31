<?php

Route::get('/', function () {
	return view('welcome');
});

Route::group(['prefix' => 'admin'], function() {

	Route::get('kdrama', 'Admin\KdramaController@index')->middleware('auth'); 
	Route::get('kdrama/create', 'Admin\KdramaController@add')->middleware('auth');
	Route::get('kdrama/edit', 'Admin\KdramaController@edit')->middleware('auth');
	Route::get('kdrama/delete', 'Admin\KdramaController@delete')->middleware('auth');
	Route::post('kdrama/create', 'Admin\KdramaController@create')->middleware('auth');
	Route::post('kdrama/edit', 'Admin\KdramaController@update')->middleware('auth');

});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');