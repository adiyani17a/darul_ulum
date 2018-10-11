<?php

namespace App\child;

use Illuminate\Database\Eloquent\Model;

class siswa_ayah extends Model
{
    protected $table = 'd_siswa_ayah';
	protected $primaryKey = 'sa_id';
	public $timestamps = false;

	protected $fillable = ['sa_id',
						   'sa_nama',
						   'sa_tempat_lahir',
						   'sa_tanggal_lahir',
						   'sa_agama',
						   'sa_kewarganegaraan',
						   'sa_pendidikan',
						   'sa_pekerjaan',
						   'sa_penghasilan',
						   'sa_alamat',
						   'sa_telpon',
						   'sa_status',
						];

	public function siswa_data_diri()
	{
        return $this->hasOne('App\child\siswa_data_diri','sa_id');
	}
}
