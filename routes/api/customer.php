<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API for customer entity routes
|--------------------------------------------------------------------------
*/


Route::get('customers/{id}','CustomerController@getCustomer');
Route::get('customers','CustomerController@getAllCustomers');
Route::post('customers','CustomerController@create');
Route::put('customers/{id}','CustomerController@update');
Route::delete('customers/{id}','CustomerController@delete');


