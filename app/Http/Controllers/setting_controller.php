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
class setting_controller extends Controller
{
  protected $model;
	protected $models;
	// JABATAN]

	public function __construct()
	{
    $this->model = new all_model();
		$this->models = new models();
	}
  public function jabatan()
  {
  	return view('setting.jabatan.jabatan');
  }

  public function datatable_jabatan()
 	{
      $data = $this->model->jabatan()->all();
      
      
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
                      ->rawColumns(['aksi', 'confirmed'])
                      ->make(true);
  }
  public function simpan_jabatan(Request $req)
  {
      DB::BeginTransaction();
  		try{
  			if ($req->id == null) {
    				$cari = $this->model->jabatan()->cari('j_nama',$req->j_nama);
       		if ($cari != null) {
       			return Response::json(['status'=>0,'pesan'=>'Nama Telah Digunakan']);
       		}
       		$id = $this->model->jabatan()->max('j_id');
       		$save = array(
       						'j_id' 		     => $id,
       						'j_nama'       => strtoupper($req->j_nama),
    					    'j_keterangan' => $req->j_keterangan,
    					    'j_created_by' => Auth::User()->name,
    					    'j_updated_by' => Auth::User()->name,
       					 );
       		$this->model->jabatan()->create($save);

          $menu = $this->models->hak_akses()->select('ha_id','ha_menu')->groupBy('ha_id','ha_menu')->get();
          for ($i=0; $i < count($menu); $i++) { 
            $dt = $this->model->hak_akses()->max_detail('ha_id',$menu[$i]->ha_id,'ha_dt');
            $save = array(
                            'ha_id'    => $menu[$i]->ha_id,
                            'ha_dt'    => $dt,
                            'ha_level' => $id,
                            'ha_menu'  => $menu[$i]->ha_menu,
                         );
            $this->model->hak_akses()->create($save);
          }

       		DB::commit();
       		return Response::json(['status'=>1,'pesan'=>'Simpan Data!']);
  			}else{
  				$update = array(
     						'j_nama'       => strtoupper($req->j_nama),
  					    'j_keterangan' => $req->j_keterangan,
  					    'j_updated_by' => Auth::User()->name,
     					 );
  				$this->model->jabatan()->update($update,'j_id',$req->id);
     		DB::commit();
     		return Response::json(['status'=>2,'pesan'=>'Mengupdate Data!']);
  			}
   		
  		}catch(Exception $er){

  			DB::rollBack();
  			dd($er);
  		}
  }

 	public function hapus_jabatan(request $req)
  {
    	$hapus = $this->model->jabatan()->cari('j_id',$req->id);
    	if ($hapus->j_nama == 'SUPERUSER') {
       	return response()->json(['status' => 2]);
    	}else{
        $this->model->hak_akses()->delete('ha_level',$req->id);
        $this->model->jabatan()->delete('j_id',$req->id);
       	return response()->json(['status' => 1]);
    	}
  }
    // USER
  public function akun()
  {
    $jabatan = $this->model->jabatan()->all();
    return view('setting.user.akun',compact('jabatan'));
  }

  public function datatable_akun()
  {
      $data = $this->model->user()->all();
      
      
      $data = collect($data);
      return Datatables::of($data)
                      ->addColumn('aksi', function ($data) {
                        if (strtoupper($data->username) != 'SUPERUSER') {
                           return  '<div class="btn-group">'.
                                   '<button type="button" onclick="edit(this)" class="btn btn-info btn-lg" title="edit">'.
                                   '<label class="fa fa-pencil-alt"></label></button>'.
                                   '<button type="button" onclick="hapus(this)" class="btn btn-danger btn-lg" title="hapus">'.
                                   '<label class="fa fa-trash"></label></button>'.
                                   '</div>';
                        }else{
                          return  '<button type="button" onclick="edit(this)" class="btn btn-info btn-lg" title="edit">'.
                                  '<label class="fa fa-pencil-alt"></label></button>';
                        }
                        
                      })
                      ->addColumn('none', function ($data) {
                          return '-';
                      })
                      ->addColumn('image', function ($data) {
                          $thumb = route('thumbnail').'/'.$data->image;
                          return '<img style="width:50px;height:50px;" class="img-fluid img-thumbnail" src="'.$thumb.'">';
                      })
                      ->addColumn('jabatan', function ($data) {
                          return $data->jabatan->j_nama;
                      })
                      ->rawColumns(['aksi', 'image','jabatan'])
                      ->make(true);
  }

  public function simpan_akun(request $req)
  {
    DB::BeginTransaction();
    try{
      if ($req->id == null) {
        $id = $this->model->user()->max('id');
        $file = $req->file('files');
        if ($file != null) {
          $file_name = 'user_'. $id .'_' . '.' . $file->getClientOriginalExtension();
          if (!is_dir(storage_path('uploads/user/thumbnail/'))) {
            mkdir(storage_path('uploads/user/thumbnail/'), 0777, true);
          }

          if (!is_dir(storage_path('uploads/user/original/'))) {
            mkdir(storage_path('uploads/user/original/'), 0777, true);
          }

          $thumbnail_path = storage_path('uploads/user/thumbnail/');
          $original_path = storage_path('uploads/user/original/');
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
        if ($req->username == 'superuser') {
          $req->username = 'SUPERUSER';
        }
        $username = $this->model->user()->cari('username',$req->username);
        if ($username != null) {
          DB::rollBack();
          return Response::json(['status'=>0,'pesan'=>'Username Telah Digunakan']);
        }

        $email = $this->model->user()->cari('email',$req->email);

        if ($email != null) {
          DB::rollBack();
          return Response::json(['status'=>0,'pesan'=>'Email Telah Digunakan']);
        }

        $save = array(
                  'id'              => $id,
                  'name'            => strtoupper($req->name),
                  'username'        => $req->username, 
                  'email'           => $req->email, 
                  'password'        => Hash::make($req->password),
                  'jabatan_id'      => $req->jabatan_id,
                  'image'           => $file_name,
                  'remember_token'  => bin2hex(random_bytes(30)),
                 );
        $this->model->user()->create($save);
        DB::commit();
        return Response::json(['status'=>1,'pesan'=>'Simpan Data!']);
      }else{
        $id = $req->id;
        $file = $req->file('files');
        if ($file != null) {
          $file_name = 'user_'. $id .'_' . '.' . $file->getClientOriginalExtension();
          if (!is_dir(storage_path('uploads/user/thumbnail/'))) {
            mkdir(storage_path('uploads/user/thumbnail/'), 0777, true);
          }

          if (!is_dir(storage_path('uploads/user/original/'))) {
            mkdir(storage_path('uploads/user/original/'), 0777, true);
          }

          $thumbnail_path = storage_path('uploads/user/thumbnail/');
          $original_path = storage_path('uploads/user/original/');
          // return $original_path;
          Image::make($file)
                  ->resize(261,null,function ($constraint) {
                    $constraint->aspectRatio();
                     })
                  ->save($original_path . $file_name)
                  ->resize(90, 90)
                  ->save($thumbnail_path . $file_name);
        }else{
          $image = $this->model->user()->cari('id',$req->id);
          $file_name = $image->image;
        }

        $username = $this->model->user()->cari_jika_tidak('username',$req->username,'id',$req->id)->toArray();
        if ($username != null) {
          DB::rollBack();
          return Response::json(['status'=>0,'pesan'=>'Username Telah Digunakan']);
        }

        $email = $this->model->user()->cari_jika_tidak('email',$req->email,'id',$req->id)->toArray();

        if ($email != null) {
          DB::rollBack();
          return Response::json(['status'=>0,'pesan'=>'Email Telah Digunakan']);
        }

        $save = array(
                  'name'            => strtoupper($req->name),
                  'username'        => $req->username, 
                  'email'           => $req->email, 
                  'password'        => Hash::make($req->password),
                  'jabatan_id'      => $req->jabatan_id,
                  'image'           => $file_name
                 );

        $this->model->user()->update($save,'id',$req->id);
        DB::commit();
        return Response::json(['status'=>1,'pesan'=>'Simpan Data!']);
      }
      
    }catch(Exception $er){
      dd($er);
      DB::rollBack();
    }
  }

  public function edit_akun(request $req)
  {
      $data = $this->model->user()->cari('id',$req->id);
      return response()->json(['data' => $data]);
  }

  public function hapus_akun(request $req)
  {
      $hapus = $this->model->user()->cari('id',$req->id);
      if ($hapus->username == 'SUPERUSER') {
        return response()->json(['status' => 2]);
      }else{
        $hapus = $this->model->user()->delete('id',$req->id);
        return response()->json(['status' => 1]);
      }
  }

  // DAFTAR MENU
  public function daftar_menu()
  {
    $grup_menu = $this->model->grup_menu()->all();
    return view('setting.daftar_menu.daftar_menu',compact('grup_menu'));
  }

  public function datatable_daftar_menu()
  {
    $data = $this->model->daftar_menu()->all();
      
      
    // return $data;
    $data = collect($data);
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
                    ->addColumn('gm_id', function ($data) {
                        return $data->grup_menu->gm_id;
                    })
                    ->addColumn('gm_nama', function ($data) {
                        return $data->grup_menu->gm_nama;
                    })
                    ->rawColumns(['aksi', 'confirmed','gm_id','gm_nama'])
                    ->addIndexColumn()
                    ->make(true);
  }

  public function simpan_daftar_menu(request $req)
  {
    DB::BeginTransaction();
    try{
        if ($req->id == null) {
          $jabatan = $this->model->jabatan()->all();
          $save = array(
                        'dm_nama'  => strtoupper($req->dm_nama),
                        'dm_group' => $req->dm_group,
                       );
          $this->model->daftar_menu()->create($save);

          $id = $this->model->hak_akses()->max('ha_id');
          for ($i=0; $i < count($jabatan); $i++) { 
            $save = array(
                            'ha_id'    => $id,
                            'ha_dt'    => $i+1,
                            'ha_level' => $jabatan[$i]->j_id,
                            'ha_menu'  => strtoupper($req->dm_nama),
                         );
            if ($jabatan[$i]->j_nama == 'SUPERUSER') {
              $save['aktif']  = 1;
              $save['tambah'] = 1;
              $save['ubah']   = 1;
              $save['hapus']  = 1;
              $save['print']  = 1;
            }
            $this->model->hak_akses()->create($save);
          }
          DB::commit();
          return Response::json(['status'=>1,'pesan'=>'Menyimpan Data!']);
        }else{
          $jabatan = $this->model->jabatan()->all();
          $save = array(
                        'dm_nama'  => strtoupper($req->dm_nama),
                        'dm_group' => $req->dm_group,
                       );
          $this->model->daftar_menu()->update($save,'dm_nama',$req->id);

          $this->model->hak_akses()->delete('ha_menu',$req->id);
          $id = $this->model->hak_akses()->max('ha_id');
          for ($i=0; $i < count($jabatan); $i++) { 
            
            $save = array(
                            'ha_id'    => $id,
                            'ha_dt'    => $i+1,
                            'ha_level' => $jabatan[$i]->j_id,
                            'ha_menu'  => strtoupper($req->dm_nama),
                         );
            if ($jabatan[$i]->j_nama == 'SUPERUSER') {
              $save['aktif']  = 1;
              $save['tambah'] = 1;
              $save['ubah']   = 1;
              $save['hapus']  = 1;
              $save['print']  = 1;
            }
            $this->model->hak_akses()->create($save);
          }
          DB::commit();
          return Response::json(['status'=>1,'pesan'=>'Menyimpan Data!']);
        }
      }catch(Exception $er){
        DB::rollBack();
        dd($er);
      }
  }

  public function hapus_daftar_menu(request $req)
  {
    

    $this->model->hak_akses()->delete('ha_menu',$req->id);

    $this->model->daftar_menu()->delete('dm_nama',$req->id);

    return response()->json(['status' => 1]);
  }
  // HAK AKSES
  public function hak_akses()
  {  
    $data = $this->model->hak_akses()->all();
    $jabatan = $this->model->jabatan()->semua_kecuali('j_id',1);


    return view('setting.hak_akses.hak_akses',compact('data','jabatan'));
  }

  public function table_data(request $req)
  {
    $data = $this->model->hak_akses()->show('ha_level',$req->level);
    $grup_menu = $this->model->grup_menu()->all();
    
    return view('setting.hak_akses.table_data',compact('data','grup_menu','hak_akses'));
  }
  public function centang(request $req)
  {
    if (isset($req->aktif)) {
      if ($req->aktif == 'true') {
        $aktif = 1;
      }else{
        $aktif = 0;
      }
      hak_akses::where('ha_level',$req->level)
                        ->where('ha_menu',$req->tanda)
                        ->update([
                          'aktif' =>$aktif
                        ]);
    }

    if (isset($req->tambah)) {
      if ($req->tambah == 'true') {
        $tambah = 1;
      }else{
        $tambah = 0;
      }
      hak_akses::where('ha_level',$req->level)
                        ->where('ha_menu',$req->tanda)
                        ->update([
                          'tambah' =>$tambah
                        ]);
    }      

    if (isset($req->ubah)) {
      if ($req->ubah == 'true') {
        $ubah = 1;
      }else{
        $ubah = 0;
      }
      hak_akses::where('ha_level',$req->level)
                        ->where('ha_menu',$req->tanda)
                        ->update([
                          'ubah' =>$ubah
                        ]);
    }  

    if (isset($req->print)) {
      if ($req->print == 'true') {
        $print = 1;
      }else{
        $print = 0;
      }
      hak_akses::where('ha_level',$req->level)
                        ->where('ha_menu',$req->tanda)
                        ->update([
                          'print' =>$print
                        ]);
    } 

    if (isset($req->hapus)) {
      if ($req->hapus == 'true') {
        $hapus = 1;
      }else{
        $hapus = 0;
      }
      hak_akses::where('ha_level',$req->level)
                        ->where('ha_menu',$req->tanda)
                        ->update([
                          'hapus' =>$hapus
                        ]);
    } 

    return response()->json(['status' => 1]);
  }
} 


