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

Route::get('/', 'IndexController@index');

Route::get('/test', function () {
    return view('index');
});

Route::get('/test/{test}/{test2}/{test3}', 'IndexController@show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/contacts', 'ContactsController');
