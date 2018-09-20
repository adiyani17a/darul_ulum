<?php

namespace App\child;

use Illuminate\Database\Eloquent\Model;

class petty_cash extends Model
{
    protected $table = 'd_petty_cash';
	protected $primaryKey = 'pc_id';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';

	protected $fillable = [
						   'pc_id',
						   'pc_nota',
						   'pc_akun_kas',
						   'pc_keterangan',
						   'pc_pemohon',
						   'pc_sekolah',
						   'pc_tanggal',
						   'pc_total',
						   'pc_status',
						   'pc_jenis',
						   'created_by',
						   'updated_by',
						];

	public function petty_cash_detail()
    {
        return $this->hasMany('App\child\petty_cash_detail','pcd_id');
    }

    public function sekolah()
    {
        return $this->belongsTo('App\child\sekolah','pc_sekolah','s_id');
    }

    public function akun()
    {
        return $this->belongsTo('App\child\akun','pc_akun_kas','a_master_akun');
    }
}
