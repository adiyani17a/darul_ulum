<?php

namespace App\child;

use Illuminate\Database\Eloquent\Model;

class rencana_pembelian_d extends Model
{
    protected $table = 'd_rencana_pembelian_detail';
	protected $primaryKey = 'rp_id';
	public $timestamps = false;

	protected $fillable = [
						   'rpd_id',
						   'rpd_detail',
						   'rpd_barang',
						   'rpd_jumlah',
						   'rpd_sisa',
						];

	public function barang()
    {
        return $this->belongsTo('App\child\barang','rpd_barang','b_id');
    }

    public function rencana_pembelian()
    {
        return $this->belongsTo('App\child\rencana_pembelian','rpd_id','rp_id');
    }
}
