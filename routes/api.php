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

Route::post('sell/{seller}', [
    'uses' => '\App\Http\Controllers\Sell\ManagerController@post',
    'as' => 'sell.post',
]);

Route::post('seller', [
    'uses' => '\App\Http\Controllers\Seller\ManagerController@post',
    'as' => 'seller.post',
]);
