<?php

namespace App\child;

use Illuminate\Database\Eloquent\Model;

class jabatan extends Model
{
    protected $table = 'd_jabatan';
	protected $primaryKey = 'j_id';
	const CREATED_AT = 'j_created_at';
	const UPDATED_AT = 'j_updated_at';

	protected $fillable = ['j_id',
						   'j_nama',
						   'j_keterangan',
						   'j_created_by',
						   'j_updated_by',
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
