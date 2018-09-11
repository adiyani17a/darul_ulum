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
          <li class="breadcrumb-item" aria-current="page">Petty Cash</li>
          <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
        </ol>
      </nav>
    </div>
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Petty Cash</h4>
          <div class="row" style="margin-bottom: 50px">
            <div class="col-sm-6 table-responsive" >
              <h5 align="center">HEADER</h5>
              <table class="table header_petty">
                <tr>
                  <td>NOTA</td>
                  <td><input type="text" readonly="" value="{{ $data->pc_nota }}" class="pc_nota form-control wajib" name="pc_nota"></td>
                </tr>
                <tr class="disabled">
                  <td>SEKOLAH</td>
                  <td>
                    <select class="pc_sekolah form-control option " name="pc_sekolah">
                      <option value="">Pilih - Sekolah</option>
                      @foreach($sekolah as $val)
                        <option @if ($data->pc_sekolah == $val->s_id)
                          selected="" 
                        @endif value="{{$val->s_id}}">{{$val->s_nama}}</option>
                      @endforeach
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>TANGGAL</td>
                  <td>
                    <input type="text" readonly="" value="{{ carbon\carbon::parse($data->pc_tanggal)->format('d-m-Y') }}" class="pc_tanggal form-control" name="pc_tanggal">
                  </td>
                </tr>
                <tr>
                  <td>PEMOHON</td>
                  <td>
                    <input type="text" value="{{ $data->pc_pemohon }}" class="pc_pemohon huruf_besar form-control wajib" name="pc_pemohon">
                  </td>
                </tr>
                <tr>
                  <td>KETERANGAN</td>
                  <td>
                    <input type="text" value="{{ $data->pc_keterangan }}" class="pc_keterangan huruf_besar form-control wajib" name="pc_keterangan">
                  </td>
                </tr>
                <tr>
                  <td>TOTAL</td>
                  <td>
                    <input type="text" readonly="" value="{{ number_format($data->pc_total,0,',','.') }}" class="pc_total form-control right" name="pc_total">
                  </td>
                </tr>
                <tr>
                  <td>Akun Kas</td>
                  <td>
                    <select class="pc_akun_kas form-control option" name="pc_akun_kas">
                      <option value="">Pilih - Kas</option>
                      @foreach($akun_kas as $val)
                        <option @if ($data->pc_akun_kas == $val->a_master_akun)
                          selected="" 
                        @endif value="{{$val->a_master_akun}}">{{$val->a_master_akun}} - {{$val->a_master_nama}}</option>
                      @endforeach
                    </select>
                  </td>
                </tr>
              </table>
            </div>
            <div class="col-sm-6 table-responsive">
              <h5 align="center">INPUT DATA</h5>
              <table class="table input_data">
                <tr>
                  <td>Akun Biaya</td>
                  <td>
                    <select id="pcd_akun_biayas " class="form-control pcd_akun_biayas option" >
                      <option value="">Pilih - Biaya</option>
                      @foreach($akun as $val)
                        <option value="{{$val->a_master_akun}}">{{$val->a_master_akun}} - {{$val->a_master_nama}}</option>
                      @endforeach
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Keterangan</td>
                  <td>
                    <input type="text" id="pcd_keterangan" class="huruf_besar pcd_keterangans form-control wajib">
                  </td>
                </tr>
                <tr>
                  <td>Nominal</td>
                  <td>
                    <input type="text" id="pcd_jumlahs " class="form-control pcd_jumlahs mask right wajib">
                  </td>
                </tr>
                <tr>
                  <td colspan="2">
                    <button class="btn btn-primary tambah"><i class="fa fa-plus"></i>Tambah</button>
                  </td>
                </tr>
              </table>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-12 table-responsive">
              <table class="table table-bordered table-data data_petty">
                <thead class="bg-gradient-info">
                  <tr>
                    <th>Nama Biaya</th>
                    <th>Kode Biaya</th>
                    <th>Keterangan</th>
                    <th>Nominal</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  
                </tbody>
              </table>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12" align="right" style="margin-bottom: 15px;">
              <button type="button" class="btn btn-success simpan disabled"><i class="fa fa-save"></i>&nbsp;&nbsp;Update</button>
              <a href="{{ url('kas_keluar/petty_cash') }}"><button type="button" class="btn btn-warning btn_modal" data-toggle="modal" data-target="#tambah-akun"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Kembali</button></a>
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


var tables = $('.table-data').DataTable({
  columnDefs: [
                {
                   targets: 4 ,
                   className: ' center'
                },
              ],
});
$(document).ready(function(){
  $('.mask').maskMoney({thousands:'.',allowZero:true,defaultZero:true,precision:0});
})


function total() {
  var total = 0;
  tables.$('.pcd_jumlah').each(function(){
    temp       = $(this).val().replace(/[^0-9\-]+/g,"")*1;
    total     += temp
  })

  $('.pc_total').val(accounting.formatMoney(total,"", 0, ".",','));
}

var indexs = 0;
$('.tambah').click(function(){
  var pcd_akun_biaya   = $('.pcd_akun_biayas').val();
  var pcd_akun_biaya_t = $('.pcd_akun_biayas option:selected').text();
  var pcd_keterangan   = $('.pcd_keterangans').val();
  var pcd_jumlah       = $('.pcd_jumlahs').val();
  var validator        = [];
  $('.input_data').find('.wajib').each(function(){
    if ($(this).val() == '') {
      $(this).addClass('error');
      validator.push(0);
    }
  })

  $('.input_data').find('.option').each(function(){
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

  tables.row.add([
    '<p class="pcd_nama_biaya_text">'+pcd_akun_biaya_t+'</p>'+
    ' <input type="hidden" class="pcd_akun_biaya" name="pcd_akun_biaya[]" value="'+pcd_akun_biaya+'">'+
    ' <input type="hidden" class="indexs indexs_'+indexs+'">',

    '<p class="pcd_akun_biaya_t">'+pcd_akun_biaya+'</p>',

    '<p class="pcd_keterangan_t">'+pcd_keterangan+'</p>'+
    ' <input type="hidden" class="pcd_keterangan" name="pcd_keterangan[]" value="'+pcd_keterangan+'">',

    ' <input type="text" readonly class="pcd_jumlah form-control right" value="'+pcd_jumlah+'" name="pcd_jumlah[]">',

    '<div class="btn-group">'+
    '<button type="button" onclick="hapus(this)" class="btn btn-danger btn-lg" title="hapus">'+
    '<label class="fa fa-trash"></label></button>'+
    '</div>',
  ]).draw();
  indexs++;
  total();
  $('.simpan').removeClass('disabled');
  $('.input_data').find('.wajib').val('');
  $('.input_data').find('.option').val('').trigger('change');
})

function hapus(a) {
  var par = $(a).parents('tr');
  tables.row(par).remove().draw(false);
  iziToast.success({
        icon: 'fa fa-trash',
        title: 'Berhasil',
        message: 'Dihapus',
  });
  var temp = 0;
  tables.$('.pcd_jumlah').each(function(){
    temp+=1;
  })

  if (temp == 0) {
    $('.save').addClass('disabled');
  }
  total();
}

$('.simpan').click(function(){
  var input =  $('.tabel_modal :input').length;
  var validator = [];
  var validator_name = [];
  var id = '{{ $data->pc_id }}';
  $('.header_petty').find('.wajib').each(function(){
    if ($(this).val() == '') {
      $(this).addClass('error');
      validator.push(0);
    }
  })

  $('.header_petty').find('.option').each(function(){
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

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

  $.ajax({
     type: "POST",
     url: baseUrl +'/kas_keluar/update_petty_cash',
     data:$('.header_petty :input').serialize()+'&'+
          $('.data_petty :input').serialize()+'&id='+id,
     dataType:'json',
     success: function(data){
        if (data.status == 0) {
          iziToast.warning({
              icon: 'fa fa-times',
              title: 'Terjadi Kesalahan',
              message: data.pesan,
          });
        }else if(data.status == 1){
          location.href = '{{ url('kas_keluar/petty_cash') }}?simpan=berhasil';
        }else{
          iziToast.success({
              icon: 'fa fa-pencil-alt',
              title: 'Berhasil',
              message: data.pesan,
          });
          $('#tambah-akun').modal('hide');
        }

        var table = $('#table_data').DataTable();
        table.ajax.reload();
     },
     error: function(){
      iziToast.warning({
        icon: 'fa fa-times',
        message: 'Terjadi Kesalahan!',
      });
     },
     async: false
   });
});

@foreach ($data->petty_cash_detail as $i => $val)
  var pcd_akun_biaya   = '{{ $val->pcd_akun_biaya }}';
  var pcd_akun_biaya_t = '{{ $val->akun->a_master_nama }}';
  var pcd_keterangan   = '{{ $val->pcd_keterangan }}';
  var pcd_jumlah       = '{{ number_format($val->pcd_jumlah,0,',','.')}}';

  tables.row.add([
    '<p class="pcd_nama_biaya_text">'+pcd_akun_biaya+' - '+pcd_akun_biaya_t+'</p>'+
    ' <input type="hidden" class="pcd_akun_biaya" name="pcd_akun_biaya[]" value="'+pcd_akun_biaya+'">'+
    ' <input type="hidden" class="indexs indexs_'+indexs+'">',

    '<p class="pcd_akun_biaya_t">'+pcd_akun_biaya+'</p>',

    '<p class="pcd_keterangan_t">'+pcd_keterangan+'</p>'+
    ' <input type="hidden" class="pcd_keterangan" name="pcd_keterangan[]" value="'+pcd_keterangan+'">',

    ' <input type="text" readonly class="pcd_jumlah form-control right" value="'+pcd_jumlah+'" name="pcd_jumlah[]">',

    '<div class="btn-group">'+
    '<button type="button" onclick="hapus(this)" class="btn btn-danger btn-lg" title="hapus">'+
    '<label class="fa fa-trash"></label></button>'+
    '</div>',
  ]).draw();
  indexs++;
  total();
  $('.simpan').removeClass('disabled');
  $('.input_data').find('.wajib').val('');
  $('.input_data').find('.option').val('').trigger('change');
@endforeach
</script>
@endsection