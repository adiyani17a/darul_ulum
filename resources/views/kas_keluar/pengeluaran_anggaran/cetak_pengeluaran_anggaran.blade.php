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
		.bg-secondary{
			color: black !important;
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
		background-color: #777 !important;
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
					<li><i class="fa fa-print" onclick="print()"></i></li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container" id="printArea" style="margin-top: 100px;background-color: white;max-width: 1300px !important">
	    <div class="row col-sm-12 body-jurnal" >
			<div class="col-sm-12" style="margin-top: 20px" >
				<h4 class="black text-center"><b>PENGELUARAN ANGGARAN</b></h4>
				<h5 class="black text-center">YAYASAN DARUL ULUM</h5>
				<hr class="black" style="border-bottom: 2px solid black">
			</div>
			<div class="col-sm-12" style="font-size: 18px">
				<table style="margin-bottom: 20px;">
					<tr>
						<td>Nota</td>
						<td>: {{ $data->pc_nota }}</td>
					</tr>
					<tr>
						<td>Tanggal</td>
						<td>: {{ Jenssegers\Date\Date::parse($data->pc_tanggal)->format('d F Y') }}</td>
					</tr>
					<tr>
						<td>Sekolah</td>
						<td>: {{ $data->sekolah->s_nama }}</td>
					</tr>
					<tr>
						<td>Pemohon</td>
						<td>: {{ $data->pc_pemohon }}</td>
					</tr>
				</table>
	        	<table class="table table-bordered overflow" >
	        		<thead class="bg-secondary " style="color: white">
	        			<th>No</th>
	        			<th>Nama Barang</th>
	        			<th>Nominal</th>
	        			<th>Qty</th>
	        			<th>Keterangan</th>
	        		</thead>
	        		<tbody>
	        			@foreach($data->petty_cash_detail as $i => $d)
	        				<tr>
	        					<td class="text-center">{{ $i+1 }}</td>
	        					@if ($data->pc_jenis == 'ANGGARAN')
	        						<td>{{ $d->barang->b_nama }}</td>
        						@else
	        						<td>{{ $d->akun->a_master_nama}} - {{ $d->pcd_keterangan }}</td>
	        					@endif
	        					<td class="text-right">{{ number_format(abs($d->pcd_jumlah),2,',','.')}}</td>
	        					<td>{{ $d->pcd_qty }}</td>
	        					<td>{{ $d->pcd_keterangan }}</td>
	        				</tr>
	        			@endforeach
	        			@if ($data == null)
	        				<tr>
	        					<td colspan="7"><b>TIDAK ADA DATA</b></td>
	        				</tr>
	        			@endif
	        		</tbody>
	        	</table>
	        	<label>Harap membawa print out ini saat kembali.</label>
	        	<div class="pull-right" style="margin-top: 100px;margin-bottom: 100px;">
	        		<h6 style="margin-bottom: 100px;text-align: center;">ADMIN SEKOLAH</h6>
	        		<p>___________________________</p>
	        	</div>
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
        	<div class="col-md-12 form-group">
            	<label>Tanggal Awal</label>
            	<input type="text" class="min date form-control" name="min">
            </div>
            <div class="col-md-12 form-group">
            	<label>Tanggal Akhir</label>
            	<input type="text" class="max date form-control" name="max">
            </div>
            <div class="col-md-12 form-group">
            	<label>Jenis Jurnal</label>
            	<select class="form-control j_type" name="j_type">
            		<option value="">Semua Type</option>
            		<option value="KAS MASUK">KAS MASUK</option>
            		<option value="KAS KELUAR">KAS KELUAR</option>
            	</select>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary filter" onclick="filter()">Filter</button>
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@include('partials._script')
<script type="text/javascript">
	window.print();
</script>
</html>
