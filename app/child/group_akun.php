<?php

namespace App\child;

use Illuminate\Database\Eloquent\Model;

class group_akun extends Model
{
    protected $table = 'd_group_akun';
	protected $primaryKey = 'ga_id';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';

	protected $fillable = [
						   'ga_id',
		                   'ga_nama',
						   'ga_jenis_group',
						   'ga_jenis_neraca',
						   'created_by',
						   'updated_by',
						  ];

	public function group_neraca()
	{
        return $this->hasMany('App\child\akun','a_group_neraca');
	}

	public function group_laba_rugi()
	{
        return $this->hasMany('App\child\akun','a_group_laba_rugi');
	}

}
