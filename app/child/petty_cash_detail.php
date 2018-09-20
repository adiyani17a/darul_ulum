<?php

namespace App\child;

use Illuminate\Database\Eloquent\Model;

class petty_cash_detail extends Model
{
    protected $table = 'd_petty_cash_detail';
	protected $primaryKey = 'pcd_id';
	public $timestamps = false;

	protected $fillable = [
						   'pcd_id',
						   'pcd_detail',
						   'pcd_akun_biaya',
						   'pcd_keterangan',
						   'pcd_jumlah',
						   'pcd_qty',
						];

	public function petty_cash()
    {
        return $this->belongsTo('App\child\petty_cash','pcd_id','pc_id');
    }

    public function akun()
    {
        return $this->belongsTo('App\child\akun','pcd_akun_biaya','a_master_akun');
    }
}
