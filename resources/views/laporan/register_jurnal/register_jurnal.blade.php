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
		body {margin-left: 0 !important;margin-right: 0 !important;height: 0px;background-color: white !important}
	}
	.printArea{
		padding-right:50px;
		padding-left:50px;
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
	ul{
		 list-style-type: none;
	    margin: 0;
	    padding: 0;
	    overflow: hidden;
	}
	ul li{
		float: right;
		margin-right: 40px;
	}
	label{
		font-size: 12px;
	}
</style>

<body style="background-color: grey;margin-left: 200px;margin-right: 200px;">
	<nav class="navbar transparency fixed-top navbar-dark bg-dark">
		<div class="container">
			<div class="col-md-8 nopad">
				<a class="navbar-brand" href="{{ url('/') }}">
					<img class="logo"  src="{{asset('assets/images/logo1.png')}}">
				</a>
				<a class="navbar-brand" href="{{ url('/') }}">
					<h5>YAYASAN DARUL ULUM</h5>
				</a>
			</div>
			<div class="col-md-4 nopad text-light">
				<ul class="">
					<li><i class="fa fa-print"></i></li>
					<li><i class="fa fa-sliders"></i></li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container" id="printArea" style="margin-top: 80px;background-color: white">
	    <div class="row col-sm-12 height mt-2" >
			<div class="col-sm-12" style="margin-top: 20px" >
				<h2 class="black"><b>REGISTER JURNAL</b></h2>
				<h5 class="black">YAYASAN DARUL ULUM</h5>
				<p class="black">SDN MEDOKAN AYU</p>
				<hr class="black" style="border-bottom: 2px solid black">
			</div>
			<div class="col-sm-12" style="font-size: 10px">
				<label>Transaksi : Bulan September - Oktober</label>
	        	<table class="table table-bordered bg-secondary text-light">
	        		<tr>
	        			<th>Tanggal</th>
	        			<th>No.Bukti</th>
	        			<th>No.Perkiraan</th>
	        			<th>Nama Perkiraan</th>
	        			<th>Uraian</th>
	        			<th>Debet</th>
	        			<th>Kredit</th>
	        		</tr>
	        	</table>
	      	</div>
	    </div>
  	</div>
</body>
@include('partials._script')
<script type="text/javascript">
	// window.print();
</script>
</html>
	
