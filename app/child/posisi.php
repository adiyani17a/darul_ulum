<?php

namespace App\child;

use Illuminate\Database\Eloquent\Model;

class posisi extends Model
{
    protected $table = 'd_posisi';
	protected $primaryKey = 'p_id';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';

	protected $fillable = [
						   'p_id',
						   'p_nama',
						   'p_gaji',
						];

	public function staff()
	{
        return $this->hasMany('App\child\staff','st_posisi');
	}
}
