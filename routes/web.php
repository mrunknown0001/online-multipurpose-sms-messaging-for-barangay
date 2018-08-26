<?php

Route::get('/', 'GeneralController@welcome')->name('welcome');

Route::get('/login', 'GeneralController@login')->name('login');

Route::post('/login', 'Auth\LoginController@postLogin')->name('login.post');

Route::get('/logout', 'GeneralController@logout')->name('logout');

// Route::get('/send', 'AdminController@send');
 
route::get('/check/{number}', 'GeneralController@network_check');

// route group for authenticated admin only
Route::group(['prefix' => 'admin', 'middleware' => ['auth','check.admin']], function () {

	// route to go to admin dashboard
	Route::get('/dashboard', 'AdminController@dashboard')->name('admin.dashboard');

	// route to view contacts
	Route::get('/contacts', 'AdminController@contacts')->name('admin.contacts');

	// route to add contact
	Route::get('/contact/add', 'AdminController@addContact')->name('admin.add.contact');

	// route to save added new contact
	Route::post('/contact/add', 'AdminController@postAddContact')->name('admin.add.contact.post');

	// route to view messages
	Route::get('/messages', 'AdminController@messages')->name('admin.messages');

	// route to activity log
	Route::get('/activity-logs', 'AdminController@activityLogs')->name('admin.activity.logs');

});