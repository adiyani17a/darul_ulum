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

	public function __construct()
	{
    	$this->model = new all_model();
		$this->models = new models();
	}
	// RENCANA PEMBELIAN
	public function rencana_pembelian($value='')
	{
		return view('kas_keluar.rencana_pembelian.rencana_pembelian');
	}

	public function datatable_rencana_pembelian()
	{
		$data = $this->model->rencana_pembelian()->all();
		// return $data;
		$data = collect($data);
		return Datatables::of($data)
		                ->addColumn('aksi', function ($data) {
		                	$a = '<div class="btn-group">';
		                	$b = '';
		                	$c = '';
		                	$c1 = '';
		                	$c2 = '';
		                	$d = '</div>';
		                	if (Auth::user()->akses('RENCANA PEMBELIAN','ubah')) {
		                		if ($data->rp_status == 'Release') {
		                			$b = '<button type="button" onclick="edit(\''.$data->rp_id.'\')" class="btn btn-warning btn-lg" title="edit"><label class="fa fa-pencil-alt"></label></button>';
		                		}
		                	}

		                	if (Auth::user()->akses('RENCANA PEMBELIAN','hapus')) {
		                		if ($data->rp_status != 'Selesai') {
		                			$c = '<button type="button" onclick="hapus(\''.$data->rp_id.'\')" class="btn btn-danger btn-lg" title="hapus"><label class="fa fa-trash"></label></button>';
		                		}
		                	}

		                	if (Auth::user()->akses('APPROVE PEMBELIAN','aktif')) {
		                		if ($data->rp_status == 'Release') {
		                			$c2 = '<button type="button"  title="approve rencana pembelian" onclick="approve(\''.$data->rp_id.'\')" class="btn btn-info btn-lg" ><label class="fa fa-check"></label></button>';
		                		}
		                	}

							if ($data->rp_status == 'Berjalan') {
								$c1 = '<button type="button" onclick="cetak(\''.$data->rp_id.'\')" class="btn btn-info btn-lg" title="cetak"><label class="fa fa-print"></label></button>';
							}

		                    return $a.$b.$c.$c1.$c2.$d;
		                })
		                ->addColumn('nota', function ($data) {
		                    return '<a class="btn_modal" onclick="detail(\''.$data->rp_id.'\')" style="color:blue">'.$data->rp_kode.'</a>';
		                })->addColumn('sekolah', function ($data) {
		                    return $data->sekolah->s_nama;
		                })->addColumn('status', function ($data) {
		                   	if ($data->rp_status == 'Release') {
								return '<label class="badge badge-warning">RELEASED</label>';
		                   	}else if ($data->rp_status == 'Berjalan') {
								return '<label class="badge badge-primary">APPROVED</label>';
		                   	}if ($data->rp_status == 'Selesai') {
								return '<label class="label label-success">SELESAI</label>';
		                   	}
		                })
		                ->rawColumns(['aksi', 'nota','sekolah','status'])
		                ->addIndexColumn()
		                ->make(true);
	}

	public function create_rencana_pembelian()
	{
		$sekolah = $this->model->sekolah()->all();
		$barang = $this->model->barang()->all();
		return view('kas_keluar.rencana_pembelian.create_rencana_pembelian',compact('sekolah','barang'));
	}

	public function nota_rencana_pembelian(Request $req)
	{
		$bulan = carbon::now()->format('m');
		$tahun = carbon::now()->format('Y');

		$cari = $this->models->rencana_pembelian()
							   ->selectRaw("substring(max(rp_kode),13,3) as id")
							   ->whereRaw("MONTH(rp_tanggal) = '$bulan' and YEAR(rp_tanggal) = '$tahun'")
							   ->where('rp_sekolah',$req->rp_sekolah)
							   ->first();

        $index = (integer)$cari->id + 1;
        $index = str_pad($index, 3, '0', STR_PAD_LEFT);
        $nota = 'RP-'. $bulan . $tahun . '/' . $req->rp_sekolah . '/' . $index;

        return Response::json(['nota'=>$nota]);
	}

	public function simpan_rencana_pembelian(Request $req)
	{
		DB::BeginTransaction();
		try {
			// dd($req->all());
			$cari = $this->model->rencana_pembelian()->cari('rp_kode',$req->rp_kode);
			if ($cari != null) {
				DB::rollBack();
				return Response::json(['status'=>0,'pesan'=>'Kode Anggaran Telah Digunakan']);
			}

			$id = $this->model->rencana_pembelian()->max('rp_id');
			$save = array(
						   'rp_id'			=> $id,
						   'rp_kode'		=> strtoupper($req->rp_kode),
						   'rp_tahun'		=> carbon::parse($req->rp_tanggal)->format('Y'),
						   'rp_tanggal'		=> carbon::parse($req->rp_tanggal)->format('Y-m-d'),
						   'rp_keterangan'	=> strtoupper($req->rp_keterangan),
						   'rp_total'		=> filter_var($req->rp_total,FILTER_SANITIZE_NUMBER_INT),
						   'rp_sekolah'		=> $req->rp_sekolah,
						   'created_by'		=> Auth::user()->name,
						   'updated_by'		=> Auth::user()->name,
						 );

			$this->model->rencana_pembelian()->create($save);

			for ($i=0; $i < count($req->rpd_barang); $i++) { 
				if ($req->rpd_jumlah[$i] == '') {
					$jumlah = 0;
				}else{
					$jumlah = $req->rpd_jumlah[$i];
				}
				$save = array(
						   'rpd_id'		=> $id,
						   'rpd_detail'	=> $i+1,
						   'rpd_barang'	=> $req->rpd_barang[$i],
						   'rpd_jumlah'	=> $jumlah,
						   'rpd_sisa'	=> $jumlah,
						 );
				$this->model->rencana_pembelian_d()->create($save);
			}
			DB::commit();
			return Response::json(['status'=>1]);
		} catch (Exception $e) {
			DB::rollBack();
			dd($e);
		}
	}

	public function edit_rencana_pembelian(Request $req)
	{
		$data = $this->model->rencana_pembelian()->cari('rp_id',$req->id);
		$sekolah = $this->model->sekolah()->all();
		$barang = $this->model->barang()->all();
		return view('kas_keluar.rencana_pembelian.edit_rencana_pembelian',compact('data','sekolah','barang'));
	}

	public function update_rencana_pembelian(Request $req)
	{
		try{
		    $this->model->rencana_pembelian()->delete('rp_id',$req->id);
			return $this->simpan_rencana_pembelian($req);
		}catch(Exception $er){
		  dd($er);
		  DB::rollBack();
		}
	}

	public function approve_rencana_pembelian(Request $req)
	{
		$save = array('rp_status'=>'Berjalan');
		$this->model->rencana_pembelian()->update($save,'rp_id',$req->id);
		return Response::json(['status'=>1]);
	}

	public function hapus_rencana_pembelian(Request $req)
	{
		$this->model->rencana_pembelian()->delete('rp_id',$req->id);
		return Response::json(['status'=>1]);
	}

	public function detail_rencana_pembelian(Request $req)
	{
		$data = $this->model->rencana_pembelian()->cari('rp_id',$req->id);
		return view('kas_keluar.rencana_pembelian.table_modal',compact('data'));
	}
	// PETTY CASH
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
