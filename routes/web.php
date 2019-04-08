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

//TODO Implement login
//TODO Implement user and admin


Route::get('/', 'PagesController@home');
Route::get('/tours', 'PagesController@tours');
Route::get('/hotels', 'PagesController@hotels');
//Route::get('/test', 'PagesController@test');

Route::resource('/hotels', 'HotelsController');
Route::resource('/about', 'ContactsController');
//Route::resource('offers', 'OffersController');
//Route::resource('hotels', 'HotelsController');
//Route::resource('orders', 'OrdersController');
//Route::resource('users', 'UsersController');