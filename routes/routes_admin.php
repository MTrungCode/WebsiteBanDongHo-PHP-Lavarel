<?php

	Route::group(['prefix' => 'admin-auth','namespace' => 'Admin\Auth'], function () {
		Route::get('login', 'AdminLoginController@getLoginAdmin')->name('get.login.admin');
		Route::post('login', 'AdminLoginController@postLoginAdmin');

		Route::get('logout', 'AdminLoginController@getLogoutAdmin')->name('get.logout.admin');
	});

	Route::group(['prefix' => 'api-admin','namespace' => 'Admin', 'middleware'=> 'check_admin_login'], function () {
		Route::get('/', function () {
			return view('admin.index');
		});

		Route::group(['prefix' => 'category'], function (){
			Route::get('','AdminCategoryController@index')->name('admin.category.index');
			Route::get('create','AdminCategoryController@create')->name('admin.category.create');
			Route::post('create','AdminCategoryController@store');

			Route::get('update/{id}','AdminCategoryController@edit')->name('admin.category.update');
			Route::post('update/{id}','AdminCategoryController@update');

			Route::get('active/{id}','AdminCategoryController@active')->name('admin.category.active');
			Route::get('hot/{id}','AdminCategoryController@hot')->name('admin.category.hot');
			Route::get('delete/{id}','AdminCategoryController@delete')->name('admin.category.delete');
		});

		Route::group(['prefix' => 'keyword'], function (){
			Route::get('','AdminKeywordController@index')->name('admin.keyword.index');
			Route::get('create','AdminKeywordController@create')->name('admin.keyword.create');
			Route::post('create','AdminKeywordController@store');

			Route::get('update/{id}','AdminKeywordController@edit')->name('admin.keyword.update');
			Route::post('update/{id}','AdminKeywordController@update');
			Route::get('hot/{id}','AdminKeywordController@hot')->name('admin.keyword.hot');

			Route::get('delete/{id}','AdminKeywordController@delete')->name('admin.keyword.delete');
		});

		Route::group(['prefix' => 'attribute'], function (){
			Route::get('','AdminAttributeController@index')->name('admin.attribute.index');
			Route::get('create','AdminAttributeController@create')->name('admin.attribute.create');
			Route::post('create','AdminAttributeController@store');

			Route::get('update/{id}','AdminAttributeController@edit')->name('admin.attribute.update');
			Route::post('update/{id}','AdminAttributeController@update');
			Route::get('hot/{id}','AdminAttributeController@hot')->name('admin.attribute.hot');

			Route::get('delete/{id}','AdminAttributeController@delete')->name('admin.attribute.delete');
		});

		Route::group(['prefix' => 'user'], function (){
			Route::get('','AdminUserController@index')->name('admin.user.index');
			
			Route::get('update/{id}','AdminUserController@edit')->name('admin.user.update');
			Route::post('update/{id}','AdminUserController@update');

			Route::get('delete/{id}','AdminUserController@delete')->name('admin.user.delete');
		});
		
		Route::group(['prefix' => 'transaction'], function (){
			Route::get('','AdminTransactionController@index')->name('admin.transaction.index');
			Route::get('delete/{id}','AdminTransactionController@delete')->name('admin.transaction.delete');
			Route::get('order-delete/{id}','AdminTransactionController@deleteOrderItem')->name('ajax.admin.transaction.order_item');
			Route::get('view-transaction/{id}','AdminTransactionController@getTransactiondetail')->name('ajax.admin.transaction.detail');
			Route::get('action/{action}/{id}', 'AdminTransactionController@getAction')->name('admin.action.transaction');
		});

		Route::group(['prefix' => 'product'], function (){
			Route::get('','AdminProductController@index')->name('admin.product.index');
			Route::get('create','AdminProductController@create')->name('admin.product.create');
			Route::post('create','AdminProductController@store');

			Route::get('update/{id}','AdminProductController@edit')->name('admin.product.update');
			Route::post('update/{id}','AdminProductController@update');
			Route::get('hot/{id}','AdminProductController@hot')->name('admin.product.hot');
			Route::get('active/{id}','AdminProductController@active')->name('admin.product.active');

			Route::get('delete/{id}','AdminProductController@delete')->name('admin.product.delete');
		});
	});