<?php

namespace App\child;

use Illuminate\Database\Eloquent\Model;

class jurnal_dt extends Model
{
    protected $table = 'd_jurnal_dt';
	protected $primaryKey = 'jd_id';
	public $timestamps = false;

	protected $fillable = [
		                   'jd_id',
						   'jd_detail',
						   'jd_akun',
						   'jd_keterangan',
						   'jd_statusdk',
						   'jd_value',
						  ];

	public function akun()
    {
        return $this->belongsTo('App\child\akun','jd_akun','a_id');
    }

	public function jurnal()
    {
        return $this->belongsTo('App\child\jurnal','jd_id','j_id');
    }
}
