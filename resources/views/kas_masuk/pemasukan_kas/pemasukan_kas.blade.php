@extends('main')
@section('content')

<!-- partial -->
<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12"> 
      <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb bg-info">
          <li class="breadcrumb-item"><i class="fa fa-home"></i>&nbsp;<a href="#">Home</a></li>
          <li class="breadcrumb-item">Kas Masuk</li>
          <li class="breadcrumb-item active" aria-current="page">Pemasukan Kas</li>
        </ol>
      </nav>
    </div>
  	<div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          @if (Session::has('message'))
            <div class="alert alert-success alert-dismissible" title="DP sudah Lunas">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>Berhasil!</strong> <br>
              Simpan Data.
            </div>
          @endif
          <h4 class="card-title">Pemasukan Kas</h4>
          <div class="col-md-12 col-sm-12 col-xs-12" align="right" style="margin-bottom: 15px;">
          	<a href="{{ url('kas_masuk/create_pemasukan_kas') }}"><button type="button" class="btn btn-info btn_modal" data-toggle="modal" data-target="#tambah-akun"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Data</button></a>
          </div>

          <div class="table-responsive">
			        <table id="table_data" class="table table-striped table-hover" cellspacing="0">
                  <thead class="bg-gradient-info">
                    <tr>
                      <th>No</th>
                      <th>Nota</th>
                      <th>Sekolah</th>
                      <th>Ref</th>
                      <th>Tanggal</th>
                      <th>Total</th>
                      <th>Pembuat</th>
                      <th>Status</th>
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
            url:'{{ route('datatable_pemasukan_kas') }}',
            data:{_token:'{{ csrf_token() }}'},
            error:function(){
              var table = $('#table_data').DataTable();
              table.ajax.reload();
            }
        },
        // columnDefs: [
        //         {
        //            targets: 0 ,
        //            className: ' tengah'
        //         },
        //         {
        //            targets: 5 ,
        //            className: ' right'
        //         },
        //         {
        //            targets: 7 ,
        //            className: ' tengah'
        //         },
        //         {
        //            targets: 8 ,
        //            className: ' tengah'
        //         },
        //       ],
        columns: [
          {data: 'DT_Row_Index', name: 'DT_Row_Index'},
          {data: 'km_nota', name: 'km_nota'},
          {data: 'sekolah', name: 'sekolah'},
          {data: 'km_ref', name: 'km_ref'},
          {data: 'created_at', name: 'created_at'},
          {data: 'km_total', render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
          {data: 'created_by', name: 'created_by'},
          {data: 'status', name: 'status'},
          {data: 'aksi'}
        ]

  });
})

$('.btn_modal').click(function(){
  $('#tambah-akun :input:not(input[name="_token"])').val('');
  $('#tambah-akun select:not(.a_akun_dka):not(.a_aktif)').val('').trigger('change');
})

function edit(id) {
 location.href = '{{  url('kas_masuk/edit_pemasukan_kas') }}?id='+id;
}

function hapus(id) {
  iziToast.show({
    overlay: true,
    close: false,
    timeout: 20000, 
    color: 'dark',
    icon: 'fas fa-question-circle',
    title: 'Hapus Data!',
    message: 'Apakah Anda Yakin ?!',
    position: 'center',
    progressBarColor: 'rgb(0, 255, 184)',
    buttons: [
    [
        '<button style="background-color:#32CD32;">Hapus</button>',
        function (instance, toast) {

          $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url:baseUrl +'/kas_masuk/hapus_pemasukan_kas',
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
                          message: data.pesan,
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
            instance.hide({
                transitionOut: 'fadeOutUp'
            }, toast);
        }
    ],
    [
        '<button style="background-color:#44d7c9;">Cancel</button>',
        function (instance, toast) {
          instance.hide({
            transitionOut: 'fadeOutUp'
          }, toast);
        }
      ]
    ]
  });
}
</script>
@endsection