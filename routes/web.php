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
Route::view('/movimentos', 'movimentos')->name('movimentos');
Route::view('/horarios','horarios')->name('horarios');
Route::get('/invoice', 'DefaultController@list');
