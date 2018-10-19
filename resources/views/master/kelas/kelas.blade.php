@extends('main')
@section('content')

@include('master.kelas.tambah')

<!-- partial -->
<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12"> 
      <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb bg-info">
          <li class="breadcrumb-item"><i class="fa fa-home"></i>&nbsp;<a href="#">Home</a></li>
          <li class="breadcrumb-item">Master</li>
          <li class="breadcrumb-item active" aria-current="page">Master Kelas</li>
        </ol>
      </nav>
    </div>
    
  	<div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Master Kelas</h4>
          <div class="col-md-12 col-sm-12 col-xs-12" align="right" style="margin-bottom: 15px;">
          	<button type="button" class="btn btn-info btn_modal" data-toggle="modal" data-target="#tambah-kelas"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Data</button>
          </div>
          <div class="table-responsive">
			        <table id="table_data" class="table table-striped table-hover table-bordered" cellspacing="0">
                  <thead class="bg-gradient-info">
                    <tr>
                      <th style="width: 10%">No</th>
                      <th style="width: 20%">Nama</th>
                      <th style="width: 40%">Keterangan</th>
                      <th style="width: 10%">Aksi</th>
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
              url:'{{ route('datatable_kelas') }}',
          },
          columnDefs: [
                  {
                     targets: 0 ,
                     className: 'tengah d_id'
                  },
                  {
                     targets: 3 ,
                     className: 'tengah'
                  },
                ],
          columns: [
            {data: 'DT_Row_Index', name: 'DT_Row_Index'},
            {data: 'k_nama', name: 'k_nama'},
            {data: 'k_keterangan', name: 'k_keterangan'},
            {data: 'aksi', name: 'aksi'}
          ]

    });
  })

  $('.btn_modal').click(function(){
    $('.tabel_modal input').val('');
    $('.tabel_modal select').val('').trigger('change');
    $('.nama').focus();
  })

  $('.simpan').click(function(){

    var validator = [];
    $('.tabel_modal').find('.wajib').each(function(){
      if ($(this).val() == '') {
        $(this).addClass('error');
        validator.push(0);
      }
    })

    var index = validator.indexOf(0);
    if (index != -1) {
      iziToast.warning({
          icon: 'fa fa-times',
          title: 'Terjadi Kesalahan',
          message: 'Semua Inputan Harus Diisi',
      });
      return false;
    }

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url:baseUrl +'/master/simpan_kelas',
        type:'post',
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
              $('#tambah-kelas').modal('hide');
            }else if(data.status == 2){
              iziToast.success({
                  icon: 'fa fa-pencil-alt',
                  title: 'Berhasil',
                  message: data.pesan,
              });
              $('#tambah-kelas').modal('hide');
            }
            var table = $('#table_data').DataTable();
            table.ajax.reload();
            $('.tabel_modal input').val('');
        },
        error:function(){
          iziToast.warning({
            icon: 'fa fa-times',
            message: 'Terjadi Kesalahan!',
          });
        }
    });
  });

  function edit(id) {
    
    $.ajax({
        url:baseUrl +'/master/edit_kelas',
        type:'get',
        data:{id},
        dataType:'json',
        success:function(data){
            $('.id').val(data.data.k_id);
            $('.k_nama').val(data.data.k_nama);
            $('.k_keterangan').val(data.data.k_keterangan);

        },
        error:function(){
          iziToast.warning({
            icon: 'fa fa-times',
            message: 'Terjadi Kesalahan!',
          });
        }
    });
    $('#tambah-kelas').modal('show');
  }


  function hapus(id) {
    $.ajax({
        url:baseUrl +'/master/hapus_kelas',
        type:'get',
        data:{id},
        dataType:'json',
        success:function(data){
          $('#tambah-kelas').modal('hide');
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