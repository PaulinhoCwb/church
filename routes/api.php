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
     Route::get('/catequese','NewController@getCatequese');
     Route::get('/avisos','NewController@getAvisos');
     Route::get('tithe/total','TitheController@getTotalTithe');
     /**
      * Person Controller 
      */
     Route::get('total/person','PersonController@getTotal');
     Route::get('weeding','PersonController@getWeeding');
     Route::get('birthdaysPersons','PersonController@personBirthddays');
     Route::get('person/all','PersonController@getTodos');
     /**
      * Search
      */
     Route::get('search','SearchController@search');
     Route::post('logout','AuthController@logout');
});
