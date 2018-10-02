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
class master_controller extends Controller
{	
	protected $model;
	protected $models;
	// JABATAN]

	public function __construct()
	{
    $this->model = new all_model();
		$this->models = new models();
	}

	public function sekolah()
	{
  		return view('master.sekolah.sekolah');
		
	}
	public function datatable_sekolah()
 	{
      $data = $this->model->sekolah()->all();
      
      
      // return $data;
      $data = collect($data);
      // return $data;
      return Datatables::of($data)
                      ->addColumn('aksi', function ($data) {
                        return  '<div class="btn-group">'.
                                 '<button type="button" onclick="edit(this)" class="btn btn-info btn-lg" title="edit">'.
                                 '<label class="fa fa-pencil-alt"></label></button>'.
                                 '<button type="button" onclick="hapus(this)" class="btn btn-danger btn-lg" title="hapus">'.
                                 '<label class="fa fa-trash"></label></button>'.
                                '</div>';
                      })
                      ->addColumn('none', function ($data) {
                          return '-';
                      })
                      ->addColumn('image', function ($data) {
                          $thumb = asset('storage/uploads/sekolah/thumbnail').'/'.$data->s_logo;
                          return '<img style="width:50px;height:50px;" class="img-fluid img-thumbnail" src="'.$thumb.'">';
                      })
                      ->rawColumns(['aksi', 'none','image'])
                      ->make(true);
  }
  public function simpan_sekolah(Request $req)
  {
  	DB::BeginTransaction();
    try{
      if ($req->id == null) {
        $id = $this->model->sekolah()->max('s_id');
        $file = $req->file('files');
        if ($file != null) {
          $file_name = 'sekolah_'. $id .'_' . '.' . $file->getClientOriginalExtension();
          if (!is_dir(storage_path('uploads/sekolah/thumbnail/'))) {
            mkdir(storage_path('uploads/sekolah/thumbnail/'), 0777, true);
          }

          if (!is_dir(storage_path('uploads/sekolah/original/'))) {
            mkdir(storage_path('uploads/sekolah/original/'), 0777, true);
          }

          $thumbnail_path = storage_path('uploads/sekolah/thumbnail/');
          $original_path = storage_path('uploads/sekolah/original/');
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

        $nama = $this->model->sekolah()->cari('s_nama',$req->s_nama);
        if ($nama != null) {
          DB::rollBack();
          return Response::json(['status'=>0,'pesan'=>'Nama Sekolah Telah Digunakan']);
        }

        $save = array(
                   's_id'		=> $id,
				   's_nama'		=> strtoupper($req->s_nama),
				   's_alamat'	=> strtoupper($req->s_alamat),
				   's_telpon'	=> $req->s_telpon,
				   's_logo'		=> $file_name,
                 );
        $this->model->sekolah()->create($save);
        DB::commit();
        return Response::json(['status'=>1,'pesan'=>'Simpan Data!']);
      }else{
      	// dd($req->all());
        $id = $req->id;
        $file = $req->file('files');
        if ($file != null) {
          $file_name = 'sekolah_'. $id .'_' . '.' . $file->getClientOriginalExtension();
          if (!is_dir(storage_path('uploads/sekolah/thumbnail/'))) {
            mkdir(storage_path('uploads/sekolah/thumbnail/'), 0777, true);
          }

          if (!is_dir(storage_path('uploads/sekolah/original/'))) {
            mkdir(storage_path('uploads/sekolah/original/'), 0777, true);
          }

          $thumbnail_path = storage_path('uploads/sekolah/thumbnail/');
          $original_path = storage_path('uploads/sekolah/original/');
          // return $original_path;
          Image::make($file)
                  ->resize(261,null,function ($constraint) {
                    $constraint->aspectRatio();
                     })
                  ->save($original_path . $file_name)
                  ->resize(90, 90)
                  ->save($thumbnail_path . $file_name);
        }else{
          $image = $this->model->sekolah()->cari('s_id',$req->id);
          $file_name = $image->s_logo;
        }

        $name = $this->model->sekolah()->cari_jika_tidak('s_nama',$req->s_nama,'s_id',$req->id)->toArray();
        if ($name != null) {
          DB::rollBack();
          return Response::json(['status'=>0,'pesan'=>'Username Telah Digunakan']);
        }
        $save = array(
				   's_nama'		=> strtoupper($req->s_nama),
				   's_alamat'	=> strtoupper($req->s_alamat),
				   's_telpon'	=> $req->s_telpon,
				   's_logo'		=> $file_name,
                 );

        $this->model->sekolah()->update($save,'s_id',$req->id);
        DB::commit();
        return Response::json(['status'=>1,'pesan'=>'Update Data!']);
      }
    }catch(Exception $er){
      dd($er);
      DB::rollBack();
    }
  }

  public function edit_sekolah(Request $req)
  {
  	$data = $this->model->sekolah()->cari('s_id',$req->id);
    return response()->json(['data' => $data]);
  }

  public function hapus_sekolah(Request $req)
  {
    $data = $this->model->sekolah()->cari('s_id',$req->id);
    unlink(storage_path('uploads/sekolah/thumbnail').'/'.$data->s_logo);
    unlink(storage_path('uploads/sekolah/original').'/'.$data->s_logo);
  	$data = $this->model->sekolah()->delete('s_id',$req->id);
    return response()->json(['status' => 1]);
  }

  public function posisi(Request $req)
  {
  	return view('master.posisi.posisi');
  }

  public function datatable_posisi()
  {
      $data = $this->model->posisi()->all();
      
      
      // return $data;
      $data = collect($data);
      // return $data;
      return Datatables::of($data)
                      ->addColumn('aksi', function ($data) {
                        return  '<div class="btn-group">'.
                                 '<button type="button" onclick="edit(this)" class="btn btn-info btn-lg" title="edit">'.
                                 '<label class="fa fa-pencil-alt"></label></button>'.
                                 '<button type="button" onclick="hapus(this)" class="btn btn-danger btn-lg" title="hapus">'.
                                 '<label class="fa fa-trash"></label></button>'.
                                '</div>';
                      })
                      ->addColumn('none', function ($data) {
                          return '-';
                      })
                      ->rawColumns(['aksi', 'none'])
                      ->make(true);
  }

  public function simpan_posisi(Request $req)
  {

    DB::BeginTransaction();
    try{
      if ($req->id == null) {
        $id = $this->model->posisi()->max('p_id');
        $save = array(
                     'p_id'     => $id,
                     'p_nama'   => strtoupper($req->p_nama),
                     'p_gaji'   => filter_var($req->p_gaji,FILTER_SANITIZE_NUMBER_INT),
                    );
        $this->model->posisi()->create($save);
        DB::commit();
        return Response::json(['status'=>1,'pesan'=>'Simpan Data!']);
      }else{
        $id = $req->id;
        $save = array(
                     'p_id'     => $id,
                     'p_nama'   => strtoupper($req->p_nama),
                     'p_gaji'   => filter_var($req->p_gaji,FILTER_SANITIZE_NUMBER_INT),
                    );
        $this->model->posisi()->update($save,'p_id',$id);
        DB::commit();
        return Response::json(['status'=>1,'pesan'=>'Update Data!']);
      }
    }catch(Exception $er){
      dd($er);
      DB::rollBack();
    }
  }

  public function hapus_posisi(Request $req)
  {
    $data = $this->model->posisi()->delete('p_id',$req->id);
    return response()->json(['status' => 1]);
  }

  public function staff()
  {
    $posisi = $this->model->posisi()->all();
    $sekolah = $this->model->sekolah()->all();
    return view('master.staff.staff',compact('posisi','sekolah'));
  }

  public function datatable_staff()
  {
    $data = $this->model->staff()->all();
    
    // return $data;
    $data = collect($data);
    return Datatables::of($data)
                    ->addColumn('aksi', function ($data) {
                      return   '<div class="btn-group">'.
                               '<button type="button" onclick="edit(\''.$data->st_id.'\')" class="btn btn-info btn-lg" title="detail">'.
                               '<label class="fa fa-pencil-alt"></label></button>'.
                               '<button type="button" onclick="hapus(\''.$data->st_id.'\')" class="btn btn-danger btn-lg" title="hapus">'.
                               '<label class="fa fa-trash"></label></button>'.
                               '</div>';
                    })
                    ->addColumn('none', function ($data) {
                        return '-';
                    })->addColumn('posisi', function ($data) {
                        return $data->posisi->p_nama;
                    })->addColumn('sekolah', function ($data) {
                        return $data->sekolah->s_nama;
                    })->addColumn('foto', function ($data) {
                          $thumb = asset('storage/uploads/staff/thumbnail').'/'.$data->st_image;
                          return '<img style="width:50px;height:50px;" class="img-fluid img-thumbnail" src="'.$thumb.'">';
                      })
                    ->rawColumns(['aksi', 'none','sekolah','foto'])
                    ->addIndexColumn()
                    ->make(true);
  }

  public function simpan_staff(request $req)
  {
    DB::BeginTransaction();
    try{
      if ($req->id == null) {
        $id = $this->model->staff()->max('st_id');
        $file = $req->file('files');
        if ($file != null) {
          $file_name = 'staff_'. $id .'_' . '.' . $file->getClientOriginalExtension();
          if (!is_dir(storage_path('uploads/staff/thumbnail/'))) {
            mkdir(storage_path('uploads/staff/thumbnail/'), 0777, true);
          }

          if (!is_dir(storage_path('uploads/staff/original/'))) {
            mkdir(storage_path('uploads/staff/original/'), 0777, true);
          }

          $thumbnail_path = storage_path('uploads/staff/thumbnail/');
          $original_path = storage_path('uploads/staff/original/');
          // return $original_path;
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


        $save = array(
                   'st_id'              => $id,
                   'st_nama'            => $req->st_nama,
                   'st_alamat'          => $req->st_alamat,
                   'st_tanggal_lahir'   => carbon::parse(str_replace('/','-',$req->st_tanggal_lahir))->format('Y-m-d'),
                   'st_tempat_lahir'    => $req->st_tempat_lahir,
                   'st_telpon'          => $req->st_telpon,
                   'st_image'           => $file_name,
                   'st_posisi'          => $req->st_posisi,
                   'st_sekolah'         => $req->st_sekolah,
                   'created_by'         => Auth::user()->name,
                   'updated_by'         => Auth::user()->name,
                 );
        $this->model->staff()->create($save);
        DB::commit();
        return Response::json(['status'=>1,'pesan'=>'Simpan Data!']);
      }else{
        $id = $req->id;
        $file = $req->file('files');
        if ($file != null) {
          $file_name = 'staff_'. $id .'_' . '.' . $file->getClientOriginalExtension();
          if (!is_dir(storage_path('uploads/staff/thumbnail/'))) {
            mkdir(storage_path('uploads/staff/thumbnail/'), 0777, true);
          }

          if (!is_dir(storage_path('uploads/staff/original/'))) {
            mkdir(storage_path('uploads/staff/original/'), 0777, true);
          }

          $thumbnail_path = storage_path('uploads/staff/thumbnail/');
          $original_path = storage_path('uploads/staff/original/');
          // return $original_path;
          Image::make($file)
                  ->resize(261,null,function ($constraint) {
                    $constraint->aspectRatio();
                     })
                  ->save($original_path . $file_name)
                  ->resize(90, 90)
                  ->save($thumbnail_path . $file_name);
        }else{
          $image = $this->model->staff()->cari('st_id',$req->id);
          $file_name = $image->st_image;
        }

        $save = array(
                   'st_nama'            => $req->st_nama,
                   'st_alamat'          => $req->st_alamat,
                   'st_tanggal_lahir'   => carbon::parse(str_replace('/','-',$req->st_tanggal_lahir))->format('Y-m-d'),
                   'st_tempat_lahir'    => $req->st_tempat_lahir,
                   'st_telpon'          => $req->st_telpon,
                   'st_image'           => $file_name,
                   'st_posisi'          => $req->st_posisi,
                   'st_sekolah'         => $req->st_sekolah,
                   'updated_by'         => Auth::user()->name,
                 );

        $this->model->staff()->update($save,'st_id',$req->id);
        DB::commit();
        return Response::json(['status'=>1,'pesan'=>'Simpan Data!']);
      }
      
    }catch(Exception $er){
      dd($er);
      DB::rollBack();
    }
  }

  public function edit_staff(request $req)
  {
    $data = $this->model->staff()->cari('st_id',$req->id);
    $tanggal = carbon::parse($data->st_tanggal_lahir)->format('d/m/Y');
    return response()->json(['data' => $data,'tanggal' => $tanggal]);
  }

  public function hapus_staff(Request $req)
  {
    $data = $this->model->staff()->cari('st_id',$req->id);
    unlink(storage_path('uploads/staff/thumbnail').'/'.$data->st_image);
    unlink(storage_path('uploads/staff/original').'/'.$data->st_image);
    $data = $this->model->staff()->delete('st_id',$req->id);
    return response()->json(['status' => 1]);
  }

  public function barang()
  {
    $akun = $this->models->akun()->select('a_master_akun','a_master_nama')
                   ->where('a_master_akun','like','5%')
                   ->orWhere('a_master_akun','like','6%')
                   ->orWhere('a_master_akun','like','7%')
                   ->groupBy('a_master_akun','a_master_nama')
                   ->get();
    return view('master.barang.barang',compact('akun'));
  }

  public function datatable_barang()
  {
    $data = $this->model->barang()->all();
    
    // return $data;
    $data = collect($data);
    return Datatables::of($data)
                    ->addColumn('aksi', function ($data) {
                      return   '<div class="btn-group">'.
                               '<button type="button" onclick="edit(this)" class="btn btn-info btn-lg" title="detail">'.
                               '<label class="fa fa-pencil-alt"></label></button>'.
                               '<button type="button" onclick="hapus(\''.$data->b_id.'\')" class="btn btn-danger btn-lg" title="hapus">'.
                               '<label class="fa fa-trash"></label></button>'.
                               '</div>';
                    })
                    ->addColumn('none', function ($data) {
                        return '-';
                    })
                    ->rawColumns(['none','aksi'])
                    ->addIndexColumn()
                    ->make(true);
  }

  public function simpan_barang(request $req)
  {
    DB::BeginTransaction();
    try{
      if ($req->id == null) {
        $id = $this->model->barang()->max('b_id');
        $save = array(
                  'b_id'              => $id,
                  'b_nama'            => strtoupper($req->b_nama),
                  'b_keterangan'      => strtoupper($req->b_keterangan),
                  'b_harga_tertinggi' => filter_var($req->b_harga_tertinggi,FILTER_SANITIZE_NUMBER_INT),
                  'b_akun'            => $req->b_akun,
                  'created_by'        => Auth::user()->name,
                  'updated_by'        => Auth::user()->name,
                 );
        $this->model->barang()->create($save);
        DB::commit();
        return Response::json(['status'=>1,'pesan'=>'Simpan Data!']);
      }else{
        $id = $req->id;
        $save = array(
                  'b_nama'            => strtoupper($req->b_nama),
                  'b_keterangan'      => strtoupper($req->b_keterangan),
                  'b_harga_tertinggi' => filter_var($req->b_harga_tertinggi,FILTER_SANITIZE_NUMBER_INT),
                  'b_akun'            => $req->b_akun,
                  'updated_by'        => Auth::user()->name,
                 );
        $this->model->barang()->update($save,'b_id',$id);
        DB::commit();
        return Response::json(['status'=>1,'pesan'=>'Simpan Data!']);
      }
      
    }catch(Exception $er){
      dd($er);
      DB::rollBack();
    }
  }

  public function edit_barang(request $req)
  {
    $data = $this->model->barang()->cari('st_id',$req->id);
    $tanggal = carbon::parse($data->st_tanggal_lahir)->format('d/m/Y');
    return response()->json(['data' => $data,'tanggal' => $tanggal]);
  }

  public function hapus_barang(Request $req)
  {
    $data = $this->model->barang()->cari('b_id',$req->id);
    $data = $this->model->barang()->delete('b_id',$req->id);
    return response()->json(['status' => 1]);
  }


}
