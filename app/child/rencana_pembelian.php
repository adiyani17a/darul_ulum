<?php

namespace App\child;

use Illuminate\Database\Eloquent\Model;

class rencana_pembelian extends Model
{
    protected $table = 'd_rencana_pembelian';
	protected $primaryKey = 'rp_id';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';

	protected $fillable = [
						   'rp_id',
						   'rp_kode',
						   'rp_tahun',
						   'rp_tanggal',
						   'rp_keterangan',
						   'rp_total',
						   'rp_status',
						   'rp_sekolah',
						   'created_by',
						   'updated_by',
						];

	public function rencana_pembelian_d()
	{
        return $this->hasMany('App\child\rencana_pembelian_d','rpd_id');
	}

	public function sekolah()
    {
        return $this->belongsTo('App\child\sekolah','rp_sekolah','s_id');
    }
}
