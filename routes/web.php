<?php

Route::get('/', 'GeneralController@welcome')->name('welcome');

Route::get('/login', 'GeneralController@login')->name('login');

Route::group(['prefix' => 'auth', 'middleware' => 'auth'], function () {

});