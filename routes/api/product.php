<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API for product entity routes
|--------------------------------------------------------------------------
*/

Route::prefix('products')->group(function (){
    Route::get('/{id}','ProductController@getProduct');
    Route::get('/','ProductController@getAllProducts');
    Route::post('/','ProductController@create');
    Route::put('/{id}','ProductController@update');
    Route::delete('/{id}','ProductController@delete');
});
