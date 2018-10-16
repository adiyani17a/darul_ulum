@extends('main')
@section('content')

@include('master.posisi.tambah')

<!-- partial -->
<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12"> 
      <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb bg-info">
          <li class="breadcrumb-item"><i class="fa fa-home"></i>&nbsp;<a href="#">Home</a></li>
          <li class="breadcrumb-item">Master</li>
          <li class="breadcrumb-item active" aria-current="page">Master Posisi</li>
        </ol>
      </nav>
    </div>
  	<div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Master Posisi</h4>
          <div class="col-md-12 col-sm-12 col-xs-12" align="right" style="margin-bottom: 15px;">
          	<button type="button" class="btn btn-info btn_modal" data-toggle="modal" data-target="#tambah-jabatan"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Data</button>
          </div>
          <div class="table-responsive">
			        <table id="table_data" class="table table-striped table-hover table-bordered" cellspacing="0">
                  <thead class="bg-gradient-info">
                    <tr>
                      <th style="width: 10%">No</th>
                      <th style="width: 40%">Nama Posisi</th>
                      <th style="width: 40%">Gaji</th>
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
              url:'{{ route('datatable_posisi') }}',
              error:function(){
                var table = $('#table_data').DataTable();
                table.ajax.reload(null,false);
              }
          },
          columnDefs: [

                  {
                     targets: 0 ,
                     className: 'tengah d_id'
                  },
                  {
                     targets: 1 ,
                     className: 'd_nama'
                  },
                  {
                     targets: 2 ,
                     className: 'right d_gaji'
                  },
                  {
                     targets: 3 ,
                     className: 'tengah'
                  },
                  
                  
                ],
          columns: [
            {data: 'p_id', name: 'p_id'},
            {data: 'p_nama', name: 'p_nama'},
            {data: 'p_gaji', render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
            {data: 'aksi', name: 'aksi'}
          ]

    });
    $('.p_gaji').maskMoney({thousands:'.',allowZero:true,defaultZero:true,precision:0});
  })

  $('.btn_modal').click(function(){
    $('.nama').focus();
  })

  $('.simpan').click(function(){
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url:baseUrl +'/master/simpan_posisi',
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
              $('#tambah-jabatan').modal('hide');
            }else if(data.status == 2){
              iziToast.success({
                  icon: 'fa fa-pencil-alt',
                  title: 'Berhasil',
                  message: data.pesan,
              });
              $('#tambah-jabatan').modal('hide');
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

  function edit(a) {
    
    var par   = $(a).parents('tr');
    var id    = $(par).find('.d_id').text();
    var nama  = $(par).find('.d_nama').text();
    var ket   = $(par).find('.d_gaji').text();
    ket       = ket.replace(/[^0-9\-]+/g,"")/100;

    $('.id').val(id);
    $('.p_nama').val(nama);
    $('.p_gaji').maskMoney('mask',ket);
    $('#tambah-jabatan').modal('show');


  }


  function hapus(a) {
    var par   = $(a).parents('tr');
    var id    = $(par).find('.d_id').text();
    $.ajax({
        url:baseUrl +'/master/hapus_posisi',
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