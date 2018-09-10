<?php

namespace App\child;

use Illuminate\Database\Eloquent\Model;

class grup_menu extends Model
{
    protected $table = 'd_grup_menu';
	protected $primaryKey = 'gm_id';
	public $timestamps = false;

	protected $fillable = ['gm_id',
						   'gm_nama',
						];

	public function daftar_menu()
	{
        return $this->hasMany('App\child\daftar_menu','dm_group');
	}
}
