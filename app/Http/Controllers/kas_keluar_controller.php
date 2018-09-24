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
		                })->addColumn('nota', function ($data) {
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
	// PENGELUARAN ANGGARAN
	public function pengeluaran_anggaran(Request $req)
	{
		if (isset($req->simpan)) {
			Session::flash('message','Data Berhasil Simpan');
		}
		return view('kas_keluar.pengeluaran_anggaran.pengeluaran_anggaran');
	}

	public function datatable_pengeluaran_anggaran()
	{
		$data = $this->model->petty_cash()->show('pc_jenis','ANGGARAN');
		// return $data;
		$data = collect($data);
		return Datatables::of($data)
		                ->addColumn('aksi', function ($data) {
		                	$a = '<div class="btn-group">' ;
		                	$b = '';
		                	$c = '';
		                	$c1 = '';
		                	$d = '</div>';

		                	if ($data->pc_status == 'APPROVED') {
								$a = '<div class="btn-group"><button type="button" onclick="jurnal(\''.$data->pc_nota.'\',\'ANGGARAN\')" class="btn btn-primary btn-lg" title="Check Jurnal"><label class="fa fa-book"></label></button>';
							}

		                	if (Auth::user()->akses('PETTY CASH','ubah')) {
		                		if ($data->pc_status == 'RELEASED') {
		                			$b = '<button type="button" onclick="edit(\''.$data->pc_nota.'\')" class="btn btn-warning btn-lg" title="edit"><label class="fa fa-pencil-alt"></label></button>';
		                		}
		                	}

		                	if (Auth::user()->akses('PETTY CASH','hapus')) {
		                		if ($data->pc_status == 'RELEASED') {
		                			$c = '<button type="button" onclick="hapus(\''.$data->pc_nota.'\')" class="btn btn-danger btn-lg" title="hapus"><label class="fa fa-trash"></label></button>';
		                		}
		                	}

							if ($data->pc_status == 'APPROVED') {
								$c1 = '<button type="button" onclick="cetak(\''.$data->pc_nota.'\')" class="btn btn-danger btn-lg" title="hapus"><label class="fa fa-print"></label></button>';
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
								return '<label class="badge badge-primary">DISETUJUI</label>';
		                   	}else if ($data->pc_status == 'REJECTED') {
								return '<label class="badge badge-danger">DITOLAK</label>';
		                   	}if ($data->pc_status == 'POSTING') {
								return '<label class="label label-success">POSTING</label>';
		                   	}
		                })->addColumn('nota', function ($data) {
		                    return '<a class="btn_modal" onclick="detail(\''.$data->pc_nota.'\')" style="color:blue">'.$data->pc_nota.'</a>';
		                })
		                ->rawColumns(['aksi', 'none','sekolah','status','nota'])
		                ->addIndexColumn()
		                ->make(true);
	}

	public function create_pengeluaran_anggaran()
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
		return view('kas_keluar.pengeluaran_anggaran.create_pengeluaran_anggaran',compact('sekolah','akun','akun_kas'));
	}

	public function cari_pengeluaran_anggaran(Request $req)
	{
		$data = $this->models->rencana_pembelian()
							 ->where('rp_status','!=','Selesai')
							 ->where('rp_sekolah',$req->sekolah)
							 ->get();

		return view('kas_keluar.pengeluaran_anggaran.table_modal',compact('data'));
	}

	public function pilih_pengeluaran_anggaran(Request $req)
	{
		$data = $this->model->rencana_pembelian()->cari('rp_kode',$req->id);
		$data = $data->rencana_pembelian_d;
		for ($i=0; $i < count($data); $i++) { 
			$data[$i]->nama_barang = $data[$i]->barang->b_nama;
			$data[$i]->harga_barang = $data[$i]->barang->b_harga_tertinggi;
		}
		return Response::json(['data'=>$data]);
	}

	public function simpan_pengeluaran_anggaran(Request $req)
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
						   'pc_jenis'		=> 'ANGGARAN',
						   'pc_ref'			=> $req->kode_rencana,
						   'created_by'		=> Auth::user()->name,
						   'updated_by'		=> Auth::user()->name,
            			);
			
			$this->model->petty_cash()->create($save);

			for ($i=0; $i < count($req->rpd_detail); $i++) { 
				$barang = $this->model->barang()->cari('b_id',$req->rpd_barang[$i]);
				$save = array(
		                   'pcd_id'			=> $id,
						   'pcd_detail'		=> $i+1,
						   'pcd_akun_biaya'	=> $barang->b_akun,
						   'pcd_keterangan'	=> $req->pcd_keterangan[$i],
						   'pcd_jumlah'		=> filter_var($req->pcd_jumlah[$i],FILTER_SANITIZE_NUMBER_INT),
						   'pcd_rpd_detail'	=> $req->rpd_detail[$i],
						   'pcd_qty'		=> $req->pcd_qty[$i],
						   'pcd_barang'		=> $req->rpd_barang[$i],
            			);

				$this->model->petty_cash_detail()->create($save);
			}

			$rencana = $this->model->rencana_pembelian()->cari('rp_kode',$req->kode_rencana);
			$status = [];
			for ($i=0; $i < count($rencana->rencana_pembelian_d); $i++) { 
				for ($a=0; $a < count($req->rpd_detail); $a++) { 
					if ($rencana->rencana_pembelian_d[$i]->rpd_detail == $req->rpd_detail[$a]) {
						$sisa = $rencana->rencana_pembelian_d[$i]->rpd_sisa - $req->pcd_qty[$a];
						if ($sisa == 0) {
							array_push($status, '0');
						}else{
							array_push($status, '1');
						}
						$upd = array(
										'rpd_sisa' => $sisa
									);
						$this->models->rencana_pembelian_d()->where('rpd_id',$rencana->rp_id)
															->where('rpd_detail',$req->rpd_detail[$a])
															->update($upd);
					}
				}
			}

			if (!in_array('1', $status)) {
				$upd = array(
								'rp_status' => 'Selesai'
							);
				$rencana = $this->model->rencana_pembelian()->update($upd,'rp_kode',$req->kode_rencana);
			}
			DB::commit();
		    return Response::json(['status'=>1,'pesan'=>'Simpan Data!']);
		} catch (Exception $e) {
			DB::rollBack();
			dd($e);
		}
	}

	public function edit_pengeluaran_anggaran(Request $req)
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
		$data     = $this->model->petty_cash()->cari('pc_nota',$req->id);

		$rencana  = $this->model->rencana_pembelian()->cari('rp_kode',$data->pc_ref);
		return view('kas_keluar.pengeluaran_anggaran.edit_pengeluaran_anggaran',compact('sekolah','akun','akun_kas','data','rencana'));
	}

	public function update_pengeluaran_anggaran(Request $req)
	{
		DB::BeginTransaction();
		try {
			$cari = $this->model->petty_cash()->cari('pc_nota',$req->pc_nota);
			foreach ($cari->rencana_pembelian->rencana_pembelian_d as $i => $val1) {
				foreach ($cari->petty_cash_detail as $a => $val2) {
					if ($val1->rpd_detail == $val2->pcd_rpd_detail) {
						$sisa = $val1->rpd_sisa + $val2->pcd_qty;
						$upd = array(
										'rpd_sisa' => $sisa
									);
						$this->models->rencana_pembelian_d()->where('rpd_id',$val1->rpd_id)
															->where('rpd_detail',$val1->rpd_detail)
															->update($upd);
					}
				}
			}

			$upd = array(
							'rp_status' => 'Berjalan'
						);

			$rencana = $this->model->rencana_pembelian()->update($upd,'rp_kode',$req->kode_rencana);


			// dd($req->all());

			$id = $cari->pc_id;

			$save = array(
		                   'pc_id'			=> $id,
						   'pc_nota'		=> $req->pc_nota,
						   'pc_akun_kas'	=> $req->pc_akun_kas,
						   'pc_keterangan'	=> strtoupper($req->pc_keterangan),
						   'pc_pemohon'		=> strtoupper($req->pc_pemohon),
						   'pc_sekolah'		=> $req->pc_sekolah,
						   'pc_total'		=> filter_var($req->pc_total,FILTER_SANITIZE_NUMBER_INT),
						   'pc_tanggal'		=> carbon::parse($req->pc_tanggal)->format('Y-m-d'),
						   'pc_jenis'		=> 'ANGGARAN',
						   'pc_ref'			=> $req->kode_rencana,
						   'created_by'		=> Auth::user()->name,
						   'updated_by'		=> Auth::user()->name,
            			);
			
			$this->model->petty_cash()->update($save,'pc_id',$id);
			$this->model->petty_cash_detail()->delete('pcd_id',$id);
			for ($i=0; $i < count($req->rpd_detail); $i++) { 
				$barang = $this->model->barang()->cari('b_id',$req->rpd_barang[$i]);
				$save = array(
		                   'pcd_id'			=> $id,
						   'pcd_detail'		=> $i+1,
						   'pcd_akun_biaya'	=> $barang->b_akun,
						   'pcd_keterangan'	=> $req->pcd_keterangan[$i],
						   'pcd_jumlah'		=> filter_var($req->pcd_jumlah[$i],FILTER_SANITIZE_NUMBER_INT),
						   'pcd_rpd_detail'	=> $req->rpd_detail[$i],
						   'pcd_qty'		=> $req->pcd_qty[$i],
						   'pcd_barang'		=> $req->rpd_barang[$i],
            			);

				$this->model->petty_cash_detail()->create($save);
			}

			$rencana = $this->model->rencana_pembelian()->cari('rp_kode',$req->kode_rencana);
			$status = [];
			for ($i=0; $i < count($rencana->rencana_pembelian_d); $i++) { 
				for ($a=0; $a < count($req->rpd_detail); $a++) { 
					if ($rencana->rencana_pembelian_d[$i]->rpd_detail == $req->rpd_detail[$a]) {
						$sisa = $rencana->rencana_pembelian_d[$i]->rpd_sisa - $req->pcd_qty[$a];
						if ($sisa == 0) {
							array_push($status, '0');
						}else{
							array_push($status, '1');
						}
						$upd = array(
										'rpd_sisa' => $sisa
									);
						$this->models->rencana_pembelian_d()->where('rpd_id',$rencana->rp_id)
															->where('rpd_detail',$req->rpd_detail[$a])
															->update($upd);
					}
				}
			}

			if (!in_array('1', $status)) {
				$upd = array(
								'rp_status' => 'Selesai'
							);
				$rencana = $this->model->rencana_pembelian()->update($upd,'rp_kode',$req->kode_rencana);
			}
			DB::commit();
		    return Response::json(['status'=>1,'pesan'=>'Simpan Data!']);
		} catch (Exception $e) {
			DB::rollBack();
			dd($e);
		}
	}

	public function hapus_pengeluaran_anggaran(Request $req)
	{
		DB::BeginTransaction();
		try {
			$cari = $this->model->petty_cash()->cari('pc_nota',$req->id);
			foreach ($cari->rencana_pembelian->rencana_pembelian_d as $i => $val1) {
				foreach ($cari->petty_cash_detail as $a => $val2) {
					if ($val1->rpd_detail == $val2->pcd_rpd_detail) {
						$sisa = $val1->rpd_sisa + $val2->pcd_qty;
						$upd = array(
										'rpd_sisa' => $sisa
									);
						$this->models->rencana_pembelian_d()->where('rpd_id',$val1->rpd_id)
															->where('rpd_detail',$val1->rpd_detail)
															->update($upd);
					}
				}
			}

			$upd = array(
							'rp_status' => 'Berjalan'
						);

			$rencana = $this->model->rencana_pembelian()->update($upd,'rp_kode',$cari->pc_ref);

			$this->model->petty_cash()->delete('pc_nota',$req->id);

			DB::commit();
		    return Response::json(['status'=>1,'pesan'=>'Simpan Data!']);
		} catch (Exception $e) {
			DB::rollBack();
			dd($e);
		}
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
		$data = $this->model->petty_cash()->show('pc_jenis','PETTY');
		// return $data;
		$data = collect($data);
		return Datatables::of($data)
		                ->addColumn('aksi', function ($data) {
		                	$a = '<div class="btn-group">' ;
		                	$b = '';
		                	$c = '';
		                	$c1 = '';
		                	$d = '</div>';

		                	if ($data->pc_status == 'APPROVED') {
								$a = '<div class="btn-group"><button type="button" onclick="jurnal(\''.$data->pc_nota.'\',\'PETTY CASH\')" class="btn btn-primary btn-lg" title="Check Jurnal"><label class="fa fa-book"></label></button>';
							}

		                	if (Auth::user()->akses('PETTY CASH','ubah')) {
		                		if ($data->pc_status == 'RELEASED') {
		                			$b = '<button type="button" onclick="edit(\''.$data->pc_nota.'\')" class="btn btn-warning btn-lg" title="edit"><label class="fa fa-pencil-alt"></label></button>';
		                		}
		                	}

		                	if (Auth::user()->akses('PETTY CASH','hapus')) {
		                		if ($data->pc_status == 'RELEASED') {
		                			$c = '<button type="button" onclick="hapus(\''.$data->pc_nota.'\')" class="btn btn-danger btn-lg" title="hapus"><label class="fa fa-trash"></label></button>';
		                		}
		                	}

							if ($data->pc_status == 'APPROVED') {
								$c1 = '<button type="button" onclick="cetak(\''.$data->pc_nota.'\')" class="btn btn-danger btn-lg" title="hapus"><label class="fa fa-print"></label></button>';
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
								return '<label class="badge badge-primary">DISETUJUI</label>';
		                   	}else if ($data->pc_status == 'REJECTED') {
								return '<label class="badge badge-danger">DITOLAK</label>';
		                   	}if ($data->pc_status == 'POSTING') {
								return '<label class="label label-success">POSTING</label>';
		                   	}
		                })->addColumn('nota', function ($data) {
		                    return '<a class="btn_modal" onclick="detail(\''.$data->pc_nota.'\')" style="color:blue">'.$data->pc_nota.'</a>';
		                })
		                ->rawColumns(['aksi', 'none','sekolah','status','nota'])
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
						   'pc_jenis'		=> 'PETTY',
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
			
		    DB::commit();
		    return Response::json(['status'=>1,'pesan'=>'Simpan Data!']);
		}catch(Exception $er){
		  dd($er);
		  DB::rollBack();
		}
	}

	public function edit_petty_cash(Request $req)
	{
		$data = $this->model->petty_cash()->cari('pc_nota',$req->id);
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
		$data = $this->model->petty_cash()->delete('pc_nota',$req->id);
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

	// KONFIRMASI PEMBELIAN
	public function konfirmasi_pengeluaran_kas()
	{
		
		return view('kas_keluar.konfirmasi_pengeluaran_kas.konfirmasi_pengeluaran_kas');
	}

	public function datatable_konfirmasi_pengeluaran_kas()
	{
		$data = $this->model->petty_cash()->show('pc_status','RELEASED');
		// return $data;
		$data = collect($data);
		return Datatables::of($data)
		                ->addColumn('aksi', function ($data) {
		                	$a = '<div class="btn-group">';
		                	$b = '';
		                	$c = '';
		                	$d = '</div>';
                			$b = '<button type="button" onclick="konfirm(\''.$data->pc_nota.'\')" class="btn btn-success btn-lg" title="Konfirmasi"><label class="fa fa-check"></label></button>';

                			$c = '<button type="button" onclick="batal(\''.$data->pc_nota.'\')" class="btn btn-danger btn-lg" title="Batal"><label class="fa fa-times"></label></button>';

		                    return $a.$b.$c.$d;
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
		                })->addColumn('nota', function ($data) {
		                    return '<a class="btn_modal" onclick="detail(\''.$data->pc_nota.'\')" style="color:blue">'.$data->pc_nota.'</a>';
		                })
		                ->rawColumns(['aksi', 'none','sekolah','status','nota'])
		                ->addIndexColumn()
		                ->make(true);
	}

	public function detail_konfirmasi_pengeluaran_kas(Request $req)
	{
		$data = $this->model->petty_cash()->cari('pc_nota',$req->id);
		return view('kas_keluar.konfirmasi_pengeluaran_kas.table_modal',compact('data'));
	}

	public function simpan_konfirmasi_pengeluaran_kas(Request $req)
	{
		DB::BeginTransaction();
		try {
		  	$cari = $this->model->petty_cash()->cari('pc_nota',$req->id);
			if ($req->status == 'KONFIRM') {
				if ($cari->pc_jenis == 'ANGGARAN') {
					$upd = array(
									'pc_status' => 'APPROVED'
								);

					$this->model->petty_cash()->update($upd,'pc_nota',$req->id);

					// JURNAL
					$del_jurnal = $this->model->jurnal()->delete('j_ref',$cari->pc_nota);
					$id_jurnal = $this->model->jurnal()->max('j_id');
					$save = array(
				                   'j_id'			=> $id_jurnal,
								   'j_tahun'		=> carbon::parse($cari->pc_tanggal)->format('Y'),
								   'j_tanggal'		=> carbon::parse($cari->pc_tanggal)->format('Y-m-d'),
								   'j_keterangan'	=> strtoupper($cari->pc_keterangan),
								   'j_sekolah'		=> $cari->pc_sekolah,
								   'j_ref'			=> $cari->pc_nota,
								   'j_detail'		=> 'ANGGARAN',
								   'created_by'		=> Auth::user()->name,
								   'updated_by'		=> Auth::user()->name,
		            		);
					$this->model->jurnal()->create($save);

					$akun 	  = [];
					$akun_val = [];
					$akun_ket = [];
					$akun_kas = $this->model->akun()->show_detail_one('a_master_akun',$cari->pc_akun_kas,'a_sekolah',$cari->pc_sekolah);
					if ($akun_kas == null) {
						DB::rollBack();
						return Response::json(['status'=>0,'pesan'=>'Sekolah Ini Tidak Memilik Akun '.$cari->pc_akun_kas]);
					}

					array_push($akun, $akun_kas->a_id);
					array_push($akun_val, $cari->pc_total);
					array_push($akun_ket, strtoupper($cari->pc_keterangan));


					for ($i=0; $i < count($cari->petty_cash_detail); $i++) { 
						if ($cari->petty_cash_detail[$i]->pcd_jumlah != 0) {
							$akun_biaya = $this->model->akun()->show_detail_one('a_master_akun',$cari->petty_cash_detail[$i]->pcd_akun_biaya,'a_sekolah',$cari->pc_sekolah);

							if ($akun_biaya == null) {
								DB::rollBack();
								return Response::json(['status'=>0,'pesan'=>'Sekolah Ini Tidak Memilik Akun '.$cari[$i]->pcd_akun_biaya]);
							}
							array_push($akun, $akun_biaya->a_id);
							array_push($akun_val, $cari->petty_cash_detail[$i]->pcd_jumlah);
							array_push($akun_ket, strtoupper($cari->petty_cash_detail[$i]->pcd_keterangan));
						}
							
					}

					$data_akun = [];
					for ($i=0; $i < count($akun); $i++) { 
						$cari_coa = $this->model->akun()->cari('a_id',$akun[$i]);
						if (substr($akun[$i],0, 2)==11) {
							if ($cari_coa->a_akun_dka == 'DEBET') {
								$data_akun[$i]['jd_id'] 	= $id_jurnal;
								$data_akun[$i]['jd_detail']	= $i+1;
								$data_akun[$i]['jd_akun'] 	 	= $akun[$i];
								$data_akun[$i]['jd_value'] 	= -$akun_val[$i];
		                		$data_akun[$i]['jd_keterangan']   = $cari_coa->a_nama . ' ' . $akun_ket[$i];
								$data_akun[$i]['jd_statusdk'] = 'KREDIT';
							}else{
								$data_akun[$i]['jd_id'] 	= $id_jurnal;
								$data_akun[$i]['jd_keterangan']	= $i+1;
								$data_akun[$i]['jd_akun'] 	 	= $akun[$i];
								$data_akun[$i]['jd_value'] 	= -$akun_val[$i];
		                		$data_akun[$i]['jd_keterangan']   = $cari_coa->a_nama . ' ' . $akun_ket[$i];
								$data_akun[$i]['jd_statusdk'] = 'DEBET';
							}
						}if (substr($akun[$i],0, 2)>11) {
							if ($cari_coa->a_akun_dka == 'DEBET') {
								$data_akun[$i]['jd_id'] 	= $id_jurnal;
								$data_akun[$i]['jd_detail']	= $i+1;
								$data_akun[$i]['jd_akun'] 	= $akun[$i];
								$data_akun[$i]['jd_value'] 	= $akun_val[$i];
		                		$data_akun[$i]['jd_keterangan']   = $cari_coa->a_nama . ' ' . $akun_ket[$i];
								$data_akun[$i]['jd_statusdk'] = 'DEBET';
							}else{
								$data_akun[$i]['jd_id'] 	= $id_jurnal;
								$data_akun[$i]['jd_detail']	= $i+1;
								$data_akun[$i]['jd_akun'] 	 	= $akun[$i];
								$data_akun[$i]['jd_value'] 	= $akun_val[$i];
		                		$data_akun[$i]['jd_keterangan']   = $cari_coa->a_nama . ' ' . $akun_ket[$i];
								$data_akun[$i]['jd_statusdk'] = 'KREDIT';
							}
						}
					}
					$jurnal_dt = $this->models->jurnal_dt()->insert($data_akun);
						
					$lihat = $this->model->jurnal_dt()->show('jd_id',$id_jurnal);
					$check = $this->models->check_jurnal($cari->pc_nota);
					if ($check == 0) {
						DB::rollBack();
						return Response::json(['status'=>0,'pesan'=>'Jurnal Tidak Balance']);
					}

		  		}else{
		  			$upd = array(
									'pc_status' => 'APPROVED'
								);

					$this->model->petty_cash()->update($upd,'pc_nota',$req->id);

					// JURNAL
					$del_jurnal = $this->model->jurnal()->delete('j_ref',$cari->pc_nota);
					$id_jurnal = $this->model->jurnal()->max('j_id');
					$save = array(
				                   'j_id'			=> $id_jurnal,
								   'j_tahun'		=> carbon::parse($cari->pc_tanggal)->format('Y'),
								   'j_tanggal'		=> carbon::parse($cari->pc_tanggal)->format('Y-m-d'),
								   'j_keterangan'	=> strtoupper($cari->pc_keterangan),
								   'j_sekolah'		=> $cari->pc_sekolah,
								   'j_ref'			=> $cari->pc_nota,
								   'j_detail'		=> 'PETTY CASH',
								   'created_by'		=> Auth::user()->name,
								   'updated_by'		=> Auth::user()->name,
		            		);
					$this->model->jurnal()->create($save);

					$akun 	  = [];
					$akun_val = [];
					$akun_ket = [];
					$akun_kas = $this->model->akun()->show_detail_one('a_master_akun',$cari->pc_akun_kas,'a_sekolah',$cari->pc_sekolah);
					if ($akun_kas == null) {
						DB::rollBack();
						return Response::json(['status'=>0,'pesan'=>'Sekolah Ini Tidak Memilik Akun '.$cari->pc_akun_kas]);
					}

					array_push($akun, $akun_kas->a_id);
					array_push($akun_val, $cari->pc_total);
					array_push($akun_ket, strtoupper($cari->pc_keterangan));


					for ($i=0; $i < count($cari->petty_cash_detail); $i++) { 
						if ($cari->petty_cash_detail[$i]->pcd_jumlah != 0) {
							$akun_biaya = $this->model->akun()->show_detail_one('a_master_akun',$cari->petty_cash_detail[$i]->pcd_akun_biaya,'a_sekolah',$cari->pc_sekolah);

							if ($akun_biaya == null) {
								DB::rollBack();
								return Response::json(['status'=>0,'pesan'=>'Sekolah Ini Tidak Memilik Akun '.$cari[$i]->pcd_akun_biaya]);
							}
							array_push($akun, $akun_biaya->a_id);
							array_push($akun_val, $cari->petty_cash_detail[$i]->pcd_jumlah);
							array_push($akun_ket, strtoupper($cari->petty_cash_detail[$i]->pcd_keterangan));
						}
							
					}

					$data_akun = [];
					for ($i=0; $i < count($akun); $i++) { 
						$cari_coa = $this->model->akun()->cari('a_id',$akun[$i]);
						if (substr($akun[$i],0, 2)==11) {
							if ($cari_coa->a_akun_dka == 'DEBET') {
								$data_akun[$i]['jd_id'] 	= $id_jurnal;
								$data_akun[$i]['jd_detail']	= $i+1;
								$data_akun[$i]['jd_akun'] 	 	= $akun[$i];
								$data_akun[$i]['jd_value'] 	= -$akun_val[$i];
		                		$data_akun[$i]['jd_keterangan']   = $cari_coa->a_nama . ' ' . $akun_ket[$i];
								$data_akun[$i]['jd_statusdk'] = 'KREDIT';
							}else{
								$data_akun[$i]['jd_id'] 	= $id_jurnal;
								$data_akun[$i]['jd_keterangan']	= $i+1;
								$data_akun[$i]['jd_akun'] 	 	= $akun[$i];
								$data_akun[$i]['jd_value'] 	= -$akun_val[$i];
		                		$data_akun[$i]['jd_keterangan']   = $cari_coa->a_nama . ' ' . $akun_ket[$i];
								$data_akun[$i]['jd_statusdk'] = 'DEBET';
							}
						}if (substr($akun[$i],0, 2)>11) {
							if ($cari_coa->a_akun_dka == 'DEBET') {
								$data_akun[$i]['jd_id'] 	= $id_jurnal;
								$data_akun[$i]['jd_detail']	= $i+1;
								$data_akun[$i]['jd_akun'] 	= $akun[$i];
								$data_akun[$i]['jd_value'] 	= $akun_val[$i];
		                		$data_akun[$i]['jd_keterangan']   = $cari_coa->a_nama . ' ' . $akun_ket[$i];
								$data_akun[$i]['jd_statusdk'] = 'DEBET';
							}else{
								$data_akun[$i]['jd_id'] 	= $id_jurnal;
								$data_akun[$i]['jd_detail']	= $i+1;
								$data_akun[$i]['jd_akun'] 	 	= $akun[$i];
								$data_akun[$i]['jd_value'] 	= $akun_val[$i];
		                		$data_akun[$i]['jd_keterangan']   = $cari_coa->a_nama . ' ' . $akun_ket[$i];
								$data_akun[$i]['jd_statusdk'] = 'KREDIT';
							}
						}
					}
					$jurnal_dt = $this->models->jurnal_dt()->insert($data_akun);
						
					$lihat = $this->model->jurnal_dt()->show('jd_id',$id_jurnal);
					$check = $this->models->check_jurnal($cari->pc_nota);
					if ($check == 0) {
						DB::rollBack();
						return Response::json(['status'=>0,'pesan'=>'Jurnal Tidak Balance']);
					}
		  		}
			}else{
		  		if ($cari->pc_jenis == 'ANGGARAN') {
					foreach ($cari->rencana_pembelian->rencana_pembelian_d as $i => $val1) {
						foreach ($cari->petty_cash_detail as $a => $val2) {
							if ($val1->rpd_detail == $val2->pcd_rpd_detail) {
								$sisa = $val1->rpd_sisa + $val2->pcd_qty;
								$upd = array(
												'rpd_sisa' => $sisa
											);
								$this->models->rencana_pembelian_d()->where('rpd_id',$val1->rpd_id)
																	->where('rpd_detail',$val1->rpd_detail)
																	->update($upd);
							}
						}
					}

					$upd = array(
									'rp_status' => 'Berjalan'
								);
					$rencana = $this->model->rencana_pembelian()->update($upd,'rp_kode',$cari->pc_ref);

					$upd = array(
								'pc_status' => 'REJECTED'
							);

					$this->model->petty_cash()->update($upd,'pc_nota',$req->id);
		  		}else{
		  			$upd = array(
								'pc_status' => 'REJECTED'
							);

					$this->model->petty_cash()->update($upd,'pc_nota',$req->id);
		  		}
			}
			DB::commit();
			return Response::json(['status'=>1,'pesan'=>'Data Berhasil Disetujui!']);
		} catch (Exception $e) {
			
			DB::rollBack();
			dd($e);
		}
	}

	public function bukti_kas_keluar(Request $req)
	{

		return view('kas_keluar.bukti_kas_keluar.bukti_kas_keluar');
	}

	public function datatable_bukti_kas_keluar()
	{
		$data = $this->model->bukti_kas_keluar()->all();
		// return $data;
		$data = collect($data);
		return Datatables::of($data)
		                ->addColumn('aksi', function ($data) {
		                	$a  = '<div class="btn-group">' ;
		                	$a1 = '';
		                	$b  = '';
		                	$c  = '';
		                	$d  = '</div>';

							$a1 = '<div class="btn-group"><button type="button" onclick="jurnal(\''.$data->bkk_pc_ref.'\',\'BUKTI KAS KELUAR\')" class="btn btn-primary btn-lg" title="Check Jurnal"><label class="fa fa-book"></label></button>';

		                	if (Auth::user()->akses('BUKTI KAS KELUAR','ubah')) {
	                			$b = '<button type="button" onclick="edit(\''.$data->bkk_id.'\')" class="btn btn-warning btn-lg" title="edit"><label class="fa fa-pencil-alt"></label></button>';
		                	}

		                	if (Auth::user()->akses('BUKTI KAS KELUAR','hapus')) {
	                			$c = '<button type="button" onclick="hapus(\''.$data->bkk_id.'\')" class="btn btn-danger btn-lg" title="hapus"><label class="fa fa-trash"></label></button>';
		                	}

		                    return $a.$a1.$b.$c.$d;
		                })
		                ->addColumn('none', function ($data) {
		                    return '-';
		                })->addColumn('sekolah', function ($data) {
		                    return $data->sekolah->s_nama;
		                })->rawColumns(['aksi', 'none','sekolah'])
		                ->addIndexColumn()
		                ->make(true);
	}
	public function create_bukti_kas_keluar()
	{
		
		$sekolah = $this->model->sekolah()->all();

		$akun = $this->models->akun()->select('a_master_akun','a_master_nama')
									 ->where('a_master_akun','like','5%')
									 ->orWhere('a_master_akun','like','6%')
									 ->orWhere('a_master_akun','like','7%')
									 ->groupBy('a_master_akun','a_master_nama')
									 ->get();
		return view('kas_keluar.bukti_kas_keluar.create_bukti_kas_keluar',compact('sekolah','akun'));
	}

	public function cari_petty_cash(Request $req)
	{
		$data = $this->models->petty_cash()
							 ->where('pc_status','APPROVED')
							 ->where('pc_sekolah',$req->sekolah)
							 ->get();

		return view('kas_keluar.bukti_kas_keluar.table_modal',compact('data'));
	}

	public function pilih_petty_cash(Request $req)
	{
		$head = $this->model->petty_cash()->cari('pc_nota',$req->id);
		$data = $head->petty_cash_detail;
		if ($head->pc_jenis  == 'ANGGARAN') {
			for ($i=0; $i < count($data); $i++) { 
				$data[$i]->nama_barang = $data[$i]->barang->b_nama;
			}
		}else{
			for ($i=0; $i < count($data); $i++) { 
				$data[$i]->nama_barang = $data[$i]->keterangan;
			}
		}
		
		return Response::json(['data'=>$data,'head'=>$head]);
	}

	public function simpan_bukti_kas_keluar(Request $req)
	{
		DB::BeginTransaction();
		try {
			// dd($req->all());
		  	$cari = $this->model->petty_cash()->cari('pc_nota',$req->pc_nota);
			$id   = $this->model->bukti_kas_keluar()->max('bkk_id');
			$save = array(
						   'bkk_id'				=> $id,
						   'bkk_pc_ref'			=> $req->pc_nota,
						   'bkk_sisa_kembali'	=> filter_var($req->bkk_sisa_kembali,FILTER_SANITIZE_NUMBER_INT),
						   'bkk_keterangan'		=> strtoupper($req->pc_keterangan),
						   'bkk_sekolah'		=> $req->pc_sekolah,
						   'bkk_tanggal'		=> carbon::parse($req->pc_tanggal)->format('Y-m-d'),
						   'created_by'			=> Auth::user()->name,
						   'updated_by'			=> Auth::user()->name,
						);
			$this->model->bukti_kas_keluar()->create($save);

			$upd = array(
						   'pc_status'			=> 'POSTING',
						);

			$this->model->petty_cash()->update($upd,'pc_nota',$req->pc_nota);

			for ($i=0; $i < count($req->bkkd_pcd_detail); $i++) { 
				$pcd  = $this->model->petty_cash_detail()
									->show_detail_one('pcd_id',$cari->pc_id,'pcd_detail',$req->bkkd_pcd_detail[$i]);
				$save = array(
						   'bkkd_id'			=> $id,
						   'bkkd_detail'		=> $i+1,
						   'bkkd_pcd_detail'	=> $req->bkkd_pcd_detail[$i],
						   'bkkd_keterangan'	=> strtoupper($req->bkkd_keterangan[$i]),
						   'bkkd_qty'			=> $req->bkkd_qty[$i],
						   'bkkd_harga_awal'	=> $req->bkkd_harga_awal[$i],
						   'bkkd_harga'			=> filter_var($req->bkkd_harga[$i],FILTER_SANITIZE_NUMBER_INT),
						   'bkkd_jenis'			=> 'POSTING',
						   'bkkd_akun'			=> $pcd->pcd_akun_biaya,
						);

				$this->model->bukti_kas_keluar_detail()->create($save);

			}
			$b = $i;
			for ($a=0; $a < count($req->pcd_akun_biaya); $a++) { 
				$save = array(
						   'bkkd_id'			=> $id,
						   'bkkd_detail'		=> $b+1,
						   'bkkd_pcd_detail'	=> 0,
						   'bkkd_keterangan'	=> strtoupper($req->pcd_keterangan[$a]),
						   'bkkd_qty'			=> 1,
						   'bkkd_harga_awal'	=> filter_var($req->pcd_jumlah[$a],FILTER_SANITIZE_NUMBER_INT),
						   'bkkd_harga'			=> filter_var($req->pcd_jumlah[$a],FILTER_SANITIZE_NUMBER_INT),
						   'bkkd_jenis'			=> 'BIAYA',
						   'bkkd_akun'			=> $req->pcd_akun_biaya[$a],
						);
				$this->model->bukti_kas_keluar_detail()->create($save);
				$b++;
			}

			// JURNAL

			if (filter_var($req->bkk_sisa_kembali,FILTER_SANITIZE_NUMBER_INT) != 0) {
				$akun 	  = [];
				$akun_val = [];
				$akun_ket = [];
				$status   = [];

				$del_jurnal = $this->model->jurnal()->delete('j_ref',$req->pc_nota);
				$id_jurnal = $this->model->jurnal()->max('j_id');
				$save = array(
			                   'j_id'			=> $id_jurnal,
							   'j_tahun'		=> carbon::parse($req->pc_tanggal)->format('Y'),
							   'j_tanggal'		=> carbon::parse($req->pc_tanggal)->format('Y-m-d'),
							   'j_keterangan'	=> strtoupper($req->pc_keterangan),
							   'j_sekolah'		=> $req->pc_sekolah,
							   'j_ref'			=> $req->pc_nota,
							   'j_detail'		=> 'BUKTI KAS KELUAR',
							   'created_by'		=> Auth::user()->name,
							   'updated_by'		=> Auth::user()->name,
	            		);
				$this->model->jurnal()->create($save);
				$akun_kas = $this->model->akun()->show_detail_one('a_master_akun',$cari->pc_akun_kas,'a_sekolah',$cari->pc_sekolah);
				if ($akun_kas == null) {
					DB::rollBack();
					return Response::json(['status'=>0,'pesan'=>'Sekolah Ini Tidak Memilik Akun '.$cari->pc_akun_kas]);
				}

				array_push($akun, $akun_kas->a_id);
				array_push($akun_val, filter_var($req->bkk_sisa_kembali,FILTER_SANITIZE_NUMBER_INT));
				array_push($akun_ket, strtoupper($req->pc_keterangan));
				if (filter_var($req->bkk_sisa_kembali,FILTER_SANITIZE_NUMBER_INT) < 0) {
					array_push($status, 'KREDIT');
				}else{
					array_push($status, 'DEBET');
				}

				for ($i=0; $i < count($req->bkkd_pcd_detail); $i++) { 
					$pcd  = $this->model->petty_cash_detail()
									->show_detail_one('pcd_id',$cari->pc_id,'pcd_detail',$req->bkkd_pcd_detail[$i]);

					$akun_biaya = $this->model->akun()->show_detail_one('a_master_akun',$pcd->pcd_akun_biaya,'a_sekolah',$req->pc_sekolah);

					if ($akun_biaya == null) {
						DB::rollBack();
						return Response::json(['status'=>0,'pesan'=>'Sekolah Ini Tidak Memilik Akun '.$cari[$i]->pcd_akun_biaya]);
					}
					array_push($akun, $akun_biaya->a_id);

					$harga_fix = $req->bkkd_harga_awal[$i] - filter_var($req->bkkd_harga[$i],FILTER_SANITIZE_NUMBER_INT);

					if ($harga_fix > 0) {
						$harga_fix = -$harga_fix;

						array_push($akun_val, $harga_fix);
						array_push($akun_ket, strtoupper($pcd->pcd_keterangan));
						array_push($status, 'KREDIT');
					}elseif ($harga_fix < 0){
						$harga_fix = $harga_fix*-1;

						array_push($akun_val, $harga_fix);
						array_push($akun_ket, strtoupper($pcd->pcd_keterangan));
						array_push($status, 'DEBET');
					}
				
				}

				for ($i=0; $i < count($req->pcd_akun_biaya); $i++) { 
					$akun_biaya = $this->model->akun()->show_detail_one('a_master_akun',$req->pcd_akun_biaya[$i],'a_sekolah',$req->pc_sekolah);

					if ($akun_biaya == null) {
						DB::rollBack();
						return Response::json(['status'=>0,'pesan'=>'Sekolah Ini Tidak Memilik Akun '.$req->pcd_akun_biaya[$i]]);
					}

					array_push($akun, $akun_biaya->a_id);
					array_push($akun_val, filter_var($req->pcd_jumlah[$i],FILTER_SANITIZE_NUMBER_INT));
					array_push($akun_ket, strtoupper($req->pcd_keterangan[$i]));
					array_push($status, 'DEBET');
				}

				$data_akun = [];
				for ($i=0; $i < count($akun); $i++) { 
					$cari_coa = $this->model->akun()->cari('a_id',$akun[$i]);
					if (substr($akun[$i],0, 2)==11) {
						$data_akun[$i]['jd_id'] 	= $id_jurnal;
						$data_akun[$i]['jd_detail']	= $i+1;
						$data_akun[$i]['jd_akun'] 	 	= $akun[$i];
						$data_akun[$i]['jd_value'] 	= $akun_val[$i];
                		$data_akun[$i]['jd_keterangan']   = $cari_coa->a_nama . ' ' . $akun_ket[$i];
						$data_akun[$i]['jd_statusdk'] = $status[$i];
					}if (substr($akun[$i],0, 2)>11) {
						$data_akun[$i]['jd_id'] 	= $id_jurnal;
						$data_akun[$i]['jd_detail']	= $i+1;
						$data_akun[$i]['jd_akun'] 	 	= $akun[$i];
						$data_akun[$i]['jd_value'] 	= $akun_val[$i];
                		$data_akun[$i]['jd_keterangan']   = $cari_coa->a_nama . ' ' . $akun_ket[$i];
						$data_akun[$i]['jd_statusdk'] = $status[$i];
					}
				}
				$jurnal_dt = $this->models->jurnal_dt()->insert($data_akun);
					
				$lihat = $this->model->jurnal_dt()->show('jd_id',$id_jurnal);

				$check = $this->models->check_jurnal($cari->pc_nota);
				if ($check == 0) {
					DB::rollBack();
					return Response::json(['status'=>0,'pesan'=>'Jurnal Tidak Balance']);
				}
			}
			DB::commit();
			return Response::json(['status'=>1,'pesan'=>'Data Berhasil Disimpan!']);
		} catch (Exception $e) {
			DB::rollBack();
			dd($e);
		}
	}
}
