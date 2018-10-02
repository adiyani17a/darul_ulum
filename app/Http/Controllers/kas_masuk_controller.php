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
class kas_masuk_controller extends Controller
{
    protected $model;
	protected $models;

	public function __construct()
	{
    	$this->model = new all_model();
		$this->models = new models();
	}

	public function dana_bos()
	{
		return view('kas_masuk.dana_bos.dana_bos');
	}

	public function datatable_dana_bos()
	{
		$data = $this->model->kas_masuk()->all();
		// return $data;
		$data = collect($data);
		return Datatables::of($data)
		                ->addColumn('aksi', function ($data) {
		                	$a = '<div class="btn-group">' ;
		                	$b = '';
		                	$c = '';
		                	$c1 = '';
		                	$d = '</div>';

		                	if ($data->km_status != 'RELEASED') {
								$a = '<div class="btn-group"><button type="button" onclick="jurnal(\''.$data->km_nota.'\')" class="btn btn-primary btn-lg" title="Check Jurnal"><label class="fa fa-book"></label></button>';
							}

		                	if (Auth::user()->akses('DANA BOS','ubah')) {
		                		if ($data->km_status == 'RELEASED') {
		                			$b = '<button type="button" onclick="edit(\''.$data->km_nota.'\')" class="btn btn-warning btn-lg" title="edit"><label class="fa fa-pencil-alt"></label></button>';
		                		}
		                	}

		                	if (Auth::user()->akses('DANA BOS','hapus')) {
		                		if ($data->km_status == 'RELEASED') {
		                			$c = '<button type="button" onclick="hapus(\''.$data->km_nota.'\')" class="btn btn-danger btn-lg" title="hapus"><label class="fa fa-trash"></label></button>';
		                		}
		                	}

							if ($data->km_status == 'APPROVED') {
								$c1 = '<button type="button" onclick="cetak(\''.$data->km_nota.'\')" class="btn btn-danger btn-lg" title="hapus"><label class="fa fa-print"></label></button>';
							}

							

		                    return $a.$b.$c.$c1.$d;
		                })
		                ->addColumn('none', function ($data) {
		                    return '-';
		                })->addColumn('sekolah', function ($data) {
		                    return $data->sekolah->s_nama;
		                })->addColumn('status', function ($data) {
		                   	if ($data->km_status == 'RELEASED') {
								return '<label class="badge badge-warning">RELEASED</label>';
		                   	}else if ($data->km_status == 'APPROVED') {
								return '<label class="badge badge-primary">DISETUJUI</label>';
		                   	}else if ($data->km_status == 'REJECTED') {
								return '<label class="badge badge-danger">DITOLAK</label>';
		                   	}if ($data->km_status == 'POSTING') {
								return '<label class="badge badge-success">POSTING</label>';
		                   	}
		                })->addColumn('nota', function ($data) {
		                    return '<a class="btn_modal" onclick="detail(\''.$data->km_nota.'\')" style="color:blue">'.$data->km_nota.'</a>';
		                })
		                ->rawColumns(['aksi', 'none','sekolah','status','nota'])
		                ->addIndexColumn()
		                ->make(true);
	}

	public function create_dana_bos()
	{
		$sekolah = $this->model->sekolah()->all();
		$akun = $this->model->akun()->all();
		return view('kas_masuk.dana_bos.create_dana_bos',compact('sekolah','akun'));
	}

	public function nota_dana_bos(Request $req)
	{
		$bulan = carbon::now()->format('m');
		$tahun = carbon::now()->format('Y');

		$cari = $this->models->rencana_pembelian()
							   ->selectRaw("substring(max(km_nota),13,3) as id")
							   ->whereRaw("MONTH(km_tanggal) = '$bulan' and YEAR(km_tanggal) = '$tahun'")
							   ->where('rp_sekolah',$req->rp_sekolah)
							   ->first();

        $index = (integer)$cari->id + 1;
        $index = str_pad($index, 3, '0', STR_PAD_LEFT);
        $nota = 'KM-'. $bulan . $tahun . '/' . $req->km_sekolah . '/' . $index;

        return Response::json(['nota'=>$nota]);
	}
}
