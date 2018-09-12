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

Route::get('/', 'ReservationsController@index')->name('reservations.index');
Route::get('/reservations/create', 'ReservationsController@create')->name('reservations.create');
Route::post('/reservations/store', 'ReservationsController@store')->name('reservations.store');
Route::delete('/reservations/{reservation}', 'ReservationsController@delete')->name('reservations.delete');

Route::get('/customers', 'CustomersController@index')->name('customers.index');
Route::get('/customers/create', 'CustomersController@create')->name('customers.create');
Route::post('/customers', 'CustomersController@store')->name('customers.store');
