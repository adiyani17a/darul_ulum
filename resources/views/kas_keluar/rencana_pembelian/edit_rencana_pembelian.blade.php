@extends('main')
@section('content')
  <link rel="stylesheet" href="{{asset('assets/node_modules/checkbox/css/style.css')}}">

<!-- partial -->
<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12"> 
      <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb bg-info">
          <li class="breadcrumb-item"><i class="fa fa-home"></i>&nbsp;<a href="#">Home</a></li>
          <li class="breadcrumb-item">Kas Keluar</li>
          <li class="breadcrumb-item" aria-current="page">Rencana Pembelian</li>
          <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
        </ol>
      </nav>
    </div>
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Rencana Pembelian</h4>
          <div class="row" style="margin-bottom: 50px">
            <div class="col-sm-6 table-responsive" >
              <table class="table header_rencana">
                <tr>
                  <td>NOTA</td>
                  <td><input type="text" readonly="" value="{{ $data->rp_kode }}" class="rp_kode form-control wajib" name="rp_kode"></td>
                </tr>
                <tr class="disabled">
                  <td>SEKOLAH</td>
                  <td>
                    <select class="rp_sekolah form-control option " name="rp_sekolah">
                      <option value="">Pilih - Sekolah</option>
                      @foreach($sekolah as $val)
                        <option @if ($data->rp_sekolah == $val->s_id)
                          selected="" 
                        @endif value="{{$val->s_id}}">{{$val->s_nama}}</option>
                      @endforeach
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>TANGGAL</td>
                  <td>
                    <input type="text" readonly="" value="{{ carbon\carbon::parse($data->rp_tanggal)->format('d-m-Y') }}" class="rp_tanggal form-control" name="rp_tanggal">
                  </td>
                </tr>
                <tr>
                  <td>KETERANGAN</td>
                  <td>
                    <input type="text" value="{{ $data->rp_keterangan }}" class="rp_keterangan huruf_besar form-control wajib" name="rp_keterangan">
                  </td>
                </tr>
                <tr>
                  <td>TOTAL PERKIRAAN</td>
                  <td>
                    <input type="text" readonly="" class="rp_total form-control right" name="rp_total">
                  </td>
                </tr>
              </table>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-12 table-responsive">
              <table class="table table-bordered table-data data_rencana">
                <thead class="bg-gradient-info">
                  <tr>
                    <th>Nama Barang</th>
                    <th>Keterangan Barang</th>
                    <th>Harga Tertinggi</th>
                    <th>Jumlah</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($barang as $val)
                    <tr>
                      <td>
                        {{ $val->b_nama }}
                        <input type="hidden" class="rpd_barang" name="rpd_barang[]" value="{{ $val->b_id }}">
                      </td>
                      <td>
                        {{ $val->b_keterangan }}
                      </td>
                      <td align="right">
                        {{ number_format($val->b_harga_tertinggi, 2, ",", ".") }}
                        <input type="hidden" class="b_harga" value="{{ round($val->b_harga_tertinggi,0) }}">
                      </td>
                      <td align="right" width="10%">
                        <input type="text" class="rpd_jumlah hanya_angka form-control" name="rpd_jumlah[]" 
                        @foreach ($data->rencana_pembelian_d as $val1)
                          @if ($val->b_id == $val1->rpd_barang)
                            value="{{ $val1->rpd_jumlah }}" 
                          @endif
                        @endforeach
                        >
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12" align="right" style="margin-bottom: 15px;">
              <button type="button" class="btn btn-success simpan"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
              <a href="{{ url('kas_keluar/rencana_pembelian') }}"><button type="button" class="btn btn-warning btn_modal" data-toggle="modal" data-target="#tambah-akun"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Kembali</button></a>
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

var data_rencana = $('.data_rencana').DataTable();

$('.rpd_jumlah').keyup(function(){
  var total = 0;
  data_rencana.$('.rpd_jumlah').each(function(){
    var par = $(this).parents('tr');
    var qty = $(this).val();
    var harga = $(par).find('.b_harga').val();
    var hasil = qty* harga;
    total += hasil;
  })

  $('.rp_total').val(accounting.formatMoney(total,"", 0, ".",','));
})

var indexs = 0;
$(document).ready(function(){
  var total = 0;
  data_rencana.$('.rpd_jumlah').each(function(){
    var par = $(this).parents('tr');
    var qty = $(this).val();
    var harga = $(par).find('.b_harga').val();
    var hasil = qty* harga;
    total += hasil;
  })
  $('.rp_total').val(accounting.formatMoney(total,"", 0, ".",','));
})

$('.simpan').click(function(){
  var input =  $('.tabel_modal :input').length;
  var validator = [];
  var validator_name = [];

  $('.header_rencana').find('.wajib').each(function(){
    if ($(this).val() == '') {
      $(this).addClass('error');
      validator.push(0);
    }
  })

  $('.header_rencana').find('.option').each(function(){
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
     url: baseUrl +'/kas_keluar/update_rencana_pembelian?id='+'{{ $data->rp_id }}',
     data:$('.header_rencana :input').serialize()+'&'+
          $('.data_rencana :input').serialize(),
     dataType:'json',
     success: function(data){
        if (data.status == 0) {
          iziToast.warning({
              icon: 'fa fa-times',
              title: 'Terjadi Kesalahan',
              message: data.pesan,
          });
        }else if(data.status == 1){
          location.href = '{{ url('kas_keluar/rencana_pembelian') }}?simpan=berhasil';
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
</script>
@endsection