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


use App\Mail\WeatherSuggestion;
use Illuminate\Support\Facades\Mail;

Route::get('/weathersss', function () {
    $advice= 'is gon rain';
    Mail::to('test@email.com')->send(new WeatherSuggestion($advice));

    return new WeatherSuggestion($advice);
});

Route::get('/weather', 'WeatherController@cityCollection');
Route::get('/weatherss', 'WeatherController@local');
Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/locations', 'LocationController@index');
Route::get('/locations/create', 'LocationController@create');
Route::post('/locations', 'LocationController@store');
Route::get('/locations/{id}', 'LocationController@show');
Route::get('/locations/{id}/edit', 'LocationController@edit');
Route::put('locations/{id}', 'LocationController@update');
Route::delete('/locations/{id}', 'LocationController@destroy');
Route::delete('/locations_delete_plant/{id}', 'LocationController@location_delete_plant');

Route::post('/location/store_plant', 'LocationController@location_store_plant');
Route::get('/locations/{id}/create_plant', 'LocationController@location_create_plant');

Route::get('/plants', 'PlantController@index');
Route::get('/plants/create', 'PlantController@create');
Route::post('/plants', 'PlantController@store');
Route::get('/plants/{plant_id}', 'PlantController@show');
Route::get('/plants/{plant_id}/edit', 'PlantController@edit');
Route::put('plants/{plant_id}', 'PlantController@update');
Route::delete('/plants/{plant_id}', 'PlantController@destroy');

Route::get('/tasks', 'PlantController@index');
Route::get('/tasks/create', 'HomeController@create');
Route::post('/tasks', 'HomeController@store');
Route::get('/tasks/{p_id}', 'PlantController@show');
Route::get('/tasks/{plant_id}/edit', 'PlantController@edit');
Route::put('/tasks/{task_id}', 'HomeController@update');
Route::put('/todo_tasks/{task_id}', 'HomeController@update');
Route::put('/doing_tasks/{task_id}', 'HomeController@update');
Route::put('/done_tasks/{task_id}', 'HomeController@update');
Route::delete('/tasks/{id}', 'HomeController@destroy');
