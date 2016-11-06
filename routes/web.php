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

Route::get('/', 'HomeController@index');

Route::resource('/products', 'ProductController', ['only' => ['index', 'show']]);

Route::resource('/carts', 'CartController', ['only' => ['index', 'store', 'update', 'destroy']]);
Route::delete('emptyCart', 'CartController@emptyCart');

Route::resource('/checkout', 'CheckoutController', ['only' => ['index']]);
