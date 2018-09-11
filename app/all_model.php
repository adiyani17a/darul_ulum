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
use App\child\group_akun;
use App\child\petty_cash;
use App\child\petty_cash_detail;
use App\Repositories\TestRepo;

class all_model extends Model
{
	public function jabatan()
	{
		$jabatan = new jabatan();
        return $jabatan = new TestRepo($jabatan);
	}

	public function user()
	{
		$user = new User();
        return $user = new TestRepo($user);
	}

	public function hak_akses()
	{
		$hak_akses = new hak_akses();
        return $hak_akses = new TestRepo($hak_akses);
	}

	public function daftar_menu()
	{
		$daftar_menu = new daftar_menu();
        return $daftar_menu = new TestRepo($daftar_menu);
	}

	public function grup_menu()
	{
		$grup_menu = new grup_menu();
        return $grup_menu = new TestRepo($grup_menu);
	}

	public function sekolah()
	{
		$sekolah = new sekolah();
        return $sekolah = new TestRepo($sekolah);
	}

	public function posisi()
	{
		$posisi = new posisi();
        return $posisi = new TestRepo($posisi);
	}

	public function staff()
	{
		$staff = new staff();
        return $staff = new TestRepo($staff);
	}

	public function akun()
	{
		$akun = new akun();
        return $akun = new TestRepo($akun);
	}

	public function jurnal()
	{
		$jurnal = new jurnal();
        return $jurnal = new TestRepo($jurnal);
	}

	public function jurnal_dt()
	{
		$jurnal_dt = new jurnal_dt();
        return $jurnal_dt = new TestRepo($jurnal_dt);
	}

	public function group_akun()
	{
		$group_akun = new group_akun();
        return $group_akun = new TestRepo($group_akun);
	}

	public function petty_cash()
	{
		$petty_cash = new petty_cash();
        return $petty_cash = new TestRepo($petty_cash);
	}

	public function petty_cash_detail()
	{
		$petty_cash_detail = new petty_cash_detail();
        return $petty_cash_detail = new TestRepo($petty_cash_detail);
	}
}
