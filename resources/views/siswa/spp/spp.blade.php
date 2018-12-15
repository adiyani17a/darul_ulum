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
          <li class="breadcrumb-item active" aria-current="page">kelas</li>
        </ol>
      </nav>
    </div>
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">kelas</h4>
        </div>
        <div class="card-body">
          <div class="row data">
            
            <div class="col-md-8" style="padding-right: 0px;padding-left: 0px;padding-bottom: 20px;margin-right: 10px;">
              <div class="alert alert-info alert-dismissible" title="DP sudah Lunas">
                <strong>Petunjuk!</strong> <br>
                1. Pilih filter group SPP awal dan akhir.<br>
                2. Setelah itu klik simpan.<br>
              </div>
            </div>
            <div class="form-group col-md-4" style="padding-right: 0px;padding-left: 0px;padding-bottom: 20px;margin-right: 10px;">
              <label>Group SPP</label>
              <select class="form-control sdd_group_spp option" name="sdd_group_spp" onchange="filter_data('search')" >
                <option value="">Semua</option>
                @foreach ($group_spp as $i => $k)
                  <option value="{{ $k->gs_id }}">{{ $k->gs_nama }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group col-md-4" style="padding-right: 0px;padding-left: 0px;padding-bottom: 20px;margin-right: 10px;">
              <label>Ke Tingkatan</label>
              <select class="form-control group_spp_akhir option" name="group_spp_akhir" onchange="filter_data('search')" >
                <option value="">Semua</option>
                @foreach ($group_spp as $i => $k)
                  <option value="{{ $k->gs_id }}">{{ $k->gs_nama }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group col-md-8" style="padding-right: 0px;padding-left: 0px;padding-bottom: 20px;margin-right: 10px;">
              <button style="cursor: pointer;" type="button" class="btn btn-primary pull-right" onclick="update()">Update</button>
            </div>
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
            data:{sdd_group_spp: function() { return $('.sdd_group_spp option:selected').val() },
                  group_spp_akhir: function() { return $('.group_spp_akhir option:selected').val() }},
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

function update() {
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
  
  $.ajax({
      url:baseUrl +'/penerimaan/update_spp',
      type:'get',
      data:$('.data select').serialize(),
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