<?php

use App\Http\Controllers\Api\LocationController;
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
Route::get('locations/get-city/{state_id}', 'App\Http\Controllers\Api\LocationController@getCity');
Route::get('locations/get-state/{country_id}', 'App\Http\Controllers\Api\LocationController@getState');
Route::resource('locations', LocationController::class);
