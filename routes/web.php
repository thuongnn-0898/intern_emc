<?php

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

Route::get('/', 'DashboardController@index')->name('index');
Route::resource('cart', 'CartController')->only(['store', 'destroy']);
Route::delete('delete-cart', 'CartController@cartempty');
Route::get('view-cart', 'CartController@show')->name('cart-show');
Route::get('show-product/{id}', 'DashboardController@show')->name('product-show');

Route::group(['middleware' => 'auth'], function (){
    Route::resource('users', 'User\UserController');
    Route::post('review', 'DashboardController@review')->name('review');
    Route::resource('orders', 'OrderController')->only('store');
});

Route::get('/', 'DashboardController@index');
Route::group(['middleware' => ['role', 'active']], function () {
    Route::group(['prefix' => 'admin'], function (){
        Route::get('/dashboard', 'Admin\DashboardController@index')->name('adminDashboard');
        Route::resource('category', 'Admin\CategoryController')->except('show');
        Route::resource('user', 'Admin\UserController');
        Route::patch('user/active/{id}/{status}', 'Admin\UserController@active');
        Route::resource('product', 'Admin\ProductController');
    });
});

Auth::routes();
