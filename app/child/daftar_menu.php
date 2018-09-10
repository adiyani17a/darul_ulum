<?php

namespace App\child;

use Illuminate\Database\Eloquent\Model;

class daftar_menu extends Model
{
    protected $table = 'd_daftar_menu';
	protected $primaryKey = 'dm_id';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';

	protected $fillable = [
						   'dm_id',
						   'dm_nama',
						   'dm_group',
						];


	public function hak_akses()
	{
        return $this->hasMany('App\child\hak_akses','ha_menu');
	}

	public function grup_menu()
    {
        return $this->belongsTo('App\child\grup_menu','dm_group','gm_id');
    }
}
