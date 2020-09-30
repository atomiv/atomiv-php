<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API for order entity routes
|--------------------------------------------------------------------------
*/

Route::prefix('orders')->group(function (){
    Route::get('/{id}','OrderController@getOrder');
    Route::get('/','OrderController@getAllOrders');
    Route::post('/','OrderController@create');
    Route::put('/{id}','OrderController@update');
    Route::delete('/{id}','OrderController@delete');
});

