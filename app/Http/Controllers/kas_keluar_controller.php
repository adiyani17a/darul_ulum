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
class kas_keluar_controller extends Controller
{
    protected $model;
	protected $models;
	// JABATAN]

	public function __construct()
	{
    	$this->model = new all_model();
		$this->models = new models();
	}

	public function petty_cash(Request $req)
	{
		if (isset($req->simpan)) {
			Session::flash('message','Data Berhasil Dimpan');
		}
		return view('kas_keluar.petty_cash.petty_cash');
	}

	public function datatable_petty_cash()
	{
		$data = $this->model->petty_cash()->all();
		// return $data;
		$data = collect($data);
		return Datatables::of($data)
		                ->addColumn('aksi', function ($data) {
		                	$a = '<div class="btn-group"><button type="button" onclick="jurnal(\''.$data->pc_nota.'\')" class="btn btn-primary btn-lg" title="Check Jurnal"><label class="fa fa-book"></label></button>';
		                	$b = '';
		                	$c = '';
		                	$c1 = '';
		                	$d = '</div>';
		                	if (Auth::user()->akses('PETTY CASH','ubah')) {
		                		if ($data->pc_status == 'RELEASED') {
		                			$b = '<button type="button" onclick="edit(\''.$data->pc_id.'\')" class="btn btn-warning btn-lg" title="edit"><label class="fa fa-pencil-alt"></label></button>';
		                		}
		                	}

		                	if (Auth::user()->akses('PETTY CASH','hapus')) {
		                		if ($data->pc_status == 'RELEASED') {
		                			$c = '<button type="button" onclick="hapus(\''.$data->pc_id.'\')" class="btn btn-danger btn-lg" title="hapus"><label class="fa fa-trash"></label></button>';
		                		}
		                	}

							if ($data->pc_status == 'APPROVED') {
								$c1 = '<button type="button" onclick="cetak(\''.$data->pc_id.'\')" class="btn btn-danger btn-lg" title="hapus"><label class="fa fa-print"></label></button>';
							}

		                    return $a.$b.$c.$c1.$d;
		                })
		                ->addColumn('none', function ($data) {
		                    return '-';
		                })->addColumn('sekolah', function ($data) {
		                    return $data->sekolah->s_nama;
		                })->addColumn('status', function ($data) {
		                   	if ($data->pc_status == 'RELEASED') {
								return '<label class="badge badge-warning">RELEASED</label>';
		                   	}else if ($data->pc_status == 'APPROVED') {
								return '<label class="badge badge-primary">APPROVED</label>';
		                   	}if ($data->pc_status == 'POSTING') {
								return '<label class="label label-success">POSTING</label>';
		                   	}
		                })
		                ->rawColumns(['aksi', 'none','sekolah','status'])
		                ->addIndexColumn()
		                ->make(true);
	}

	public function create_petty_cash()
	{
		$sekolah = $this->model->sekolah()->all();
		$akun = $this->models->akun()->select('a_master_akun','a_master_nama')
									 ->where('a_master_akun','like','5%')
									 ->orWhere('a_master_akun','like','6%')
									 ->orWhere('a_master_akun','like','7%')
									 ->groupBy('a_master_akun','a_master_nama')
									 ->get();

		$akun_kas = $this->models->akun()->select('a_master_akun','a_master_nama')
									 ->where('a_master_akun','like','11110%')
									 ->groupBy('a_master_akun','a_master_nama')
									 ->get();
		return view('kas_keluar.petty_cash.tambah',compact('sekolah','akun','akun_kas'));
	}

	public function nota_petty_cash(Request $req)
	{
		$bulan = carbon::now()->format('m');
		$tahun = carbon::now()->format('Y');

		$cari = $this->models->petty_cash()
							   ->selectRaw("substring(max(pc_nota),13,3) as id")
							   ->whereRaw("MONTH(pc_tanggal) = '$bulan' and YEAR(pc_tanggal) = '$tahun'")
							   ->where('pc_sekolah',$req->pc_sekolah)
							   ->first();

        $index = (integer)$cari->id + 1;
        $index = str_pad($index, 3, '0', STR_PAD_LEFT);
        $nota = 'PC-'. $bulan . $tahun . '/' . $req->pc_sekolah . '/' . $index;

        return Response::json(['nota'=>$nota]);
	}

	public function simpan_petty_cash(Request $req)
	{
		DB::BeginTransaction();
		try{
		  	$cari = $this->model->petty_cash()->cari('pc_nota',$req->pc_nota);
		  	if ($cari != null) {
		  		DB::rollBack();
				return Response::json(['status'=>0,'pesan'=>'Ops, Nota Sudah Digunakan Silakan Refresh Browser Anda']);
		  	}
		  	// dd($req->all());
		  	$id = $this->model->petty_cash()->max('pc_id');
			$save = array(
		                   'pc_id'			=> $id,
						   'pc_nota'		=> $req->pc_nota,
						   'pc_akun_kas'	=> $req->pc_akun_kas,
						   'pc_keterangan'	=> strtoupper($req->pc_keterangan),
						   'pc_pemohon'		=> strtoupper($req->pc_pemohon),
						   'pc_sekolah'		=> $req->pc_sekolah,
						   'pc_total'		=> filter_var($req->pc_total,FILTER_SANITIZE_NUMBER_INT),
						   'pc_tanggal'		=> carbon::parse($req->pc_tanggal)->format('Y-m-d'),
						   'created_by'		=> Auth::user()->name,
						   'updated_by'		=> Auth::user()->name,
            		);
			$this->model->petty_cash()->create($save);

			for ($i=0; $i < count($req->pcd_akun_biaya); $i++) { 
				$save = array(
		                   'pcd_id'			=> $id,
						   'pcd_detail'		=> $i+1,
						   'pcd_akun_biaya'	=> $req->pcd_akun_biaya[$i],
						   'pcd_keterangan'	=> $req->pcd_keterangan[$i],
						   'pcd_jumlah'		=> filter_var($req->pcd_jumlah[$i],FILTER_SANITIZE_NUMBER_INT),
            			);

				$this->model->petty_cash_detail()->create($save);
			}
			// JURNAL

			$del_jurnal = $this->model->jurnal()->delete('j_ref',$req->pc_nota);
			$id_jurnal = $this->model->jurnal()->max('j_id');
			$save = array(
		                   'j_id'			=> $id_jurnal,
						   'j_tahun'		=> carbon::parse($req->pc_tanggal)->format('Y'),
						   'j_tanggal'		=> carbon::parse($req->pc_tanggal)->format('Y-m-d'),
						   'j_keterangan'	=> strtoupper($req->pc_keterangan),
						   'j_sekolah'		=> $req->pc_sekolah,
						   'j_ref'			=> $req->pc_nota,
						   'created_by'		=> Auth::user()->name,
						   'updated_by'		=> Auth::user()->name,
            		);
			$this->model->jurnal()->create($save);

			$akun 	  = [];
			$akun_val = [];
			$cari = $this->model->akun()->show_detail_one('a_master_akun',$req->pc_akun_kas,'a_sekolah',$req->pc_sekolah);
			if ($cari == null) {
				DB::rollBack();
				return Response::json(['status'=>0,'pesan'=>'Sekolah Ini Tidak Memilik Akun '.$req->pc_akun_kas]);
			}

			
			array_push($akun, $cari->a_id);
			array_push($akun_val, filter_var($req->pc_total,FILTER_SANITIZE_NUMBER_INT));

			for ($i=0; $i < count($req->pcd_akun_biaya); $i++) { 
				$cari = $this->model->akun()->show_detail_one('a_master_akun',$req->pcd_akun_biaya[$i],'a_sekolah',$req->pc_sekolah);

				if ($cari == null) {
					DB::rollBack();
					return Response::json(['status'=>0,'pesan'=>'Sekolah Ini Tidak Memilik Akun '.$req->pcd_akun_biaya[$i]]);
				}
				array_push($akun, $cari->a_id);
				array_push($akun_val, filter_var($req->pcd_jumlah[$i],FILTER_SANITIZE_NUMBER_INT));
			}

			$data_akun = [];
			for ($i=0; $i < count($akun); $i++) { 
				$cari_coa = $this->model->akun()->cari('a_id',$akun[$i]);
				if (substr($akun[$i],0, 2)==11) {
					if ($cari_coa->a_akun_dka == 'DEBET') {
						$data_akun[$i]['jd_id'] 	= $id_jurnal;
						$data_akun[$i]['jd_detail']	= $i+1;
						$data_akun[$i]['jd_akun'] 	 	= $akun[$i];
						$data_akun[$i]['jd_value'] 	= -filter_var($akun_val[$i],FILTER_SANITIZE_NUMBER_INT);
                		$data_akun[$i]['jd_keterangan']   = $cari_coa->a_nama . ' ' . strtoupper($req->pc_keterangan);
						$data_akun[$i]['jd_statusdk'] = 'KREDIT';
					}else{
						$data_akun[$i]['jd_id'] 	= $id_jurnal;
						$data_akun[$i]['jd_keterangan']	= $i+1;
						$data_akun[$i]['jd_akun'] 	 	= $akun[$i];
						$data_akun[$i]['jd_value'] 	= -filter_var($akun_val[$i],FILTER_SANITIZE_NUMBER_INT);
                		$data_akun[$i]['jd_keterangan']   = $cari_coa->a_nama . ' ' . strtoupper($req->pc_keterangan);
						$data_akun[$i]['jd_statusdk'] = 'DEBET';
					}
				}if (substr($akun[$i],0, 2)>11) {
					if ($cari_coa->a_akun_dka == 'DEBET') {
						$data_akun[$i]['jd_id'] 	= $id_jurnal;
						$data_akun[$i]['jd_detail']	= $i+1;
						$data_akun[$i]['jd_akun'] 	 	= $akun[$i];
						$data_akun[$i]['jd_value'] 	= filter_var($akun_val[$i],FILTER_SANITIZE_NUMBER_INT);
                		$data_akun[$i]['jd_keterangan']   = $cari_coa->a_nama . ' ' . strtoupper($req->pc_keterangan);
						$data_akun[$i]['jd_statusdk'] = 'DEBET';
					}else{
						$data_akun[$i]['jd_id'] 	= $id_jurnal;
						$data_akun[$i]['jd_detail']	= $i+1;
						$data_akun[$i]['jd_akun'] 	 	= $akun[$i];
						$data_akun[$i]['jd_value'] 	= filter_var($akun_val[$i],FILTER_SANITIZE_NUMBER_INT);
                		$data_akun[$i]['jd_keterangan']   = $cari_coa->a_nama . ' ' . strtoupper($req->pc_keterangan);
						$data_akun[$i]['jd_statusdk'] = 'KREDIT';
					}
				}
			}
			$jurnal_dt = $this->models->jurnal_dt()->insert($data_akun);
				
			$lihat = $this->model->jurnal_dt()->show('jd_id',$id_jurnal);

			$check = $this->models->check_jurnal($req->pc_nota);
			if ($check == 0) {
				DB::rollBack();
				return Response::json(['status'=>0,'pesan'=>'Jurnal Tidak Balance']);
			}
		    DB::commit();
		    return Response::json(['status'=>1,'pesan'=>'Simpan Data!']);
		}catch(Exception $er){
		  dd($er);
		  DB::rollBack();
		}
	}

	public function edit_petty_cash(Request $req)
	{
		$data = $this->model->petty_cash()->cari('pc_id',$req->id);
		$sekolah = $this->model->sekolah()->all();
		$akun = $this->models->akun()->select('a_master_akun','a_master_nama')
									 ->where('a_master_akun','like','5%')
									 ->orWhere('a_master_akun','like','6%')
									 ->orWhere('a_master_akun','like','7%')
									 ->groupBy('a_master_akun','a_master_nama')
									 ->get();

		$akun_kas = $this->models->akun()->select('a_master_akun','a_master_nama')
									 ->where('a_master_akun','like','11110%')
									 ->groupBy('a_master_akun','a_master_nama')
									 ->get();
		return view('kas_keluar.petty_cash.edit_petty_cash',compact('sekolah','akun','akun_kas','data'));
	}

	public function hapus_petty_cash(Request $req)
	{
		$data = $this->model->petty_cash()->delete('pc_id',$req->id);
		return Response::json(['status'=>1,'pesan'=>'Hapus Data!']);
	}

	public function update_petty_cash(Request $req)
	{
		try{
		    $this->model->petty_cash()->delete('pc_id',$req->id);
			return $this->simpan_petty_cash($req);
		}catch(Exception $er){
		  dd($er);
		  DB::rollBack();
		}
	}

}
