<?php

namespace App\child;

use Illuminate\Database\Eloquent\Model;

class siswa_data_diri_copy extends Model
{
    protected $table = 'd_siswa_data_diri_copy';
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
						   'sdd_golongan_darah',
						   'sdd_jenjang_sebelumnya',
						   'sdd_berat',
						   'sdd_agama',
						   'sdd_urutan_anak',
						   'sdd_saudara_kandung',
						   'sdd_kewarganegaraan',
						   'sdd_saudara_tiri',
						   'sdd_saudara_angkat',
						   'sdd_bahasa',
						   'sdd_tempat_tinggal',
						   'sdd_image',
						   'sdd_jenjang',
						   'sdd_sekolah',
						   'sdd_status',
						   'sdd_status_siswa',
						   'sdd_group_spp',
						   'sdd_kelas',
						   'sdd_nama_kelas',
						   'sdd_jurusan',
						   'sdd_tahun_ajaran',
						   'sdd_kartu_sosial',
						   'created_by',
						   'updated_by',
						];

	public function siswa_ayah()
	{
        return $this->hasMany('App\child\siswa_ayah','sa_id');
	}

	public function siswa_ibu()
	{
        return $this->hasMany('App\child\siswa_ibu','si_id');
	}

	public function siswa_wali()
	{
        return $this->hasMany('App\child\siswa_wali','sw_id');
	}

	public function siswa_kesehatan()
	{
        return $this->hasMany('App\child\siswa_kesehatan','sk_id');
	}

	public function siswa_pendidikan()
	{
        return $this->hasMany('App\child\siswa_pendidikan','sp_id');
	}

	public function siswa_tempat_tinggal()
	{
        return $this->hasMany('App\child\siswa_tempat_tinggal','stt_id');
	}

	public function history_spp()
	{
        return $this->hasMany('App\child\history_spp','hs_id');
	}

	public function sekolah()
    {
        return $this->belongsTo('App\child\sekolah','sdd_sekolah','s_id');
    }

    public function group_spp()
    {
        return $this->belongsTo('App\child\group_spp','sdd_group_spp','gs_id');
    }

    public function kelas()
    {
        return $this->belongsTo('App\child\group_spp','sdd_nama_kelas','k_id');
    }
}
