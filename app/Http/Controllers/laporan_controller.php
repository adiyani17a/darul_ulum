<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Yajra\Datatables\Datatables;
use DB;
use carbon\carbon;
use Session;
use App\child\hak_akses;
use Illuminate\Support\Facades\Crypt;
use App\all_model;
use App\models;
use Exception;
use Response;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Hash;
use PDF;
use Jenssegers\Date\Date;

class laporan_controller extends Controller
{

    protected $model;
    protected $models;
    // JABATAN]

    public function __construct()
    {
      $this->model = new all_model();
      $this->models = new models();
    }

    public function register_jurnal(Request $req)
    {
      if (!isset($req->min) or $req->min == '') {
        $req->min = carbon::now()->startOfMonth()->subMonth(1)->format('Y-m-d');
      }

      if (!isset($req->max) or $req->max == '') {
        $req->max = carbon::now()->endOfMonth()->format('Y-m-d');
      }

      if (!isset($req->j_type)) {
        $req->j_type = '';
      }

      if ($req->j_type != '') {
        $j_type = 'and j_type = '."'$req->j_type'";
      }else{
        $j_type = '';
      }

      if (Auth::user()->akses('LAPORAN REGISTER JURNAL','sekolah')) {
        $data = $this->models->jurnal()->whereRaw("j_tanggal >= '$req->min' and j_tanggal <= '$req->max' $j_type")
                                     ->get();
      }else{
        $sekolah = Auth::user()->sekolah;
        $data = $this->models->jurnal()->whereRaw("j_tanggal >= '$req->min' and j_tanggal <= '$req->max' and j_sekolah = '$sekolah' $j_type")
                                     ->get();
      }

      $min = $req->min;
      $max = $req->max;

      if ($req->j_type == '') {
        $j_type = 'Semua Type';
      }else{
        $j_type = $req->j_type;
      }

    	return view('laporan.register_jurnal.register_jurnal',compact('data','min','max','j_type'));
    }
}
