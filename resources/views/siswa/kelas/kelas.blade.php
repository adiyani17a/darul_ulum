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
          <h4 class="card-title">Manajemen Siswa</h4>
        </div>
        
        <div class="card-body">
          <h4>FILTER</h4>
          <hr>
          <div class="row">
            @if (Auth::user()->akses('KELAS','sekolah'))
            <div class="form-group col-md-2" style="padding-bottom: 20px;margin-right: 10px;">
             <label>Sekolah</label>
             <select class="form-control sdd_sekolah" onchange="filter_data('search')">
               @foreach ($sekolah as $i => $s)
                <option value="{{ $s->s_id }}">{{ $s->s_nama }}</option>
               @endforeach
             </select>
            </div>
            @else
            <div class="form-group col-md-2 disabled" style="padding-bottom: 20px;margin-right: 10px;">
             <label>Sekolah</label>
             <select class="form-control sdd_sekolah" onchange="filter_data('search')">
               @foreach ($sekolah as $i => $s)
                <option @if (Auth::user()->sekolah_id == $s->s_id)
                  selected="" 
                @endif value="{{ $s->s_id }}">{{ $s->s_nama }}</option>
               @endforeach
             </select>
            </div>
            @endif
            <div class="form-group col-md-2" style="padding-bottom: 20px;margin-right: 10px;">
              <label>Tingkat Kelas</label>
              <select class="form-control sdd_kelas" name="sdd_kelas" onchange="filter_data('search')">
                @foreach ($tingkat as $i => $k)
                  <option value="{{ $tingkat[$i] }}">{{ $tingkat[$i] }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group col-md-2" style="padding-bottom: 20px;margin-right: 10px;">
              <label>Nama Kelas</label>
              <select class="form-control sdd_nama_kelas" name="sdd_nama_kelas" onchange="filter_data('search')">
                @foreach ($kelas as $i => $k)
                  <option value="{{ $k->k_id }}">{{ $k->k_nama }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group col-md-2" style="padding-bottom: 20px;margin-right: 10px;">
              <label>Group SPP</label>
              <select class="form-control sdd_group_spp" name="sdd_group_spp" onchange="filter_data('search')">
                <option value="">Semua</option>
                @foreach ($group_spp as $i => $k)
                  <option value="{{ $k->gs_id }}">{{ $k->gs_nama }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group col-md-2" style="padding-bottom: 20px;margin-right: 10px;">
              <label>Tahun Ajaran</label>
              <select class="form-control sdd_tahun_ajaran" name="sdd_tahun_ajaran" onchange="filter_data('search')">
                <option value="">Semua</option>
                @foreach ($additionalData['tahun_ajaran'] as $i => $th)
                  <option value="{{ $additionalData['tahun_ajaran'][$i] }}">{{ $additionalData['tahun_ajaran'][$i] }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <hr>
          <h4>TUJUAN</h4>
          <hr>
          <div class="row tujuan">
            <div class="form-group col-md-2" style="padding-bottom: 20px;margin-right: 10px;">
              <label>Tingkat Kelas</label>
              <select class="form-control sdd_kelas" name="sdd_kelas">
                @foreach ($tingkat as $i => $k)
                  <option value="{{ $tingkat[$i] }}">{{ $tingkat[$i] }}</option>
                @endforeach
                  <option value="LULUS">LULUS</option>
              </select>
            </div>
            <div class="form-group col-md-2" style="padding-bottom: 20px;margin-right: 10px;">
              <label>Nama Kelas</label>
              <select class="form-control sdd_nama_kelas" name="sdd_nama_kelas">
                @foreach ($kelas as $i => $k)
                  <option value="{{ $k->k_id }}">{{ $k->k_nama }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group col-md-2" style="padding-bottom: 20px;margin-right: 10px;">
              <label>Group SPP</label>
              <select class="form-control sdd_group_spp" name="sdd_group_spp">
                @foreach ($group_spp as $i => $k)
                  <option value="{{ $k->gs_id }}">{{ $k->gs_nama }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group col-md-2" style="padding-top: 24px">
              <button type="button" class="btn btn-primary" onclick="update()"><i class="fa fa-check" ></i> Submit</button>
            </div>
          </div>
          <table class="table table_data table-bordered" id="table_data">
            <thead>
              <tr>
                <th>
                  <label class="label">
                    <input class="label__checkbox all_check" name="all_check" type="checkbox" />
                    <span class="label__text">
                      <span class="label__check">
                        <i class="fa fa-check icon"></i>
                      </span>
                    </span>
                  </label>
                </th>
                <th style="vertical-align: middle;">Gambar</th>
                <th style="vertical-align: middle;">Data Siswa</th>
                <th style="vertical-align: middle;">Pembuat</th>
                <th style="vertical-align: middle;">Status</th>
              </tr>
            </thead>
          </table>
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
        processing: false,
        serverSide: false,
        ordering: false,
        ajax: {
            url:'{{ route('datatable_manajemen_siswa') }}',
            data:{sdd_sekolah: function() { return $('.sdd_sekolah option:selected').val() },
                  sdd_kelas: function() { return $('.sdd_kelas option:selected').val() },
                  sdd_nama_kelas: function() { return $('.sdd_nama_kelas option:selected').val() },
                  sdd_tahun_ajaran: function() { return $('.sdd_tahun_ajaran option:selected').val() },
                  sdd_group_spp: function() { return $('.sdd_group_spp option:selected').val() }},
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
                   className: ' tengah disabled'
                },
              ],
        columns: [
          {data: 'check', name: 'check'},
          {data: 'image', name: 'image'},
          {data: 'data_siswa', name: 'data_siswa'},
          {data: 'created_by', name: 'created_by'},
          {data: 'status', name: 'status'},
        ]

  });
})

function filter_data() {

    var table = $('#table_data').DataTable();
    table.ajax.reload(null, false);

    $('.all_check').prop('checked',false);
}



$('.all_check').change(function(){
  var table = $('#table_data').DataTable();
  if ($(this).is(':checked') == true) {
    table.$('.check').prop('checked',true);
  }else if (table.$(this).is(':checked') == false){
    table.$('.check').prop('checked',false);
  }
});

$('.btn_modal').click(function(){
  $('#tambah-akun :input:not(input[name="_token"])').val('');
  $('#tambah-akun select:not(.a_akun_dka):not(.a_aktif)').val('').trigger('change');
})

function edit(id) {
 location.href = '{{  url('penerimaan/edit_rekap_siswa') }}?id='+id;
}

function update() {
  var sdd_id = [];
  var table = $('#table_data').DataTable();

  table.$('.check').each(function(){
    if ($(this).is(':checked') == true) {
      var par = $(this).parents('tr');
      var id = $(par).find('.sdd_id').val();
      sdd_id.push(id);
    }
  })


  var tes = $('.tujuan select').serialize()
  $.ajax({
      url:baseUrl +'/penerimaan/update_kelas?'+$('.tujuan select').serialize()+'&'+'_token='+'{{ csrf_token() }}',
      type:'post',
      data:{sdd_id},
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
        $('.all_check').prop('checked',false);
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