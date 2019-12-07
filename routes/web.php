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
Route::post('/home', 'HomeController@recupDevice')->name('search');
Route::post('/export', 'HomeController@export')->name('export');
Route::get('/show_device', 'HomeController@show_device')->name('show_device');
// Route::get('/test', 'HomeController@show_table')->name('test');
