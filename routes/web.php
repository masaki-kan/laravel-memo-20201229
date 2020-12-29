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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/' , 'memoController@index')->name('top');

Route::get('register' , 'memoController@register')->name('register');

Route::get('list/{id}' , 'memoController@list')->name('list');

Route::get('create' , 'memoController@create')->name('create');

Route::post('update' , 'memoController@update')->name('update');

Route::get('delete/{id}' , 'memoController@delete')->name('delete');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
