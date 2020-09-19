<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API for product entity routes
|--------------------------------------------------------------------------
*/


Route::get('products/{id}','ProductController@getProduct');
Route::get('products','ProductController@getAllProducts');
Route::post('products','ProductController@create');
Route::put('products/{id}','ProductController@update');
Route::delete('products/{id}','ProductController@delete');
