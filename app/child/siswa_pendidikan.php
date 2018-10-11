<?php

namespace App\child;

use Illuminate\Database\Eloquent\Model;

class siswa_pendidikan extends Model
{
    protected $table = 'd_siswa_pendidikan';
	protected $primaryKey = 'si_id';
	public $timestamps = false;

	protected $fillable = ['sp_id',
						   'sp_detail',
						   'sp_tingkat_pendidikan',
						   'sp_nama_sekolah',
						   'sp_keterangan',
						   'sp_ijazah',
						   'sp_tanggal_ijazah',
						];

	public function siswa_data_diri()
	{
        return $this->belongsTo('App\child\siswa_data_diri','sp_id','sdd_id');
	}
}
