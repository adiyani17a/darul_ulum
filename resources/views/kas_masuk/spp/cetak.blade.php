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
		body {margin-left: 0 !important;margin-right: 0 !important;height: 0px;background-color: white !important}
	}
	.printArea{
		padding-right:50px;
		padding-left:50px;
	}
	td{
		border:none !important;
	}
	#trapezoid {
		background-color: #e9ecef;
    height: 50px;
    width: 200px;
    border-top-left-radius: 50px;
    border-bottom-right-radius: 50px;
    margin-top: 10px;
    margin-bottom: 10px;
	}

	.batik {

    border: 25px solid transparent;
    width: 100%;
    height: 400px;
    -webkit-border-image: url({{ asset('assets/images/border.png') }}) 30 round; /* Safari 3.1-5 */
    -o-border-image: url({{ asset('assets/images/border.png') }}) 30 round; /* Opera 11-12.1 */
    border-image: url({{ asset('assets/images/border.png') }}) 30 round;
	}



	.kop{
		width: 400px;
		margin-top: 150px;
    font-family: sans-serif;
 
    display: block;
	}
</style>

<body class="body" style="background-color: #fff;">
	<div class="container-fluid">
		<div class="row">
			<div style="width: 30%; border-right: 1px dashed black;height: 400px;padding-top: 20px;">
				<div class="col-md-12">
					No.........................................
				</div>
				<div class="col-md-12" style="padding-top: 20px;">
					<label>Telah Diterima dari</label><br>
					<input type="text" readonly="" value="{{ $siswa->sdd_nama }}" style="border:none;border-bottom: 1px solid grey;width: 250px" name="">
				</div>
				<div class="col-md-12" style="padding-top: 20px;">
					<label>Uang sejumlah</label><br>
					<div class="input-group " style="border-top: 1px solid grey;border-bottom: 1px solid grey; width: 250px;">
					  Rp.
					  <div id="trapezoid">
					  	&nbsp; &nbsp; <input type="text" readonly="" value="{{number_format($history_spp->hs_jumlah,0,',','.') }}" style="border: none;margin-top: 10px;pointer-events: none;background-color: #e9ecef;width: 160px;text-align: right;" name="">
					  </div>
					</div>
				</div>
				<div class="col-md-12" style="padding-top: 20px;">
					<label>Untuk pembayaran</label><br>
					<div style="border-bottom: 1px solid grey; width: 250px;margin-top: 30px;">
						Pembayaran SPP Bulan {{ $history_spp->hs_bulan }}
					</div>
					<div style="border-bottom: 1px solid grey; width: 250px;margin-top: 30px;"></div>
				</div>
			</div>
			<div style="width: 70%;padding-left: 10px">
				<div class="batik text-center">
					<div style="width: 100%;padding: 20px;" class="row d-flex justify-content-around">
						<div style="display: inline-block;">
							<img style="width: 100px;display: inline-block;" src="{{ asset('storage/uploads/sekolah/original/'.$data->sekolah->s_logo.'') }}">
						</div>
						<div style="display: inline-block;">
							<h4 style="color: #3b734c">YAYASAN DARUL ULUM GRESIK</h4>
							<h3 style="color: #374a3d">{{ $data->sekolah->s_nama }}</h3>
							<p>{{ $data->sekolah->s_alamat }}</p>
						</div>
					</div>
					<div>
						<table style="margin-left: 50px;">
							<tr>
								<th class="text-left">Telah Diterima Dari</th>
								<td>: <input type="text" readonly="" value="{{ $siswa->sdd_nama }}" style="border:none;border-bottom: 1px solid grey;width: 250px" name=""></td>
							</tr>
							<tr>
								<th class="text-left">Uang sejumlah</th>
								<td>: <input  type="text" readonly="" value="{{$terbilang}} rupiah" style="border:none;border-bottom: 1px solid grey;width: 250px" name=""></td>
							</tr>
							<tr>
								<th class="text-left">Untuk pembayaran</th>
								<td>: <input type="text" readonly="" value="Pembayaran SPP Bulan {{ $history_spp->hs_bulan }}" style="border:none;border-bottom: 1px solid grey;width: 250px" name=""></td>
							</tr>
						</table>
					</div>
					<div class="col-md-12" style="padding-top: 20px;">
						<div class="input-group " style="width: 100%;">
						  Rp.
						  <div id="trapezoid">
						  	&nbsp; &nbsp; <input type="text" readonly="" value="{{number_format($history_spp->hs_jumlah,0,',','.') }}" style="border: none;margin-top: 10px;pointer-events: none;background-color: #e9ecef;width: 150px;text-align: right;" name="">
						  </div>
						</div>
							<input type="text" readonly="" style="border:none;border-bottom: 1px solid grey;width: 150px;right: 50px;left: 180px;bottom: 40px;position: relative;" name="">
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
	
