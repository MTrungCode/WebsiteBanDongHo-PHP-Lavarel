<?php

	Route::group(['prefix' => 'account','namespace' => 'User'], function () {
		Route::get('', 'UserDashboardController@dashboard')->name('get.user.dashboard');

		Route::get('update-info', 'UserInfoController@updateInfo')->name('get.user.update_info');
		Route::post('update-info', 'UserInfoController@SaveUpdateInfo');

		Route::get('transaction', 'UserTransactionController@index')->name('get.user.transaction');
	});