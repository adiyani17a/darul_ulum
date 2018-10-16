<?php

namespace App\child;

use Illuminate\Database\Eloquent\Model;

class history_spp extends Model
{
    protected $table = 'd_history_spp';
	protected $primaryKey = 'hs_id';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';

	protected $fillable = ['hs_id',
						   'hs_detail',
						   'hs_tanggal',
						   'hs_keterangan',
						   'hs_akun',
						   'hs_akun_kas',
						   'hs_jumlah',
						   'created_by',
						   'updated_at',
						];

	public function siswa_data_diri()
	{
        return $this->belongsTo('App\child\siswa_data_diri','hs_id');
	}
}
