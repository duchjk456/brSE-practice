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

Route::get('/admin-creat', 'App\Http\Controllers\LoginController@showFormCreatAdmin');
Route::post('/admin-creat', 'App\Http\Controllers\LoginController@createAdmin')->name('store.admin');
Route::get('/admin-edit/{id}', 'App\Http\Controllers\LoginController@editAdmin')->name('edit.admin');
Route::post('/admin-update/{id}', 'App\Http\Controllers\LoginController@updateAdmin')->name('update.admin');
Route::get('/block/{id}', 'App\Http\Controllers\LoginController@blockAdmin')->name('block.admin');
Route::get('/unblock/{id}', 'App\Http\Controllers\LoginController@unBlockAdmin')->name('unblock.admin');

Route::get('/list-owners', 'App\Http\Controllers\LoginController@getListOwners');
Route::get('/owner-creat', 'App\Http\Controllers\LoginController@showFormCreatOwner');
Route::post('/owner-creat', 'App\Http\Controllers\LoginController@createOwner')->name('store.owner');
Route::get('/owner-edit/{id}', 'App\Http\Controllers\LoginController@editOwner')->name('edit.owner');
Route::post('/owner-update/{id}', 'App\Http\Controllers\LoginController@updateOwner')->name('update.owner');
Route::get('/block-owner/{id}', 'App\Http\Controllers\LoginController@blockOwner')->name('block.owner');
Route::get('/unblock-owner/{id}', 'App\Http\Controllers\LoginController@unBlockOwner')->name('unblock.owner');



