<?php

Route::get('/', 'GeneralController@welcome')->name('welcome');

Route::get('/login', 'GeneralController@login')->name('login');

Route::post('/login', 'Auth\LoginController@postLogin')->name('login.post');

Route::get('/logout', 'GeneralController@logout')->name('logout');

// Route::get('/send', 'AdminController@send');

Route::group(['prefix' => 'auth', 'middleware' => 'auth'], function () {

	// route group for authenticated admin only
	Route::group(['prefix' => 'admin', 'middleware' => 'check.admin'], function () {

		// route to go to admin dashboard
		Route::get('/dashboard', 'AdminController@dashboard')->name('admin.dashboard');

		// route to activity log
		Route::get('/activity-logs', 'AdminController@activityLogs')->name('admin.activity.logs');

	});
});