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

Auth::routes();

Route::get('/dashboard', 'DashboardsController@index')->name('dashboard');

Route::resource('owner', 'OwnerController');
Route::resource('manufacturer', 'ManufacturersController');
Route::resource('series', 'SeriesController');
Route::resource('body', 'BodiesController');
Route::resource('vehicle', 'VehicleController');
Route::resource('report', 'ReportsController');
Route::get('/search', 'ReportsController@search');