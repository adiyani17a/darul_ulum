<?php

namespace App\child;

use Illuminate\Database\Eloquent\Model;

class bukti_kas_keluar_detail extends Model
{
    protected $table = 'd_bukti_kas_keluar_detail';
	protected $primaryKey = 'bkkd_id';
	public $timestamps = false;

	protected $fillable = [
						   'bkkd_id',
						   'bkkd_detail',
						   'bkkd_keterangan',
						   'bkkd_harga',
						   'bkkd_jenis',
						   'bkkd_akun',
						   'bkkd_image',
						];


    public function bukti_kas_keluar()
    {
        return $this->belongsTo('App\child\bukti_kas_keluar','bkkd_id','bkk_id');
    }
}
