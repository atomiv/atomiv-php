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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Customers
Route::get('customers/{id}','CustomerController@getCustomer');
Route::get('customers','CustomerController@getAllCustomers');
Route::post('customers','CustomerController@create');
Route::put('customers/{id}','CustomerController@update');
Route::delete('customers/{id}','CustomerController@delete');
