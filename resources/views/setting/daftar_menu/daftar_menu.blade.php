@extends('main')
@section('content')

@include('setting.daftar_menu.tambah')

<!-- partial -->
<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12"> 
      <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb bg-info">
          <li class="breadcrumb-item"><i class="fa fa-home"></i>&nbsp;<a href="#">Home</a></li>
          <li class="breadcrumb-item">Setting</li>
          <li class="breadcrumb-item active" aria-current="page">Setting Daftar Menu</li>
        </ol>
      </nav>
    </div>
  	<div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Setting Daftar Menu</h4>
          {{-- @if(Auth::user()->akses('SETTING DAFTAR MENU','tambah')) --}}
          <div class="col-md-12 col-sm-12 col-xs-12" align="right" style="margin-bottom: 15px;">
          	<button type="button" class="btn btn-info btn_modal" data-toggle="modal" data-target="#daftar-menu"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Data</button>
          </div>
          {{-- @endif --}}
          <div class="table-responsive">
			        <table id="table_data" class="table table-striped table-hover" cellspacing="0">
                  <thead class="bg-gradient-info">
                    <tr>
                      <th>No</th>
                      <th>Nama Menu</th>
                      <th>Id Group</th>
                      <th>Grup Menu</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
              </table> 
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- content-wrapper ends -->
@endsection
@section('extra_script')
<script>

  $(document).ready(function(){

     $('#table_data').DataTable({
          processing: true,
          serverSide: true,
          ajax: {
              url:'{{ route('datatable_daftar_menu') }}',
          },
          columnDefs: [

                  {
                     targets: 0 ,
                     className: 'center'
                  },
                  {
                     targets: 1,
                     className: 'dm_nama'
                  },
                  {
                     targets: 2,
                     className: 'center gm_id'
                  },
                  {
                     targets: 4,
                     className: 'center'
                  }
                ],
          columns: [
            {data: 'DT_Row_Index',      name: 'DT_Row_Index'},
            {data: 'dm_nama', name: 'dm_nama'},
            {data: 'gm_id', name: 'gm_id'},
            {data: 'gm_nama', name: 'gm_nama'},
            {data: 'aksi', name: 'aksi'}
          ]

    });
  })

$('.btn_modal').click(function(){
  $('.nama').val('');
  $('.id').val('');
  $('.grup_menu').val('').trigger('change');
})

$('.simpan').click(function(){
    var nama = $('.nama').val();
    if (nama == '') {
      iziToast.warning({
        icon: 'fa fa-times',
        message: 'Nama Tidak Boleh Kosong!',
      });
      return false;
    }
    $.ajax({
        url:baseUrl +'/setting/simpan_daftar_menu',
        type:'get',
        data:$('.tabel_modal :input').serialize(),
        dataType:'json',
        success:function(data){
            if (data.status == 0) {
              iziToast.warning({
                  icon: 'fa fa-times',
                  title: 'Nama',
                  message: data.pesan,
              });
            }else if(data.status == 1){
              iziToast.success({
                  icon: 'fa fa-save',
                  title: 'Berhasil',
                  message: data.pesan,
              });
            }else{
              iziToast.success({
                  icon: 'fa fa-pencil-alt',
                  title: 'Berhasil',
                  message: data.pesan,
              });
            }

            var table = $('#table_data').DataTable();
            table.ajax.reload();
            $('.nama').val('');
            $('.id').val('');
        },
        error:function(){
          iziToast.warning({
            icon: 'fa fa-times',
            message: 'Terjadi Kesalahan!',
          });
        } 
    });
  });


  function edit(a) {
    var par   = $(a).parents('tr');
    var nama  = $(par).find('.dm_nama').text();
    var grup  = $(par).find('.gm_id').text();
    $('.nama').val(nama);
    $('.id').val(nama);
    $('.grup_menu').val(grup).trigger('change');
    $('.grup_menu').val(grup).trigger('change');
    $('#daftar-menu').modal('show');
  }


  function hapus(a) {
    var par   = $(a).parents('tr');
    var id    = $(par).find('.dm_nama').text();
    console.log(id);
    $.ajax({
        url:baseUrl +'/setting/hapus_daftar_menu',
        type:'get',
        data:{id},
        dataType:'json',
        success:function(data){
          $('#tambah-jabatan').modal('hide');
          var table = $('#table_data').DataTable();
          table.ajax.reload();
          if (data.status == 1) {
            iziToast.success({
                  icon: 'fa fa-trash',
                  title: 'Berhasil',
                  color:'yellow',
                  message: 'Menghapus Data!',
            });
          }else{
            iziToast.warning({
                  icon: 'fa fa-times',
                  title: 'Oops,',
                  message: ' Superuser Tidak Boleh Dihapus!',
            });
          }
        },
        error:function(){
          iziToast.warning({
            icon: 'fa fa-times',
            message: 'Terjadi Kesalahan!',
          });
        }
    });
  }
</script>
@endsection