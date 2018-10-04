@extends('main')
@section('content')

<!-- partial -->
<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12"> 
      <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb bg-info">
          <li class="breadcrumb-item"><i class="fa fa-home"></i>&nbsp;<a href="#">Home</a></li>
          <li class="breadcrumb-item">Kas Keluar</li>
          <li class="breadcrumb-item active" aria-current="page">Pengeluaran Anggaran</li>
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
          <h4 class="card-title">Pengeluaran Anggaran</h4>
          <div class="col-md-12 col-sm-12 col-xs-12" align="right" style="margin-bottom: 15px;">
            <a href="{{ url('kas_keluar/create_pengeluaran_anggaran') }}"><button type="button" class="btn btn-info btn_modal" data-toggle="modal" data-target="#tambah-akun"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Data</button></a>
          </div>

          <div class="table-responsive">
              <table id="table_data" class="table table-striped table-hover" cellspacing="0">
                  <thead class="bg-gradient-info">
                    <tr>
                      <th>No</th>
                      <th>Nota</th>
                      <th>Sekolah</th>
                      <th>Pemohon</th>
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

@include('kas_keluar.konfirmasi_pengeluaran_kas.modal')


<!-- content-wrapper ends -->
@endsection
@section('extra_script')
<script>

$(document).ready(function(){

   $('#table_data').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url:'{{ route('datatable_pengeluaran_anggaran') }}',
            data:{_token:'{{ csrf_token() }}'}
        },
        columnDefs: [
                {
                   targets: 0 ,
                   className: 'tengah'
                },
                {
                   targets: 5 ,
                   className: ' right'
                },
                {
                   targets: 7 ,
                   className: 'tengah'
                },
                {
                   targets: 8 ,
                   className: 'tengah'
                },
              ],
        columns: [
          {data: 'DT_Row_Index', name: 'DT_Row_Index'},
          {data: 'nota', name: 'nota'},
          {data: 'sekolah', name: 'sekolah'},
          {data: 'pc_pemohon', name: 'pc_pemohon'},
          {data: 'pc_tanggal', name: 'pc_tanggal'},
          {data: 'pc_total', render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
          {data: 'created_by', name: 'created_by'},
          {data: 'status', name: 'status'},
          {data: 'aksi'}
        ]

  });
})

function detail(id) {
  $.ajax({
      url:baseUrl +'/kas_keluar/detail_konfirmasi_pengeluaran_kas',
      type:'get',
      data:{id},
      success:function(data){
        $('.table_append').html(data);
        $('#detail').modal('show');
      },
      error:function(){
        iziToast.warning({
          icon: 'fa fa-times',
          message: 'Terjadi Kesalahan!',
        });
      }
  });
}

$('.btn_modal').click(function(){
  $('#tambah-akun :input:not(input[name="_token"])').val('');
  $('#tambah-akun select:not(.a_akun_dka):not(.a_aktif)').val('').trigger('change');
})

function edit(id) {
 location.href = '{{  url('kas_keluar/edit_pengeluaran_anggaran') }}?id='+id;
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
                url:baseUrl +'/kas_keluar/hapus_pengeluaran_anggaran',
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