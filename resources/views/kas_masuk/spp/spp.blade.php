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
          <li class="breadcrumb-item">Kas Masuk</li>
          <li class="breadcrumb-item active" aria-current="page">Pembayaran SPP</li>
        </ol>
      </nav>
    </div>
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Pembayaran SPP</h4>
        </div>
        
        <div class="card-body row">
          @if (Session::has('message'))
            <div class="alert alert-success alert-dismissible" title="DP sudah Lunas">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>Berhasil!</strong> <br>
              Simpan Data.
            </div>
          @endif
          <div class="col-sm-3" style="padding-right: 0px;padding-left: 0px;padding-bottom: 20px;margin-right: 10px;">
            <select class="form-control filter_bulan">
              <option>Pilih - Bulan</option>
              @foreach ($additionalData['bulan_spp'] as $i => $val)
                <option @if (carbon\carbon::now()->format('m') ==  $additionalData['bulan_spp_number'][$i])
                  selected="" 
                @endif value="{{ $additionalData['bulan_spp'][$i] }}">{{ $additionalData['bulan_spp'][$i] }}</option>
              @endforeach
            </select>
          </div>
          <div class="col-sm-3" style="padding-right: 0px;padding-left: 0px;padding-bottom: 20px;">
            <select class="form-control filter_tahun">
              <option>Pilih - Tahun</option>
              @foreach ($additionalData['tahun_spp'] as $i => $val)
                <option @if (carbon\carbon::now()->format('Y') ==  $additionalData['tahun_spp'][$i])
                  selected="" 
                @endif value="{{ $additionalData['tahun_spp'][$i] }}">{{ $additionalData['tahun_spp'][$i] }}</option>
              @endforeach
            </select>
          </div>
          <div class="table-responsive">
              <table id="table_data" class="table table-hover" cellspacing="0">
                  <thead class="bg-gradient-info">
                    <tr>
                      <th>No</th>
                      <th>NIS</th>
                      <th>Nama</th>
                      <th>Jumlah</th>
                      <th>Status Pembayaran</th>
                      <th>Pembuat</th>
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
@include('kas_masuk.spp.create_spp')
<!-- content-wrapper ends -->
@endsection
@section('extra_script')
<script>

$(document).ready(function(){

   $('#table_data').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url:'{{ route('datatable_spp') }}',
            data:{filter_bulan: function() { return $('.filter_bulan option:selected').val() },
                  filter_tahun: function() { return $('.filter_tahun option:selected').val() }},
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
                   targets: 3 ,
                   className: ' right'
                },
                {
                   targets: 4 ,
                   className: ' tengah'
                },
                {
                   targets: 5 ,
                   className: ' tengah'
                },
                {
                   targets: 6,
                   className: ' tengah'
                },
              ],
        columns: [
          {data: 'DT_Row_Index', name: 'DT_Row_Index'},
          {data: 'sdd_nomor_induk', name: 'sdd_nomor_induk'},
          {data: 'sdd_nama', name: 'sdd_nama'},
          {data: 'gs_nilai', render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
          {data: 'status_pembayaran', name: 'status_pembayaran'},
          {data: 'pembuat', name: 'pembuat'},
          {data: 'aksi'}
        ]

  });
})

$('.btn_modal').click(function(){
  $('#tambah-akun :input:not(input[name="_token"])').val('');
  $('#tambah-akun select:not(.a_akun_dka):not(.a_aktif)').val('').trigger('change');
})

function edit(id) {
    var filter_bulan = $('.filter_bulan option:selected').val()
    var filter_tahun = $('.filter_tahun option:selected').val()
    $.ajax({
        url:baseUrl +'/kas_masuk/edit_spp',
        type:'get',
        data:{id,filter_bulan,filter_tahun},
        dataType:'json',
        success:function(data){
            $('.id').val(data.data.sdd_id);
            $('.sdd_group_spp').val(data.spp.gs_nama);
            $('.sdd_nama').val(data.data.sdd_nama);
            if (data.history_spp != null) {
              $('.hs_keterangan').val(data.history.hs_keterangan);
              $('.hs_bulan').val(data.additionalData.bulan);
              $('.hs_tahun').val(data.additionalData.tahun);
            }else{
              $('.hs_bulan').val(data.additionalData.bulan);
              $('.hs_tahun').val(data.additionalData.tahun);
            }
            $('.hs_jumlah').val(accounting.formatMoney(data.spp.gs_nilai,"", 0, ".",','));

        },
        error:function(){
          iziToast.warning({
            icon: 'fa fa-times',
            message: 'Terjadi Kesalahan!',
          });
        }
    });
    $('#bayar_spp').modal('show');
  }

function simpan_spp() {

  var validator = [];
  var validator_name = [];

  $('.wajib').each(function(){
    if ($(this).val() == '') {
      $(this).addClass('error');
      validator.push(0);
    }
  })

  $('.option').each(function(){
    if ($(this).val() == '') {
      var par =$(this).parents('td');
      par.find('span').eq(0).addClass('error');
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
  iziToast.show({
    overlay: true,
    close: false,
    timeout: 20000, 
    color: 'dark',
    icon: 'fas fa-question-circle',
    title:'Simpan Data!',
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
                url:baseUrl +'/kas_masuk/simpan_spp',
                type:'post',
                data:$('.tabel_modal input').serialize()+'&'+
                     $('.tabel_modal select').serialize(),
                dataType:'json',
                success:function(data){
                  $('#bayar_spp').modal('hide');
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
                url:baseUrl +'/penerimaan/hapus_siswa',
                type:'get',
                data:{id},
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
}
</script>
@endsection