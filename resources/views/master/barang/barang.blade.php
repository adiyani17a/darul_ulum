@extends('main')
@section('content')

@include('master.barang.tambah')

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
                      <th style="width: 20%">Nama Barang</th>
                      <th style="width: 40%">Keterangan</th>
                      <th style="width: 40%">Harga Tertinggi</th>
                      <th style="width: 40%">Akun</th>
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
              url:'{{ route('datatable_barang') }}',
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
                     className: 'right d_keterangan'
                  },
                  {
                     targets: 3 ,
                     className: 'right d_harga'
                  },
                  {
                     targets: 4 ,
                     className: 'right d_akun'
                  },
                  {
                     targets: 5 ,
                     className: 'tengah'
                  },
                  
                ],
          columns: [
            {data: 'b_id', name: 'b_id'},
            {data: 'b_nama', name: 'b_nama'},
            {data: 'b_keterangan', name: 'b_keterangan'},
            {data: 'b_harga_tertinggi', render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
            {data: 'b_akun'},
            {data: 'aksi', name: 'aksi'}
          ]

    });
    $('.b_harga_tertinggi').maskMoney({thousands:'.',allowZero:true,defaultZero:true,precision:0});
  })

  $('.btn_modal').click(function(){
    $('.tabel_modal input').val('');
    $('.tabel_modal select').val('').trigger('change');
    $('.nama').focus();
  })

  $('.simpan').click(function(){
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url:baseUrl +'/master/simpan_barang',
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
    var ket   = $(par).find('.d_keterangan').text();
    var harga = $(par).find('.d_harga').text();
    var akun  = $(par).find('.d_akun').text();
    harga     = harga.replace(/[^0-9\-]+/g,"")/100;

    $('.id').val(id);
    $('.b_nama').val(nama);
    $('.b_keterangan').val(ket);
    console.log(akun);
    $('.b_akun').val(akun).trigger('change');
    $('.b_harga_tertinggi').maskMoney('mask',harga);
    $('#tambah-jabatan').modal('show');
  }


  function hapus(id) {
    $.ajax({
        url:baseUrl +'/master/hapus_barang',
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