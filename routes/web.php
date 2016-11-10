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
    return redirect('products');
});

Route::resource('/products', 'ProductController', ['only' => ['index', 'show']]);
Route::resource('/bundles', 'BundleController', ['only' => ['index', 'show']]);

Route::resource('/carts', 'CartController', ['only' => ['index', 'store', 'update', 'destroy']]);
Route::delete('emptyCart', 'CartController@emptyCart');

Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');
Route::post('/checkout', 'CheckoutController@payment')->name('checkout.payment');
