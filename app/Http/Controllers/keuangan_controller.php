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

class keuangan_controller extends Controller
{

	protected $model;
	protected $models;
	// JABATAN]

	public function __construct()
	{
    	$this->model = new all_model();
		$this->models = new models();
	}

	public function group_akun()
	{
		# code...
		return view('keuangan.group_akun.group_akun');
	}

	public function datatable_group_akun()
	{
		$data = $this->model->group_akun()->all();


		// return $data;
		$data = collect($data);
		return Datatables::of($data)
		                ->addColumn('aksi', function ($data) {
		                  return   '<div class="btn-group">'.
		                           '<button type="button" onclick="lihats(\''.$data->ga_id.'\')" class="btn btn-primary btn-lg" title="Lihat Akun Yang Berelasi">'.
		                           '<label class="fa fa-book"></label></button>'.
		                           '<button type="button" onclick="edit(\''.$data->ga_id.'\')" class="btn btn-warning btn-lg" title="edit">'.
		                           '<label class="fa fa-pencil-alt"></label></button>'.
		                           '<button type="button" onclick="hapus(\''.$data->ga_id.'\')" class="btn btn-danger btn-lg" title="hapus">'.
		                           '<label class="fa fa-trash"></label></button>'.
		                           '</div>';
		                })
		                ->addColumn('none', function ($data) {
		                    return '-';
		                })->addColumn('jenis_group', function ($data) {
		                    if ($data->ga_jenis_group == 'neraca') {
		                    	return 'Neraca (Balance Sheet)';
		                    }else{
		                    	return 'LABA RUGI';
		                    }
		                })
		                ->rawColumns(['aksi', 'none','jenis_group'])
		                ->addIndexColumn()
		                ->make(true);
	}

	public function ajax_table_akun(Request $req)
	{
		$simpan_akun = $req->simpan_akun;
		$akun = [];
		if ($req->jenis_group == 'neraca') {
			$akun = $this->models->akun()->select('a_master_akun','a_master_nama')->where('a_group_neraca',null)
										 ->groupBy('a_master_akun','a_master_nama')
										 ->get();
		}elseif ($req->jenis_group == 'labarugi'){
			$akun = $this->models->akun()->select('a_master_akun','a_master_nama')->where('a_group_laba_rugi',null)
									     ->groupBy('a_master_akun','a_master_nama')
			                             ->get();
		}
		$flag = 'create';

		return view('keuangan.group_akun.ajax_table_akun',compact('akun','simpan_akun','flag'));
	}

	public function simpan_group_akun(Request $req)
	{
		DB::BeginTransaction();
		try{
		  if ($req->id == null) {
		    $id = $this->model->group_akun()->max('ga_id');
		    $save = array(
		                   'ga_id'				=> $id,
		                   'ga_nama'			=> strtoupper($req->ga_nama),
						   'ga_jenis_group'		=> $req->ga_jenis_group,
						   'ga_jenis_neraca'	=> $req->ga_jenis_neraca,
						   'created_by'			=> Auth::user()->name,
						   'updated_by'			=> Auth::user()->name,
		                );
		    $this->model->group_akun()->create($save);
		    for ($i=0; $i < count($req->simpan_akun); $i++) { 
		    	if ($req->ga_jenis_group == 'neraca') {
		    		$save = array(
		                   'a_group_neraca'		=> $id,
		                );
		    		$this->model->akun()->update($save,'a_master_akun',$req->simpan_akun[$i]);
		    	}else{
		    		$save = array(
		                   'a_group_laba_rugi'	=> $id,
		                );

		    		$this->model->akun()->update($save,'a_master_akun',$req->simpan_akun[$i]);
		    	}
		    }
		    DB::commit();
		    return Response::json(['status'=>1,'pesan'=>'Simpan Data!']);
		  }
		}catch(Exception $er){
		  dd($er);
		  DB::rollBack();
		}
	}

	public function lihat_group_akun(request $req)
	{
		$group_akun = $this->model->group_akun()->cari('ga_id',$req->id);

		if ($group_akun->ga_jenis_group == 'neraca') {
			$akun = $this->models->akun()->select('a_master_akun','a_master_nama')->where('a_group_neraca',$req->id)
										 ->groupBy('a_master_akun','a_master_nama')
										 ->get();
		}else{
			$akun = $this->models->akun()->select('a_master_akun','a_master_nama')->where('a_group_laba_rugi',$req->id)
									     ->groupBy('a_master_akun','a_master_nama')
			                             ->get();
		}
		$flag = 'lihat';
		return view('keuangan.group_akun.ajax_table_akun',compact('akun','flag'));
	}

	public function edit_group_akun(request $req)
	{
		$group_akun = $this->model->group_akun()->cari('ga_id',$req->id);
		if ($group_akun->ga_jenis_group == 'neraca') {
			$jenis = $this->models->akun()->select('a_master_akun','a_master_nama')->where('a_group_neraca',$req->id)
										 ->groupBy('a_master_akun','a_master_nama')
										 ->get();
		}else{
			$jenis = $this->models->akun()->select('a_master_akun','a_master_nama')->where('a_group_laba_rugi',$req->id)
									     ->groupBy('a_master_akun','a_master_nama')
			                             ->get();
		}
		$data = [];
		
		for ($i=0; $i < count($jenis); $i++) { 
			$data[$i] = $jenis[$i]->a_master_akun;
		}
		

		if ($group_akun->ga_jenis_group== 'neraca') {
			$akun = $this->models->akun()->select('a_master_akun','a_master_nama')->where('a_group_neraca',null)
										 ->orWhere('a_group_neraca',$req->id)
										 ->groupBy('a_master_akun','a_master_nama')
										 ->get();
		}elseif ($group_akun->ga_jenis_group== 'labarugi'){
			$akun = $this->models->akun()->select('a_master_akun','a_master_nama')->where('a_group_laba_rugi',null)
										 ->orWhere('a_group_laba_rugi',$req->id)
									     ->groupBy('a_master_akun','a_master_nama')
			                             ->get();
		}
		return view('keuangan.group_akun.edit_group_akun',compact('akun','data','group_akun'));
	}

	public function update_group_akun(Request $req)
	{
		DB::BeginTransaction();
		try{
		    $a_group_neraca = array(
				                   'a_group_neraca'		=> null,
				                );
			$a_group_laba_rugi = array(
				                   'a_group_laba_rugi'	=> null,
				                );
		    $this->model->akun()->update($a_group_neraca,'a_group_neraca',$req->ga_id);
		    $this->model->akun()->update($a_group_laba_rugi,'a_group_laba_rugi',$req->ga_id);

		    $save = array(
		                   'ga_nama'			=> strtoupper($req->ga_nama),
						   'ga_jenis_group'		=> $req->ga_jenis_group,
						   'ga_jenis_neraca'	=> $req->ga_jenis_neraca,
						   'updated_by'			=> Auth::user()->name,
		                );
		    $this->model->group_akun()->update($save,'ga_id',$req->ga_id);

		    for ($i=0; $i < count($req->edit_akun); $i++) { 
		    	if ($req->ga_jenis_group == 'neraca') {
		    		$save = array(
		                   'a_group_neraca'		=> $req->ga_id,
		                );
		    		$this->model->akun()->update($save,'a_master_akun',$req->edit_akun[$i]);
		    	}else{
		    		$save = array(
		                   'a_group_laba_rugi'	=> $req->ga_id,
		                );
		    		$this->model->akun()->update($save,'a_master_akun',$req->edit_akun[$i]);
		    	}
		    }
		    DB::commit();
		    return Response::json(['status'=>1,'pesan'=>'Simpan Data!']);
		}catch(Exception $er){
		  dd($er);
		  DB::rollBack();
		}
	}

	public function hapus_group_akun(Request $req)
	{
		$a_group_neraca = array(
		                   'a_group_neraca'			=> null,
		                );
		$a_group_laba_rugi = array(
		                   'a_group_laba_rugi'			=> null,
		                );
	    $this->model->akun()->update($a_group_neraca,'a_group_neraca',$req->id);
	    $this->model->akun()->update($a_group_laba_rugi,'a_group_laba_rugi',$req->id);
		$data = $this->model->group_akun()->delete('ga_id',$req->id);
		return response()->json(['status' => 1]);
	}

	public function keuangan()
	{
		$sekolah   = $this->model->sekolah()->all();
		$neraca    = $this->model->group_akun()->show('ga_jenis_group','neraca');
		$laba_rugi = $this->model->group_akun()->show('ga_jenis_group','labarugi');
		return view('keuangan.master_akun.keuangan',compact('sekolah','neraca','laba_rugi'));
	}

	public function datatable_keuangan()
	{
		$data = $this->model->akun()->all();


		// return $data;
		$data = collect($data);
		return Datatables::of($data)
		                ->addColumn('aksi', function ($data) {
		                  return   '<div class="btn-group">'.
		                           '<button type="button" onclick="edit(\''.$data->a_id.'\')" class="btn btn-info btn-lg" title="detail">'.
		                           '<label class="fa fa-pencil-alt"></label></button>'.
		                           '<button type="button" onclick="hapus(\''.$data->a_id.'\')" class="btn btn-danger btn-lg" title="hapus">'.
		                           '<label class="fa fa-trash"></label></button>'.
		                           '</div>';
		                })
		                ->addColumn('none', function ($data) {
		                    return '-';
		                })->addColumn('sekolah', function ($data) {
		                    return $data->sekolah->s_nama;
		                })
		                ->rawColumns(['aksi', 'none'])
		                ->addIndexColumn()
		                ->make(true);
	}

	public function simpan_keuangan(Request $req)
	{
		DB::BeginTransaction();
		try{
		  	$date = explode('-', $req->a_tanggal_pembuka);

		  	$tanggal = Carbon::createFromDate($date[2], $date[1],$date[0]);
		    if ($req->a_group_neraca == '') {
		    	$req->a_group_neraca = null;
		    }

		    if ($req->a_group_laba_rugi == '') {
		    	$req->a_group_laba_rugi = null;
		    }
		    if ($req->a_sekolah == 'all') {
				$sekolah   = $this->model->sekolah()->all();
				for ($i=0; $i < count($sekolah); $i++) { 
					$akun = $req->a_id1.$sekolah[$i]->s_id;
					$cari   = $this->model->akun()->cari('a_id',$akun);
					if ($cari == null) {
						$save = array(
					                   'a_id'				=> $req->a_id1.$sekolah[$i]->s_id,
									   'a_nama'				=> strtoupper($req->a_nama1.' '.$sekolah[$i]->s_nama),
									   'a_sekolah'			=> $sekolah[$i]->s_id,
									   'a_type_akun'		=> 'OCF',
									   'a_akun_dka'			=> $req->a_akun_dka,
									   'a_aktif'			=> $req->a_aktif,
									   'a_group_neraca'		=> $req->a_group_neraca,
									   'a_group_laba_rugi'	=> $req->a_group_laba_rugi,
									   'a_saldo_awal'		=> filter_var($req->a_saldo_awal,FILTER_SANITIZE_NUMBER_INT),
									   'a_tanggal_pembuka'	=> $tanggal,
									   'a_master_akun'		=> $req->a_id1,
									   'a_master_nama'		=> strtoupper($req->a_nama1),
									   'created_by'			=> Auth::user()->name,
									   'updated_by'			=> Auth::user()->name,
		                		);
						$this->model->akun()->create($save);
					}
				}

		    }else{
		    	$akun 	= $req->a_id1.$req->a_id2;
				$cari   = $this->model->akun()->cari('a_id',$akun);
				if ($cari == null) {
					$save = array(
				                   'a_id'				=> $req->a_id1.$req->a_id2,
								   'a_nama'				=> strtoupper($req->a_nama1.' '.$req->a_nama2),
								   'a_sekolah'			=> $req->a_sekolah,
								   'a_type_akun'		=> 'OCF',
								   'a_akun_dka'			=> $req->a_akun_dka,
								   'a_aktif'			=> $req->a_aktif,
								   'a_group_neraca'		=> $req->a_group_neraca,
								   'a_group_laba_rugi'	=> $req->a_group_laba_rugi,
								   'a_saldo_awal'		=> filter_var($req->a_saldo_awal,FILTER_SANITIZE_NUMBER_INT),
								   'a_tanggal_pembuka'	=> carbon::parse($req->a_tanggal_pembuka)->format('Y-m-d'),
								   'a_master_akun'		=> $req->a_id1,
								   'a_master_nama'		=> strtoupper($req->a_nama1),
								   'created_by'			=> Auth::user()->name,
								   'updated_by'			=> Auth::user()->name,
		                		);
					$this->model->akun()->create($save);
				}
		    }
		    DB::commit();
		    return Response::json(['status'=>1,'pesan'=>'Simpan Data!']);
		}catch(Exception $er){
		  dd($er);
		  DB::rollBack();
		}
	}

	public function edit_keuangan(request $req)
	{
		$data   = $this->model->akun()->cari('a_id',$req->id);
		$data->a_tanggal_pembuka = carbon::parse($data->a_tanggal_pembuka)->format('d-m-Y');
		return Response::json(['data'=>$data]);
	}

	public function update_keuangan(Request $req)
	{
		DB::BeginTransaction();
		try{
			// dd($req->all_model());
		    $save = array(
						   'a_nama'				=> strtoupper($req->e_nama1),
						   'a_akun_dka'			=> $req->e_akun_dka,
						   'a_aktif'			=> $req->a_aktif,
						   'a_group_neraca'		=> $req->e_group_neraca,
						   'a_group_laba_rugi'	=> $req->e_group_laba_rugi,
						   'a_saldo_awal'		=> filter_var($req->e_saldo_awal,FILTER_SANITIZE_NUMBER_INT),
						   'a_tanggal_pembuka'	=> carbon::parse($req->e_tanggal_pembuka)->format('Y-m-d'),
						   'updated_by'			=> Auth::user()->name,
                		);
			$this->model->akun()->update($save,'a_id',$req->e_id1);
		    DB::commit();
		    return Response::json(['status'=>1,'pesan'=>'Simpan Data!']);
		}catch(Exception $er){
		  dd($er);
		  DB::rollBack();
		}
	}

	public function hapus_keuangan(Request $req)
	{
		return response()->json(['status' => 0,'pesan'=>'Hanya Developer Yang Boleh Menghapus Data Akun']);
	}

	public function jurnal(Request $req)
	{
		$data = $this->models->jurnal()->where('j_ref',$req->nota)->where('j_detail',$req->jenis)->first();
		$d = 0;
		$k = 0;
		if ($data != null) {
			for ($i=0; $i < count($data->jurnal_dt); $i++) { 
				if ($data->jurnal_dt[$i]->jd_statusdk == 'DEBET') {
					if ($data->jurnal_dt[$i]->jd_value < 0) {
						$temp = $data->jurnal_dt[$i]->jd_value * -1;
					}else{
						$temp = $data->jurnal_dt[$i]->jd_value;
					}

					$d+=$temp;
				}else{
					if ($data->jurnal_dt[$i]->jd_value < 0) {
						$temp = $data->jurnal_dt[$i]->jd_value * -1;
					}else{
						$temp = $data->jurnal_dt[$i]->jd_value;
					}

					$k+=$temp;
				}
			}
		}
		
		return view('jurnal',compact('d','k','data'));
	}
}
