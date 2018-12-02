<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>YAYASAN DARUL ULUM</title>
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="{{asset('assets/node_modules/jquery-bar-rating/dist/themes/css-stars.css')}}">
  {{-- <link rel="stylesheet" href="{{asset('assets/node_modules/jquery-ui/jquery-ui.min.css')}}"> --}}
  <link rel="stylesheet" href="{{asset('assets/node_modules/bootstrap-4/css/bootstrap.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/node_modules/select2/dist/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/node_modules/select2-bootstrap-theme/dist/select2-bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
  <!-- End plugin css for this page -->
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('assets/node_modules/icheck/skins/all.css')}}">
  <link rel="stylesheet" href="{{asset('assets/node_modules/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}">
  <link rel="stylesheet" href="{{asset('assets/node_modules/jquery-toast-plugin/dist/jquery.toast.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/bower_components/switchery/switchery.css')}}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="{{asset('assets/node_modules/font-awesome/css/font-awesome.min.css')}}" />
  <!-- End plugin css for this page -->

  <!-- JP-list -->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/jp-list/css/jplist.core.min.css')}}">
  <link href="{{asset('assets/jp-list/css/jplist.textbox-filter.min.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('assets/jp-list/css/jplist.pagination-bundle.min.css')}}" rel="stylesheet" type="text/css" /> 

  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('assets/image/logo1.png')}}" />
  <!-- <link rel="stylesheet" type="text/css" href="{{asset('assets/css/data-table.min.css')}}"> -->

  <!-- <link rel="stylesheet" type="text/css" href="{{asset('assets/datepicker/css/bootstrap-datepicker3.min.css')}}"> -->
  {{-- TOASTR --}}
  <link rel="stylesheet" href="{{asset('assets/node_modules/izitoast/dist/css/iziToast.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/node_modules/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css')}}" />
  {{-- validetta --}}
  <link rel="stylesheet" href="{{asset('assets/validetta/validetta.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/validetta/validetta.min.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/node_modules/checkbox/css/style.css')}}">

  <!-- Lightgallery -->

  <link rel="stylesheet" type="text/css" href="{{asset('assets/lightgallery/css/lightgallery.min.css')}}">



<style type="text/css">
small.text-muted {
  position: absolute;
  right: 0;
  margin-right:10px;
}

td > div.form-check.form-check-flat > label.form-check-label {
  margin-bottom: -25px;
}
body.modal-open{
  overflow-y: hidden !important;
}
.modal {
  overflow-y:auto;
}
.pilih-link:hover{
  transition: 0.3s;
  -webkit-transition: 0.3s;
  background-color: rgba(0,0,0,0.2);
  border-radius: 3px;
}
.huruf_besar{
  text-transform: uppercase;
}
.disabled{
  pointer-events: none;
  opacity: 0.7;
}
.center{
  text-align: center !important;
}
.tengah{
  text-align: center !important;
}

.right{
  text-align: right;
}
.left{
  text-align: left;
}

.file-upload{display:block;text-align:center;font-family: Helvetica, Arial, sans-serif;font-size: 12px;}
.file-upload .file-select{display:block;border: 2px solid #dce4ec;color: #34495e;cursor:pointer;height:40px;line-height:40px;text-align:left;background:#FFFFFF;overflow:hidden;position:relative;}
.file-upload .file-select .file-select-button{background:#dce4ec;padding:0 10px;display:inline-block;height:40px;line-height:40px;}
.file-upload .file-select .file-select-name{line-height:40px;display:inline-block;padding:0 10px;}
.file-upload .file-select:hover{border-color:#34495e;transition:all .2s ease-in-out;-moz-transition:all .2s ease-in-out;-webkit-transition:all .2s ease-in-out;-o-transition:all .2s ease-in-out;}
.file-upload .file-select:hover .file-select-button{background:#34495e;color:#FFFFFF;transition:all .2s ease-in-out;-moz-transition:all .2s ease-in-out;-webkit-transition:all .2s ease-in-out;-o-transition:all .2s ease-in-out;}
.file-upload.active .file-select{border-color:#3fa46a;transition:all .2s ease-in-out;-moz-transition:all .2s ease-in-out;-webkit-transition:all .2s ease-in-out;-o-transition:all .2s ease-in-out;}
.file-upload.active .file-select .file-select-button{background:#3fa46a;color:#FFFFFF;transition:all .2s ease-in-out;-moz-transition:all .2s ease-in-out;-webkit-transition:all .2s ease-in-out;-o-transition:all .2s ease-in-out;}
.file-upload .file-select input[type=file]{z-index:100;cursor:pointer;position:absolute;height:100%;width:100%;top:0;left:0;opacity:0;filter:alpha(opacity=0);}
.file-upload .file-select.file-select-disabled{opacity:0.65;}
.file-upload .file-select.file-select-disabled:hover{cursor:default;display:block;border: 2px solid #dce4ec;color: #34495e;cursor:pointer;height:40px;line-height:40px;margin-top:5px;text-align:left;background:#FFFFFF;overflow:hidden;position:relative;}
.file-upload .file-select.file-select-disabled:hover .file-select-button{background:#dce4ec;color:#666666;padding:0 10px;display:inline-block;height:40px;line-height:40px;}
.file-upload .file-select.file-select-disabled:hover .file-select-name{line-height:40px;display:inline-block;padding:0 10px;}

/* The container */
.container {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 22px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* Hide the browser's default checkbox */
.container input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
}

/* Create a custom checkbox */
.checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #eee;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
    background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container input:checked ~ .checkmark {
    background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}

/* Show the checkmark when checked */
.container input:checked ~ .checkmark:after {
    display: block;
}

/* Style the checkmark/indicator */
.container .checkmark:after {
    left: 9px;
    top: 5px;
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0 3px 3px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
}
.error{
  border :1px solid red;
}

.col-sm-6{
  margin: 0px !important;
}
#table_data{
  width: 100% !important;
}
#table_data th{
  font-size: 11px;
}
#table_data td{
  font-size: 11px;
}
a{
  cursor: pointer !important;
}
.inline{
  display: inline-block;
  padding: 0px !important;
}

.nopadlr{
  padding-right: 0px !important;
  padding-left: 0px !important;
}


</style>
</head>