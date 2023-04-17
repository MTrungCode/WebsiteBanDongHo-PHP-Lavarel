<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::group(['namespace' => 'Auth', 'prefix' => 'account'], function () {
    Route::get('register', 'RegisterController@getFormRegister')->name('get.register');
    Route::post('register', 'RegisterController@postRegister');

    Route::get('login', 'LoginController@getFormLogin')->name('get.login');
    Route::post('login', 'LoginController@postLogin');

    Route::get('logout', 'LoginController@getLogout')->name('get.logout');
});
Route::group(['namespace' => 'Frontend'], function () {
    Route::get('', 'HomeController@index')->name('get.home');
    Route::get('san-pham', 'ProductController@index')->name('get.product.list');
    Route::get('danh-muc', 'CategoryController@index')->name('get.category.list');
    Route::get('san-pham/{slug}', 'ProductDetailController@getProductDetail')->name('get.product.detail');


    Route::get('don-hang', 'ShoppingCartController@index')->name('get.shopping.list');
    Route::prefix('shopping')->group(function () {
        Route::get('add/{id}', 'ShoppingCartController@add')->name('get.shopping.add');
        Route::get('delete/{id}', 'ShoppingCartController@delete')->name('get.shopping.delete');
        Route::get('update/{id}', 'ShoppingCartController@update')->name('ajax_get.shopping.update');

        Route::post('pay', 'ShoppingCartController@postPay')->name('post.shopping.pay');
    });
});

include 'routes_admin.php';
include 'routes_user.php';
// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('get.home');
