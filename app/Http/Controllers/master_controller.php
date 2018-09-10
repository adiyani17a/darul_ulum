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
  	$data = $this->model->sekolah()->delete('s_id',$req->id);
    return response()->json(['data' => $data]);
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
                      ->addColumn('image', function ($data) {
                          $thumb = asset('storage/uploads/sekolah/thumbnail').'/'.$data->s_logo;
                          return '<img style="width:50px;height:50px;" class="img-fluid img-thumbnail" src="'.$thumb.'">';
                      })
                      ->rawColumns(['aksi', 'none','image'])
                      ->make(true);
  }
}
