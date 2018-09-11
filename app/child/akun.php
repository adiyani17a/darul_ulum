<?php

namespace App\child;

use Illuminate\Database\Eloquent\Model;

class akun extends Model
{
    protected $table = 'd_akun';
	protected $primaryKey = 'a_id';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';

	protected $fillable = [
		                   'a_id',
						   'a_nama',
						   'a_sekolah',
						   'a_type_akun',
						   'a_akun_dka',
						   'a_aktif',
						   'a_group_neraca',
						   'a_group_laba_rugi',
						   'a_saldo_awal',
						   'a_tanggal_pembuka',
						   'a_master_akun',
						   'a_master_nama',
						   'created_by',
						   'updated_by',
						  ];

	public function jurnal_dt()
	{
        return $this->hasMany('App\child\jurnal_dt','jd_id');
	}

	public function sekolah()
    {
        return $this->belongsTo('App\child\sekolah','a_sekolah','s_id');
    }

    public function group_neraca()
    {
        return $this->belongsTo('App\child\group_akun','ga_id','a_group_neraca');
    }

    public function group_laba_rugi()
    {
        return $this->belongsTo('App\child\group_akun','ga_id','a_group_laba_rugi');
    }
}
