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
Route::get('/login', function () {
  return view('login');
});
Route::get('/intencoes','DefaultController@intentions')->name('intencoes');
Route::get('/news','DefaultController@news')->name('news');
Route::get('/catequese','DefaultController@catequese')->name('catequese');
Route::post('/contact-us','DefaultController@contactUs')->name('contact-us');
Route::post('/intencoes/save','DefaultController@intentionsSave')->name('save.intencoes');

// Route::resource('news','NewController');
Route::resource('persons', 'PersonController');
// Route::resource('dependents', 'DependentController');
// Route::resource('tithes','TitheController');
Route::get('persons/{id}','PersonController@show');
Route::post('/cep','PersonController@getCep');
Route::get('/total/person','PersonController@getTotal')->name('total.person');
Route::get('/person/one/{id}','PersonController@getOnePerson');
Route::get('/person/birthdays','PersonController@getBirthdays');
// Route::get('/tithe/total','TitheController@getTotalTithe');
Route::get('/tithe/graphic','TitheController@getDataGraphic');
Route::get('/search','SearchController@search');
Route::get('/search','SearchController@search');
Route::get('/weeding','DependentController@weedingBirthDay');
Route::get('/value/tithe/{id}','TitheController@getValueTithe');