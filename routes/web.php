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

Route::get('/', 'HomeController@index')->name('home');

Route::get('schedule', 'SessionsController@index');

Route::get('attendees', 'AttendeesController@index')->middleware('auth');

Route::get('tickets', 'TicketsController@show')->middleware('auth');

Route::post('tickets', 'TicketsController@store')->name('purchase')->middleware('auth');
