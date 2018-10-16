<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\child\jabatan;
use App\child\hak_akses;
use App\child\daftar_menu;
use App\child\grup_menu;
use App\child\sekolah;
use App\child\posisi;
use App\child\staff;
use App\child\jurnal;
use App\child\jurnal_dt;
use App\child\akun;
use App\child\petty_cash;
use App\child\petty_cash_detail;
use App\child\barang;
use App\child\rencana_pembelian;
use App\child\rencana_pembelian_d;
use App\child\bukti_kas_keluar;
use App\child\bukti_kas_keluar_detail;
use App\child\kas_masuk;
use App\child\kas_masuk_detail;
use App\child\group_spp;
use App\child\siswa_ayah;
use App\child\siswa_ibu;
use App\child\siswa_wali;
use App\child\siswa_data_diri;
use App\child\siswa_kesehatan;
use App\child\siswa_pendidikan;
use App\child\siswa_tempat_tinggal;
use App\child\history_spp;
class models extends Model
{
    public function jabatan()
	{
		return $jabatan = new jabatan();
	}

	public function user()
	{
		return $user = new User();
	}

	public function hak_akses()
	{
		return $hak_akses = new hak_akses();
	}

	public function daftar_menu()
	{
		return $daftar_menu = new daftar_menu();
	}

	public function grup_menu()
	{
		return $grup_menu = new grup_menu();
	}

	public function sekolah()
	{
		return $sekolah = new sekolah();
	}

	public function posisi()
	{
		return $posisi = new posisi();
	}

	public function staff()
	{
		return $staff = new staff();
	}

	public function akun()
	{
		return $akun = new akun();
	}

	public function jurnal()
	{
		return $jurnal = new jurnal();
	}

	public function jurnal_dt()
	{
		return $jurnal_dt = new jurnal_dt();
	}

	public function petty_cash()
	{
		return $petty_cash = new petty_cash();
	}

	public function petty_cash_detail()
	{
		return $petty_cash_detail = new petty_cash_detail();
	}

	public function barang()
	{
		return $barang = new barang();
	}

	public function rencana_pembelian()
	{
		return $rencana_pembelian = new rencana_pembelian();
	}

	public function rencana_pembelian_d()
	{
		return $rencana_pembelian_d = new rencana_pembelian_d();
	}

	public function bukti_kas_keluar()
	{
		return $bukti_kas_keluar = new bukti_kas_keluar();
	}

	public function bukti_kas_keluar_detail()
	{
		return $bukti_kas_keluar_detail = new bukti_kas_keluar_detail();
	}

	public function kas_masuk()
	{
		return $kas_masuk = new kas_masuk();
	}

	public function kas_masuk_detail()
	{
		return $kas_masuk_detail = new kas_masuk_detail();
	}

	public function group_spp()
	{
		return $group_spp = new group_spp();
	}

	public function siswa_ayah()
	{
		return $siswa_ayah = new siswa_ayah();
	}

	public function siswa_ibu()
	{
		return $siswa_ibu = new siswa_ibu();
	}

	public function siswa_wali()
	{
		return $siswa_wali = new siswa_wali();
	}

	public function siswa_data_diri()
	{
		return $siswa_data_diri = new siswa_data_diri();
	}

	public function siswa_kesehatan()
	{
		return $siswa_kesehatan = new siswa_kesehatan();
	}

	public function siswa_pendidikan()
	{
		return $siswa_pendidikan = new siswa_pendidikan();
	}

	public function siswa_tempat_tinggal()
	{
		return $siswa_tempat_tinggal = new siswa_tempat_tinggal();
	}

	public function history_spp()
	{
		return $history_spp = new history_spp();
	}

	public function check_jurnal($nota)
	{
		$data = jurnal::where('j_ref',$nota)->first();
		$d = 0;
		$k = 0;
		for ($i=0; $i < count($data->jurnal_dt); $i++) { 
			if ($data->jurnal_dt[$i]->jd_statusdk == 'DEBET') {
				if ($data->jurnal_dt[$i]->jd_value < 0) {
					$temp = $data->jurnal_dt[$i]->jd_value * -1;
				}else{
					$temp = $data->jurnal_dt[$i]->jd_value;
				}

				$d+=$temp;
			}else{
				if ($data->jurnal_dt[$i]->jd_value < 0) {
					$temp = $data->jurnal_dt[$i]->jd_value * -1;
				}else{
					$temp = $data->jurnal_dt[$i]->jd_value;
				}

				$k+=$temp;
			}
		}
		if ($d == $k) {
			return 1;
		}else{
			return 0;
		}
	}
}
