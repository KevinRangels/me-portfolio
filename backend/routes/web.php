<?php


Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/', function () {
    return redirect()->action('HomeController@index');
});

Route::get('/home', 'HomeController@index')->name('home');
