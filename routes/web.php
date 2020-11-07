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
    return view('cars');
});

Route::resource('cars', 'App\Http\Controllers\CarController',
    ['except' => ['update', 'show', 'edit', 'delete' ]])->names('cars');
Route::post('get_models', 'App\Http\Controllers\CarController@getModels')->name('get_models');
