<?php
use Illuminate\Http\Request;

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

Route::get('/cards/{card}', 'CardsController@show')->name('show');

Route::get('/cards/search/{query}', 'CardsController@search')->name('search');

Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::post('/home/dust', 'HomeController@dust')->name('dust');

    Route::post('/cards/{card}/addtowishlist', 'CardsController@addToWishlist')->name('addtowishlist');

    Route::post('/cards/{card}/removefromwishlist', 'CardsController@removeFromWishlist')->name('removefromwishlist');

    Route::post('/cards/{card}/comments', 'CommentsController@store')->name('comments');
});

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin', 'AdminController@index')->name('admin');

    Route::get('/cards/create/new', 'CardsController@create')->name('create');

    Route::post('/cards', 'CardsController@store')->name('store');

    Route::get('/cards/{card}/edit', 'CardsController@edit')->name('edit');

    Route::patch('/cards/{card}', 'CardsController@update')->name('update');

    Route::get('/cards/{card}/delete', 'CardsController@delete')->name('delete');

    Route::post('/cards/state', 'CardsController@state')->name('state');
});
