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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get("/homeData/{lang}",'App\Http\Controllers\Api\apiController@getHomeData');
Route::get("getProductsDetails/{slugCode}/{lang}",'App\Http\Controllers\Api\apiController@getProductsDetails')->name('getProductsDetails');
Route::get('/getCategories', 'App\Http\Controllers\Api\apiController@getCategories')->name('getCategories');

Route::post("/auth/signup",'App\Http\Controllers\Api\Auth\registrationApiController@register')->name('register');
Route::post('/auth/login', 'App\Http\Controllers\Api\Auth\registrationApiController@login')->name('login');
Route::post('/auth/logout', 'App\Http\Controllers\Api\Auth\registrationApiController@logout')->name('logout');
