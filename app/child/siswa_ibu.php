<?php

namespace App\child;

use Illuminate\Database\Eloquent\Model;

class siswa_ibu extends Model
{
    protected $table = 'd_siswa_ibu';
	protected $primaryKey = 'si_id';
	public $timestamp = false;

	protected $fillable = ['si_id',
						   'si_nama',
						   'si_tempat_lahir',
						   'si_tanggal_lahir',
						   'si_agama',
						   'si_kewarganegaraan',
						   'si_pendidikan',
						   'si_pekerjaan',
						   'si_penghasilan',
						   'si_alamat',
						   'si_telpon',
						   'si_status',
						];

	public function siswa_data_diri()
	{
        return $this->hasOne('App\child\siswa_data_diri','si_id');
	}
}
