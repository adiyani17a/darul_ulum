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

	public function pemasukan_kas()
	{
		return view('kas_masuk.pemasukan_kas.pemasukan_kas');
	}

	public function datatable_pemasukan_kas()
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

		                	if (Auth::user()->akses('PEMASUKAN KAS','ubah')) {
		                		if ($data->km_status == 'RELEASED') {
		                			$b = '<button type="button" onclick="edit(\''.$data->km_nota.'\')" class="btn btn-warning btn-lg" title="edit"><label class="fa fa-pencil-alt"></label></button>';
		                		}
		                	}

		                	if (Auth::user()->akses('PEMASUKAN KAS','hapus')) {
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

	public function create_pemasukan_kas()
	{
		$sekolah = $this->model->sekolah()->all();
		$akun = $this->models->akun()->select('a_master_akun','a_master_nama')
									 ->where('a_master_akun','like','4%')
									 ->groupBy('a_master_akun','a_master_nama')
									 ->get();

		$akun_kas = $this->models->akun()->select('a_master_akun','a_master_nama')
									 ->where('a_master_akun','like','11110%')
									 ->groupBy('a_master_akun','a_master_nama')
									 ->get();
		return view('kas_masuk.pemasukan_kas.create_pemasukan_kas',compact('sekolah','akun','akun_kas'));
	}

	public function nota_pemasukan_kas(Request $req)
	{
		$bulan = carbon::now()->format('m');
		$tahun = carbon::now()->format('Y');

		$cari = $this->models->kas_masuk()
							   ->selectRaw("substring(max(km_nota),13,3) as id")
							   ->whereRaw("MONTH(km_tanggal) = '$bulan' and YEAR(km_tanggal) = '$tahun'")
							   ->where('km_sekolah',$req->km_sekolah)
							   ->first();

        $index = (integer)$cari->id + 1;
        $index = str_pad($index, 3, '0', STR_PAD_LEFT);
        $nota = 'KM-'. $bulan . $tahun . '/' . $req->km_sekolah . '/' . $index;

        return Response::json(['nota'=>$nota]);
	}

	public function simpan_pemasukan_kas(Request $req)
	{
		DB::beginTransaction();
		try {
			// dd($req->all());
			$id = $this->model->kas_masuk()->max('km_id');
			$save = array(
						'km_id'			=> $id,
						'km_sekolah'	=> $req->km_sekolah,
						'km_nota'		=> $req->km_nota,
						'km_akun_kas'	=> $req->km_akun_kas,
						'km_ref'		=> null,
						'km_keterangan'	=> strtoupper($req->km_keterangan),
						'km_total'		=> filter_var($req->km_total,FILTER_SANITIZE_NUMBER_INT),
						'km_tanggal'	=> carbon::parse($req->pc_tanggal)->format('Y-m-d'),
						'km_status'		=> 'RELEASED',
						'created_by'	=> Auth::user()->name,
						'updated_by'	=> Auth::user()->name,
					);

			$this->model->kas_masuk()->create($save);

			for ($i=0; $i < count($req->pcd_akun_biaya); $i++) { 
				$save = array(
						'kmd_id'				=> $id,
						'kmd_detail'			=> $i+1,
						'kmd_total'				=> filter_var($req->kmd_total[$i],FILTER_SANITIZE_NUMBER_INT),
						'kmd_akun_pendapatan'	=> $req->pcd_akun_biaya[$i],
						'kmd_keterangan'		=> $req->kmd_keterangan[$i],
					);
				$this->model->kas_masuk_detail()->create($save);
			}
			// JURNAL
			$del_jurnal = $this->models->jurnal()->where('j_detail','PEMASUKAN KAS')
												 ->where('j_ref',$req->km_nota)
												 ->delete();

			$id_jurnal = $this->model->jurnal()->max('j_id');
			$save = array(
		                   'j_id'			=> $id_jurnal,
						   'j_tahun'		=> carbon::parse($req->pc_tanggal)->format('Y'),
						   'j_tanggal'		=> carbon::parse($req->pc_tanggal)->format('Y-m-d'),
						   'j_keterangan'	=> strtoupper($req->km_keterangan),
						   'j_sekolah'		=> $req->km_sekolah,
						   'j_ref'			=> $req->km_nota,
						   'j_detail'		=> 'PEMASUKAN KAS',
						   'created_by'		=> Auth::user()->name,
						   'updated_by'		=> Auth::user()->name,
            		);

			$this->model->jurnal()->create($save);

			$akun 	  = [];
			$akun_val = [];
			$akun_ket = [];
			$akun_kas = $this->model->akun()->show_detail_one('a_master_akun',$req->km_akun_kas,'a_sekolah',$req->km_sekolah);
			if ($akun_kas == null) {
				DB::rollBack();
				return Response::json(['status'=>0,'pesan'=>'Sekolah Ini Tidak Memilik Akun '.$req->km_akun_kas]);
			}

			array_push($akun, $akun_kas->a_id);
			array_push($akun_val, filter_var($req->km_total,FILTER_SANITIZE_NUMBER_INT));
			array_push($akun_ket, strtoupper($req->km_keterangan));


			for ($i=0; $i < count($req->pcd_akun_biaya); $i++) { 
				if ($req->pcd_akun_biaya != 0) {
					$akun_biaya = $this->model->akun()->show_detail_one('a_master_akun',$req->pcd_akun_biaya[$i],'a_sekolah',$req->km_sekolah);

					if ($akun_biaya == null) {
						DB::rollBack();
						return Response::json(['status'=>0,'pesan'=>'Sekolah Ini Tidak Memiliki Akun '.$req->pcd_akun_biaya[$i]]);
					}
					array_push($akun, $akun_biaya->a_id);
					array_push($akun_val, filter_var($req->kmd_total[$i],FILTER_SANITIZE_NUMBER_INT));
					array_push($akun_ket, strtoupper($req->km_keterangan));
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
						$data_akun[$i]['jd_value'] 	= $akun_val[$i];
                		$data_akun[$i]['jd_keterangan']   = $cari_coa->a_nama . ' ' . $akun_ket[$i];
						$data_akun[$i]['jd_statusdk'] = 'DEBET';
					}else{
						$data_akun[$i]['jd_id'] 	= $id_jurnal;
						$data_akun[$i]['jd_keterangan']	= $i+1;
						$data_akun[$i]['jd_akun'] 	 	= $akun[$i];
						$data_akun[$i]['jd_value'] 	= $akun_val[$i];
                		$data_akun[$i]['jd_keterangan']   = $cari_coa->a_nama . ' ' . $akun_ket[$i];
						$data_akun[$i]['jd_statusdk'] = 'KREDIT';
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
			$check = $this->models->check_jurnal($req->km_nota);
			if ($check == 0) {
				DB::rollBack();
				return Response::json(['status'=>0,'pesan'=>'Jurnal Tidak Balance']);
			}
			DB::commit();
			return response()->json(['status'=>1,'pesan'=>'Berhasil Menyimpan Data']);
		} catch (Exception $e) {
			DB::rollBacK();
			dd($e);
		}
	}
}
