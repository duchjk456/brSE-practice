<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//Auth
Route::get('/', 'App\Http\Controllers\LoginController@home');
Route::get('/home', 'App\Http\Controllers\LoginController@home');
Route::post('/login', 'App\Http\Controllers\LoginController@login')->name('login.post');
Route::get('/logout', 'App\Http\Controllers\LoginController@logout')->name('logout');
Route::get('/register', 'App\Http\Controllers\RegisterController@show');
Route::post('/registerCheck', 'App\Http\Controllers\RegisterController@register')->name('register.post');
