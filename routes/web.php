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
Route::get('/about', 'pagescontroller@about');
Route::get('/services', 'pagescontroller@services');

route::resource('products','ProductController');
route::resource('review','ReviewController');

// Route::get('/review', function(){
//     return Request::post();;
// });

// Route::get('/about',function(){
//     return view('pages.about');
// });
// Route::get('/product/{id}',function($id){
//     return 'Det här är'.$id;
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
