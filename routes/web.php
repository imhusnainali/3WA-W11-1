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

Route::get('/', 'DishesController@index');
Route::get('/contacts', function(){
    return view('contacts');
})->name('contacts');

Route::get('/reservations/{id}/user', 'ReservationsController@userReservations');

Route::resource('/orders', 'OrdersController');
Route::resource('/dishes', 'DishesController');
Route::resource('/carts', 'CartsController');
Route::resource('/users', 'UsersController');
Route::resource('/reservations', 'ReservationsController');
