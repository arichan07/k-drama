<?php

Route::get('/', function () {
    return view('home');
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


Route::get('/', function () { return redirect('/home'); });

Route::group(['middleware' => 'auth:user'], function() {
    Route::get('/home', 'HomeController@index')->name('home');
});

Route::group(['prefix' => 'admin'], function() {
    Route::get('/',         function () { return redirect('/admin/home'); });
    Route::get('login',     'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login',    'Admin\LoginController@login');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
    Route::post('logout',   'Admin\LoginController@logout')->name('admin.logout');
    Route::get('home',      'Admin\HomeController@index')->name('admin.home');
});