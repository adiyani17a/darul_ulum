<?php

namespace App\child;

use Illuminate\Database\Eloquent\Model;

class jurnal extends Model
{
    protected $table = 'd_jurnal';
	protected $primaryKey = 'j_id';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';

	protected $fillable = [
		                   'j_id',
						   'j_tahun',
						   'j_tanggal',
						   'j_keterangan',
						   'j_sekolah',
						   'j_ref',
						   'j_type',
						   'j_detail',
						   'created_by',
						   'updated_by',
						  ];

	public function jurnal_dt()
	{
        return $this->hasMany('App\child\jurnal_dt','jd_id');
	}
}
