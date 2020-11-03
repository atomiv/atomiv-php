<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API for customer entity routes
|--------------------------------------------------------------------------
*/

Route::prefix('customers')->group(function (){
    Route::get('/{id}','CustomerController@getCustomer');
    Route::get('/','CustomerController@getAllCustomers');
    Route::post('/','CustomerController@create');
    Route::put('/{id}','CustomerController@update');
    Route::delete('/{id}','CustomerController@delete');
});
