<?php

namespace App\child;

use Illuminate\Database\Eloquent\Model;

class staff extends Model
{
    protected $table = 'd_staff';
	protected $primaryKey = 'st_id';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';

	protected $fillable = [
						   'st_id',
						   'st_nama',
						   'st_alamat',
						   'st_tanggal_lahir',
						   'st_tempat_lahir',
						   'st_telpon',
						   'st_image',
						   'st_posisi',
						   'created_by',
						   'updated_by',
						];

	public function posisi()
    {
        return $this->belongsTo('App\child\posisi','st_posisi','p_id');
    }

}
