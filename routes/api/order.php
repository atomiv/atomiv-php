<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API for order entity routes
|--------------------------------------------------------------------------
*/


Route::get('orders/{id}','OrderController@getOrder');
Route::get('orders','OrderController@getAllOrders');
Route::post('orders','OrderController@create');
Route::put('orders/{id}','OrderController@update');
Route::delete('orders/{id}','OrderController@delete');
