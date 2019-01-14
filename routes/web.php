<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('persons', 'PersonController');
Route::resource('dependents', 'DependentController');
Route::resource('tithes','TitheController');
Route::post('/cep','PersonController@getCep');
Route::get('/total/person','PersonController@getTotal')->name('total.person');
Route::get('/person/one/{id}','PersonController@getOnePerson');
Route::get('/person/birthdays','PersonController@getBirthdays');
Route::get('/tithe/total','TitheController@getTotalTithe');
Route::get('/search','SearchController@search');
Route::get('/weeding','DependentController@weedingBirthDay');