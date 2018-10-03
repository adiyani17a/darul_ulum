<?php

namespace App\child;

use Illuminate\Database\Eloquent\Model;

class kas_masuk_detail extends Model
{
    protected $table = 'd_kas_masuk_detail';
	protected $primaryKey = 'kmd_id';
	public $timestamps = false;

	protected $fillable = [
                           'kmd_id',
						   'kmd_detail',
						   'kmd_total',
						   'kmd_akun_pendapatan',
						   'kmd_keterangan',
						];

	public function kas_masuk()
    {
        return $this->belongsTo('App\child\kas_masuk','km_id');
    }

    public function akun()
    {
        return $this->belongsTo('App\child\akun','kmd_akun_pendapatan','a_master_akun');
    }
}
