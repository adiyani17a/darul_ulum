@extends('main')
@section('content')
<style type="text/css">
  .cursor{
    cursor: pointer;
  }
</style>
<!-- partial -->
<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12"> 
      <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb bg-info">
          <li class="breadcrumb-item"><i class="fa fa-home"></i>&nbsp;<a href="#">Home</a></li>
          <li class="breadcrumb-item">Kesiswaan</li>
          <li class="breadcrumb-item active" aria-current="page">Rekap Siswa</li>
        </ol>
      </nav>
    </div>
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Data Siswa</h4>
        </div>

        <div class="card-body">
          @if (Session::has('message'))
            <div class="alert alert-success alert-dismissible" title="DP sudah Lunas">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>Berhasil!</strong> <br>
              Simpan Data.
            </div>
          @endif
          <div class="row">
            <div class="form-group col-md-2" style="padding-right: 0px;padding-left: 0px;padding-bottom: 20px;margin-right: 10px;">
             <label>Sekolah</label>
             <select class="form-control sdd_sekolah" onchange="filter_data('search')">
               <option value="">Semua</option>
               @foreach ($sekolah as $i => $s)
                <option value="{{ $s->s_id }}">{{ $s->s_nama }}</option>
               @endforeach
             </select>
            </div>
            <div class="form-group col-md-2" style="padding-right: 0px;padding-left: 0px;padding-bottom: 20px;margin-right: 10px;">
              <label>Tingkat Kelas</label>
              <select class="form-control sdd_kelas" name="sdd_kelas" onchange="filter_data('search')">
                <option value="">Semua</option>
                @foreach ($tingkat as $i => $k)
                  <option value="{{ $tingkat[$i] }}">{{ $tingkat[$i] }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group col-md-2" style="padding-right: 0px;padding-left: 0px;padding-bottom: 20px;margin-right: 10px;">
              <label>Nama Kelas</label>
              <select class="form-control sdd_nama_kelas" name="sdd_nama_kelas" onchange="filter_data('search')">
                <option value="">Semua</option>
                @foreach ($kelas as $i => $k)
                  <option value="{{ $k->k_id }}">{{ $k->k_nama }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group col-md-2" style="padding-right: 0px;padding-left: 0px;padding-bottom: 20px;margin-right: 10px;">
              <label>Tahun Ajaran</label>
              <select class="form-control sdd_tahun_ajaran" name="sdd_tahun_ajaran" onchange="filter_data('search')">
                <option value="">Semua</option>
                @foreach ($additionalData['tahun_ajaran'] as $i => $th)
                  <option value="{{ $additionalData['tahun_ajaran'][$i] }}">{{ $additionalData['tahun_ajaran'][$i] }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="table-responsive">
              <table id="table_data" class="table table-hover" cellspacing="0">
                  <thead class="bg-gradient-info">
                    <tr>
                      <th>No</th>
                      <th>Gambar</th>
                      <th>Data Siswa</th>
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
            url:'{{ route('datatable_rekap_siswa') }}',
            data:{sdd_sekolah: function() { return $('.sdd_sekolah option:selected').val() },
                  sdd_kelas: function() { return $('.sdd_kelas option:selected').val() },
                  sdd_nama_kelas: function() { return $('.sdd_nama_kelas option:selected').val() },
                  sdd_tahun_ajaran: function() { return $('.sdd_tahun_ajaran option:selected').val() }},
            error:function(){
              var table = $('#table_data').DataTable();
              table.ajax.reload(null, false);
            }
        },
        columnDefs: [
                {
                   targets: 0 ,
                   className: ' tengah'
                },
                {
                   targets: 1 ,
                   className: ' tengah'
                },
                {
                   targets: 4 ,
                   className: ' tengah'
                },
                {
                   targets: 5 ,
                   className: ' tengah'
                },
              ],
        columns: [
          {data: 'DT_Row_Index', name: 'DT_Row_Index'},
          {data: 'image', name: 'image'},
          {data: 'data_siswa', name: 'data_siswa'},
          {data: 'created_by', name: 'created_by'},
          {data: 'status', name: 'status'},
          {data: 'aksi'}
        ]

  });
})

function filter_data() {

    var table = $('#table_data').DataTable();
    table.ajax.reload(null, false);
}

$('.btn_modal').click(function(){
  $('#tambah-akun :input:not(input[name="_token"])').val('');
  $('#tambah-akun select:not(.a_akun_dka):not(.a_aktif)').val('').trigger('change');
})

function edit(id) {
 location.href = '{{  url('penerimaan/edit_rekap_siswa') }}?id='+id;
}

function rekap_siswa(id,param) {
  iziToast.show({
    overlay: true,
    close: false,
    timeout: 20000, 
    color: 'dark',
    icon: 'fas fa-question-circle',
    title: param+' Data!',
    message: 'Apakah Anda Yakin ?!',
    position: 'center',
    progressBarColor: 'rgb(0, 255, 184)',
    buttons: [
    [
        '<button style="background-color:#32CD32;">Ya</button>',
        function (instance, toast) {

          $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url:baseUrl +'/penerimaan/simpan_rekap_siswa',
                type:'get',
                data:{id,param},
                dataType:'json',
                success:function(data){
                  $('#tambah-jabatan').modal('hide');
                  var table = $('#table_data').DataTable();
                  table.ajax.reload(null, false);
                  if (data.status == 1) {
                    iziToast.success({
                          icon: 'fa fa-trash',
                          title: 'Berhasil',
                          color:'yellow',
                          message: data.pesan,
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
                url:baseUrl +'/penerimaan/hapus_rekap_siswa',
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


function cetak(id) {
  window.open('{{  url('penerimaan/cetak_rekap_siswa') }}?id='+id)
}

function ubah_status(id,param) {
  $.ajax({
      url:baseUrl +'/penerimaan/ubah_status_rekap_siswa',
      type:'get',
      data:{id,param},
      dataType:'json',
      success:function(data){
        $('#tambah-jabatan').modal('hide');
        var table = $('#table_data').DataTable();
        table.ajax.reload(null, false );
        if (data.status == 1) {
          iziToast.success({
                icon: 'fa fa-check',
                title: 'Berhasil',
                color:'yellow',
                message: data.pesan,
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
}
</script>
@endsection