<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('users', 'UserController');
Route::resource('aircrafts', 'AircraftsController');
Route::get('prelims/create','AircraftsController@combo')->name('prelims.create');
Route::resource('prelims','PrelimController');
Route::get('excel/{id}', 'PrelimController@laporanExcel')->name('prelims.excel');
