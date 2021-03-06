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


Auth::routes();
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/login', array('uses' => 'auth\LoginController@doLogin'));

Route::get('/pros', 'pros\ProsController@index');
Route::get('/me', 'me\MeController@index');

