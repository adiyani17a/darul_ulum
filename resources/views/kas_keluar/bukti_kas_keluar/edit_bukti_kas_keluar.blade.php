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
          <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
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
               
                <tr class="disabled">
                  <td>SEKOLAH</td>
                  <td>
                    <select class="pc_sekolah form-control option" name="pc_sekolah">
                      <option value="">Pilih - Sekolah</option>
                      @foreach($sekolah as $val)
                        <option @if ($data->bkk_sekolah == $val->s_id)
                          selected="" 
                        @endif value="{{$val->s_id}}">{{$val->s_nama}}</option>
                      @endforeach
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>NOTA</td>
                  <td><input type="text" readonly="" value="{{ $data->bkk_pc_ref }}" placeholder="Klik Untuk Memilih Nota Pengeluaran" class="pc_nota form-control wajib" name="pc_nota"></td>
                </tr>
                <tr>
                  <td>TANGGAL</td>
                  <td>
                    <input type="text" readonly="" value="{{ carbon\carbon::parse($data->bkk_tanggal)->format('d-m-Y') }}" class="pc_tanggal form-control" name="pc_tanggal">
                  </td>
                </tr>
                <tr>
                  <td>KETERANGAN</td>
                  <td>
                    <input type="text" value="{{ $data->bkk_keterangan }}" class="pc_keterangan huruf_besar form-control wajib" name="pc_keterangan">
                  </td>
                </tr>
                <tr>
                  <td>TOTAL KAS </td>
                  <td>
                    <input type="text" readonly="" value="{{ number_format($data->petty_cash->pc_total,0,',','.') }}" class="pc_total form-control right" name="pc_total">
                  </td>
                </tr>
                <tr>
                  <td>SISA</td>
                  <td>
                    <input type="text" readonly="" value="{{ number_format($data->bkk_sisa_kembali,0,',','.') }}" class="bkk_sisa_kembali form-control right" name="bkk_sisa_kembali">
                  </td>
                </tr>
              </table>
            </div>
            <div class="col-sm-6 table-responsive">
              <h5 align="center">Biaya Lain</h5>
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
          <div class="row ">
            <form id="save" class="col-sm-12 nopadlr">
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Upload Bukti</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Biaya Lain</a>
                </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                  <div class="col-sm-12 table-responsive">
                    <table class="table table-bordered  bukti_pengeluaran">
                      <thead class="bg-gradient-info">
                        <tr>
                          <th>Nama Barang</th>
                          <th>Qty</th>
                          <th>Dana Awal</th>
                          <th>Pengeluaran Akhir</th>
                          <th>Keterangan</th>
                        </tr>
                      </thead>
                      <tbody>
                        {{-- <tr>
                          <td></td>
                        </tr> --}}
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                  <div class="col-sm-12 table-responsive">
                    <table class="table table-bordered  data_petty">
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
              <a href="{{ url('kas_keluar/bukti_kas_keluar') }}"><button type="button" class="btn btn-warning btn_modal" data-toggle="modal" data-target="#tambah-akun"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Kembali</button></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="modal_petty_cash" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg" style="width: 60% !important">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-gradient-info">
        <h4 class="modal-title">Pilih Petty Cash</h4>
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


// function nota() {
//   var pc_sekolah = $('.pc_sekolah option:selected').val();
//   $.ajax({
//       url:baseUrl +'/kas_keluar/nota_petty_cash',
//       type:'get',
//       data:{pc_sekolah},
//       dataType:'json',
//       success:function(data){
//         $('.pc_nota').val(data.nota);
//       },
//       error:function(){
//         location.reload();
//       }
//   });
// }
var data_petty = $('.data_petty').DataTable({
    columnDefs: [
                {
                   targets: 4 ,
                   className: 'tengah'
                },
              ],
});
var bukti_pengeluaran = $('.bukti_pengeluaran').DataTable();
$(document).ready(function(){
  $('.mask').maskMoney({thousands:'.',allowZero:true,defaultZero:true,precision:0});
})

$('.pc_sekolah').change(function(){
  $('.pc_nota').val('');
  bukti_pengeluaran.clear().draw();
  
})

function total() {
  var pc_total = $('.pc_total').val();
  pc_total     = pc_total.replace(/[^0-9\-]+/g,"")*1;
  var total = 0;
  bukti_pengeluaran.$('.bkkd_harga').each(function(){
    temp       = $(this).val().replace(/[^0-9\-]+/g,"")*1;
    total     += temp
  })

  data_petty.$('.pcd_jumlah').each(function(){
    temp       = $(this).val().replace(/[^0-9\-]+/g,"")*1;
    total      += temp
  })
  var hasil = pc_total - total;
  $('.bkk_sisa_kembali').val(accounting.formatMoney(hasil,"", 0, ".",','));
}

$('.pc_nota').focus(function(){
  var sekolah = $('.pc_sekolah ').val();
  $.ajax({
      url:baseUrl +'/kas_keluar/cari_petty_cash',
      type:'get',
      data:{sekolah},
      success:function(data){
        $('.table_append').html(data);
        $('#modal_petty_cash').modal('show');
      },
      error:function(){
        iziToast.warning({
          icon: 'fa fa-times',
          message: 'Terjadi Kesalahan!',
        });
      }
  });
})

function pilih(id) {
  $('.pc_nota').val(id);
  $.ajax({
      url:baseUrl +'/kas_keluar/pilih_petty_cash',
      type:'get',
      data:{id},
      dataType:'json',
      success:function(data){
        bukti_pengeluaran.clear();
        for (var i = 0; i < data.data.length; i++) {
          if (data.data[i].pcd_jumlah != 0) {
            bukti_pengeluaran.row.add([
              '<p class="pcd_nama_biaya_text">'+data.data[i].nama_barang+'</p>'+
              '<input type="hidden" class="bkkd_pcd_detail" name="bkkd_pcd_detail[]" value="'+data.data[i].pcd_detail +'">',

              '<input type="text" class="bkkd_qty form-control" name="bkkd_qty[]" value="'+data.data[i].pcd_qty +'">',

              '<p class="bkkd_harga_awal_text" align="right">'+accounting.formatMoney(data.data[i].pcd_jumlah ,"", 0, ".",',')+'</p>'+
              '<input type="hidden" class="bkkd_harga_awal" name="bkkd_harga_awal[]" value="'+data.data[i].pcd_jumlah +'">',

              '<input type="text" class="bkkd_harga form-control mask right" name="bkkd_harga[]" value="0">',

              '<input type="text" class="bkkd_keterangan form-control " value="" name="bkkd_keterangan[]">',
            ]).draw();
          }
        }
        $('.pc_total').val(accounting.formatMoney(data.head.pc_total ,"", 0, ".",','));
        $('.bkk_sisa_kembali').val(accounting.formatMoney(data.head.pc_total ,"", 0, ".",','));
        $('.div_barang').prop('hidden',false);
        $('.simpan').removeClass('disabled');
        $('.mask').maskMoney({thousands:'.',allowZero:true,defaultZero:true,precision:0});
      },
      error:function(){
        iziToast.warning({
          icon: 'fa fa-times',
          message: 'Terjadi Kesalahan!',
        });
      }
  });
}


$(document).on('keyup','.bkkd_harga',function(){
  total();
})

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

  data_petty.row.add([
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
  $('.input_data').find('.wajib').val('');
  $('.input_data').find('.option').val('').trigger('change');
})

function hapus(a) {
  var par = $(a).parents('tr');
  data_petty.row(par).remove().draw(false);
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
     url: baseUrl +'/kas_keluar/update_bukti_kas_keluar',
     data:$('.header_petty :input').serialize()+'&'+
          $('.bukti_pengeluaran :input').serialize()+'&'+
          $('.data_petty :input').serialize()+'&id='+'{{ $data->bkk_pc_ref }}',
     dataType:'json',
     success: function(data){
        if (data.status == 0) {
          iziToast.warning({
              icon: 'fa fa-times',
              title: 'Terjadi Kesalahan',
              message: data.pesan,
          });
        }else if(data.status == 1){
          location.href = '{{ url('kas_keluar/bukti_kas_keluar') }}?simpan=berhasil';
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


@foreach ($data->bukti_kas_keluar_detail as $i => $val)
  @if ($val->bkkd_jenis == 'BIAYA')
    var pcd_akun_biaya   = '{{ $val->bkkd_akun }}';
    var pcd_akun_biaya_t = '{{ $val->akun->a_master_nama }}';
    var pcd_keterangan   = '{{ $val->bkkd_keterangan }}';
    var pcd_jumlah       = '{{ number_format($val->bkkd_harga,0,',','.')}}';

    data_petty.row.add([
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
  @endif
@endforeach

@foreach ($data->bukti_kas_keluar_detail as $i => $val)
  @if ($val->bkkd_jenis == 'POSTING')
    @foreach ($data->petty_cash->petty_cash_detail as $val1)
      @if ($val1->pcd_detail == $val->bkkd_pcd_detail)
        @if ($data->petty_cash->pc_jenis == 'ANGGARAN')
          var nama_barang   = '{{ $val1->barang->b_nama }}';
        @else
          var nama_barang   = '{{ $val1->akun->a_master_nama.' '.$val1->pcd_keterangan }}';
        @endif
        var pcd_detail   = '{{ $val1->pcd_detail }}';
      @endif
    @endforeach

      var pcd_qty           = '{{ $val->bkkd_qty }}';
      var pcd_jumlah        = '{{$val->bkkd_harga_awal}}';
      var bkkd_harga        = '{{$val->bkkd_harga }}';
      var bkkd_keterangan   = '{{ $val->bkkd_keterangan }}';

      bukti_pengeluaran.row.add([
        '<p class="pcd_nama_biaya_text">'+nama_barang+'</p>'+
        '<input type="hidden" class="bkkd_pcd_detail" name="bkkd_pcd_detail[]" value="'+pcd_detail +'">',

        '<input type="text" class="bkkd_qty form-control" name="bkkd_qty[]" value="'+pcd_qty +'">',

        '<p class="bkkd_harga_awal_text" align="right">'+accounting.formatMoney(pcd_jumlah ,"", 0, ".",',')+'</p>'+
        '<input type="hidden" class="bkkd_harga_awal" name="bkkd_harga_awal[]" value="'+pcd_jumlah +'">',

        '<input type="text" class="bkkd_harga form-control mask right" name="bkkd_harga[]" value="'+ accounting.formatMoney(bkkd_harga ,"", 0, ".",',')+'">',

        '<input type="text" class="bkkd_keterangan form-control " value="'+bkkd_keterangan +'" name="bkkd_keterangan[]">',
      ]).draw();
      total();
      $('.div_barang').prop('hidden',false);
      $('.simpan').removeClass('disabled');
      $('.mask').maskMoney({thousands:'.',allowZero:true,defaultZero:true,precision:0});
  @endif
@endforeach
</script>
@endsection