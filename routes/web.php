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
	// SETTING
		// JABATAN
		Route::get('/setting/jabatan', 'setting_controller@jabatan');
        Route::get('/setting/datatable_jabatan', 'setting_controller@datatable_jabatan')->name('datatable_jabatan');
        Route::get('/setting/simpan_jabatan', 'setting_controller@simpan_jabatan');
        Route::get('/setting/hapus_jabatan', 'setting_controller@hapus_jabatan');
        // akun
        Route::get('/setting/akun', 'setting_controller@akun');
        Route::get('/setting/datatable_akun', 'setting_controller@datatable_akun')->name('datatable_akun');
        Route::post('/setting/simpan_akun', 'setting_controller@simpan_akun');
        Route::get('/setting/hapus_akun', 'setting_controller@hapus_akun');
        Route::get('/setting/edit_akun', 'setting_controller@edit_akun');
        Route::get('storage/uploads/user/thumbnail')->name('thumbnail');
        //daftar_menu
        Route::get('/setting/daftar_menu', 'setting_controller@daftar_menu');
        Route::get('/setting/datatable_daftar_menu', 'setting_controller@datatable_daftar_menu')->name('datatable_daftar_menu');
        Route::get('/setting/simpan_daftar_menu', 'setting_controller@simpan_daftar_menu');
        Route::get('/setting/hapus_daftar_menu', 'setting_controller@hapus_daftar_menu');
        //hak akses
        Route::get('/setting/hak_akses', 'setting_controller@hak_akses');
        Route::get('/setting/hak_akses/table_data', 'setting_controller@table_data');
        Route::get('/setting/hak_akses/centang', 'setting_controller@centang');
    // MASTER
        Route::get('/master/sekolah', 'master_controller@sekolah');


});
