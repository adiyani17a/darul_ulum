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
      if (!isset($req->min)) {
        $req->min = carbon::now()->startOfMonth()->subMonth(1)->format('Y-m-d');
      }

      if (!isset($req->max)) {
        $req->max = carbon::now()->endOfMonth()->format('Y-m-d');
      }

      if (Auth::user()->akses('LAPORAN REGISTER JURNAL','sekolah')) {
        $data = $this->models->jurnal()->whereRaw("j_tanggal >= '$req->min' and j_tanggal <= '$req->max'")
                                     ->get();
      }else{
        $sekolah = Auth::user()->sekolah;
        $data = $this->models->jurnal()->whereRaw("j_tanggal >= '$req->min' and j_tanggal <= '$req->max' and j_sekolah = '$sekolah'")
                                     ->get();
      }
      $min = $req->min;
      $max = $req->max;

    	return view('laporan.register_jurnal.register_jurnal',compact('data','min','max'));
    }
}
