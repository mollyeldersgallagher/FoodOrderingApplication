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

Auth::routes();

Route::get('/', 'PageController@welcome')->name('welcome');
Route::get('/about', 'PageController@about')->name('about');
Route::get('/contactus', 'PageController@contactus')->name('contactus');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/home', 'Admin\HomeController@index')->name('admin.home');
Route::get('/user/home', 'User\HomeController@index')->name('user.home');

Route::resource('/admin/foods',   'Admin\FoodController',   array("as"=>"admin"));
Route::resource('/admin/orders',   'Admin\OrderController',   array("as"=>"admin"));
Route::resource('/admin/diets',   'Admin\DietController',   array("as"=>"admin"));
Route::resource('/admin/options',   'Admin\OptionController',   array("as"=>"admin"));


Route::get('/foods', 'FoodController@index')->name('foods.index');
Route::get('/foods/{id}', 'FoodController@show')->name('foods.show');
Route::post('/foods/select', 'FoodController@diet')->name('foods.select');

Route::get('/basket', 'BasketController@view')->name('basket.view');
Route::post('/basket', 'BasketController@add')->name('basket.add');
Route::get('/basket/edit', 'BasketController@edit')->name('basket.edit');
Route::put('/basket', 'BasketController@update')->name('basket.update');
Route::get('/basket/checkout', 'BasketController@checkout')->name('basket.checkout');
Route::post('/basket/pay', 'BasketController@pay')->name('basket.pay');

Route::get('/admin/orders', 'Admin\OrderController@index')->name('admin.orders.index');
Route::get('/admin/orders/{id}', 'Admin\OrderController@show')->name('admin.orders.show');

Route::get('/user/orders', 'User\OrderController@index')->name('user.orders.index');
Route::get('/user/orders/{id}', 'User\OrderController@show')->name('user.orders.show');

Route::get('/admin/diets', 'Admin\DietController@index')->name('admin.diets.index');
Route::get('/admin/diets/{id}', 'Admin\DietController@show')->name('admin.diets.show');
