@extends('main')
@section('content')

@include('setting.user.tambah')
<!-- partial -->
<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12"> 
      <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb bg-info">
          <li class="breadcrumb-item"><i class="fa fa-home"></i>&nbsp;<a href="#">Home</a></li>
          <li class="breadcrumb-item">Setting</li>
          <li class="breadcrumb-item active" aria-current="page">Setting User</li>
        </ol>
      </nav>
    </div>
  	<div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Setting User</h4>
          <div class="col-md-12 col-sm-12 col-xs-12" align="right" style="margin-bottom: 15px;">
          	<button type="button" class="btn btn-info btn_modal" data-toggle="modal" data-target="#tambah-akun"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Data</button>
          </div>
          <div class="table-responsive">
			        <table id="table_data" class="table table-striped table-hover" cellspacing="0">
                  <thead class="bg-gradient-info">
                    <tr>
                      <th>No</th>
                      <th>Username</th>
                      <th>Nama</th>
                      <th>Level</th>
                      <th>Sekolah</th>
                      <th>Photo</th>
                      <th>Last Login</th>
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
              url:'{{ route('datatable_akun') }}',
          },
          columnDefs: [

                  {
                     targets: 0 ,
                     className: 'tengah d_id'
                  },
                  {
                     targets: 1 ,
                     className: ' user_id'
                  },
                  {
                     targets: 5 ,
                     className: 'tengah'
                  },
                  {
                     targets: 7 ,
                     className: 'tengah'
                  },
                  
                  
                ],
          columns: [
            {data: 'id', name: 'id'},
            {data: 'username', name: 'username'},
            {data: 'name', name: 'name'},
            {data: 'jabatan', name: 'jabatan'},
            {data: 'sekolah', name: 'sekolah'},
            {data: 'image', name: 'image'},
            {data: 'last_login', name: 'last_login'},
            {data: 'aksi', name: 'aksi'}
          ]

    });
  })

  $('.btn_modal').click(function(){
    $('.username').focus();
    $('.tabel_modal :input:not(input[name="_token"])').val('');
    $('.tabel_modal label').prop('hidden',true);
    $('.level').val('').trigger('change');
    $('#noFile').text('Choose Image...');
    $(".file-upload").removeClass('active');
    $('.preview_td').html('<img style="width: 100px;height: 100px;border:1px solid pink" id="output" >');
    $('.username').prop('readonly',false);
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




$('.simpan').click(function(){
  var input =  $('.tabel_modal :input').length;
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

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });


      var formdata = new FormData();  
      formdata.append( 'files', $('#chooseFile')[0].files[0]);
      $.ajax({
         type: "POST",
         url: baseUrl +'/setting/simpan_akun?'+$('.tabel_modal :input').serialize(),
         data: formdata,
         dataType:'json',
         processData: false,
         contentType: false,
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

  function edit(a) {
    $('.tabel_modal :input:not(input[name="_token"])').val('');
    $('.tabel_modal label').prop('hidden',true);
    var par   = $(a).parents('tr');
    var id    = $(par).find('.d_id').text();
    $.ajax({
        url:baseUrl +'/setting/edit_akun',
        type:'get',
        data:{id},
        dataType:'json',
        success:function(res){
          $('.id').val(id);
          $('.username').val(res.data.username);
          $('.nama').val(res.data.name);
          $('.email').val(res.data.email);
          $('.level').val(res.data.jabatan_id).trigger('change');
          $('.sekolah_id').val(res.data.sekolah_id).trigger('change');
          $('#output').attr("src", '{{ route('thumbnail') }}'+'/'+res.data.image)
          $('.file-upload').addClass('active');
          $("#noFile").text(res.data.image); 
          $('#tambah-akun').modal('show');
          if (res.data.username == 'superuser' || res.data.username == 'SUPERUSER') {
            $('.username').prop('readonly',true);
          }else{
            $('.username').prop('readonly',false);
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


  function hapus(a) {
    var par   = $(a).parents('tr');
    var id    = $(par).find('.d_id').text();
    $.ajax({
        url:baseUrl +'/setting/hapus_akun',
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