<!DOCTYPE html>
<html>
@include('partials._head')
<link rel="stylesheet" href="{{asset('assets/node_modules/bootstrap-4/css/bootstrap.min.css')}}">
<head>
	<title>YAYASAN DARUL ULUM</title>
  	<link rel="shortcut icon" href="{{asset('assets/images/logo1.png')}}" />
</head>
<style type="text/css">
	@media print
	{
		body {background-color: white !important;}
		nav{
			display: none;
		}
		#printArea{
			margin-left: 0px;
			margin-top: 0px !important;
		}
	}
	
	.transparency{
		opacity: 0.7;
	}
	.logo{
		width: 30px;
		height: 30px;
		margin-bottom: 4px;
	}
	th{
		text-align: center;
	}
	.nopad{
		padding: 0px;
	}
	.nav-ul{
		list-style-type: none;
	    margin: 0;
	    padding: 0;
	    overflow: hidden;
	}
	.nav-ul li{
		float: right;
	}

	.fa-sliders{
		margin-right: 40px;
	}

	label{
		font-size: 12px;
	}
	.bg-secondary{
		background-color: #9999 !important;
	}
	th{
		border:1px solid grey;
	}
	option{
		display: block;
	}
	.overflow{
		overflow-y: scroll;
	}
	

	@media screen and (max-width: 600px) {
		body {
			background-color: olive;
		}
		.col-md-8{
			width: 60%
		}
		.nav-text{
			display: none;
		}
		.col-md-4{
			width: 40%
		}
		.navbar-brand{
			margin-top: 0px !important;
		}
	}
	.body-jurnal{
		margin-left: 0px;
		margin-right: 0px;
	}
</style>

<body style="background-color: grey;">
	<nav class="navbar transparency fixed-top navbar-dark bg-dark">
		<div class="container">
			<div class="col-md-8  nopad">
				<a class="navbar-brand" href="{{ url('/') }}" style="margin-top: 10px;">
					<img class="logo"  src="{{asset('assets/images/logo1.png')}}">
				</a>
				<a class="navbar-brand nav-text" href="{{ url('/') }}">
					<h5>YAYASAN DARUL ULUM</h5>
				</a>
			</div>
			<div class="col-md-4 nopad text-light">
				<ul class="nav-ul">
					<li><i class="fa fa-print"></i></li>
					<li><i class="fa fa-sliders" onclick="openModal()"></i></li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container" id="printArea" style="margin-top: 100px;background-color: white">
	    <div class="row col-sm-12 body-jurnal" >
			<div class="col-sm-12" style="margin-top: 20px" >
				<h2 class="black"><b>REGISTER JURNAL</b></h2>
				<h5 class="black">YAYASAN DARUL ULUM</h5>
				<p class="black">SDN MEDOKAN AYU</p>
				<hr class="black" style="border-bottom: 2px solid black">
			</div>
			<div class="col-sm-12 table-responsive" style="font-size: 10px">
				<label>Transaksi : Bulan September - Oktober</label>
	        	<table class="table table-bordered overflow">
	        		<thead class="bg-secondary ">
	        			<th>Tanggal</th>
	        			<th>No.Bukti</th>
	        			<th>No.Perkiraan</th>
	        			<th>Nama Perkiraan</th>
	        			<th>Uraian</th>
	        			<th>Debet</th>
	        			<th>Kredit</th>
	        		</thead>
	        		<tbody>
	        			
	        		</tbody>
	        	</table>
	      	</div>
	    </div>
  	</div>
</body>

<!-- Modal -->
<div id="filterModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-m">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-gradient-info">
        <h4 class="modal-title">Filter Register Jurnal</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-4">
            	<span>Jenis Kas</span>
            </div>
            <div class="col-md-8">
            	<select class="form-control">
            		<option>asc</option>
            		<option>asc</option>
            		<option>ac</option>
            	</select>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary simpan" >Save Data</button>
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@include('partials._script')
<script type="text/javascript">
	// window.print();
</script>
</html>
	
<script type="text/javascript">
	function openModal(argument) {
		$('#filterModal').modal('show');
	}
</script>