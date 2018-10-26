<!DOCTYPE html>
<html>
{{-- @include('partials._head') --}}
<link rel="stylesheet" href="{{asset('assets/node_modules/bootstrap-4/css/bootstrap.min.css')}}">
<head>
	<title>YAYASAN DARUL ULUM</title>
  	<link rel="shortcut icon" href="{{asset('assets/images/logo1.png')}}" />
</head>
<style type="text/css">
	@media print
	{
		body {margin-left: 0 !important;margin-right: 0 !important;height: 0px;background-color: grey !important}
	}
	.printArea{
		padding-right:50px;
		padding-left:50px;
	}
	td{
		border:none !important;
	}
</style>

<body class="body" style="background-color: grey;margin-left: 200px;margin-right: 200px;">
	<div class="container" >
		<div class="row">
			<div style="background-color: white;" class="row printArea">
				<div class="col-sm-12 row" style="margin-top: 15px;border-bottom: 2px solid black; " >
					<div class="col-sm-2">
						<img style="width: 100%;" src="{{ asset('storage/uploads/sekolah/original/'.$data->sekolah->s_logo.'') }}">
					</div>
					<div class="col-sm-8"  align="center" style="display: table;margin-top: 20px">
						<h5 style="color: #3b734c">YAYASAN DARUL ULUM GRESIK</h5>
						<h4 style="color: #374a3d">{{ $siswa->sekolah->s_nama }}</h4>
						<p>{{ $siswa->sekolah->s_alamat }}</p>
					</div>
					<div class="col-sm-2">
						<img style="width: 100%;" src="{{ asset('assets/sekolah_1_.png') }}">
					</div>
				</div>
				<div class="col-sm-12" style="margin-top: 20px">
					<h4 class="text-center">KWITANSI</h4>
				</div>
				<div class="col-sm-12 row">
					<table class="table col-sm-4">
						<tr>
							<td>Nota</td>
							<td>: {{ $history_spp->hs_nota }}</td>
						</tr>	
						<tr>
							<td>Nama Siswa</td>
							<td>: {{ $siswa->sdd_nama }}</td>
						</tr>	
						<tr>
							<td>Kelas</td>
							<td>: {{ $siswa->sdd_kelas }}</td>
						</tr>	
						<tr>
							<td>Nama Kelas</td>
							<td>: {{ $siswa->sdd_nama_kelas }}</td>
						</tr>	
						<tr>
							<td>Jurusan</td>
							<td>: {{ $siswa->sdd_jurusan }}</td>
						</tr>		
					</table>
				</div>
				<div class="col-sm-4">
					
				</div>
				<div class="col-sm-8">
					<table class="table ">
						<tr>
							<td>Telah Diterima Dari</td>
							<td><b>: {{ $siswa->sdd_nama }}</b></td>
						</tr>
						<tr>
							<td>Untuk</td>
							<td><b>: Pembayaran SPP bulan {{ $history_spp->hs_bulan }} {{ $history_spp->hs_tahun }}</b></td>
						</tr>
						<tr>
							<td>Sejumlah</td>
							<td><b>: {{'Rp, '.  number_format($history_spp->hs_jumlah,0,',','.') }}</b></td>
						</tr>
					</table>
					
				</div>
				<div class="col-sm-12">
					<div class="col-sm-3" style="border:3px solid black;margin-top: 300px;margin-right: 100px!important">
						<i><b>Kwitansi : Rp. {{ number_format($history_spp->hs_jumlah,0,',','.') }}</b></i>
					</div>
				</div>
				<div class="col-sm-12 row" style="margin-top: 100px">
					<div class="col-sm-6">
						
					</div>
					<div class="col-sm-6 row d-flex">
						<p style="width: 100%;text-align: center">ADMIN SEKOLAH</p>
					</div>
				</div>
				<div class="col-sm-12 row" style="margin-top: 100px;">
					<div class="col-sm-6">
						
					</div>
					<div class="col-sm-6 row d-flex" style="padding-right: 120px;padding-left: 120px">
						<p style="width: 100%;text-align: center;border-bottom: 1px solid black;"></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
@include('partials._script')
<script type="text/javascript">
	window.print();
</script>
</html>
	
