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

Route::get('/', 'CardsController@index');

Route::get('/cards/create', 'CardsController@create')->name('create');

Route::post('/cards', 'CardsController@store')->name('store');

Route::get('/cards/{card}', 'CardsController@show')->name('show');


Route::post('/cards/{card}/comments', 'CommentsController@store')->name('comments');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/home/dust', 'HomeController@dust')->name('dust');

Route::post('/cards/addtowishlist', 'CardsController@addToWishlist')->name('addtowishlist');

Route::post('/cards/removefromwishlist', 'CardsController@removeFromWishlist')->name('removefromwishlist');