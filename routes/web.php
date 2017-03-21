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

Route::get('seloger', 'SelogerController@getSelogerInfo');
Route::post('results', 'ResultPageController@getResults');
Route::get('detail', 'DetailPageController@getDetail');
Route::get('api/results', 'ResultPageController@getResults');

Route::get('api/hello', function () {
	$hello = array(array('Bonjour le monde'), array('hello world'), array('ola el mundo'));
	// dd($hello);
    return $hello;
});
