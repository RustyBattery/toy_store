<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::group(['namespace'=>'App\Http\Controllers\Api'], function (){

    Route::get('/products', 'ProductController@index');
    Route::get('/products/search', 'ProductController@search');
    Route::get('/products/review', 'ProductController@review');

    Route::post('/cart/add_product', 'CartController@add_product');
    Route::delete('/cart/delete_product', 'CartController@delete_product');
    //Route::get('/cart', 'CartController@index');
    //Route::get('/cart/price', 'CartController@price');

    Route::post('/order/make', 'OrderController@make');
});

Route::group(['namespace'=>'App\Http\Controllers\Api', 'middleware'=>'admin'], function (){
    Route::get('/admin/index', 'AdminController@index');
    Route::post('/admin/update', 'AdminController@update');
});
