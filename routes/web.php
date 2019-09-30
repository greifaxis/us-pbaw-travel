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

Auth::routes();
//GUEST
Route::get('/', 'HomeController@index');
//Route::get('/database', 'DatabaseController@index');


//AUTH
Route::get('/basket','BasketsController@index')->name('basket.index')->middleware('auth');
Route::delete('basket/{id}/delete','BasketsController@destroy')->name('basket.destroy')->middleware('auth');
Route::post('/checkout','BasketsController@checkout')->name('checkout')->middleware('auth');
Route::get('order/report','HomeController@createOrdersReport')->name('ordersreport')->middleware('auth');

Route::resource('/hotels', 'HotelsController');
Route::resource('/contact', 'ContactsController');
Route::resource('/tours', 'OffersController');
Route::resource('/order', 'OrdersController')->middleware('auth');
Route::resource('/user', 'UsersController')->middleware('auth');
Route::resource('/password', 'PasswordsController')->middleware('auth');

//ADMIN
//Route::resource('/showusers', 'ProfilesController')->middleware('admin');

