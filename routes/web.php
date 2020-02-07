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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', 'DashboardController@index');
Route::group(['middleware' => 'role'], function () {
    Route::group(['prefix' => 'admin'], function (){
        Route::get('/dashboard', 'Admin\DashboardController@index')->name('adminDashboard');
        Route::resource('category', 'Admin\CategoryController')->except('show');
        Route::resource('product', 'Admin\ProductController');
    });
});

Auth::routes();
