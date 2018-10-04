<?php

namespace App\child;

use Illuminate\Database\Eloquent\Model;

class group_spp extends Model
{
    protected $table = 'd_group_spp';
	protected $primaryKey = 'gs_id';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';

	protected $fillable = [
						   'gs_id',
		                   'gs_nama',
						   'gs_keterangan',
						   'gs_nilai',
						   'created_by',
						   'updated_by',
						  ];

	public function siswa()
	{
        return $this->hasMany('App\child\siswa','s_id');
	}
}
