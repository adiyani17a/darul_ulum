<?php

namespace App\child;

use Illuminate\Database\Eloquent\Model;

class kelas extends Model
{
    protected $table = 'd_kelas';
	protected $primaryKey = 'k_id';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';

	protected $fillable = ['k_id',
						   'k_nama',
						   'k_keterangan',
						   'created_by',
						   'updated_by',
						];

}
