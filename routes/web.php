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

    // Route::get('/_debugbar/assets/javascript', [
    //     'as' => 'debugbar-js',
    //     'uses' => '\Barryvdh\Debugbar\Controllers\AssetController@js'
    // ]);
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
        // SEKOLAH
        Route::get('/master/sekolah', 'master_controller@sekolah');
        Route::get('/master/datatable_sekolah', 'master_controller@datatable_sekolah')->name('datatable_sekolah');
        Route::post('/master/simpan_sekolah', 'master_controller@simpan_sekolah');
        Route::get('/master/hapus_sekolah', 'master_controller@hapus_sekolah');
        Route::get('/master/edit_sekolah', 'master_controller@edit_sekolah');
        // POSISI
        Route::get('/master/posisi', 'master_controller@posisi');
        Route::get('/master/datatable_posisi', 'master_controller@datatable_posisi')->name('datatable_posisi');
        Route::post('/master/simpan_posisi', 'master_controller@simpan_posisi');
        Route::get('/master/hapus_posisi', 'master_controller@hapus_posisi');
        Route::get('/master/edit_posisi', 'master_controller@edit_posisi');
        // STAFF
        Route::get('/master/staff', 'master_controller@staff');
        Route::get('/master/datatable_staff', 'master_controller@datatable_staff')->name('datatable_staff');
        Route::post('/master/simpan_staff', 'master_controller@simpan_staff');
        Route::get('/master/hapus_staff', 'master_controller@hapus_staff');
        Route::get('/master/edit_staff', 'master_controller@edit_staff');
        // BARANG
        Route::get('/master/barang', 'master_controller@barang');
        Route::get('/master/datatable_barang', 'master_controller@datatable_barang')->name('datatable_barang');
        Route::post('/master/simpan_barang', 'master_controller@simpan_barang');
        Route::get('/master/hapus_barang', 'master_controller@hapus_barang');
        Route::get('/master/edit_barang', 'master_controller@edit_barang');
    // KEUANGAN
        // MASTER AKUN KEUANGAN
        Route::get('/keuangan/keuangan', 'keuangan_controller@keuangan');
        Route::get('/keuangan/datatable_keuangan', 'keuangan_controller@datatable_keuangan')->name('datatable_keuangan');
        Route::post('/keuangan/simpan_keuangan', 'keuangan_controller@simpan_keuangan');
        Route::get('/keuangan/hapus_keuangan', 'keuangan_controller@hapus_keuangan');
        Route::get('/keuangan/edit_keuangan', 'keuangan_controller@edit_keuangan');
        Route::post('/keuangan/update_keuangan', 'keuangan_controller@update_keuangan');
        // GROUP AKUN KEUANGAN
        Route::get('/keuangan/group_akun', 'keuangan_controller@group_akun');
        Route::get('/keuangan/datatable_group_akun', 'keuangan_controller@datatable_group_akun')->name('datatable_group_akun');
        Route::post('/keuangan/simpan_group_akun', 'keuangan_controller@simpan_group_akun');
        Route::get('/keuangan/hapus_group_akun', 'keuangan_controller@hapus_group_akun');
        Route::get('/keuangan/edit_group_akun', 'keuangan_controller@edit_group_akun');
        Route::get('/keuangan/lihat_group_akun', 'keuangan_controller@lihat_group_akun');
        Route::post('/keuangan/update_group_akun', 'keuangan_controller@update_group_akun');
        Route::get('/keuangan/ajax_table_akun', 'keuangan_controller@ajax_table_akun');
        Route::get('/keuangan/jurnal', 'keuangan_controller@jurnal');
    // PENERIMAAN
        // SISWA
        Route::get('/penerimaan/siswa', 'penerimaan_controller@siswa');
        Route::get('/penerimaan/datatable_siswa', 'penerimaan_controller@datatable_siswa')->name('datatable_siswa');
        Route::post('/penerimaan/simpan_siswa', 'penerimaan_controller@simpan_siswa');
        Route::get('/penerimaan/hapus_siswa', 'penerimaan_controller@hapus_siswa');
        Route::get('/penerimaan/edit_siswa', 'penerimaan_controller@edit_siswa');
        // KONFIRMASI
        Route::get('/penerimaan/konfirmasi', 'penerimaan_controller@konfirmasi');
        Route::get('/penerimaan/datatable_konfirmasi', 'penerimaan_controller@datatable_konfirmasi')->name('datatable_konfirmasi');
        Route::post('/penerimaan/simpan_konfirmasi', 'penerimaan_controller@simpan_konfirmasi');
        Route::get('/penerimaan/hapus_konfirmasi', 'penerimaan_controller@hapus_konfirmasi');
        Route::get('/penerimaan/edit_konfirmasi', 'penerimaan_controller@edit_konfirmasi');
        // DATA SISWA
        Route::get('/penerimaan/rekap_siswa', 'penerimaan_controller@rekap_siswa');
        Route::get('/penerimaan/datatable_rekap_siswa', 'penerimaan_controller@datatable_rekap_siswa')->name('datatable_rekap_siswa');
        Route::post('/penerimaan/simpan_rekap_siswa', 'penerimaan_controller@simpan_rekap_siswa');
        Route::get('/penerimaan/hapus_rekap_siswa', 'penerimaan_controller@hapus_rekap_siswa');
        Route::get('/penerimaan/edit_rekap_siswa', 'penerimaan_controller@edit_rekap_siswa');
        // ALUMNI
        Route::get('/penerimaan/alumni', 'penerimaan_controller@alumni');
        Route::get('/penerimaan/datatable_alumni', 'penerimaan_controller@datatable_alumni')->name('datatable_alumni');
        Route::post('/penerimaan/simpan_alumni', 'penerimaan_controller@simpan_alumni');
        Route::get('/penerimaan/hapus_alumni', 'penerimaan_controller@hapus_alumni');
        Route::get('/penerimaan/edit_alumni', 'penerimaan_controller@edit_alumni');
    // KAS MASUK
        // PEMASUKAN LAIN
        Route::get('/kas_masuk/petty_cash', 'kas_masuk_controller@petty_cash');
        Route::get('/kas_masuk/datatable_petty_cash', 'kas_masuk_controller@datatable_petty_cash')->name('datatable_petty_cash');
        Route::post('/kas_masuk/simpan_petty_cash', 'kas_masuk_controller@simpan_petty_cash');
        Route::get('/kas_masuk/hapus_petty_cash', 'kas_masuk_controller@hapus_petty_cash');
        Route::get('/kas_masuk/edit_petty_cash', 'kas_masuk_controller@edit_petty_cash');
        // PEMBAYARAN SPP
        Route::get('/kas_masuk/spp', 'kas_masuk_controller@spp');
        Route::get('/kas_masuk/datatable_spp', 'kas_masuk_controller@datatable_spp')->name('datatable_spp');
        Route::post('/kas_masuk/simpan_spp', 'kas_masuk_controller@simpan_spp');
        Route::get('/kas_masuk/hapus_spp', 'kas_masuk_controller@hapus_spp');
        Route::get('/kas_masuk/edit_spp', 'kas_masuk_controller@edit_petty_cash');
    // KAS KELUAR
        // RENCANA PEMBELIAN
        Route::get('/kas_keluar/rencana_pembelian', 'kas_keluar_controller@rencana_pembelian');
        Route::get('/kas_keluar/create_rencana_pembelian', 'kas_keluar_controller@create_rencana_pembelian');
        Route::get('/kas_keluar/datatable_rencana_pembelian', 'kas_keluar_controller@datatable_rencana_pembelian')->name('datatable_rencana_pembelian');
        Route::post('/kas_keluar/simpan_rencana_pembelian', 'kas_keluar_controller@simpan_rencana_pembelian');
        Route::get('/kas_keluar/hapus_rencana_pembelian', 'kas_keluar_controller@hapus_rencana_pembelian');
        Route::get('/kas_keluar/edit_rencana_pembelian', 'kas_keluar_controller@edit_rencana_pembelian');
        Route::get('/kas_keluar/nota_rencana_pembelian', 'kas_keluar_controller@nota_rencana_pembelian');
        Route::post('/kas_keluar/update_rencana_pembelian', 'kas_keluar_controller@update_rencana_pembelian');
        Route::post('/kas_keluar/approve_rencana_pembelian', 'kas_keluar_controller@approve_rencana_pembelian');
        Route::get('/kas_keluar/detail_rencana_pembelian', 'kas_keluar_controller@detail_rencana_pembelian');
        // PETTY CASH
        Route::get('/kas_keluar/petty_cash', 'kas_keluar_controller@petty_cash');
        Route::get('/kas_keluar/create_petty_cash', 'kas_keluar_controller@create_petty_cash');
        Route::get('/kas_keluar/datatable_petty_cash', 'kas_keluar_controller@datatable_petty_cash')->name('datatable_petty_cash');
        Route::post('/kas_keluar/simpan_petty_cash', 'kas_keluar_controller@simpan_petty_cash');
        Route::get('/kas_keluar/hapus_petty_cash', 'kas_keluar_controller@hapus_petty_cash');
        Route::get('/kas_keluar/edit_petty_cash', 'kas_keluar_controller@edit_petty_cash');
        Route::get('/kas_keluar/nota_petty_cash', 'kas_keluar_controller@nota_petty_cash');
        Route::post('/kas_keluar/update_petty_cash', 'kas_keluar_controller@update_petty_cash');
    // LAPORAN


});
