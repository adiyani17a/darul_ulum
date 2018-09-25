<?php

namespace App\child;

use Illuminate\Database\Eloquent\Model;

class bukti_kas_keluar extends Model
{
    protected $table = 'd_bukti_kas_keluar';
	protected $primaryKey = 'bkk_id';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';

	protected $fillable = [
						   'bkk_id',
						   'bkk_pc_ref',
						   'bkk_sisa_kembali',
						   'bkk_keterangan',
						   'bkk_sekolah',
						   'bkk_tanggal',
						   'bkk_status_print',
						   'created_by',
						   'updated_by',
						];

	public function bukti_kas_keluar_detail()
    {
        return $this->hasMany('App\child\bukti_kas_keluar_detail','bkkd_id');
    }

    public function petty_cash()
    {
        return $this->belongsTo('App\child\petty_cash','bkk_pc_ref','pc_nota');
    }

    public function sekolah()
    {
        return $this->belongsTo('App\child\sekolah','bkk_sekolah','s_id');
    }
}
