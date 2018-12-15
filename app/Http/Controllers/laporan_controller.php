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
      Date::setLocale('id');
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

    public function laba_rugi(Request $req)
    {
      $data = [];
      if (!isset($req->min) or $req->min == '') {
        $req->min = carbon::now()->startOfMonth()->subMonth(1)->format('Y-m-d');
      }else{
        $req->min = carbon::parse($req->min)->startOfMonth()->format('Y-m-d');
      }

      if (!isset($req->max) or $req->max == '') {
        $req->max = carbon::now()->endOfMonth()->format('Y-m-d');
      }else{
        $req->max = carbon::parse($req->max)->endOfMonth()->format('Y-m-d');
      }

      if (!isset($req->sekolah)) {
        $req->sekolah = '';
      }

      if (Auth::user()->akses('LAPORAN LABA RUGI','sekolah')) {
        if ($req->sekolah != '') {
          $j_sekolah = 'and j_sekolah = '."'$req->sekolah'";
        }else{
          $j_sekolah = '';
        }

        if ($req->sekolah != '') {
          $a_sekolah = 'and a_sekolah = '."'$req->sekolah'";
        }else{
          $a_sekolah = '';
        }
      }else{
        $sekolah = Auth::user()->sekolah_id;
        $j_sekolah = 'and j_sekolah = '."'$sekolah'";
        $a_sekolah = 'and a_sekolah = '."'$sekolah'";
      }
       

      $data['jurnal'] = $this->models->jurnal()
                                   ->whereRaw("j_tanggal >= '$req->min' and j_tanggal <= '$req->max' $j_sekolah")
                                   ->orderBy('j_tanggal','DESC')
                                   ->get();

      $data['akun'] = $this->models->akun()
                                   ->whereRaw("a_id != 'null' $a_sekolah")
                                   ->get();

      $data['sekolah'] = $this->models->sekolah()
                              ->get();

      $data['head'] = [];
      $data['bulan'] = [];
      for ($i=0; $i < count($data['jurnal']); $i++) { 
        $data['bulan'][$i] = Date::parse($data['jurnal'][$i]->j_tanggal)->format('F Y');
        $data['head'][$i]  = carbon::parse($data['jurnal'][$i]->j_tanggal)->format('Y-m');
      }

      $data['head'] = array_unique($data['head']);
      $data['head'] = array_values($data['head']);
      $data['bulan'] = array_unique($data['bulan']);
      $data['bulan'] = array_values($data['bulan']);

      $min = $req->min;
      $max = $req->max;

      return view('laporan.laba_rugi.laba_rugi',compact('data','min','max'));
    }
}
