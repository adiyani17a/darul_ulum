<?php

namespace App\child;

use Illuminate\Database\Eloquent\Model;

class sekolah extends Model
{
    protected $table = 'd_sekolah';
	protected $primaryKey = 's_id';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';

	protected $fillable = ['s_id',
						   's_nama',
						   's_alamat',
						   's_telpon',
						   's_logo',
						];

	public function user()
	{
        return $this->hasMany('App\User','jabatan_id');
	}

	public function hak_akses()
	{
        return $this->hasMany('App\child\hak_akses','ha_level');
	}
}
