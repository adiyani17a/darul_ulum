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


Route::group(['middleware' => 'auth'], function () {

	Route::get('storage/uploads/user/thumbnail')->name('thumbnail');
	Route::get('/', 'HomeController@index')->name('home');
	Route::get('home', 'HomeController@index');
	Route::get('setting/jabatan', 'setting_controller@jabatan');

});
