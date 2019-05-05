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
Route::get('/', 'HomeController@index')->name('home');
Route::post('/', 'HomeController@search')->name('search');
Route::get('/facilities/{facility}', 'FacilityController@show')->name('show_facility');
Route::get('/facilities/{facility}/request_ownership', 'FacilityController@assignOwner')->name('request_ownership');

Auth::routes();

Route::get('/get_facilities', 'HomeController@facilities')->name('get_facilities');
Route::get('/statistics', function(){
    return view('statistics');
});
Route::get('/complaint', 'HomeController@createComplaint')->name('complaint');