<?php

use Illuminate\Http\Request;

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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::get('/location/{query}', function($query) {
	return App\Location::search($query)->get();
});

Route::get('/customer/{query}', function($query) {
	return App\Customer::search($query)->get();
});

Route::get('/equipment/{query}', function($query) {
	return App\Equipment::search($query)->get();
});

Route::get('/carrier/{query}', function($query) {
	return App\Carrier::search($query)->get();
});