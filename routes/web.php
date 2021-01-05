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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/search', 'HomeController@search')->name('search');
Route::post('/search', 'HomeController@show')->name('search');
Route::resource('/records', 'RecordsController')->middleware('auth')->middleware('role:SuperAdmin|Admin|User');
Route::resource('/device', 'DevicesController')->middleware('auth')->middleware('role:SuperAdmin|Admin|User');
Route::get('/device/create', 'DevicesController@create')->middleware('auth')->middleware('role:SuperAdmin|Admin');
Route::resource('/users', 'UserController')->middleware('auth')->middleware('role:SuperAdmin');
Route::resource('/company', 'CompanyController')->middleware('auth')->middleware('role:SuperAdmin');
Route::resource('/area', 'AreaController')->middleware('auth')->middleware('role:SuperAdmin');

Route::post('/reporte/', 'ReportsController@index')->middleware('auth');
Route::post('/reporte/fechas/', 'ReportsController@fechas')->middleware('auth');
