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

Route::middleware('auth:api')->get('/user', function (Request $request) {
     return $request->user();
});

Route::post('login','AuthController@login');
Route::apiResource('persons','PersonController');
Route::get('tithe/total','TitheController@getTotalTithe');
Route::get('intention','IntentionController@index');
// Route::post('/register','AuthController@register');
Route::get('/total/person','PersonController@getTotal');
// Route::post('/cep','PersonController@getZipCode');
