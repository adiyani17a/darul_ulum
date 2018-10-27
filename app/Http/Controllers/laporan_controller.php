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
    public function register_jurnal(Request $req)
    {

  //   	if ($req->sdd_sekolah != '') {
  //         $sdd_sekolah = 'and sdd_sekolah = '."'$req->sdd_sekolah'";
  //       }else{
  //         $sdd_sekolah = '';
  //       }

  //       if ($req->sdd_kelas != '') {
  //         $sdd_kelas = 'and sdd_kelas = '."'$req->sdd_kelas'";
  //       }else{
  //         $sdd_kelas = '';
  //       }

  //       if ($req->sdd_nama_kelas != '') {
  //         $sdd_nama_kelas = 'and sdd_nama_kelas = '."'$req->sdd_nama_kelas'";
  //       }else{
  //         $sdd_nama_kelas = '';
  //       }

  //       if ($req->sdd_tahun_ajaran != '') {
  //         $sdd_tahun_ajaran = 'and sdd_tahun_ajaran = '."'$req->sdd_tahun_ajaran'";
  //       }else{
  //         $sdd_tahun_ajaran = '';
  //       }


		// if (Auth::user()->akses('LAPORAN REGISTER JURNAL','global')) {
		// 	$data = $this->models->jurnal()->whereRaw("sdd_status = 'Setujui' $sdd_kelas $sdd_nama_kelas $sdd_tahun_ajaran")->get();
		// }else{
		// 	$sekolah = Auth::User()->sekolah_id;
		// 	$data = $this->models->siswa_data_diri()->where('sdd_sekolah',$sekolah)->whereRaw("sdd_status = 'Setujui' $sdd_kelas $sdd_nama_kelas $sdd_tahun_ajaran")->get();
		// }


    	return view('laporan.register_jurnal.register_jurnal');
    }
}
