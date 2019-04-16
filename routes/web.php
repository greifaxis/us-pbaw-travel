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

//TODO Implement user and admin

Auth::routes();

//Route::get('/', 'PagesController@home');
Route::get('/tours', 'HomeController@tours');
Route::get('/hotels', 'HomeController@hotels');
//Route::get('/test', 'PagesController@test');
Route::get('admin/routes', 'HomeController@admin')->middleware('admin');


Route::get('/', 'HomeController@index');

Route::resource('/hotels', 'HotelsController');
Route::resource('/about', 'ContactsController');
Route::resource('/myorders', 'OrdersController');
Route::resource('/myprofile', 'ProfilesController');
