<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', 'App\Http\Controllers\Auth\AuthenticatedSessionController@destroy');
});

Route::get('trucks', 'App\Http\Controllers\TruckController@index');
Route::get('retailers', 'App\Http\Controllers\RetailerController@get');
Route::post('orders', 'App\Http\Controllers\OrderController@create');
Route::get('orders', 'App\Http\Controllers\OrderController@index');
