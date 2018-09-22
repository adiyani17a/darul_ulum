<?php

namespace App\child;

use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    protected $table = 'd_barang';
	protected $primaryKey = 'b_id';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';

	protected $fillable = [
						   'b_id',
						   'b_nama',
						   'b_keterangan',
						   'b_harga_tertinggi',
						   'b_akun',
						   'created_by',
						   'updated_by',
						];

}
