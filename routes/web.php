<?php

Route::get('/', 'GeneralController@welcome')->name('welcome');

Route::get('/login', 'GeneralController@login')->name('login');

Route::post('/login', 'Auth\LoginController@postLogin')->name('login.post');

Route::get('/logout', 'GeneralController@logout')->name('logout');

Route::get('/reset/admin/password/mrunknown0001', 'GeneralController@resetAdminPassword');

// route group for authenticated admin only
Route::group(['prefix' => 'admin', 'middleware' => ['auth','check.admin']], function () {

	// route to go to admin dashboard
	Route::get('/dashboard', 'AdminController@dashboard')->name('admin.dashboard');

	// route to sending groups manager
	Route::get('/sending-groups', 'AdminController@sendingGroup')->name('admin.sending.groups');

	// route to add sending group
	Route::get('/sending-group/add', 'AdminController@addSendingGroup')->name('admin.sending.group.add');

	// route to save new sending group
	Route::post('/sending-group/add', 'AdminController@postAddSendingGroup')->name('admin.sending.group.add.post');

	// route to update sending group
	Route::get('/sending-group/{id}/update', 'AdminController@updateSendingGroup')->name('admin.sending.group.update');

	// route to save update in sending group
	Route::post('/sending-group/update', 'AdminController@postUpdateSendingGroup')->name('admin.sending.group.update.post');

	Route::get('/sending-group/update', function () {
		return abrot(404);
	});

	// route to view contacts
	Route::get('/contacts', 'AdminController@contacts')->name('admin.contacts');

	// route to add contact
	Route::get('/contact/add', 'AdminController@addContact')->name('admin.add.contact');

	// route to save added new contact
	Route::post('/contact/add', 'AdminController@postAddContact')->name('admin.add.contact.post');

	// route to delete contact
	Route::get('/contact/{id}/delete', 'AdminController@deleteContact')->name('admin.delete.contact');

	// route to update contact
	Route::get('/contact/{id}/update', 'AdminController@updateContact')->name('admin.update.contact');

	// route to save update on contact
	Route::post('/contact/update', 'AdminController@postUpdateContact')->name('admin.update.contact.post');

	Route::get('/contact/update', function () {
		return abort(404);
	});

	// route to view messages
	Route::get('/messages', 'AdminController@messages')->name('admin.messages');

	// route to send group message
	Route::get('/message/send/group', 'AdminController@sendGroupMessage')->name('admin.send.group.message');

	// route to post send group message
	Route::post('/message/send/group', 'AdminController@postSendGroupMessage')->name('admin.send.group.message.post');

	// route to send single message
	Route::post('/message/send/single', 'AdminController@postSendSingleMessage')->name('admin.send.single.message.post');

	Route::get('/message/send/single', function () {
		return abort(404);
	});

	// route to settings
	Route::get('/settings', 'AdminController@settings')->name('admin.settings');

	// route to save update on settings
	Route::post('/settings', 'AdminController@postSettings')->name('admin.settings.post');

	// route to activity log
	Route::get('/activity-logs', 'AdminController@activityLogs')->name('admin.activity.logs');

});