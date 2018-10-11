 <!-- plugins:js -->
  <script src="{{asset('assets/node_modules/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{asset('assets/node_modules/jquery/jquery.redirect.js')}}"></script>
  {{-- <script src="{{asset('assets/node_modules/jquery-ui/jquery-ui.js')}}"></script> --}}
  <script src="{{asset('assets/node_modules/popper.js/dist/umd/popper.min.js')}}"></script>
  <script src="{{asset('assets/node_modules/bootstrap-4/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('assets/node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js')}}"></script>
  <script src="{{asset('assets/node_modules/select2/dist/js/select2.min.js')}}"></script>
  <script src="{{asset('assets/node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{asset('assets/node_modules/jquery-toast-plugin/dist/jquery.toast.min.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="{{asset('assets/node_modules/chart.js/dist/Chart.min.js')}}"></script>

  <script src="{{asset('assets/bower_components/typeahead.js/dist/typeahead.bundle.min.js')}}" tppabs="http://www.bootstrapdash.com/demo/purple/bower_components/typeahead.js/dist/typeahead.bundle.min.js"></script>
  {{-- <script src="{{asset('assets/bower_components/x-editable/dist/bootstrap3-editable/js/bootstrap-editable.js')}}"></script> --}}
  <script src="{{asset('assets/node_modules/datatables.net/js/jquery.dataTables.js')}}"></script>
  <script src="{{asset('assets/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js')}}"></script>
  <script src="{{asset('assets/bower_components/switchery/dist/switchery.min.js')}}"></script>
  <!-- End plugin js for  page-->
  <!-- injectjs -->

  <script src="{{asset('assets/js/off-canvas.js')}}"></script>
  <script src="{{asset('assets/js/accounting.min.js')}}"></script>
  <script src="{{asset('assets/js/jquery.maskMoney.js')}}"></script>
  <script src="{{asset('assets/js/misc.js')}}"></script>
  <script src="{{asset('assets/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('assets/js/settings.js')}}" tppabs="http://www.bootstrapdash.com/demo/purple/js/settings.js"></script>
  <script src="{{asset('assets/js/todolist.js')}}" tppabs="http://www.bootstrapdash.com/demo/purple/js/todolist.js"></script>
  <script src="{{asset('assets/js/tabs.js')}}"></script>
  <script src="{{asset('assets/js/select2.js')}}"></script>
  <script src="{{asset('assets/js/file-upload.js')}}"></script>
  <script src="{{asset('assets/js/js.cookie.js')}}"></script>

  <!-- <script src="{{asset('assets/datepicker/js/bootstrap-datepicker.min.js')}}"></script> -->

  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{asset('assets/js/dashboard.js')}}"></script>
  <!-- End custom js for this page-->

  <script src="{{asset('assets/js/data-table.js')}}"></script>
  {{-- toastr --}}
  <script rel="stylesheet" src="{{asset('assets/node_modules/izitoast/dist/js/iziToast.min.js')}}"></script>

  {{-- VALIDATTE --}}
  <script src="{{asset('assets/validetta/validetta.js')}}"></script>
  <script src="{{asset('assets/validetta/validetta.min.js')}}"></script>

  <!-- Light galery -->
  <script src="{{asset('assets/lightgallery/js/lightgallery-all.min.js')}}"></script>

  <script src="{{asset('assets/jp-list/js/jplist.core.min.js')}}"></script>
  
  <!-- jPList textbox filter control -->
  <script src="{{asset('assets/jp-list/js/jplist.textbox-filter.min.js')}}"></script>
  

  <!-- jplist pagination bundle -->
  <!-- <script src="{{asset('assets/jp-list/js/jplist.pagination-bundle.min.js')}}"></script> -->


  <script src="{{asset('assets/jp-list/js/jplist.pagination-bundle-custom.min.js')}}"></script>

  <script src="{{asset('assets/jp-list/js/jplist.bootstrap-pagination-bundle-custom.min.js')}}"></script>
  



  <script type="text/javascript">
  iziToast.settings({
    timeout: 3000,
    icon: 'material-icons',
    transitionIn: 'flipInX',
    transitionOut: 'flipOutX',
    closeOnClick: true,
    position:'topRight'
  });
  $(document).ready(function(){
    $("input[type='number'] .number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl/cmd+A
            (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: Ctrl/cmd+C
            (e.keyCode == 67 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: Ctrl/cmd+X
            (e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });

    var datepicker = $('.datepicker').datepicker({
      format:"dd-mm-yyyy",
      autoclose:true
    });

    var datepicker_today = $('.datepicker_today').datepicker({
      format:"dd-mm-yyyy",
      autoclose:true
    }).datepicker("setDate", "0");
    
    $('select').select2({ 
      width: '100%' 
    });

    $('.data-table').dataTable({
          //"responsive":true,

          "pageLength": 10,
        "lengthMenu": [[10, 20, 50, - 1], [10, 20, 50, "All"]],
        "language": {
            "searchPlaceholder": "Search",
            // "emptyTable": "Tidak ada data",
            // "sInfo": "Menampilkan _START_ - _END_ Dari _TOTAL_ Data",
            "sSearch": '<i class="fa fa-search"></i>'
            // "sLengthMenu": "Menampilkan &nbsp; _MENU_ &nbsp; Data",
            // "infoEmpty": "",
            // "paginate": {
            //         "previous": "Sebelumnya",
            //         "next": "Selanjutnya",
            //      }
          }

        });
    $(document).on('keypress','.hanya_angka',function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && e.which != 46 && (e.which < 48 || e.which > 57)) {
        //display error message
        return false;
    }
   });
  });
  var t ;
  var baseUrl = '{{ url('/') }}';
  // var regex_huruf = replace(/[A-Za-z$. ,-]/g, "");
  // var regex_angka = replace(/[^0-9\-]+/g,"");

  //function
  // $('.format_money').maskMoney({prefix:' ', allowNegative: false, thousands:'.', decimal:',',precision:false, affixesStay: false});
  // $('.format_money_kosongan').maskMoney({prefix:' ', allowNegative: false, thousands:'', decimal:'',precision:false, affixesStay: false});
  $('.right').css('text-align','right')
  $('.sembuyikan').css('display','none')
  $('.tampilkan').css('display','block')
  $('.bintang_merah').css('color','red')
  $('.red').css('color','red')
  $('.readonly').attr('readonly',true)

   

</script>
<!-- sidebar -->
<script>
    // Get Cookie
    var sidebar = Cookies.get('sidebar');

    // Cookie Sidebar Exists
    if (sidebar){
        $('body').addClass(sidebar);

        if (sidebar=='sidebar-light') 
        {
          $('#sidebar-light-theme').addClass('selected');
          $('#sidebar-default-theme').removeClass('selected');

        }
        if (sidebar=='sidebar-default') 
        {
          $('#sidebar-default-theme').addClass('selected');
          $('#sidebar-light-theme').removeClass('selected');

        }
    }
    // Cookie Sidebar Doesn't Exist
    else {
        $('body').addClass();
    }

    // Sidebar Option Cookie
    $('#sidebar-light-theme').on('click', function(){
        $('body').addClass('sidebar-light');
        $('#sidebar-light-theme').addClass('sidebar-light selected');
        Cookies.set('sidebar', 'sidebar-light',{ expires : 365});

    });

    $('#sidebar-default-theme').on('click', function(){
        $('body').removeClass('sidebar-light');
        Cookies.set('sidebar', 'sidebar-default',{ expires : 365});
    });

    // Get Cookie
    var navbar  = Cookies.get('navbar');
    // Cookie Navbar Exists
    if (navbar){
        $('.navbar').addClass(navbar);
        if(navbar=='navbar-primary')
        {
          $('div.tiles.primary').addClass('selected');
        }
        if(navbar=='navbar-success')
        {
          $('div.tiles.success').addClass('selected');
        }
        if(navbar=='navbar-warning')
        {
          $('div.tiles.warning').addClass('selected');
        }
        if(navbar=='navbar-danger')
        {
          $('div.tiles.danger').addClass('selected');
        }
        if(navbar=='navbar-pink')
        {
          $('div.tiles.pink').addClass('selected');
        }
        if(navbar=='navbar-dark')
        {
          $('div.tiles.dark').addClass('selected');
        }
        if(navbar=='navbar-light')
        {
          $('div.tiles.light').addClass('selected');
        }
    }
    // Cookie Navbar Doesn't Exist
    else {
        $('.navbar').addClass('navbar-light');
        $('div.tiles.light').addClass('selected');
    }
    // Navbar Option Cookie
    $('div.tiles.primary').on('click', function(){
        $('.navbar').addClass('navbar-primary');
        Cookies.set('navbar', 'navbar-primary', {expires : 365});
    });
    $('div.tiles.success').on('click', function(){
        $('.navbar').addClass('navbar-success');
        Cookies.set('navbar', 'navbar-success', {expires : 365});
    });
    $('div.tiles.warning').on('click', function(){
        $('.navbar').addClass('navbar-warning');
        Cookies.set('navbar', 'navbar-warning', {expires : 365});
    });
    $('div.tiles.danger').on('click', function(){
        $('.navbar').addClass('navbar-danger');
        Cookies.set('navbar', 'navbar-danger', {expires : 365});
    });
    $('div.tiles.pink').on('click', function(){
        $('.navbar').addClass('navbar-pink');
        Cookies.set('navbar', 'navbar-pink', {expires : 365});
    });
    $('div.tiles.info').on('click', function(){
        $('.navbar').addClass('navbar-info');
        Cookies.set('navbar', 'navbar-info', {expires : 365});
    });
    $('div.tiles.dark').on('click', function(){
        $('.navbar').addClass('navbar-dark');
        Cookies.set('navbar', 'navbar-dark', {expires : 365});
    });
    $('div.tiles.light').on('click', function(){
        $('.navbar').addClass('navbar-light');
        Cookies.set('navbar', 'navbar-light', {expires : 365});
    });

  // Filter Search Menu Submenu Sidebar
  function myFunction() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("filterInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("ayaysir");
    li = ul.getElementsByTagName("li");
    button = document.getElementById('btn-reset');
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";

        }
    }
    

    if (input.value != 0 ) {
      button.classList.remove('d-none');
    } else {
      button.classList.add('d-none');
    }
    
  }
  function btnReset() {
    input = document.getElementById("filterInput");
    input.value=null;
    input.focus();
  }


  $('.wajib').focus(function(){
    $(this).removeClass('error');
  })

  $('.option').change(function(){
    var par = $(this).parents('td');
    par.find('span').eq(0).removeClass('error');
  })

  function jurnal(nota,jenis) {
    $.ajax({
        url:baseUrl +'/keuangan/jurnal',
        type:'get',
        data:{nota,jenis},
        success:function(data){
      
          $('.append_jurnal').html(data);
          $('#jurnal').modal('show');
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