@extends('main')
@section('content')

@include('keuangan.master_akun.tambah')
<!-- partial -->
<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12"> 
      <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb bg-info">
          <li class="breadcrumb-item"><i class="fa fa-home"></i>&nbsp;<a href="#">Home</a></li>
          <li class="breadcrumb-item">Master</li>
          <li class="breadcrumb-item active" aria-current="page">Akun Keuangan</li>
        </ol>
      </nav>
    </div>
  	<div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Akun Keuangan</h4>

          <div class="col-md-12 col-sm-12 col-xs-12" align="right" style="margin-bottom: 15px;">
          	<button type="button" class="btn btn-info btn_modal" data-toggle="modal" data-target="#tambah-akun"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Data</button>
          </div>

          <div class="table-responsive">
			        <table id="table_data" class="table table-striped table-hover" cellspacing="0">
                  <thead class="bg-gradient-info">
                    <tr>
                      <th>Kode Akun</th>
                      <th>Nama Akun</th>
                      <th>Sekolah</th>
                      <th>Posisi Debet/Kredit</th>
                      <th>Saldo Awal</th>
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
            url:'{{ route('datatable_keuangan') }}',
        },
        columnDefs: [
                {
                   targets: 4 ,
                   className: ' right'
                },
                {
                   targets: 5 ,
                   className: 'tengah'
                },
              ],
        columns: [
          {data: 'a_id', name: 'a_id'},
          {data: 'a_nama', name: 'a_nama'},
          {data: 'sekolah', name: 'sekolah'},
          {data: 'a_akun_dka', name: 'a_akun_dka'},
          {data: 'a_saldo_awal', render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
          {data: 'aksi'}
        ]

  });
  $('.a_saldo_awal').maskMoney({thousands:'.',allowZero:true,defaultZero:true,precision:0});
  $('.e_saldo_awal').maskMoney({thousands:'.',allowZero:true,defaultZero:true,precision:0});
})

$('.btn_modal').click(function(){
  $('#tambah-akun :input:not(input[name="_token"])').val('');
  $('#tambah-akun select').val('').trigger('change');
})

$(document).on('change','.a_sekolah',function(){
  var sekolah   =  $('.a_sekolah').val();
  var sekolah_t =  $('.a_sekolah option:selected').text();
  if (sekolah != '') {
    $('.a_id2').val(sekolah);
    $('.a_nama2').val(sekolah_t);
  }else{
    $('.a_id2').val('-');
    $('.a_nama2').val('-');
  }
  
  
})

$('#chooseFile').bind('change', function () {
  var filename = $("#chooseFile").val();
  var fsize = $('#chooseFile')[0].files[0].size;
  if(fsize>1048576) //do something if file size more than 1 mb (1048576)
  {
      return false;
  }
  if (/^\s*$/.test(filename)) {
    $(".file-upload").removeClass('active');
    $("#noFile").text("No file chosen..."); 
  }
  else {
    $(".file-upload").addClass('active');
    $("#noFile").text(filename.replace("C:\\fakepath\\", "")); 
  }
});

var loadFile = function(event) {
  var fsize = $('#chooseFile')[0].files[0].size;
  if(fsize>1048576) //do something if file size more than 1 mb (1048576)
  {
      iziToast.warning({
        icon: 'fa fa-times',
        message: 'File Is To Big!',
      });
      return false;
  }
  var reader = new FileReader();
  reader.onload = function(){
    var output = document.getElementById('output');
    output.src = reader.result;
  };
  reader.readAsDataURL(event.target.files[0]);
};


$('.date').datepicker({
  format:'dd-mm-yyyy',

}).on('changeDate', function(ev){                 
    $('.date').datepicker('hide');
});

$('.simpan').click(function(){
  var input =  $('.tabel_modal :input').length;
  var validator = [];
  var validator_name = [];

  $('#tambah-akun').find('.wajib').each(function(){
    if ($(this).val() == '') {
      $(this).addClass('error');
      validator.push(0);
    }
  })

  $('#tambah-akun').find('.option').each(function(){
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
     url: baseUrl +'/keuangan/simpan_keuangan',
     data:$('.group_a :input').serialize()+'&'+
          $('.group_b :input').serialize(),
     dataType:'json',
     success: function(data){
        if (data.status == 0) {
          iziToast.warning({
              icon: 'fa fa-times',
              title: 'Terjadi Kesalahan',
              message: data.pesan,
          });
        }else if(data.status == 1){
          iziToast.success({
              icon: 'fa fa-save',
              title: 'Berhasil',
              message: data.pesan,
          });
          $('#tambah-akun').modal('hide');
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

function edit(id) {
  $('.tabel_modal :input:not(input[name="_token"])').val('');
  $('.tabel_modal label').prop('hidden',true);
  $.ajax({
      url:baseUrl +'/keuangan/edit_keuangan',
      type:'get',
      data:{id},
      dataType:'json',
      success:function(res){
        $('.id').val(res.data.a_id);
        $('.e_id1').val(res.data.a_id);
        $('.e_nama1').val(res.data.a_nama);
        $('.e_akun_dka').val(res.data.a_akun_dka).trigger('change');
        $('.e_aktif').val(res.data.a_aktif);
        $('.e_sekolah').val(res.data.a_sekolah).trigger('change');
        $('.e_saldo_awal').maskMoney('mask',res.data.a_saldo_awal);
        $('.e_tanggal_pembuka').val(res.data.a_tanggal_pembuka).trigger('change');
        $('.e_group_neraca').val(res.data.a_group_neraca).trigger('change');
        $('.e_group_laba_rugi').val(res.data.a_group_laba_rugi).trigger('change');
 
        $('#tambah-akun1').modal('show');

      },
      error:function(){
        iziToast.warning({
          icon: 'fa fa-times',
          message: 'Terjadi Kesalahan!',
        });
      }
  });
}

$('.update').click(function(){

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  $.ajax({
     type: "POST",
     url: baseUrl +'/keuangan/update_keuangan',
     data:$('.group_a_e :input').serialize()+'&'+
          $('.group_b_e :input').serialize(),
     dataType:'json',
     success: function(data){
        if (data.status == 0) {
          iziToast.warning({
              icon: 'fa fa-times',
              title: 'Terjadi Kesalahan',
              message: data.pesan,
          });
        }else if(data.status == 1){
          iziToast.success({
              icon: 'fa fa-save',
              title: 'Berhasil',
              message: data.pesan,
          });
          $('#tambah-akun1').modal('hide');
        }else{
          iziToast.success({
              icon: 'fa fa-pencil-alt',
              title: 'Berhasil',
              message: data.pesan,
          });
          $('#tambah-akun1').modal('hide');
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

  function hapus(id) {
    $.ajax({
        url:baseUrl +'/keuangan/hapus_keuangan',
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
  }
</script>
@endsection