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

class kas_masuk_controller extends Controller
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
								$a = '<div class="btn-group"><button type="button" onclick="jurnal(\''.$data->km_id.'\')" class="btn btn-primary btn-lg" title="Check Jurnal"><label class="fa fa-book"></label></button>';
							}

		                	if (Auth::user()->akses('PEMASUKAN KAS','ubah')) {
		                		if ($data->km_status == 'RELEASED') {
		                			$b = '<button type="button" onclick="edit(\''.$data->km_id.'\')" class="btn btn-warning btn-lg" title="edit"><label class="fa fa-pencil-alt"></label></button>';
		                		}
		                	}

		                	if (Auth::user()->akses('PEMASUKAN KAS','hapus')) {
		                		if ($data->km_status == 'RELEASED') {
		                			$c = '<button type="button" onclick="hapus(\''.$data->km_id.'\')" class="btn btn-danger btn-lg" title="hapus"><label class="fa fa-trash"></label></button>';
		                		}
		                	}

							if ($data->km_status == 'APPROVED') {
								$c1 = '<button type="button" onclick="cetak(\''.$data->km_id.'\')" class="btn btn-danger btn-lg" title="hapus"><label class="fa fa-print"></label></button>';
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
		                    return '<a class="btn_modal" onclick="detail(\''.$data->km_id.'\')" style="color:blue">'.$data->km_id.'</a>';
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

	public function edit_pemasukan_kas(Request $req)
	{
		$sekolah = $this->model->sekolah()->all();
		$data    = $this->model->kas_masuk()->cari('km_id',$req->id);

		$akun = $this->models->akun()->select('a_master_akun','a_master_nama')
									 ->where('a_master_akun','like','4%')
									 ->groupBy('a_master_akun','a_master_nama')
									 ->get();

		$akun_kas = $this->models->akun()->select('a_master_akun','a_master_nama')
									 ->where('a_master_akun','like','11110%')
									 ->groupBy('a_master_akun','a_master_nama')
									 ->get();
		return view('kas_masuk.pemasukan_kas.edit_pemasukan_kas',compact('data','sekolah','akun','akun_kas'));
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

	public function update_pemasukan_kas(Request $req)
	{
		DB::beginTransaction();
		try {
			// dd($req->all());
			$id = $req->id;
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
						'updated_by'	=> Auth::user()->name,
					);

			$this->model->kas_masuk()->update($save,'km_id',$id);
			$this->model->kas_masuk_detail()->delete('kmd_id',$id);

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
			$akun_kas = $this->model->akun()->show_detail_one('a_master_akun',$req->km_akun_kas,'a_sekolah',2);
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

	public function hapus_pemasukan_kas(Request $req)
	{
		DB::beginTransaction();
		try {
			$this->model->kas_masuk()->cari('km_id',$req->id);
			$this->models->jurnal()->where('j_ref',$req->id)->where('j_detail','PEMASUKAN KAS')->delete();
			DB::commit();
			$this->model->kas_masuk()->delete('km_id',$req->id);
			return response()->json(['status'=>1,'pesan'=>'Data Berhasil Dihapus']);
		} catch (Exception $e) {
			DB::rollBack();
			dd($e);
		}
		
	}

	public function spp()
	{
		$additionalData['bulan_spp'] = [];
		$additionalData['bulan_spp_number'] = [];
		$additionalData['tahun_spp'] = [];
		$additionalData['tahun_ajaran'] = [];

		$akun = $this->models->akun()->select('a_master_akun','a_master_nama')
									 ->where('a_master_akun','like','4%')
									 ->groupBy('a_master_akun','a_master_nama')
									 ->get();

		$akun_kas = $this->models->akun()->select('a_master_akun','a_master_nama')
									 ->where('a_master_akun','like','11110%')
									 ->groupBy('a_master_akun','a_master_nama')
									 ->get();
		for ($i=0; $i < 12; $i++) { 
			array_push($additionalData['bulan_spp'], Date::now()->startOfMonth()->subMonth(-$i)->format('F'));
			array_push($additionalData['bulan_spp_number'], Date::now()->startOfMonth()->subMonth(-$i)->format('m'));
		}

		for ($i=0; $i < 20; $i++) { 
			array_push($additionalData['tahun_spp'], Date::now()->subYear($i)->format('Y'));
		}

		$sekolah = $this->model->sekolah()->all();
		$kelas   = $this->model->kelas()->all();
		$tingkat = [];
		for ($i=0; $i < 12; $i++) { 
			$tingkat[$i] = $i+1;
		}

		for ($i=0; $i < 20; $i++) { 
			array_push($additionalData['tahun_ajaran'], carbon::now()->subYear($i)->format('Y'));
		}
		return view('kas_masuk.spp.spp',compact('additionalData','akun','akun_kas','sekolah','tingkat','additionalData','kelas'));
	}

	public function datatable_spp(Request $req)
	{	

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


		if (Auth::user()->akses('REKAP SISWA','global')) {
			$data = $this->models->siswa_data_diri()->whereRaw("sdd_status = 'Setujui' $sdd_kelas $sdd_nama_kelas $sdd_tahun_ajaran")->get();
		}else{
			$sekolah = Auth::User()->sekolah_id;
			$data = $this->models->siswa_data_diri()->where('sdd_sekolah',$sekolah)->whereRaw("sdd_status = 'Setujui' $sdd_kelas $sdd_nama_kelas $sdd_tahun_ajaran")->get();
		}


		if (Auth::user()->akses('PEMBAYARAN SPP','global')) {
			$data = $this->models->siswa_data_diri()->where('sdd_nomor_induk','!=',null)
													->where('sdd_nomor_induk_nasional','!=',null)
													->where('sdd_group_spp','!=',null)
													->whereRaw("sdd_status = 'Setujui' $sdd_kelas $sdd_nama_kelas $sdd_tahun_ajaran $sdd_sekolah")
													->get();
		}else{
			$sekolah = Auth::User()->sekolah_id;
			$data = $this->models->siswa_data_diri()->where('sdd_nomor_induk','!=',null)
													->where('sdd_nomor_induk_nasional','!=',null)
													->where('sdd_sekolah','=',$sekolah)
													->where('sdd_group_spp','!=',null)
													->whereRaw("sdd_status = 'Setujui' $sdd_kelas $sdd_nama_kelas $sdd_tahun_ajaran")
													->get();
		}


		foreach ($data as $key => $value) {
			$data[$key]->filter_bulan = $req->filter_bulan;
			$data[$key]->filter_tahun = $req->filter_tahun;
		}

		$data = collect($data);
		return Datatables::of($data)
		                ->addColumn('aksi', function ($data) {
		                	$a = '<div class="btn-group">' ;
		                	$b = '';
		                	$c = '';
		                	$c1 = '';
		                	$d = '</div>';
		                

		                	if (Auth::user()->akses('PEMBAYARAN SPP','ubah')) {
	                			$b = '<button type="button" onclick="edit(\''.$data->sdd_id.'\')" class="btn btn-info btn-lg" title="Bayar"><label class="fa fa-credit-card"></label></button>';
		                	}

		                	if (Auth::user()->akses('PEMBAYARAN SPP','print')) {
	                			$c1 = '<button type="button" onclick="cetak(\''.$data->sdd_id.'\')" class="btn btn-warning btn-lg" title="cetak"><label class="fa fa-print"></label></button>';
		                	}

		                    return $a.$b.$c1.$c.$d;
		                })->addColumn('image', function ($data) {
							$thumb = asset('storage/uploads/data_siswa/original').'/'.$data->sdd_image;
							return '<img style="width:150px;height:170px;border-radius:0" class="img-fluid img-thumbnail" src="'.$thumb.'">';
	                    })->addColumn('sekolah', function ($data) {
		                    return $data->sekolah->s_nama;
		                })->addColumn('gs_nilai', function ($data) {
		                    return $data->group_spp->gs_nilai;
		                })->addColumn('status_pembayaran', function ($data) {

		                	if (count($data->history_spp) == 0) {
		                		return '<label class="badge badge-danger">Belum Terbayar</label>';
		                	}

		                	for ($i=0; $i < count($data->history_spp); $i++) { 
		                		$bulan = $data->history_spp[$i]->hs_bulan;
		                		$tahun = carbon::parse($data->history_spp[$i]->hs_tahun)->format('Y');
		                		if ( $bulan ==  $data->filter_bulan and $tahun == $data->filter_tahun) {
		                			return '<label class="badge badge-success">Terbayar</label>';
		                		}
		                	}

	                		return '<label class="badge badge-danger">Belum Terbayar</label>';
		                })->addColumn('pembuat', function ($data) {

		                	if (count($data->history_spp) == 0) {
		                		return ' - ';
		                	}

		                	for ($i=0; $i < count($data->history_spp); $i++) { 
		                		$bulan = $data->history_spp[$i]->hs_bulan;
		                		$tahun = carbon::parse($data->history_spp[$i]->hs_tahun)->format('Y');
		                		if ( $bulan ==  $data->filter_bulan and $tahun == $data->filter_tahun) {
		                			return $data->history_spp[$i]->updated_by;
		                		}
		                	}

                			return ' - ';
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
		                	if ($data->sdd_status_siswa == 'ACTIVE') {
								return '<button type="button" class="btn btn-info cursor" onclick="ubah_status(\''.$data->sdd_id.'\',\'INACTIVE\')">Aktif</button type="button">';
		                	}else{
								return '<button type="button" class="btn btn-danger cursor" onclick="ubah_status(\''.$data->sdd_id.'\',\'ACTIVE\')">Tidak Aktif</button type="button">';
		                	}
		                })
		                ->rawColumns(['aksi','image','sekolah','data_siswa','status','gs_nilai','status_pembayaran','pembuat'])
		                ->addIndexColumn()
		                ->make(true);
	}

	public function edit_spp(Request $req)
	{

		$bulan = Date::parse($req->filter_bulan)->format('F');
		$bulan_angka = Date::parse($req->filter_bulan)->format('m');
		$tahun = Date::parse($req->filter_tahun)->format('Y');

		$cari = $this->models->history_spp()
							   ->selectRaw("substring(max(hs_nota),14,5) as id")
							   ->whereRaw("hs_bulan = '$bulan' and hs_tahun = '$tahun'")
							   ->first();
        $index = (integer)$cari->id + 1;
        $index = str_pad($index, 5, '0', STR_PAD_LEFT);

		$data = $this->model->siswa_data_diri()->cari('sdd_id',$req->id);
        $nota = 'SPP-'. $bulan_angka . $tahun . '/' . $data->sdd_sekolah . '/' . $index;

		$spp  = $data->group_spp;
		$bulan = Date::parse($req->filter_bulan)->format('F');
		$history  = $this->models->history_spp()->whereRaw("hs_bulan = '$bulan' and hs_tahun = '$req->filter_tahun' and hs_id = '$req->id'")->first();
		if ($history != null) {
			$additionalData['bulan'] = $history->hs_bulan;
			$additionalData['tahun'] = $history->hs_tahun;
		}else{
			$additionalData['bulan'] = $req->filter_bulan;
			$additionalData['tahun'] = $req->filter_tahun;
		}
		return response()->json(['data'=>$data,'spp'=>$spp,'history'=>$history,'additionalData'=>$additionalData,'nota'=>$nota]);
	}

	public function simpan_spp(Request $req)
	{
		DB::beginTransaction();
		try {
			if ($req->detail == null) {
				$data = $this->model->siswa_data_diri()->cari('sdd_id',$req->id);
				$id = $this->models->history_spp()->where('hs_id',$req->id)->max('hs_detail')+1;
				$save = array(
								'hs_id'			=> $req->id,
								'hs_detail'		=> $id,
								'hs_nota'		=> $req->hs_nota,
								'hs_bulan'  	=> $req->hs_bulan,
								'hs_tahun'  	=> $req->hs_tahun,
								'hs_keterangan'	=> $req->hs_keterangan,
								'hs_akun'		=> $req->hs_akun,
								'hs_akun_kas'	=> $req->hs_akun_kas,
								'hs_jumlah'		=> $data->group_spp->gs_nilai,
								'created_by'	=> Auth::user()->name,
								'updated_by'	=> Auth::user()->name,
							);

				$this->model->history_spp()->create($save);

				// JURNAL 
				$del_jurnal = $this->models->jurnal()->where('j_detail','PEMBAYARAN SPP')
													 ->where('j_ref',$req->hs_nota)
													 ->delete();

				$id_jurnal = $this->model->jurnal()->max('j_id');
				$save = array(
			                   'j_id'			=> $id_jurnal,
							   'j_tahun'		=> $req->hs_tahun,
							   'j_tanggal'		=> carbon::now()->format('Y-m-d'),
							   'j_keterangan'	=> strtoupper($req->hs_keterangan),
							   'j_sekolah'		=> $data->sdd_sekolah,
							   'j_ref'			=> $req->hs_nota,
							   'j_detail'		=> 'PEMBAYARAN SPP',
							   'created_by'		=> Auth::user()->name,
							   'updated_by'		=> Auth::user()->name,
	            		);

				$this->model->jurnal()->create($save);
				$akun = [];
				$akun_val = [];
				$akun_kas = $this->model->akun()->show_detail_one('a_master_akun',$req->hs_akun_kas,'a_sekolah',$data->sdd_sekolah);
				if ($akun_kas == null) {
					DB::rollBack();
					return Response::json(['status'=>0,'pesan'=>'Sekolah Ini Tidak Memilik Akun '.$req->hs_akun_kas]);
				}

				array_push($akun, $akun_kas->a_id);
				array_push($akun_val, $data->group_spp->gs_nilai);


				$akun_pendapatan = $this->model->akun()->show_detail_one('a_master_akun',$req->hs_akun,'a_sekolah',$data->sdd_sekolah);
				if ($akun_pendapatan == null) {
					DB::rollBack();
					return Response::json(['status'=>0,'pesan'=>'Sekolah Ini Tidak Memilik Akun '.$req->hs_akun]);
				}

				array_push($akun, $akun_pendapatan->a_id);
				array_push($akun_val, $data->group_spp->gs_nilai);
				$data_akun = [];
				for ($i=0; $i < count($akun); $i++) { 
					$cari_coa = $this->model->akun()->cari('a_id',$akun[$i]);
					if (substr($akun[$i],0, 2)==11) {
						if ($cari_coa->a_akun_dka == 'DEBET') {
							$data_akun[$i]['jd_id'] 	= $id_jurnal;
							$data_akun[$i]['jd_detail']	= $i+1;
							$data_akun[$i]['jd_akun'] 	 	= $akun[$i];
							$data_akun[$i]['jd_value'] 	= $akun_val[$i];
	                		$data_akun[$i]['jd_keterangan']   = $cari_coa->a_nama . ' ' . strtoupper($req->hs_keterangan);
							$data_akun[$i]['jd_statusdk'] = 'DEBET';
						}else{
							$data_akun[$i]['jd_id'] 	= $id_jurnal;
							$data_akun[$i]['jd_keterangan']	= $i+1;
							$data_akun[$i]['jd_akun'] 	 	= $akun[$i];
							$data_akun[$i]['jd_value'] 	= $akun_val[$i];
	                		$data_akun[$i]['jd_keterangan']   = $cari_coa->a_nama . ' ' . strtoupper($req->hs_keterangan);
							$data_akun[$i]['jd_statusdk'] = 'KREDIT';
						}
					}if (substr($akun[$i],0, 2)>11) {
						if ($cari_coa->a_akun_dka == 'DEBET') {
							$data_akun[$i]['jd_id'] 	= $id_jurnal;
							$data_akun[$i]['jd_detail']	= $i+1;
							$data_akun[$i]['jd_akun'] 	= $akun[$i];
							$data_akun[$i]['jd_value'] 	= $akun_val[$i];
	                		$data_akun[$i]['jd_keterangan']   = $cari_coa->a_nama . ' ' . strtoupper($req->hs_keterangan);
							$data_akun[$i]['jd_statusdk'] = 'DEBET';
						}else{
							$data_akun[$i]['jd_id'] 	= $id_jurnal;
							$data_akun[$i]['jd_detail']	= $i+1;
							$data_akun[$i]['jd_akun'] 	 	= $akun[$i];
							$data_akun[$i]['jd_value'] 	= $akun_val[$i];
	                		$data_akun[$i]['jd_keterangan']   = $cari_coa->a_nama . ' ' . strtoupper($req->hs_keterangan);
							$data_akun[$i]['jd_statusdk'] = 'KREDIT';
						}
					}
				}

				$jurnal_dt = $this->models->jurnal_dt()->insert($data_akun);
				
				$lihat = $this->model->jurnal_dt()->show('jd_id',$id_jurnal);
				$check = $this->models->check_jurnal($req->hs_nota);
				if ($check == 0) {
					DB::rollBack();
					return Response::json(['status'=>0,'pesan'=>'Jurnal Tidak Balance']);
				}
				DB::commit();
				return response()->json(['status'=>1,'pesan'=>'Berhasil Menyimpan Data']);
			}else{
				$data = $this->model->siswa_data_diri()->cari('sdd_id',$req->id);
				$id = $req->detail;
				$save = array(
								'hs_id'			=> $req->id,
								'hs_detail'		=> $id,
								'hs_nota'		=> $req->hs_nota,
								'hs_bulan'  	=> $req->hs_bulan,
								'hs_tahun'  	=> $req->hs_tahun,
								'hs_keterangan'	=> $req->hs_keterangan,
								'hs_akun'		=> $req->hs_akun,
								'hs_akun_kas'	=> $req->hs_akun_kas,
								'hs_jumlah'		=> $data->group_spp->gs_nilai,
								'created_by'	=> Auth::user()->name,
								'updated_by'	=> Auth::user()->name,
							);

				$this->models->history_spp()->where('hs_id',$req->id)->where('hs_detail',$id)->update($save);

				// JURNAL 
				$del_jurnal = $this->models->jurnal()->where('j_detail','PEMBAYARAN SPP')
													 ->where('j_ref',$req->hs_nota)
													 ->delete();

				$id_jurnal = $this->model->jurnal()->max('j_id');
				$save = array(
			                   'j_id'			=> $id_jurnal,
							   'j_tahun'		=> $req->hs_tahun,
							   'j_tanggal'		=> carbon::now()->format('Y-m-d'),
							   'j_keterangan'	=> strtoupper($req->hs_keterangan),
							   'j_sekolah'		=> $data->sdd_sekolah,
							   'j_ref'			=> $req->hs_nota,
							   'j_detail'		=> 'PEMBAYARAN SPP',
							   'created_by'		=> Auth::user()->name,
							   'updated_by'		=> Auth::user()->name,
	            		);

				$this->model->jurnal()->create($save);
				$akun = [];
				$akun_val = [];
				$akun_kas = $this->model->akun()->show_detail_one('a_master_akun',$req->hs_akun_kas,'a_sekolah',$data->sdd_sekolah);
				if ($akun_kas == null) {
					DB::rollBack();
					return Response::json(['status'=>0,'pesan'=>'Sekolah Ini Tidak Memilik Akun '.$req->hs_akun_kas]);
				}

				array_push($akun, $akun_kas->a_id);
				array_push($akun_val, $data->group_spp->gs_nilai);


				$akun_pendapatan = $this->model->akun()->show_detail_one('a_master_akun',$req->hs_akun,'a_sekolah',$data->sdd_sekolah);
				if ($akun_pendapatan == null) {
					DB::rollBack();
					return Response::json(['status'=>0,'pesan'=>'Sekolah Ini Tidak Memilik Akun '.$req->hs_akun]);
				}

				array_push($akun, $akun_pendapatan->a_id);
				array_push($akun_val, $data->group_spp->gs_nilai);
				$data_akun = [];
				for ($i=0; $i < count($akun); $i++) { 
					$cari_coa = $this->model->akun()->cari('a_id',$akun[$i]);
					if (substr($akun[$i],0, 2)==11) {
						if ($cari_coa->a_akun_dka == 'DEBET') {
							$data_akun[$i]['jd_id'] 	= $id_jurnal;
							$data_akun[$i]['jd_detail']	= $i+1;
							$data_akun[$i]['jd_akun'] 	 	= $akun[$i];
							$data_akun[$i]['jd_value'] 	= $akun_val[$i];
	                		$data_akun[$i]['jd_keterangan']   = $cari_coa->a_nama . ' ' . strtoupper($req->hs_keterangan);
							$data_akun[$i]['jd_statusdk'] = 'DEBET';
						}else{
							$data_akun[$i]['jd_id'] 	= $id_jurnal;
							$data_akun[$i]['jd_keterangan']	= $i+1;
							$data_akun[$i]['jd_akun'] 	 	= $akun[$i];
							$data_akun[$i]['jd_value'] 	= $akun_val[$i];
	                		$data_akun[$i]['jd_keterangan']   = $cari_coa->a_nama . ' ' . strtoupper($req->hs_keterangan);
							$data_akun[$i]['jd_statusdk'] = 'KREDIT';
						}
					}if (substr($akun[$i],0, 2)>11) {
						if ($cari_coa->a_akun_dka == 'DEBET') {
							$data_akun[$i]['jd_id'] 	= $id_jurnal;
							$data_akun[$i]['jd_detail']	= $i+1;
							$data_akun[$i]['jd_akun'] 	= $akun[$i];
							$data_akun[$i]['jd_value'] 	= $akun_val[$i];
	                		$data_akun[$i]['jd_keterangan']   = $cari_coa->a_nama . ' ' . strtoupper($req->hs_keterangan);
							$data_akun[$i]['jd_statusdk'] = 'DEBET';
						}else{
							$data_akun[$i]['jd_id'] 	= $id_jurnal;
							$data_akun[$i]['jd_detail']	= $i+1;
							$data_akun[$i]['jd_akun'] 	 	= $akun[$i];
							$data_akun[$i]['jd_value'] 	= $akun_val[$i];
	                		$data_akun[$i]['jd_keterangan']   = $cari_coa->a_nama . ' ' . strtoupper($req->hs_keterangan);
							$data_akun[$i]['jd_statusdk'] = 'KREDIT';
						}
					}
				}

				$jurnal_dt = $this->models->jurnal_dt()->insert($data_akun);
				
				$lihat = $this->model->jurnal_dt()->show('jd_id',$id_jurnal);
				$check = $this->models->check_jurnal($req->hs_nota);
				if ($check == 0) {
					DB::rollBack();
					return Response::json(['status'=>0,'pesan'=>'Jurnal Tidak Balance']);
				}
				DB::commit();
				return response()->json(['status'=>1,'pesan'=>'Berhasil Menyimpan Data']);
			}
		} catch (Exception $e) {
			DB::rollBack();
			dd($e);
		}
	}

	public function cetak_spp(Request $req)
	{
		$id     = Auth::user()->id;
		$data   = $this->model->user()->cari('id',$id);
		$siswa  = $this->model->siswa_data_diri()->cari('sdd_id',$req->id);
		$history_spp = $this->models->history_spp()->where('hs_id',$req->id)->whereRaw("hs_bulan = '$req->filter_bulan' and hs_tahun = '$req->filter_tahun'")->first();
		return view('kas_masuk.spp.cetak',compact('data','id','history_spp','siswa'));
	}
}
