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

// Home
Route::get('/', function () {
    return view('home');
});

// Login & register
Auth::routes();

// User
Route::group(['prefix' => '{user_url}'], function() {
	Route::get('/items', 'UserController@showItems');
	Route::get('/favorites', 'UserController@showFavorites');
});

// Items
Route::resource('items', 'ItemController');

// Messages
Route::resource('messages', 'MessageController', ['except' => [
    'show'
]]);

// Message per user
Route::get('messages/t/{user_url}', 'MessageController@show');
