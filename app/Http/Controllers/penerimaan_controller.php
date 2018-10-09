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
class penerimaan_controller extends Controller
{
    protected $model;
	protected $models;

	public function __construct()
	{
    	$this->model = new all_model();
		$this->models = new models();
	}

	public function siswa()
	{
		return view('siswa.siswa.siswa');
	}

	public function datatable_siswa()
	{
		$data = $this->model->siswa_data_diri()->all();
		// return $data;
		$data = collect($data);
		return Datatables::of($data)
		                ->addColumn('aksi', function ($data) {
		                	$a = '<div class="btn-group">' ;
		                	$b = '';
		                	$c = '';
		                	$c1 = '';
		                	$d = '</div>';

		                

		                	if (Auth::user()->akses('PENERIMAAN SISWA','ubah')) {
		                		if ($data->km_status == 'RELEASED') {
		                			$b = '<button type="button" onclick="edit(\''.$data->sdd_id.'\')" class="btn btn-warning btn-lg" title="edit"><label class="fa fa-pencil-alt"></label></button>';
		                		}
		                	}

		                	if (Auth::user()->akses('PENERIMAAN SISWA','hapus')) {
		                		if ($data->km_status == 'RELEASED') {
		                			$c = '<button type="button" onclick="hapus(\''.$data->sdd_id.'\')" class="btn btn-danger btn-lg" title="hapus"><label class="fa fa-trash"></label></button>';
		                		}
		                	}


		                    return $a.$b.$c.$d;
		                })->addColumn('image', function ($data) {
	                          $thumb = asset('storage/uploads/siswa/thumbnail').'/'.$data->sdd_image;
	                          return '<img style="width:100px;height:100px;" class="img-fluid img-thumbnail" src="'.$thumb.'">';
	                    })->addColumn('sekolah', function ($data) {
		                    return $data->sekolah->s_nama;
		                })->addColumn('status', function ($data) {
		                   	if ($data->sdd_status == 'Release') {
								return '<label class="badge badge-warning">RELEASED</label>';
		                   	}else if ($data->sdd_status == 'Approved') {
								return '<label class="badge badge-primary">APPROVED</label>';
		                   	}
		                })
		                ->rawColumns(['aksi','image','sekolah'])
		                ->addIndexColumn()
		                ->make(true);
	}

	public function create_siswa()
	{
		return view('siswa.siswa.create_siswa');
	}
}
