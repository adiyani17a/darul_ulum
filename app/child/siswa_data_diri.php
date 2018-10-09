<?php

namespace App\child;

use Illuminate\Database\Eloquent\Model;

class siswa_data_diri extends Model
{
    protected $table = 'd_siswa_data_diri';
	protected $primaryKey = 'sdd_id';
    const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';

	protected $fillable = ['sdd_id',
						   'sdd_nama',
						   'sdd_nomor_induk',
						   'sdd_nomor_induk_nasional',
						   'sdd_panggilan',
						   'sdd_jenis_kelamin',
						   'sdd_tempat_lahir',
						   'sdd_tanggal_lahir',
						   'sdd_tinggi',
						   'sdd_berat',
						   'sdd_agama',
						   'sdd_urutan_anak',
						   'sdd_saudara_kandung',
						   'sdd_saudara_tiri',
						   'sdd_bahasa',
						   'sdd_tempat_tinggal',
						   'sdd_image',
						   'sdd_jenjang',
						   'sdd_sekolah',
						   'created_by',
						   'updated_by',
						];

	public function siswa_ayah()
	{
        return $this->hasOne('App\child\siswa_ayah','sdd_diri');
	}

	public function sekolah()
    {
        return $this->belongsTo('App\child\sekolah','sdd_sekolah','s_id');
    }
}
