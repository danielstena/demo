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

Route::get('/', 'pagescontroller@index');

route::resource('products','ProductController');

Route::group(['middleware' => 'admin'], function(){
    Route::get('products/create', 'ProductController@create');
});

route::resource('review','ReviewController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

