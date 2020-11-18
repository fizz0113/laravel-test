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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/products/{id?}', 'HomeController@index')->name('home');

Route::get('/sale/record/{rk?}', 'HomeController@saleRecord')->name('sale.record');

Route::get('/sale/products/{rk?}', 'HomeController@saleProducts')->name('sale.products');

Route::post('/sale/product/add', 'HomeController@addProduct')->name('sale.product.add');

Route::post('/sale/product/delete', 'HomeController@deleteProduct')->name('sale.product.delete');

Route::get('/buy/record/{rk?}', 'HomeController@buyRecord')->name('buy.record');

Route::post('/buy/order/add', 'HomeController@addOrder')->name('buy.order.add');

