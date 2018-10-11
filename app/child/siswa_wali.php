<?php

namespace App\child;

use Illuminate\Database\Eloquent\Model;

class siswa_wali extends Model
{
    protected $table = 'd_siswa_wali';
	protected $primaryKey = 'sw_id';
	public $timestamps = false;

	protected $fillable = ['sw_id',
						   'sw_nama',
						   'sw_tempat_lahir',
						   'sw_tanggal_lahir',
						   'sw_agama',
						   'sw_kewarganegaraan',
						   'sw_pendidikan',
						   'sw_pekerjaan',
						   'sw_penghasilan',
						   'sw_alamat',
						   'sw_telpon',
						   'sw_status',
						];

	public function siswa_data_diri()
	{
        return $this->hasOne('App\child\siswa_data_diri','sw_id');
	}
}
