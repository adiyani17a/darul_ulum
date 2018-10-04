@extends('main')
@section('content')

@include('keuangan.group_akun.tambah')
<!-- partial -->
<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12"> 
      <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb bg-info">
          <li class="breadcrumb-item"><i class="fa fa-home"></i>&nbsp;<a href="#">Home</a></li>
          <li class="breadcrumb-item">Keuangan</li>
          <li class="breadcrumb-item active" aria-current="page">Group Akun Keuangan</li>
        </ol>
      </nav>
    </div>
  	<div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Group Akun Keuangan</h4>
          <div class="alert alert-danger alert-dismissible" title="DP sudah Lunas">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>Notice!</strong> <br>
              Jangan Men-klik Tombol Hapus Bila Tidak ingin Menghapus Data.
          </div>
          <div class="col-md-12 col-sm-12 col-xs-12" align="right" style="margin-bottom: 15px;">
          	<button type="button" class="btn btn-info btn_modal" data-toggle="modal" data-target="#tambah-akun"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Data</button>
          </div>
          <div class="table-responsive">
			        <table id="table_data" class="table table-striped table-hover" cellspacing="0">
                  <thead class="bg-gradient-info">
                    <tr>
                      <th>No</th>
                      <th>Nama Group</th>
                      <th>Jenis Group</th>
                      <th>Tanggal Buat</th>
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
var simpan_akun = [0];
$(document).ready(function(){

   $('#table_data').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url:'{{ route('datatable_group_akun') }}',
        },
        columnDefs: [
                {
                   targets: 0 ,
                   className: 'tengah d_id'
                },
                {
                   targets: 4 ,
                   className: 'tengah'
                },
              ],
        columns: [
          {data: 'DT_Row_Index', name: 'DT_Row_Index'},
          {data: 'ga_nama', name: 'ga_nama'},
          {data: 'jenis_group', name: 'jenis_group'},
          {data: 'created_at', name: 'created_at'},
          {data: 'aksi', name: 'aksi'}
        ]

  });
})


$('.ga_jenis_group').change(function(){
  if ($(this).val() == 'neraca') {
    $('.group_neraca').prop('hidden',false);
  }else{
    $('.group_neraca').prop('hidden',true);
  }
})

$(document).on('change','.ga_jenis_group1',function(){
  if ($(this).val() == 'neraca') {
    $('.group_neraca1').prop('hidden',false);
  }else{
    $('.group_neraca1').prop('hidden',true);
  }
})

$('.btn_modal').click(function(){
  $('.username').focus();
  $('.tabel_modal :input:not(input[name="_token"])').val('');
  $('.tabel_modal label').prop('hidden',true);
  $('.level').val('').trigger('change');
  $('#noFile').text('Choose Image...');
  $(".file-upload").removeClass('active');
  $('.preview_td').html('<img style="width: 100px;height: 100px;border:1px solid pink" id="output" >');
  $('.count_akun').text('0 Akun Yang Ditambahkan')
  $('.username').prop('readonly',false);
})

$('.tambah_akun').click(function(){
  var jenis_group = $('.ga_jenis_group').val();
  console.log(jenis_group);
  $.ajax({
      url:baseUrl +'/keuangan/ajax_table_akun',
      type:'get',
      data:{jenis_group,simpan_akun},
      success:function(data){

        $('.append_table_akun').html(data);
        $('#tambah-akun1').modal('show');
      },
      error:function(){
        iziToast.warning({
          icon: 'fa fa-times',
          message: 'Terjadi Kesalahan!',
        });
      }
  });
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
  if(fsize>5048576) //do something if file size more than 1 mb (1048576)
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

$('.selesai').click(function(){
  $('.a_id_check').each(function(){
    var par = $(this).parents('td');
    var a_id = $(par).find('.a_id').val();
    if($(this).is(':checked') == true){
      var index = simpan_akun.indexOf(a_id);
      if (index == -1) {
        simpan_akun.push(a_id);
      }      
    }else if($(this).is(':checked') == false){
      var index = simpan_akun.indexOf(a_id);
        if (index != -1) {
          simpan_akun.splice(index,1);
        }
    }
  })
        console.log(simpan_akun);
  $('.count_akun').html((simpan_akun.length-1)+' Akun Yang Ditambahkan')
})


function lihats(id) {
  $.ajax({
      url:baseUrl +'/keuangan/lihat_group_akun',
      type:'get',
      data:{id},
      success:function(data){
      
        $('.append_table_akun').html(data);
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

$('.simpan').click(function(){
  var input =  $('.tabel_modal :input').length;
  var validator = [];
  var validator_name = [];
  console.log(simpan_akun);

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

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });


  $.ajax({
     type: "POST",
     url: baseUrl +'/keuangan/simpan_group_akun?'+$('.tabel_modal :input').serialize(),
     data:{simpan_akun},
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
      url:baseUrl +'/keuangan/edit_group_akun',
      type:'get',
      data:{id},
      success:function(data){
        $('.append_table_akun1').html(data)
        $('#tambah-akun2').modal('show');
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
  var edit_akun = [0];

  $('.a_id_check_edit').each(function(){
    var par = $(this).parents('td');
    var a_id = $(par).find('.a_id1').val();
    if($(this).is(':checked') == true){
      edit_akun.push(a_id);
    }
  })

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  $.ajax({
     type: "POST",
     url: baseUrl +'/keuangan/update_group_akun?'+$('.tabel_modal1 :input').serialize(),
     data:{edit_akun},
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
          $('#tambah-akun2').modal('hide');
        }else{
          iziToast.success({
              icon: 'fa fa-pencil-alt',
              title: 'Berhasil',
              message: data.pesan,
          });
          $('#tambah-akun2').modal('hide');
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
      url:baseUrl +'/keuangan/hapus_group_akun',
      type:'get',
      data:{id},
      dataType:'json',
      success:function(data){
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
                message: ' Superuser Tidak Boleh Dihapus!',
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