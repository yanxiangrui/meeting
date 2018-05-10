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

Route::get('/welcome', 'HomeController@welcome')->name('welcome');

Route::get('/users/resetpwd', 'UsersController@resetpwd')->name('users.resetpwd');

Route::patch('/users/resetpwd', 'UsersController@resetpwdUpdate')->name('users.resetpwdUpdate');

// 酒店
Route::resource('hotels', 'HotelsController');

// 酒店房间
Route::resource('hotel_rooms', 'HotelRoomsController');

// 酒店房间类型
Route::resource('hotel_room_types', 'HotelRoomTypesController');

// 酒店餐费
Route::resource('hotel_dinners', 'HotelDinnersController');






