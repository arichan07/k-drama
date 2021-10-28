<?php

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function() {

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('kdrama/create', 'Admin\KdramaController@add')->middleware('auth');
    Route::post('kdrama/create', 'Admin\KdramaController@create')->middleware('auth');
    Route::get('kdrama', 'Admin\KdramaController@index')->middleware('auth'); 
    
});

Auth::routes();

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
