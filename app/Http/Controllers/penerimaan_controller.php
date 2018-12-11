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
class penerimaan_controller extends Controller
{
    protected $model;
	protected $models;

	public function __construct()
	{
    	$this->model = new all_model();
		$this->models = new models();
		Date::setLocale('id');
		$additionalData = [];
	}

	public function siswa()
	{
		return view('siswa.siswa.siswa');
	}

	public function datatable_siswa()
	{
		if (Auth::user()->akses('PENERIMAAN SISWA BARU','global')) {
			$data = $this->models->siswa_data_diri()->where('sdd_status','!=','Setujui')->get();
		}else{
			$sekolah = Auth::User()->sekolah_id;
			$data = $this->models->siswa_data_diri()->where('sdd_sekolah',$sekolah)->where('sdd_status','Released')->get();
		}
		$data = collect($data);
		return Datatables::of($data)
		                ->addColumn('aksi', function ($data) {
		                	$a = '<div class="btn-group">' ;
		                	$b = '';
		                	$c = '';
		                	$c1 = '';
		                	$d = '</div>';

		                

		                	if (Auth::user()->akses('PENERIMAAN SISWA BARU','ubah')) {
	                			$b = '<button type="button" onclick="edit(\''.$data->sdd_id.'\')" class="btn btn-info btn-lg" title="ubah"><label class="fa fa-pencil-alt"></label></button>';
		                	}

		                	if (Auth::user()->akses('PENERIMAAN SISWA BARU','print')) {
	                			$c1 = '<button type="button" onclick="cetak(\''.$data->sdd_id.'\')" class="btn btn-warning btn-lg" title="cetak"><label class="fa fa-print"></label></button>';
		                	}

		                	if (Auth::user()->akses('PENERIMAAN SISWA BARU','hapus')) {
	                			$c = '<button type="button" onclick="hapus(\''.$data->sdd_id.'\')" class="btn btn-danger btn-lg" title="hapus"><label class="fa fa-trash"></label></button>';
		                	}


		                    return $a.$b.$c1.$c.$d;
		                })->addColumn('image', function ($data) {
	                          $thumb = asset('storage/uploads/data_siswa/original').'/'.$data->sdd_image;
	                          return '<img style="width:150px;height:170px;border-radius:0" class="img-fluid img-thumbnail" src="'.$thumb.'">';
	                    })->addColumn('sekolah', function ($data) {
		                    return $data->sekolah->s_nama;
		                })->addColumn('data_siswa', function ($data) {
		                    return '<table class="table">'.
			                    		'<tr>'.
			                    			'<td>NAMA</td>'.
			                    			'<td>'.$data->sdd_nama.'</td>'.
			                    		'</tr>'.
			                    		'<tr>'.
			                    			'<td>TEMPAT LAHIR</td>'.
			                    			'<td>'.$data->sdd_tempat_lahir.'</td>'.
			                    		'</tr>'.
			                    		'<tr>'.
			                    			'<td>TANGGAL LAHIR</td>'.
			                    			'<td>'.carbon::parse($data->sdd_tanggal_lahir)->format('d M Y').'</td>'.
			                    		'</tr>'.
			                    		'<tr>'.
			                    			'<td>NAMA IBU</td>'.
			                    			'<td>'.$data->siswa_ibu[0]->si_nama.'</td>'.
			                    		'</tr>'.
			                    		'<tr>'.
			                    			'<td>NAMA AYAH</td>'.
			                    			'<td>'.$data->siswa_ayah[0]->sa_nama.'</td>'.
			                    		'</tr>'.
			                    	'</table>';
		                })->addColumn('status', function ($data) {
		                	if ($data->sdd_status == 'Released') {
								return '<label class="badge badge-warning">Released</label>';
		                	}elseif ($data->sdd_status == 'Printed'){
								return '<label class="badge badge-info">Printed</label>';
		                	}
		                })
		                ->rawColumns(['aksi','image','sekolah','data_siswa','status'])
		                ->addIndexColumn()
		                ->make(true);
	}

	public function create_siswa()
	{
		$data = $this->model->siswa_data_diri()->cari('sdd_id',1);
		// dd($data->siswa_ayah->toArray());
		$sekolah = $this->model->sekolah()->all();
		return view('siswa.siswa.create_siswa',compact('sekolah'));
	}

	public function edit_siswa(Request $req)
	{
		if (Auth::User()->akses('PENERIMAAN SISWA BARU','ubah')) {
			$sekolah = $this->model->sekolah()->all();
			$data    = $this->model->siswa_data_diri()->cari('sdd_id',$req->id);
			return view('siswa.siswa.edit_siswa',compact('sekolah','data'));
		}
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
		        	if ($tes[$i] == 'sdd_tanggal_lahir') {
		        		$save[$tes[$i]] = carbon::parse(str_replace('/','-',$tes1[$tes[$i]]))->format('Y-m-d');
		        	}else{
		        		$save[$tes[$i]] = strtoupper($tes1[$tes[$i]]);
		        	}
		        	$save['created_by'] = Auth::user()->name;
		        	$save['updated_by'] = Auth::user()->name;
		        	$save['sdd_image']  = $file_name;
	        	}
	        }
			$this->model->siswa_data_diri()->create($save);
			$this->model->siswa_data_diri_copy()->create($save);

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
		        	}else if ($tes[$i] == 'si_penghasilan'){
		        		$save[$tes[$i]] = filter_var($tes1[$tes[$i]],FILTER_SANITIZE_NUMBER_INT);
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
		        	}else if ($tes[$i] == 'sa_penghasilan'){
		        		$save[$tes[$i]] = filter_var($tes1[$tes[$i]],FILTER_SANITIZE_NUMBER_INT);
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
		        	}else if ($tes[$i] == 'sw_penghasilan'){
		        		$save[$tes[$i]] = filter_var($tes1[$tes[$i]],FILTER_SANITIZE_NUMBER_INT);
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

	public function hapus_siswa(Request $req)
	{
		if (Auth::User()->akses('PENERIMAAN SISWA BARU','hapus')) {
			$data    = $this->model->siswa_data_diri()->cari('sdd_id',$req->id);
			unlink(storage_path('uploads/data_siswa/thumbnail').'/'.$data->sdd_image);
    		unlink(storage_path('uploads/data_siswa/original').'/'.$data->sdd_image);
			$this->model->siswa_data_diri()->delete('sdd_id',$req->id);
			return Response()->json(['status'=>1,'pesan'=>'Berhasil Menyimpan Data']); 
		}else{
			return Response()->json(['status'=>0,'pesan'=>'Anda Tidak Memiliki Akses Untuk Menghapus Data']); 
		}
	}

	public function update_siswa(Request $req)
	{
		DB::beginTransaction();
		try {
			$id = $req->id;
			$tes = array_keys($req->all());
			$tes1 = $req->all();
			// dd($tes);
			$data = $this->model->siswa_data_diri()->cari('sdd_id',$id);
			
			// SAVE DATA SISWA
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
	          $file_name = $data->sdd_image;
	        }
	        // SAVE DATA SISWA
			$save = [];
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
			$this->model->siswa_data_diri()->update($save,'sdd_id',$id);
			$this->model->siswa_data_diri_copy()->update($save,'sdd_id',$id);

	        // SAVE TEMPAT TINGGAL
			$save = [];
	        for ($i=0; $i < count($tes); $i++) { 
	        	if (substr($tes[$i], 0,3) == 'stt') {
	        		
	        		$save['stt_id'] = $id;
	        		$save[$tes[$i]] = $tes1[$tes[$i]];
	        	}
	        }
			$this->model->siswa_tempat_tinggal()->update($save,'stt_id',$id);
			// SAVE KESEHATAN
			$detail = 1;
	       
			$save = [];
			$this->model->siswa_kesehatan()->delete($save,'sk_id',$id);
    		for ($a=0; $a < count($tes1['sk_nama_penyakit']); $a++) { 
				$save[$a]['sk_id'] 	   			 = $id;
        		$save[$a]['sk_detail'] 			 = $detail;
        		$save[$a]['sk_nama_penyakit']    = $tes1['sk_nama_penyakit'][$a];
        		$save[$a]['sk_keterangan'] 		 = $tes1['sk_keterangan'][$a];
        		$detail++;
			}
	   
			$this->models->siswa_kesehatan()->insert($save);
			// SAVE PENDIDIKAN
			$save = [];
	        for ($i=0; $i < count($tes); $i++) { 
	        	if (substr($tes[$i], 0,2) == 'sp') {
	        		$save['sp_id'] 		= $id;
        			$save['sp_detail'] 	= 1;
		        	if ($tes[$i] == 'sp_tanggal_ijazah') {
		        		$save[$tes[$i]] = carbon::parse(str_replace('/','-',$tes1[$tes[$i]]))->format('Y-m-d');
		        	}else{
		        		$save[$tes[$i]] = strtoupper($tes1[$tes[$i]]);
		        	}
	        	}
	        }
			$this->model->siswa_pendidikan()->update($save,'sp_id',$id);
			// SAVE IBU
			$save = [];
	        for ($i=0; $i < count($tes); $i++) { 
	        	if (substr($tes[$i], 0,2) == 'si') {
	        		$save['si_id'] = $id;
		        	if ($tes[$i] == 'si_tanggal_lahir') {
		        		$save[$tes[$i]] = carbon::parse(str_replace('/','-',$tes1[$tes[$i]]))->format('Y-m-d');
		        	}else if ($tes[$i] == 'si_penghasilan'){
		        		$save[$tes[$i]] = filter_var($tes1[$tes[$i]],FILTER_SANITIZE_NUMBER_INT);
		        	}else{
		        		$save[$tes[$i]] = $tes1[$tes[$i]];
		        	}
	        	}
	        }
			$this->model->siswa_ibu()->update($save,'si_id',$id);
			// SAVE AYAH
			$save = [];
	        for ($i=0; $i < count($tes); $i++) { 
	        	if (substr($tes[$i], 0,2) == 'sa') {
	        		$save['sa_id'] = $id;
		        	if ($tes[$i] == 'sa_tanggal_lahir') {
		        		$save[$tes[$i]] = carbon::parse(str_replace('/','-',$tes1[$tes[$i]]))->format('Y-m-d');
		        	}else if ($tes[$i] == 'sa_penghasilan'){
		        		$save[$tes[$i]] = filter_var($tes1[$tes[$i]],FILTER_SANITIZE_NUMBER_INT);
		        	}else{
		        		$save[$tes[$i]] = $tes1[$tes[$i]];
		        	}
	        	}
	        }
			$this->model->siswa_ayah()->update($save,'sa_id',$id);
			// SAVE wali
			$save = [];
	        for ($i=0; $i < count($tes); $i++) { 
	        	if (substr($tes[$i], 0,2) == 'sw') {
	        		$save['sw_id'] = $id;
		        	if ($tes[$i] == 'sw_tanggal_lahir') {
		        		$save[$tes[$i]] = carbon::parse(str_replace('/','-',$tes1[$tes[$i]]))->format('Y-m-d');
		        	}else if ($tes[$i] == 'sw_penghasilan'){
		        		$save[$tes[$i]] = filter_var($tes1[$tes[$i]],FILTER_SANITIZE_NUMBER_INT);
		        	}else{
		        		$save[$tes[$i]] = $tes1[$tes[$i]];
		        	}
	        	}
	        }
			$this->model->siswa_wali()->update($save,'sw_id',$id);
			DB::commit();
			return Response()->json(['status'=>1,'pesan'=>'Berhasil Menyimpan Data']); 
		} catch (Exception $e) {
			DB::rollBack();
			dd($e);
		}
	}

	public function cetak_siswa(Request $req)
	{
		$id    = Auth::user()->id;
		$data  = $this->model->user()->cari('id',$id);
		$siswa = $this->model->siswa_data_diri()->cari('sdd_id',$req->id);
		$tanggal_lahir = [];
		$tanggal_lahir['siswa'] = Date::parse($siswa->sdd_tanggal_lahir)->format('d F Y');
		$tanggal_lahir['ayah']  = Date::parse($siswa->siswa_ayah[0]->sa_tanggal_lahir)->format('d F Y');
		$tanggal_lahir['ibu']   = Date::parse($siswa->siswa_ibu[0]->si_tanggal_lahir)->format('d F Y');
		$tanggal_lahir['wali']  = Date::parse($siswa->siswa_wali[0]->sw_tanggal_lahir)->format('d F Y');
		$tanggal_lahir['ijazah']  = Date::parse($siswa->siswa_pendidikan[0]->sp_tanggal_ijazah)->format('d F Y');

		$upd   = array(
						'sdd_status'	=> 'Printed',
					);

		$this->model->siswa_data_diri()->update($upd,'sdd_id',$req->id);
		
		return view('siswa.siswa.cetak_siswa',compact('data','siswa','tanggal_lahir'));
	}

	public function konfirmasi()
	{
		return view('siswa.konfirmasi.konfirmasi_siswa');
	}

	public function datatable_konfirmasi()
	{
		if (Auth::user()->akses('KONFIRMASI SISWA','global')) {
			$data = $this->models->siswa_data_diri()->where('sdd_status','=','Printed')->get();
		}else{
			$sekolah = Auth::User()->sekolah_id;
			$data = $this->models->siswa_data_diri()->where('sdd_sekolah',$sekolah)->where('sdd_status','Released')->get();
		}
		$data = collect($data);
		return Datatables::of($data)
		                ->addColumn('aksi', function ($data) {
		                	$a = '<div class="btn-group">' ;
		                	$b = '';
		                	$c = '';
		                	$c1 = '';
		                	$d = '</div>';
		                

		                	if (Auth::user()->akses('KONFIRMASI SISWA','global')) {
	                			$b = '<button type="button" onclick="konfirmasi(\''.$data->sdd_id.'\',\'Setujui\')" class="btn btn-info btn-lg" title="ubah"><label class="fa fa-check"></label></button>';
		                	}

		                	if (Auth::user()->akses('KONFIRMASI SISWA','global')) {
	                			$c = '<button type="button" onclick="konfirmasi(\''.$data->sdd_id.'\',\'Tolak\')" class="btn btn-danger btn-lg" title="hapus"><label class="fa fa-times"></label></button>';
		                	}


		                    return $a.$b.$c1.$c.$d;
		                })->addColumn('image', function ($data) {
	                          $thumb = asset('storage/uploads/data_siswa/original').'/'.$data->sdd_image;
	                          return '<img style="width:150px;height:170px;border-radius:0" class="img-fluid img-thumbnail" src="'.$thumb.'">';
	                    })->addColumn('sekolah', function ($data) {
		                    return $data->sekolah->s_nama;
		                })->addColumn('data_siswa', function ($data) {
		                    return '<table class="table">'.
			                    		'<tr>'.
			                    			'<td>NAMA</td>'.
			                    			'<td>'.$data->sdd_nama.'</td>'.
			                    		'</tr>'.
			                    		'<tr>'.
			                    			'<td>TEMPAT LAHIR</td>'.
			                    			'<td>'.$data->sdd_tempat_lahir.'</td>'.
			                    		'</tr>'.
			                    		'<tr>'.
			                    			'<td>TANGGAL LAHIR</td>'.
			                    			'<td>'.carbon::parse($data->sdd_tanggal_lahir)->format('d M Y').'</td>'.
			                    		'</tr>'.
			                    		'<tr>'.
			                    			'<td>NAMA IBU</td>'.
			                    			'<td>'.$data->siswa_ibu[0]->si_nama.'</td>'.
			                    		'</tr>'.
			                    		'<tr>'.
			                    			'<td>NAMA AYAH</td>'.
			                    			'<td>'.$data->siswa_ayah[0]->sa_nama.'</td>'.
			                    		'</tr>'.
			                    	'</table>';
		                })->addColumn('status', function ($data) {
							return '<label class="badge badge-info">Released</label>';
		                })
		                ->rawColumns(['aksi','image','sekolah','data_siswa','status'])
		                ->addIndexColumn()
		                ->make(true);
	}

	public function simpan_konfirmasi(Request $req)
	{
		DB::beginTransaction();
		try {
			$save = array(
						'sdd_status' => $req->param
					);
			$this->model->siswa_data_diri()->update($save,'sdd_id',$req->id);
			$this->model->siswa_data_diri_copy()->update($save,'sdd_id',$req->id);
			DB::commit();
			return Response()->json(['status'=>1,'pesan'=>'Data Berhasil Di '.$req->param]);
		} catch (Exception $e) {
			DB::rollBack();
			dd($e);
		}
	}

	public function rekap_siswa()
	{
		$sekolah = $this->model->sekolah()->all();
		$kelas   = $this->model->kelas()->all();
		$group_spp   = $this->model->group_spp()->all();
		$tingkat = [];
		$additionalData['tahun_ajaran'] = [];
		for ($i=0; $i < 12; $i++) { 
			$tingkat[$i] = $i+1;
		}

		for ($i=0; $i < 20; $i++) { 
			array_push($additionalData['tahun_ajaran'], carbon::now()->subYear($i)->format('Y'));
		}
		return view('siswa.rekap_siswa.rekap_siswa',compact('sekolah','tingkat','additionalData','kelas','group_spp'));
	}

	public function datatable_rekap_siswa(Request $req)
	{
		// dd($req->all());
		if ($req->sdd_sekolah != '') {
          $sdd_sekolah = 'and sdd_sekolah = '."'$req->sdd_sekolah'";
        }else{
          $sdd_sekolah = '';
        }

        if ($req->sdd_kelas != '') {
          $sdd_kelas = 'and sdd_kelas = '."'$req->sdd_kelas'";
        }else{
          $sdd_kelas = '';
        }

        if ($req->sdd_nama_kelas != '') {
          $sdd_nama_kelas = 'and sdd_nama_kelas = '."'$req->sdd_nama_kelas'";
        }else{
          $sdd_nama_kelas = '';
        }

        if ($req->sdd_tahun_ajaran != '') {
          $sdd_tahun_ajaran = 'and sdd_tahun_ajaran = '."'$req->sdd_tahun_ajaran'";
        }else{
          $sdd_tahun_ajaran = '';
        }

        if ($req->sdd_group_spp != '') {
          $sdd_group_spp = 'and sdd_group_spp = '."'$req->sdd_group_spp'";
        }else{
          $sdd_group_spp = '';
        }


		if (Auth::user()->akses('REKAP SISWA','global')) {
			$data = $this->models->siswa_data_diri()->whereRaw("sdd_status = 'Setujui' $sdd_kelas $sdd_nama_kelas $sdd_tahun_ajaran $sdd_sekolah $sdd_group_spp")->get();
		}else{
			$sekolah = Auth::User()->sekolah_id;
			$data = $this->models->siswa_data_diri()->where('sdd_sekolah',$sekolah)->whereRaw("sdd_status = 'Setujui' $sdd_kelas $sdd_nama_kelas $sdd_tahun_ajaran $sdd_group_spp")->get();
		}



		$data = collect($data);
		return Datatables::of($data)
		                ->addColumn('aksi', function ($data) {
		                	$a = '<div class="btn-group">' ;
		                	$b = '';
		                	$c = '';
		                	$c1 = '';
		                	$c2 = '';
		                	$d = '</div>';
		                

		                	if (Auth::user()->akses('REKAP SISWA','ubah')) {
	                			$b = '<button type="button" onclick="edit(\''.$data->sdd_id.'\')" class="btn btn-info btn-lg" title="ubah"><label class="fa fa-pencil-alt"></label></button>';
		                	}

		                	if (Auth::user()->akses('REKAP SISWA','print')) {
	                			$c1 = '<button type="button" onclick="cetak(\''.$data->sdd_id.'\')" class="btn btn-warning btn-lg" title="cetak"><label class="fa fa-print"></label></button>';
		                	}

		                	if (Auth::user()->akses('REKAP SISWA','hapus')) {
	                			$c2 = '<button type="button" onclick="hapus(\''.$data->sdd_id.'\')" class="btn btn-danger btn-lg" title="cetak"><label class="fa fa-trash"></label></button>';
		                	}

		                    return $a.$b.$c1.$c2.$c.$d;
		                })->addColumn('image', function ($data) {
	                          $thumb = asset('storage/uploads/data_siswa/original').'/'.$data->sdd_image;
	                          return '<img style="width:150px;height:170px;border-radius:0" class="img-fluid img-thumbnail" src="'.$thumb.'">';
	                    })->addColumn('sekolah', function ($data) {
		                    return $data->sekolah->s_nama;
		                })->addColumn('data_siswa', function ($data) {
		                	if ($data->kelas != null) {
			                    $nama_kelas = '<td> : '.$data->kelas->k_nama.'</td>';
		                	}else{
			                    $nama_kelas = '<td> : BELUM ADA KELAS</td>';
		                	}

		                	if ($data->group_spp != null) {
			                    $group_spp = '<td> : '.$data->group_spp->gs_nama.'</td>';
		                	}else{
			                    $group_spp = '<td> : BELUM ADA GROUP SPP</td>';
		                	}
		                    return '<table class="table table-hover">'.
			                    		'<tr>'.
			                    			'<td width="100px">NAMA</td>'.
			                    			'<td> : '.$data->sdd_nama.'<input type="hidden" class="sdd_id" name="sdd_id" value='.$data->sdd_id.'></td>'.
			                    		'</tr>'.
			                    		'<tr>'.
			                    			'<td width="100px">SEKOLAH</td>'.
			                    			'<td> : '.$data->sekolah->s_nama.'</td>'.
			                    		'</tr>'.
			                    		'<tr>'.
			                    			'<td width="100px">NISN</td>'.
			                    			'<td> : '.$data->sdd_nomor_induk_nasional.'</td>'.
			                    		'</tr>'.
			                    		'<tr>'.
			                    			'<td width="100px">NIS</td>'.
			                    			'<td> : '.$data->sdd_nomor_induk.'</td>'.
			                    		'</tr>'.
			                    		'<tr>'.
			                    			'<td width="100px">TEMPAT LAHIR</td>'.
			                    			'<td> : '.$data->sdd_tempat_lahir.'</td>'.
			                    		'</tr>'.
			                    		'<tr>'.
			                    			'<td width="100px">TANGGAL LAHIR</td>'.
			                    			'<td> : '.carbon::parse($data->sdd_tanggal_lahir)->format('d M Y').'</td>'.
			                    		'</tr>'.
			                    		'<tr>'.
			                    			'<td width="100px">KELAS</td>'.
			                    			'<td> : '.$data->sdd_kelas.'</td>'.
			                    		'</tr>'.
			                    		'<tr>'.
			                    			'<td width="100px">NAMA KELAS</td>'.
			                    			$nama_kelas.
			                    		'</tr>'.
			                    		'<tr>'.
			                    			'<td width="100px">GROUP SPP</td>'.
			                    			$group_spp.
			                    		'</tr>'.
			                    	'</table>';
		                })->addColumn('status', function ($data) {
		                	if ($data->sdd_status_siswa == 'ACTIVE') {
								return '<button type="button" class="btn btn-info cursor" onclick="ubah_status(\''.$data->sdd_id.'\',\'INACTIVE\')">Aktif</button type="button">';
		                	}else{
								return '<button type="button" class="btn btn-danger cursor" onclick="ubah_status(\''.$data->sdd_id.'\',\'ACTIVE\')">Tidak Aktif</button type="button">';
		                	}
		                })->addColumn('check', function ($data) {
		                	return '<label class="label">
					                    <input class="label__checkbox check" name="check" type="checkbox" />
					                    <span class="label__text">
					                      <span class="label__check">
					                        <i class="fa fa-check icon"></i>
					                      </span>
					                    </span>
					                  </label>';
		                })
		                ->rawColumns(['aksi','image','sekolah','data_siswa','status','check'])
		                ->addIndexColumn()
		                ->make(true);
	}

	public function cetak_rekap_siswa(Request $req)
	{
		$id    = Auth::user()->id;
		$data  = $this->model->user()->cari('id',$id);
		$siswa = $this->model->siswa_data_diri()->cari('sdd_id',$req->id);
		$tanggal_lahir = [];
		$tanggal_lahir['siswa']   = Date::parse($siswa->sdd_tanggal_lahir)->format('d F Y');
		$tanggal_lahir['ayah']    = Date::parse($siswa->siswa_ayah[0]->sa_tanggal_lahir)->format('d F Y');
		$tanggal_lahir['ibu']     = Date::parse($siswa->siswa_ibu[0]->si_tanggal_lahir)->format('d F Y');
		$tanggal_lahir['wali']    = Date::parse($siswa->siswa_wali[0]->sw_tanggal_lahir)->format('d F Y');
		$tanggal_lahir['ijazah']  = Date::parse($siswa->siswa_pendidikan[0]->sp_tanggal_ijazah)->format('d F Y');

		return view('siswa.rekap_siswa.cetak_rekap_siswa',compact('data','siswa','tanggal_lahir'));
	}

	public function edit_rekap_siswa(Request $req)
	{
		if (Auth::User()->akses('REKAP SISWA','ubah')) {
			$sekolah 	= $this->model->sekolah()->all();
			$data    	= $this->model->siswa_data_diri()->cari('sdd_id',$req->id);
			$kelas    	= $this->model->kelas()->all();
			$group_spp  = $this->model->group_spp()->all();
			$additionalData['tahun_ajaran'] = [];
			$tingkat = [];
			for ($i=0; $i < 12; $i++) { 
				$tingkat[$i] = $i+1;
			}

			for ($i=0; $i < 20; $i++) { 
				array_push($additionalData['tahun_ajaran'], carbon::now()->subYear($i)->format('Y'));
			}
			return view('siswa.rekap_siswa.edit_rekap_siswa',compact('sekolah','data','group_spp','additionalData','kelas','tingkat'));
		}else{
			Auth::logout();
		    Session::flush();
		    Session::flash('message', 'Sistem Menkick anda!');
		    return redirect('/'); 
		}
	}

	public function update_rekap_siswa(Request $req)
	{
		DB::beginTransaction();
		try {
			$id = $req->id;
			$tes = array_keys($req->all());
			$tes1 = $req->all();
			$data = $this->model->siswa_data_diri()->cari('sdd_id',$id);
			
			// SAVE DATA SISWA
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
	          $file_name = $data->sdd_image;
	        }

	        $nisn = $this->models->siswa_data_diri()->where('sdd_nomor_induk_nasional',$req->sdd_nomor_induk_nasional)->where('sdd_id','!=',$req->id)->first();
	        if ($nisn != null) {
	        	DB::rollBack();
	        	return Response::json(['status'=>0,'pesan'=>'Nisn Sudah Terpakai']);
	        }

	        $nis = $this->models->siswa_data_diri()->where('sdd_nomor_induk',$req->sdd_nomor_induk)->where('sdd_id','!=',$req->id)->first();
	        if ($nis != null) {
	        	DB::rollBack();
	        	return Response::json(['status'=>0,'pesan'=>'Nisn Sudah Terpakai']);
	        }
	        // SAVE DATA SISWA
			$save = [];
	        for ($i=0; $i < count($tes); $i++) { 
	        	if (substr($tes[$i], 0,3) == 'sdd') {
	        		$save['sdd_id'] = $id;
		        	if ($tes[$i] == 'sdd_tanggal_lahir') {
		        		$save[$tes[$i]] = carbon::parse(str_replace('/','-',$tes1[$tes[$i]]))->format('Y-m-d');
		        	}if ($tes[$i] == 'sdd_tanggal_lahir') {
		        		$save[$tes[$i]] = carbon::parse(str_replace('/','-',$tes1[$tes[$i]]))->format('Y-m-d');
		        	}else{
		        		$save[$tes[$i]] = strtoupper($tes1[$tes[$i]]);
		        	}
		        	$save['updated_by'] = Auth::user()->name;
		        	$save['sdd_image']  = $file_name;
	        	}
	        }
			$this->model->siswa_data_diri()->update($save,'sdd_id',$id);
			$this->model->siswa_data_diri_copy()->update($save,'sdd_id',$id);

	        // SAVE TEMPAT TINGGAL
			$save = [];
	        for ($i=0; $i < count($tes); $i++) { 
	        	if (substr($tes[$i], 0,3) == 'stt') {
	        		
	        		$save['stt_id'] = $id;
	        		$save[$tes[$i]] = $tes1[$tes[$i]];
	        	}
	        }
			$this->model->siswa_tempat_tinggal()->update($save,'stt_id',$id);
			// SAVE KESEHATAN
			$detail = 1;
	       
			$save = [];
			$this->model->siswa_kesehatan()->delete($save,'sk_id',$id);
    		for ($a=0; $a < count($tes1['sk_nama_penyakit']); $a++) { 
				$save[$a]['sk_id'] 	   			 = $id;
        		$save[$a]['sk_detail'] 			 = $detail;
        		$save[$a]['sk_nama_penyakit']    = $tes1['sk_nama_penyakit'][$a];
        		$save[$a]['sk_keterangan'] 		 = $tes1['sk_keterangan'][$a];
        		$detail++;
			}
	   
			$this->models->siswa_kesehatan()->insert($save);
			// SAVE PENDIDIKAN
			$save = [];
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
			$this->model->siswa_pendidikan()->update($save,'sp_id',$id);
			// SAVE IBU
			$save = [];
	        for ($i=0; $i < count($tes); $i++) { 
	        	if (substr($tes[$i], 0,2) == 'si') {
	        		$save['si_id'] = $id;
		        	if ($tes[$i] == 'si_tanggal_lahir') {
		        		$save[$tes[$i]] = carbon::parse(str_replace('/','-',$tes1[$tes[$i]]))->format('Y-m-d');
		        	}else if ($tes[$i] == 'si_penghasilan'){
		        		$save[$tes[$i]] = filter_var($tes1[$tes[$i]],FILTER_SANITIZE_NUMBER_INT);
		        	}else{
		        		$save[$tes[$i]] = $tes1[$tes[$i]];
		        	}
	        	}
	        }
			$this->model->siswa_ibu()->update($save,'si_id',$id);
			// SAVE AYAH
			$save = [];
	        for ($i=0; $i < count($tes); $i++) { 
	        	if (substr($tes[$i], 0,2) == 'sa') {
	        		$save['sa_id'] = $id;
		        	if ($tes[$i] == 'sa_tanggal_lahir') {
		        		$save[$tes[$i]] = carbon::parse(str_replace('/','-',$tes1[$tes[$i]]))->format('Y-m-d');
		        	}else if ($tes[$i] == 'sa_penghasilan'){
		        		$save[$tes[$i]] = filter_var($tes1[$tes[$i]],FILTER_SANITIZE_NUMBER_INT);
		        	}else{
		        		$save[$tes[$i]] = $tes1[$tes[$i]];
		        	}
	        	}
	        }
			$this->model->siswa_ayah()->update($save,'sa_id',$id);
			// SAVE wali
			$save = [];
	        for ($i=0; $i < count($tes); $i++) { 
	        	if (substr($tes[$i], 0,2) == 'sw') {
	        		$save['sw_id'] = $id;
		        	if ($tes[$i] == 'sw_tanggal_lahir') {
		        		$save[$tes[$i]] = carbon::parse(str_replace('/','-',$tes1[$tes[$i]]))->format('Y-m-d');
		        	}else if ($tes[$i] == 'sw_penghasilan'){
		        		$save[$tes[$i]] = filter_var($tes1[$tes[$i]],FILTER_SANITIZE_NUMBER_INT);
		        	}else{
		        		$save[$tes[$i]] = $tes1[$tes[$i]];
		        	}
	        	}
	        }
			$this->model->siswa_wali()->update($save,'sw_id',$id);
			DB::commit();
			return Response()->json(['status'=>1,'pesan'=>'Berhasil Menyimpan Data']); 
		} catch (Exception $e) {
			DB::rollBack();
			dd($e);
		}
	}

	public function ubah_status_rekap_siswa(Request $req)
	{
		DB::beginTransaction();
		try {
			$save = array(
						'sdd_status_siswa' => $req->param
					);
			$this->model->siswa_data_diri()->update($save,'sdd_id',$req->id);
			$this->model->siswa_data_diri_copy()->update($save,'sdd_id',$req->id);
			DB::commit();
			if ($req->param == 'ACTIVE') {
				return Response()->json(['status'=>1,'pesan'=>'Berhasil Mengaktifkan siswa']); 
			}else{
				return Response()->json(['status'=>1,'pesan'=>'Berhasil menonaktifkan siswa']); 
			}
		} catch (Exception $e) {
			DB::rollBack();
			dd($e);
		}
	}

	public function hapus_rekap_siswa(Request $req)
	{
		DB::beginTransaction();
		try {
			$this->model->siswa_data_diri()->delete('sdd_id',$req->id);
			$this->model->siswa_data_diri_copy()->delete('sdd_id',$req->id);
			DB::commit();
			return Response()->json(['status'=>1,'pesan'=>'Berhasil Menghapus Data']); 
		} catch (Exception $e) {
			DB::rollBack();
			dd($e);
		}
	}

	public function kelas()
	{
		$sekolah = $this->model->sekolah()->all();
		$kelas   = $this->model->kelas()->all();
		$group_spp   = $this->model->group_spp()->all();

		$tingkat = [];
		$additionalData['tahun_ajaran'] = [];
		for ($i=0; $i < 12; $i++) { 
			$tingkat[$i] = $i+1;
		}

		for ($i=0; $i < 20; $i++) { 
			array_push($additionalData['tahun_ajaran'], carbon::now()->subYear($i)->format('Y'));
		}
		return view('siswa.kelas.kelas',compact('sekolah','tingkat','additionalData','kelas','group_spp'));
	}

	public function datatable_manajemen_siswa(Request $req)
	{
		// dd($req->all());
		if ($req->sdd_sekolah != '') {
          $sdd_sekolah = 'and sdd_sekolah = '."'$req->sdd_sekolah'";
        }else{
          $sdd_sekolah = '';
        }

        if ($req->sdd_kelas != '') {
          $sdd_kelas = 'and sdd_kelas = '."'$req->sdd_kelas'";
        }else{
          $sdd_kelas = '';
        }

        if ($req->sdd_nama_kelas != '') {
          $sdd_nama_kelas = 'and sdd_nama_kelas = '."'$req->sdd_nama_kelas'";
        }else{
          $sdd_nama_kelas = '';
        }

        if ($req->sdd_tahun_ajaran != '') {
          $sdd_tahun_ajaran = 'and sdd_tahun_ajaran = '."'$req->sdd_tahun_ajaran'";
        }else{
          $sdd_tahun_ajaran = '';
        }

        if ($req->sdd_group_spp != '') {
          $sdd_group_spp = 'and sdd_group_spp = '."'$req->sdd_group_spp'";
        }else{
          $sdd_group_spp = '';
        }


		if (Auth::user()->akses('REKAP SISWA','global')) {
			$data = $this->models->siswa_data_diri()->whereRaw("sdd_status = 'Setujui' and sdd_status_siswa = 'ACTIVE' and sdd_kelas != 'LULUS' $sdd_kelas $sdd_nama_kelas $sdd_tahun_ajaran $sdd_sekolah $sdd_group_spp")->get();
		}else{
			$sekolah = Auth::User()->sekolah_id;
			$data = $this->models->siswa_data_diri()->where('sdd_sekolah',$sekolah)->whereRaw("sdd_status = 'Setujui' and sdd_status_siswa = 'ACTIVE' and sdd_kelas != 'LULUS' $sdd_kelas $sdd_nama_kelas $sdd_tahun_ajaran $sdd_group_spp")->get();
		}



		$data = collect($data);
		return Datatables::of($data)
		                ->addColumn('aksi', function ($data) {
		                	$a = '<div class="btn-group">' ;
		                	$b = '';
		                	$c = '';
		                	$c1 = '';
		                	$c2 = '';
		                	$d = '</div>';
		                

		                	if (Auth::user()->akses('REKAP SISWA','ubah')) {
	                			$b = '<button type="button" onclick="edit(\''.$data->sdd_id.'\')" class="btn btn-info btn-lg" title="ubah"><label class="fa fa-pencil-alt"></label></button>';
		                	}

		                	if (Auth::user()->akses('REKAP SISWA','print')) {
	                			$c1 = '<button type="button" onclick="cetak(\''.$data->sdd_id.'\')" class="btn btn-warning btn-lg" title="cetak"><label class="fa fa-print"></label></button>';
		                	}

		                	if (Auth::user()->akses('REKAP SISWA','hapus')) {
	                			$c2 = '<button type="button" onclick="hapus(\''.$data->sdd_id.'\')" class="btn btn-danger btn-lg" title="cetak"><label class="fa fa-trash"></label></button>';
		                	}

		                    return $a.$b.$c1.$c2.$c.$d;
		                })->addColumn('image', function ($data) {
	                          $thumb = asset('storage/uploads/data_siswa/original').'/'.$data->sdd_image;
	                          return '<img style="width:150px;height:170px;border-radius:0" class="img-fluid img-thumbnail" src="'.$thumb.'">';
	                    })->addColumn('sekolah', function ($data) {
		                    return $data->sekolah->s_nama;
		                })->addColumn('data_siswa', function ($data) {
		                	if ($data->kelas != null) {
			                    $nama_kelas = '<td> : '.$data->kelas->k_nama.'</td>';
		                	}else{
			                    $nama_kelas = '<td> : BELUM ADA KELAS</td>';
		                	}

		                	if ($data->group_spp != null) {
			                    $group_spp = '<td> : '.$data->group_spp->gs_nama.'</td>';
		                	}else{
			                    $group_spp = '<td> : BELUM ADA GROUP SPP</td>';
		                	}
		                    return '<table class="table table-hover">'.
			                    		'<tr>'.
			                    			'<td width="100px">NAMA</td>'.
			                    			'<td> : '.$data->sdd_nama.'<input type="hidden" class="sdd_id" name="sdd_id" value='.$data->sdd_id.'></td>'.
			                    		'</tr>'.
			                    		'<tr>'.
			                    			'<td width="100px">SEKOLAH</td>'.
			                    			'<td> : '.$data->sekolah->s_nama.'</td>'.
			                    		'</tr>'.
			                    		'<tr>'.
			                    			'<td width="100px">NISN</td>'.
			                    			'<td> : '.$data->sdd_nomor_induk_nasional.'</td>'.
			                    		'</tr>'.
			                    		'<tr>'.
			                    			'<td width="100px">NIS</td>'.
			                    			'<td> : '.$data->sdd_nomor_induk.'</td>'.
			                    		'</tr>'.
			                    		'<tr>'.
			                    			'<td width="100px">TEMPAT LAHIR</td>'.
			                    			'<td> : '.$data->sdd_tempat_lahir.'</td>'.
			                    		'</tr>'.
			                    		'<tr>'.
			                    			'<td width="100px">TANGGAL LAHIR</td>'.
			                    			'<td> : '.carbon::parse($data->sdd_tanggal_lahir)->format('d M Y').'</td>'.
			                    		'</tr>'.
			                    		'<tr>'.
			                    			'<td width="100px">KELAS</td>'.
			                    			'<td> : '.$data->sdd_kelas.'</td>'.
			                    		'</tr>'.
			                    		'<tr>'.
			                    			'<td width="100px">NAMA KELAS</td>'.
			                    			$nama_kelas.
			                    		'</tr>'.
			                    		'<tr>'.
			                    			'<td width="100px">GROUP SPP</td>'.
			                    			$group_spp.
			                    		'</tr>'.
			                    	'</table>';
		                })->addColumn('status', function ($data) {
		                	if ($data->sdd_status_siswa == 'ACTIVE') {
								return '<button type="button" class="btn btn-info cursor" onclick="ubah_status(\''.$data->sdd_id.'\',\'INACTIVE\')">Aktif</button type="button">';
		                	}else{
								return '<button type="button" class="btn btn-danger cursor" onclick="ubah_status(\''.$data->sdd_id.'\',\'ACTIVE\')">Tidak Aktif</button type="button">';
		                	}
		                })->addColumn('check', function ($data) {
		                	return '<label class="label">
					                    <input class="label__checkbox check" name="check" type="checkbox" />
					                    <span class="label__text">
					                      <span class="label__check">
					                        <i class="fa fa-check icon"></i>
					                      </span>
					                    </span>
					                  </label>';
		                })
		                ->rawColumns(['aksi','image','sekolah','data_siswa','status','check'])
		                ->addIndexColumn()
		                ->make(true);
	}

	public function update_kelas(Request $req)
	{
		DB::beginTransaction();
		try {
			$save = [];
			if (!isset($req->sdd_id)) {
				return Response()->json(['status'=>0,'pesan'=>'Tidak ada siswa yang diupdate, harap centang siswa']); 
			}
			for ($i=0; $i < count($req->sdd_id); $i++) { 
				$save = array(
								'sdd_kelas'			=>	$req->sdd_kelas,
								'sdd_nama_kelas'	=>	$req->sdd_nama_kelas,
								'sdd_group_spp'		=>	$req->sdd_group_spp
							);
				$this->model->siswa_data_diri()->update($save,'sdd_id',$req->sdd_id[$i]);
			}

			DB::commit();
			return Response()->json(['status'=>1,'pesan'=>'Berhasil Mengupdate Data']); 
		} catch (Exception $e) {

			DB::rollBack();
			dd($e);
		}
	}
}
