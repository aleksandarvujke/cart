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

Route::get('/', 'ProductController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/p/create', 'ProductController@create');

Route::post('/p', 'ProductController@store');

Route::get('/add-to-cart/{id}', 'CartController@addToCart');

Route::get('/cart', 'ProductController@cart');

Route::get('/cart/view', 'CartController@index');