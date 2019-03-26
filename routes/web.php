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


/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'PagesController@home');
Route::get('/about', 'PagesController@about');
Route::get('/tours', 'PagesController@tours');
Route::get('/showusers', 'PagesController@showusers');


Route::resource('offers', 'OffersController');
Route::resource('hotels', 'HotelsController');
Route::resource('orders', 'OrdersController');
Route::resource('users', 'UsersController');