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
          <li class="breadcrumb-item" aria-current="page">Bukti Kas Keluar</li>
          <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
        </ol>
      </nav>
    </div>
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Bukti Kas Keluar</h4>
          <div class="alert alert-danger alert-dismissible" title="DP sudah Lunas">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>Notice!</strong> <br>
              Harap Melampirkan Bukti Nota Pembelian Saat Nota Diprint.<br>
          </div>
          <div class="row" style="margin-bottom: 50px">
            <div class="col-sm-6 table-responsive" >
              <h5 align="center">HEADER</h5>
              <table class="table header_petty">
              	<tr>
                  <td width="30%">NOTA</td>
                  <td><input type="text" readonly="" value="" class="km_nota form-control wajib" name="km_nota"></td>
                </tr>
                @if (Auth::user()->akses('PEMASUKAN KAS','sekolah'))
                  <tr class="">
                    <td>SEKOLAH</td>
                    <td>
                      <select class="km_sekolah form-control option " name="km_sekolah" onchange="nota()">
                        <option value="">Pilih - Sekolah</option>
                        @foreach($sekolah as $val)
                          <option @if (Auth::user()->sekolah_id == $val->s_id)
                            selected="" 
                          @endif value="{{$val->s_id}}">{{$val->s_nama}}</option>
                        @endforeach
                      </select>
                    </td>
                  </tr>
                @else
                  <tr class="disabled">
                    <td>SEKOLAH</td>
                    <td>
                      <select class="km_sekolah form-control option" name="km_sekolah">
                        <option value="">Pilih - Sekolah</option>
                        @foreach($sekolah as $val)
                          <option @if (Auth::user()->sekolah_id == $val->s_id)
                            selected="" 
                          @endif value="{{$val->s_id}}">{{$val->s_nama}}</option>
                        @endforeach
                      </select>
                    </td>
                  </tr>
                @endif
                <tr>
                  <td>TANGGAL</td>
                  <td>
                    <input type="text" readonly="" value="{{ carbon\carbon::now()->format('d-m-Y') }}" class="pc_tanggal form-control" name="pc_tanggal">
                  </td>
                </tr>
                <tr>
                  <td>KETERANGAN</td>
                  <td>
                    <input type="text"  class="km_keterangan huruf_besar form-control wajib" name="km_keterangan">
                  </td>
                </tr>
                  <tr>
                    <td>AKUN KAS</td>
                    <td>
                      <select class="km_akun_kas form-control option" name="km_akun_kas">
                        <option value="">Pilih - Kas</option>
                        @foreach($akun_kas as $val)
                          <option value="{{$val->a_master_akun}}">{{$val->a_master_akun}} - {{$val->a_master_nama}}</option>
                        @endforeach
                      </select>
                    </td>
                  </tr>
                <tr>
                  <td>TOTAL PENDAPATAN </td>
                  <td>
                    <input type="text" readonly="" class="km_total form-control right" name="km_total">
                  </td>
                </tr>
              </table>
            </div>
            <div class="col-sm-6 table-responsive">
              <h5 align="center">INPUT PENDAPATAN</h5>
              <table class="table input_data">
                <tr>
                  <td>Akun Pendapatan</td>
                  <td>
                    <select id="kmd_akun_pendapatan " class="form-control kmd_akun_pendapatans option" >
                      <option value="">Pilih - Pendapatan</option>
                      @foreach($akun as $val)
                        <option value="{{$val->a_master_akun}}">{{$val->a_master_akun}} - {{$val->a_master_nama}}</option>
                      @endforeach
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Keterangan</td>
                  <td>
                    <input type="text" id="kmd_keterangan" class="huruf_besar kmd_keterangans form-control wajib">
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
          <div class="row ">
            <form id="save" class="col-sm-12 nopadlr">
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">PENDAPATAN</a>
                </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                  <div class="col-sm-12 table-responsive">
                    <table class="table table-bordered  bukti_pengeluaran">
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
                </div>
              </div>
            </form>
            <div class="col-md-12 col-sm-12 col-xs-12" align="right" style="margin-bottom: 15px;margin-top: 15px">
              <button type="button" class="btn btn-success simpan disabled"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
              <a href="{{ url('kas_masuk/pemasukan_kas') }}"><button type="button" class="btn btn-warning btn_modal" data-toggle="modal" data-target="#tambah-akun"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Kembali</button></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="modal_pemasukan_kas" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg" style="width: 60% !important">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-gradient-info">
        <h4 class="modal-title">Pilih PEMASUKAN KAS</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row table_append">
            
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- content-wrapper ends -->
@endsection
@section('extra_script')
<script>


function nota() {
  var km_sekolah = $('.km_sekolah option:selected').val();
  $.ajax({
      url:baseUrl +'/kas_masuk/nota_pemasukan_kas',
      type:'get',
      data:{km_sekolah},
      dataType:'json',
      success:function(data){
        $('.km_nota').val(data.nota);
      },
      error:function(){
        // location.reload();
      }
  });
}

var data_petty = $('.bukti_pengeluaran').DataTable({
  columnDefs: [
                {
                   targets: 4 ,
                   className: 'tengah'
                },
              ],
});
$(document).ready(function(){
  $('.mask').maskMoney({thousands:'.',allowZero:true,defaultZero:true,precision:0});
  nota();
})


function total() {
  var km_total = $('.km_total').val();
  km_total     = km_total.replace(/[^0-9\-]+/g,"")*1;
  var total = 0;
  data_petty.$('.pcd_jumlah').each(function(){
    temp       = $(this).val().replace(/[^0-9\-]+/g,"")*1;
    total      += temp
  })
  $('.km_total').val(accounting.formatMoney(total,"", 0, ".",','));
}

$('.km_nota').focus(function(){
  var sekolah = $('.km_sekolah ').val();
  $.ajax({
      url:baseUrl +'/kas_masuk/cari_pemasukan_kas',
      type:'get',
      data:{sekolah},
      success:function(data){
        $('.table_append').html(data);
        $('#modal_pemasukan_kas').modal('show');
      },
      error:function(){
        iziToast.warning({
          icon: 'fa fa-times',
          message: 'Terjadi Kesalahan!',
        });
      }
  });
})




$(document).on('keyup','.bkkd_harga',function(){
  total();
})

var indexs = 0;
$('.tambah').click(function(){
  var pcd_akun_biaya   = $('.kmd_akun_pendapatans').val();
  var pcd_akun_biaya_t = $('.kmd_akun_pendapatans option:selected').text();
  var kmd_keterangan   = $('.kmd_keterangans').val();
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

  data_petty.row.add([
    '<p class="pcd_nama_biaya_text">'+pcd_akun_biaya_t+'</p>'+
    ' <input type="hidden" class="pcd_akun_biaya" name="pcd_akun_biaya[]" value="'+pcd_akun_biaya+'">'+
    ' <input type="hidden" class="indexs indexs_'+indexs+'">',

    '<p class="pcd_akun_biaya_t">'+pcd_akun_biaya+'</p>',

    '<p class="kmd_keterangan_t">'+kmd_keterangan+'</p>'+
    ' <input type="hidden" class="kmd_keterangan" name="kmd_keterangan[]" value="'+kmd_keterangan+'">',

    ' <input type="text" readonly class="pcd_jumlah form-control right" value="'+pcd_jumlah+'" name="kmd_total[]">',

    '<div class="btn-group">'+
    '<button type="button" onclick="hapus(this)" class="btn btn-danger btn-lg" title="hapus">'+
    '<label class="fa fa-trash"></label></button>'+
    '</div>',
  ]).draw();
  indexs++;
  total();
  $('.input_data').find('.wajib').val('');
  $('.simpan').removeClass('disabled');
  $('.input_data').find('.option').val('').trigger('change');
})

function hapus(a) {
  var par = $(a).parents('tr');
  data_petty.row(par).remove().draw(false);
  var temp = 0;
  data_petty.$('.pcd_akun_biaya').each(function(){
    temp++
  })
  if (temp == 0) {
    $('.simpan').addClass('disabled');
  }
  iziToast.success({
        icon: 'fa fa-trash',
        title: 'Berhasil',
        message: 'Dihapus',
  });

  total();
}

$('.simpan').click(function(){
  var input =  $('.tabel_modal :input').length;
  var validator = [];
  var validator_name = [];

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
     url: baseUrl +'/kas_masuk/simpan_pemasukan_kas',
     data:$('.header_petty :input').serialize()+'&'+
          data_petty.$('input').serialize(),
     dataType:'json',
     success: function(data){
        if (data.status == 0) {
          iziToast.warning({
              icon: 'fa fa-times',
              title: 'Terjadi Kesalahan',
              message: data.pesan,
          });
        }else if(data.status == 1){
          location.href = '{{ url('kas_masuk/pemasukan_kas') }}?simpan=berhasil';
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