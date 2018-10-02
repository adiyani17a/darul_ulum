<?php

namespace App\child;

use Illuminate\Database\Eloquent\Model;

class kas_masuk extends Model
{
    protected $table = 'd_kas_masuk';
	protected $primaryKey = 'km_id';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';

	protected $fillable = [
                           'km_id',
						   'km_sekolah',
						   'km_nota',
						   'km_akun_kas',
						   'km_ref',
						   'km_keterangan',
						   'km_total',
                           'km_tanggal',
						   'km_status',
						   'created_by',
						   'updated_by',
						];

	public function kas_masuk_detail()
    {
        return $this->hasMany('App\child\petty_cash_detail','pcd_id');
    }

    public function rencana_pembelian()
    {
        return $this->belongsTo('App\child\rencana_pembelian','pc_ref','rp_kode');
    }

    public function sekolah()
    {
        return $this->belongsTo('App\child\sekolah','km_sekolah','s_id');
    }

    public function akun()
    {
        return $this->belongsTo('App\child\akun','pc_akun_kas','a_master_akun');
    }
}
