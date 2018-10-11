<?php

namespace App\child;

use Illuminate\Database\Eloquent\Model;

class siswa_kesehatan extends Model
{
    protected $table = 'd_siswa_kesehatan';
	protected $primaryKey = 'si_id';
	public $timestamps = false;

	protected $fillable = ['sk_id',
						   'sk_detail',
						   'sk_nama_penyakit',
						   'sk_keterangan'
						];

	public function siswa_data_diri()
	{
        return $this->belongsTo('App\child\siswa_data_diri','sk_id','sdd_id');
	}
}
