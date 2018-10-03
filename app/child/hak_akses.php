<?php

namespace App\child;

use Illuminate\Database\Eloquent\Model;

class hak_akses extends Model
{
    protected $table = 'd_hak_akses';
	protected $primaryKey = 'ha_id';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';

	protected $fillable = ['ha_id',
						   'ha_dt',
						   'ha_level',
						   'ha_menu',
						   'aktif',
						   'tambah',
						   'ubah',
						   'hapus',
						   'print',
						   'sekolah',
						   'global',
						];

	public function jabatan()
    {
        return $this->belongsTo('App\child\jabatan','ha_level','j_id');
    }

    public function daftar_menu()
    {
        return $this->belongsTo('App\child\daftar_menu','ha_menu','dm_nama');
    }

    
}
