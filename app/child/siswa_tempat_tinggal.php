<?php

namespace App\child;

use Illuminate\Database\Eloquent\Model;

class siswa_tempat_tinggal extends Model
{
    protected $table = 'd_siswa_tempat_tinggal';
	protected $primaryKey = 'stt_id';
	public $timestamps = false;

	protected $fillable = ['stt_id',
						   'stt_alamat',
						   'stt_no_telp',
						   'stt_status_tempat_tinggal',
						   'stt_jarak_rumah',
						];

	public function siswa_data_diri()
	{
        return $this->belongsTo('App\child\siswa_data_diri','sp_id','sdd_id');
	}
}
