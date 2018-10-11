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
		$data = $this->model->siswa_data_diri()->cari('sdd_id',1);
		dd($data->siswa_ayah);
		$sekolah = $this->model->sekolah()->all();
		return view('siswa.siswa.create_siswa',compact('sekolah'));
	}

	public function simpan_siswa(Request $req)
	{
		DB::beginTransaction();
		try {
			// array_push($tes, array_keys($req->all()));
			$tes = array_keys($req->all());
			$tes1 = $req->all();
			// dd($tes);
			// SAVE DATA SISWA
			$id = $this->model->siswa_data_diri()->max('sdd_id');
			$file = $req->file('image');
	        if ($file != null) {
			$file_name = 'data_siswa_'. $id .'_' . '.' . $file->getClientOriginalExtension();
			if (!is_dir(storage_path('uploads/data_siswa/thumbnail/'))) {
				mkdir(storage_path('uploads/data_siswa/thumbnail/'), 0777, true);
			}

			if (!is_dir(storage_path('uploads/data_siswa/original/'))) {
				mkdir(storage_path('uploads/data_siswa/original/'), 0777, true);
			}

			$thumbnail_path = storage_path('uploads/data_siswa/thumbnail/');
			$original_path = storage_path('uploads/data_siswa/original/');

			Image::make($file)
			      ->resize(261,null,function ($constraint) {
			        $constraint->aspectRatio();
			         })
			      ->save($original_path . $file_name)
			      ->resize(90, 90)
			      ->save($thumbnail_path . $file_name);
	        }else{
	          $file_name ='TIDAK ADA';
	        }
	        // SAVE DATA SISWA
	        for ($i=0; $i < count($tes); $i++) { 
	        	if (substr($tes[$i], 0,3) == 'sdd') {
	        		$save['sdd_id'] = $id;
		        	$save['sdd_nomor_induk_nasional'] = 0;
		        	$save['sdd_nomor_induk'] = 0;
		        	$save['sdd_saudara_tiri'] = 0;
		        	if ($tes[$i] == 'sdd_tanggal_lahir') {
		        		$save[$tes[$i]] = carbon::parse(str_replace('/','-',$tes1[$tes[$i]]))->format('Y-m-d');
		        	}else{
		        		$save[$tes[$i]] = $tes1[$tes[$i]];
		        	}
		        	$save['created_by'] = Auth::user()->name;
		        	$save['updated_by'] = Auth::user()->name;
		        	$save['sdd_image']  = $file_name;
	        	}
	        }
			$this->model->siswa_data_diri()->create($save);

	        // SAVE TEMPAT TINGGAL
	        for ($i=0; $i < count($tes); $i++) { 
	        	if (substr($tes[$i], 0,3) == 'stt') {
	        		
	        		$save['stt_id'] = $id;
	        		$save[$tes[$i]] = $tes1[$tes[$i]];
	        	}
	        }
			$this->model->siswa_tempat_tinggal()->create($save);
			// SAVE KESEHATAN
			$detail = 1;
	       
			$save = [];
    		for ($a=0; $a < count($tes1['sk_nama_penyakit']); $a++) { 
				$save[$a]['sk_id'] 	   			 = $id;
        		$save[$a]['sk_detail'] 			 = $detail;
        		$save[$a]['sk_nama_penyakit']    = $tes1['sk_nama_penyakit'][$a];
        		$save[$a]['sk_keterangan'] 		 = $tes1['sk_keterangan'][$a];
        		$detail++;
			}
	   
			$this->models->siswa_kesehatan()->insert($save);
			// SAVE PENDIDIKAN
	        for ($i=0; $i < count($tes); $i++) { 
	        	if (substr($tes[$i], 0,2) == 'sp') {
	        		$save['sp_id'] 		= $id;
        			$save['sp_detail'] 	= 1;
		        	if ($tes[$i] == 'sp_tanggal_ijazah') {
		        		$save[$tes[$i]] = carbon::parse(str_replace('/','-',$tes1[$tes[$i]]))->format('Y-m-d');
		        	}else{
		        		$save[$tes[$i]] = $tes1[$tes[$i]];
		        	}
	        	}
	        }
			$this->model->siswa_pendidikan()->create($save);
			// SAVE IBU
	        for ($i=0; $i < count($tes); $i++) { 
	        	if (substr($tes[$i], 0,2) == 'si') {
	        		$save['si_id'] = $id;
		        	if ($tes[$i] == 'si_tanggal_lahir') {
		        		$save[$tes[$i]] = carbon::parse(str_replace('/','-',$tes1[$tes[$i]]))->format('Y-m-d');
		        	}else{
		        		$save[$tes[$i]] = $tes1[$tes[$i]];
		        	}
	        	}
	        }
			$this->model->siswa_ibu()->create($save);
			// SAVE AYAH
	        for ($i=0; $i < count($tes); $i++) { 
	        	if (substr($tes[$i], 0,2) == 'sa') {
	        		$save['sa_id'] = $id;
		        	if ($tes[$i] == 'sa_tanggal_lahir') {
		        		$save[$tes[$i]] = carbon::parse(str_replace('/','-',$tes1[$tes[$i]]))->format('Y-m-d');
		        	}else{
		        		$save[$tes[$i]] = $tes1[$tes[$i]];
		        	}
	        	}
	        }
			$this->model->siswa_ayah()->create($save);
			// SAVE wali
	        for ($i=0; $i < count($tes); $i++) { 
	        	if (substr($tes[$i], 0,2) == 'sw') {
	        		$save['sw_id'] = $id;
		        	if ($tes[$i] == 'sw_tanggal_lahir') {
		        		$save[$tes[$i]] = carbon::parse(str_replace('/','-',$tes1[$tes[$i]]))->format('Y-m-d');
		        	}else{
		        		$save[$tes[$i]] = $tes1[$tes[$i]];
		        	}
	        	}
	        }
			$this->model->siswa_wali()->create($save);
			DB::commit();
			return Response()->json(['status'=>1,'pesan'=>'Berhasil Menyimpan Data']); 
		} catch (Exception $e) {
			DB::rollBack();
			dd($e);
		}
	}
}
