<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemeController;

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

Route::get('/', 'App\Http\Controllers\HomeController@index')->name("home.index");
Route::get('/show/{id}', 'App\Http\Controllers\HomeController@show')->name("home.show");
Route::resource('memes', MemeController::class);
