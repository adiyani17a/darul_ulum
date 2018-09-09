<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\child\jabatan;
use App\child\hak_akses;
use App\child\daftar_menu;
use App\child\grup_menu;

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
}
