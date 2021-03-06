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
						   'bkkd_pcd_detail',
						   'bkkd_keterangan',
						   'bkkd_qty',
						   'bkkd_harga_awal',
						   'bkkd_harga',
						   'bkkd_jenis',
						   'bkkd_akun',
						   'bkkd_image',
						];


    public function bukti_kas_keluar()
    {
        return $this->belongsTo('App\child\bukti_kas_keluar','bkkd_id','bkk_id');
    }

    public function akun()
    {
        return $this->belongsTo('App\child\akun','bkkd_akun','a_master_akun');
    }
}
