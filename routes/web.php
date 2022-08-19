<?php

use Illuminate\Support\Facades\Auth;
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
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', 'App\Http\Controllers\CartController@shop');
Route::get('/shop', 'App\Http\Controllers\CartController@shop')->name('shop');
Route::get('/caja', 'App\Http\Controllers\CartController@caja')->name('caja');
Route::get('/mensaje', 'App\Http\Controllers\CartController@mensaje')->name('mensaje');
Route::get('/cart', 'App\Http\Controllers\CartController@cart')->name('cart.index');
Route::post('/add', 'App\Http\Controllers\CartController@add')->name('cart.store');
Route::post('/update', 'App\Http\Controllers\CartController@update')->name('cart.update');
Route::post('/remove', 'App\Http\Controllers\CartController@remove')->name('cart.remove');
Route::post('/clear', 'App\Http\Controllers\CartController@clear')->name('cart.clear');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
