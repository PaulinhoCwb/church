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
Route::post('login','AuthController@login')->name('login');
Route::middleware('auth:api')->group(function () {
     Route::apiResources([
          'persons'    => 'PersonController',
          'intentions' => 'IntentionController',
          'dependents' => 'DependentController',
          'news'       => 'NewController',
          'users'      => 'UserController',
          'events'     => 'EventController'
      ]);
     Route::get('tithe/total','TitheController@getTotalTithe');
     Route::get('total/person','PersonController@getTotal');
     Route::get('birthdays','PersonController@getBirthdays');
     Route::get('weeding','PersonController@getWeeding');
     Route::post('logout','AuthController@logout');
     Route::get('birthdaysPersons','PersonController@personBirthddays');
});
