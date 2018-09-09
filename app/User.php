<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    protected $fillable = [
        'id',
        'name',
        'username', 
        'email', 
        'password',
        'jabatan_id',
        'image',
        'remember_token',
        'last_login'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */


    protected $hidden = [
        'password', 'remember_token',
    ];

    public function jabatan($value='')
    {
        return $this->belongsTo('App\child\jabatan','jabatan_id','j_id');
    }

    public function akses($fitur,$aksi){
      // select * from  join  on = where ubah =true

        $cek = DB::table('d_mem')
                ->join('d_hak_akses', 'm_jabatan', '=', 'ha_level')
                ->where('ha_menu', '=', $fitur)
                ->where($aksi, '=', 1) 
                ->where('m_id', '=', Auth::user()->m_id)             
                ->get();  

        $cek = App\User::join('d_hak_akses', 'jabatan_id', '=', 'ha_level')
                           ->where('ha_menu', '=', $fitur)
                           ->where($aksi, '=', 1) 
                           ->where('id', '=', Auth::user()->id)             
                           ->get();  


        if(count($cek) != 0)
            return true;
        else
            return false;
    }
}
