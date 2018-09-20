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
                  <td><input type="text" readonly="" class="pc_nota form-control wajib" name="pc_nota"></td>
                </tr>
                @if (Auth::user()->akses('PETTY CASH','sekolah'))
                <tr class="">
                  <td>SEKOLAH</td>
                  <td>
                    <select class="pc_sekolah form-control option " name="pc_sekolah">
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
                    <select class="pc_sekolah form-control option" name="pc_sekolah">
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
                  <td>PEMOHON</td>
                  <td>
                    <input type="text"  class="pc_pemohon huruf_besar form-control wajib" name="pc_pemohon">
                  </td>
                </tr>
                <tr>
                  <td>KETERANGAN</td>
                  <td>
                    <input type="text"  class="pc_keterangan huruf_besar form-control wajib" name="pc_keterangan">
                  </td>
                </tr>
                <tr>
                  <td>TOTAL</td>
                  <td>
                    <input type="text" readonly="" class="pc_total form-control right" name="pc_total">
                  </td>
                </tr>
                <tr>
                  <td>Akun Kas</td>
                  <td>
                    <select class="pc_akun_kas form-control option" name="pc_akun_kas">
                      <option value="">Pilih - Kas</option>
                      @foreach($akun_kas as $val)
                        <option value="{{$val->a_master_akun}}">{{$val->a_master_akun}} - {{$val->a_master_nama}}</option>
                      @endforeach
                    </select>
                  </td>
                </tr>
              </table>
            </div>
            <div class="col-sm-6 table-responsive">
              <h5 align="center">KODE RENCANA PEMBELIAN</h5>
              <table class="table input_data">
                <tr>
                  <td>
                    <input type="text"  id="kode_rencana" name="kode_rencana" readonly="" placeholder="Klik Untuk Memilih Rencana Pembelian" class="form-control wajib">
                  </td>
                </tr>
              </table>
            </div>
          </div>
          <hr>
          <div class="row div_barang clearfix" hidden="">
            <div class="col-sm-12 table-responsive">
              <table class="table table-bordered table-data data_petty">
                <thead class="bg-gradient-info">
                  <tr>
                    <th>Nama Barang</th>
                    <th>Sisa Target Qty</th>
                    <th>Harga Barang Tertinggi</th>
                    <th>Nominal</th>
                    <th>Qty</th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12" align="right" style="margin-bottom: 15px;">
              <button type="button" class="btn btn-success simpan disabled"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
              <a href="{{ url('kas_keluar/petty_cash') }}"><button type="button" class="btn btn-warning btn_modal" data-toggle="modal" data-target="#tambah-akun"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Kembali</button></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div id="modal_rencana" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg" style="width: 60% !important">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-gradient-info">
        <h4 class="modal-title">Modal Rencana Pembelian</h4>
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
  var pc_sekolah = $('.pc_sekolah option:selected').val();
  $.ajax({
      url:baseUrl +'/kas_keluar/nota_petty_cash',
      type:'get',
      data:{pc_sekolah},
      dataType:'json',
      success:function(data){
        $('.pc_nota').val(data.nota);
      },
      error:function(){
        location.reload();
      }
  });
}
var tables = $('.table-data').DataTable({
  columnDefs: [
                {
                   targets: 4 ,
                   className: ' center'
                },
              ],
});
$(document).ready(function(){
  nota();
  $('.mask').maskMoney({thousands:'.',allowZero:true,defaultZero:true,precision:0});
})


$('.pc_sekolah').change(function(){
  nota();
})

function total(ch) {
  var par       = $(ch).parents('tr');
  var pcd_harga = par.find('.pcd_harga').val();
  pcd_harga = pcd_harga.replace(/[^0-9\-]+/g,"")*1;
  var pcd_sisa  = par.find('.pcd_jumlah').val()*1;

  par.find('.pcd_total').val(accounting.formatMoney(pcd_harga * pcd_sisa,"", 0, ".",','));
  var total = 0;
  tables.$('.pcd_total').each(function(){
    var pcd_total = $(this).val().replace(/[^0-9\-]+/g,"")*1;
    total += pcd_total;
  })
  $('.pc_total').val(accounting.formatMoney(total,"", 0, ".",','));
}

$('#kode_rencana').focus(function(){
  var sekolah = $('.pc_sekolah ').val();
  $.ajax({
      url:baseUrl +'/kas_keluar/cari_pengeluaran_barang',
      type:'get',
      data:{sekolah},
      success:function(data){
        $('.table_append').html(data);
        $('#modal_rencana').modal('show');
      },
      error:function(){
        iziToast.warning({
          icon: 'fa fa-times',
          message: 'Terjadi Kesalahan!',
        });
      }
  });
})

var indexs = 0;
function pilih(id) {
  $('#kode_rencana').val(id);
  $.ajax({
      url:baseUrl +'/kas_keluar/pilih_pengeluaran_barang',
      type:'get',
      data:{id},
      dataType:'json',
      success:function(data){
        tables.clear();
        for (var i = 0; i < data.data.length; i++) {
          tables.row.add([
            '<p class="pcd_nama_biaya_text">'+data.data[i].nama_barang+'</p>'+
            '<input type="hidden" class="rpd_detail" name="rpd_detail[]" value="'+data.data[i].rpd_detail +'">',

            '<p class="pcd_sisa_text" align="right">'+data.data[i].rpd_sisa+'</p>'+
            '<input type="hidden" class="pcd_sisa" name="pcd_sisa[]" value="'+data.data[i].rpd_sisa +'">',

            '<p class="pcd_harga_tertinggi_text" align="right">'+accounting.formatMoney(data.data[i].harga_barang ,"", 0, ".",',')+'</p>'+
            '<input type="hidden" class="pcd_harga_tertinggi" name="pcd_harga_tertinggi[]" value="'+data.data[i].harga_barang +'">',

            '<input type="text" class="pcd_harga form-control mask right" name="pcd_harga[]" value="0">',

            '<input type="text" class="hanya_angka pcd_jumlah form-control right" value="" name="pcd_jumlah[]">',

            '<input type="text" readonly class="pcd_total form-control right" value="0" name="pcd_total[]">',
          ]).draw();
        }
        $('.div_barang').prop('hidden',false);
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

$(document).on('keyup','.pcd_harga',function(){
  var par   = $(this).parents('tr');
  var ht    = par.find('.pcd_harga_tertinggi').val()*1;
  var sisa  = par.find('.pcd_sisa').val();
  pcd_harga = $(this).val().replace(/[^0-9\-]+/g,"")*1;

  if (pcd_harga > ht) {
    $(this).val(accounting.formatMoney(ht,"", 0, ".",','))
    iziToast.warning({
        icon: 'fa fa-times',
        title: 'Terjadi Kesalahan',
        message: 'Harga Tidak Boleh Melebihi Harga Tertinggi!',
    });
  }
  total(this);
})

$(document).on('keyup','.pcd_jumlah',function(){
  var par   = $(this).parents('tr');
  var sisa  = par.find('.pcd_sisa').val();
  pcd_sisa = $(this).val().replace(/[^0-9\-]+/g,"")*1;

  if (pcd_sisa > sisa) {
    $(this).val(sisa)
    iziToast.warning({
        icon: 'fa fa-times',
        title: 'Terjadi Kesalahan',
        message: 'Qty Tidak Boleh Melebihi Sisa Target Qty!',
    });
  }
  total(this);
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
  var kode_rencana = $('#kode_rencana').val();
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
     url: baseUrl +'/kas_keluar/simpan_pengeluaran_anggaran',
     data:$('.header_petty :input').serialize()+'&'+
          $('.data_petty :input').serialize()+'&kode_rencana='+kode_rencana,
     dataType:'json',
     success: function(data){
        if (data.status == 0) {
          iziToast.warning({
              icon: 'fa fa-times',
              title: 'Terjadi Kesalahan',
              message: data.pesan,
          });
        }else if(data.status == 1){
          location.href = '{{ url('kas_keluar/pengeluaran_anggaran') }}?simpan=berhasil';
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