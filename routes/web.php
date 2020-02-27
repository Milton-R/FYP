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

Route::get('/', 'GardenController@index');

Route::get('/locations', 'LocationController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/locations', 'LocationController@index');
Route::get('/locations/create', 'LocationController@create');
Route::post('/locations', 'LocationController@store');
Route::get('/locations/{id}', 'LocationController@show');
//Route::get('/locations/{id}/edit', 'LocationController@edit');
//Route::put('locations/{id}', 'LocationController@update');
//Route::delete('/locations/{id}', 'LocationController@destroy');
