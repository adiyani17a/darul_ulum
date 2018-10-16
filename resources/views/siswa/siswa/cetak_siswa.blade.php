<!DOCTYPE html>
<html>
{{-- @include('partials._head') --}}
<link rel="stylesheet" href="{{asset('assets/node_modules/bootstrap-4/css/bootstrap.min.css')}}">
<head>
	<title>YAYASAN DARUL ULUM</title>
  	<link rel="shortcut icon" href="{{asset('assets/images/logo1.png')}}" />
</head>
<style type="text/css">
	@page {
	   size: 21cm 29.7cm;
   	 margin: 30mm 45mm 30mm 45mm;
	}

	@media print
	{
		body {margin-left: 0 !important;margin-right: 0 !important;height: 0px;background-color: white !important}
	}
	.printArea{
		padding-right:50px;
		padding-left:50px;
	}
</style>

<body style="background-color: grey;margin-left: 200px;margin-right: 200px;">
	<div class="body">
		<div class="container" >
			<div class="row">
				<div style="background-color: white;" class="row printArea">
					<div class="col-sm-12 row" style="margin-top: 15px" >
						<div class="col-sm-2">
							<img style="width: 100%;" src="{{ asset('storage/uploads/sekolah/original/'.$data->sekolah->s_logo.'') }}">
						</div>
						<div class="col-sm-8"  align="center">
							<h5 style="color: #3b734c">YAYASAN DARUL ULUM GRESIK</h5>
							<h4 style="color: #374a3d">{{ $siswa->sekolah->s_nama }}</h4>
							<p>{{ $siswa->sekolah->s_alamat }}</p>
						</div>
						<div class="col-sm-2">
							<img style="width: 100%;" src="{{ asset('assets/sekolah_1_.png') }}">
						</div>
						<div class="col-sm-12">
						<hr class="black" style="border-bottom: 2px solid black">
						</div>
					</div>
					<div style="text-align: center;" class="col-sm-12">
						<h4>PENERIMAAN PESERTA DIDIK BARU</h4>
						<h4>{{ $siswa->sekolah->s_nama }}</h4>
					</div>
					<div class="col-sm-6" style="margin-top: 10px;">
						<table style="">
							<tr>
								<td colspan="3"><b>A. Keterangan calon peserta didik</b></td>
							</tr>
							<tr>
								<td width="10">1.</td>
								<td width="185">Nama Lengkap</td>
								<td>: {{ $siswa->sdd_nama }}</td>
							</tr>
							<tr>
								<td width="10">2.</td>
								<td>Nama Panggilan</td>
								<td>: {{ $siswa->sdd_panggilan }}</td>
							</tr>
							<tr>
								<td width="10">3.</td>
								<td>Jenis Kelamin</td>
								<td>: {{ $siswa->sdd_panggilan }}</td>
							</tr>
							<tr>
								<td width="10">4.</td>
								<td>Tempat Lahir</td>
								<td>: {{ $siswa->sdd_tempat_lahir }}</td>
							</tr>
							<tr>
								<td width="10">5.</td>
								<td>Tanggal Lahir</td>
								<td>: {{ $tanggal_lahir['siswa'] }}</td>
							</tr>
							<tr>
								<td width="10">6.</td>
								<td>Agama</td>
								<td>: {{ $siswa->sdd_agama }}</td>
							</tr>
							<tr>
								<td width="10">7.</td>
								<td>Kewarganegaraan</td>
								<td>: {{ $siswa->sdd_kewarganegaraan }}</td>
							</tr>
							<tr>
								<td width="10">8.</td>
								<td>Anak Ke</td>
								<td>: {{ $siswa->sdd_urutan_anak }}</td>
							</tr>
							<tr>
								<td width="10">9.</td>
								<td>Jumlah Saudara</td>
								<td>: {{ $siswa->sdd_urutan_anak }}</td>
							</tr>
							<tr>
								<td width="10">10.</td>
								<td>Bahasa Sehari Hari</td>
								<td>: {{ $siswa->sdd_bahasa }}</td>
							</tr>
							<tr>
								<td width="10">11.</td>
								<td>No. Telpon</td>
								<td>: {{ $siswa->siswa_tempat_tinggal[0]->stt_no_telp }}</td>
							</tr>
							<tr>
								<td width="10">12.</td>
								<td>Alamat</td>
								<td>: {{ $siswa->siswa_tempat_tinggal[0]->stt_alamat }}</td>
							</tr>
							<tr>
								<td width="10">13.</td>
								<td>Tinggal Dengan</td>
								<td>: {{ $siswa->siswa_tempat_tinggal[0]->stt_status_tempat_tinggal }}</td>
							</tr>
							<tr>
								<td width="10">14.</td>
								<td>Jarak Ke Sekolah</td>
								<td>: {{ $siswa->siswa_tempat_tinggal[0]->stt_jarak_rumah }}</td>
							</tr>
						</table>
					</div>	
					<div class="col-sm-6" style="margin-top: 10px;">
						<table>
							<tr>
								<td colspan="3"><b>B. Keterangan Orang Tua Kandung</b></td>
							</tr>
							<tr>
								<td width="50" colspan="2">1. Nama Lengkap</td>
							</tr>
							<tr>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;a. Ayah</td>
								<td>: {{ $siswa->siswa_ayah[0]->sa_nama }}</td>
							</tr>
							<tr>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;a. Ibu</td>
								<td>: {{ $siswa->siswa_ibu[0]->si_nama }}</td>
							</tr>
							<tr>
								<td width="50" colspan="2">2. Tanggal Lahir</td>
							</tr>
							<tr>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;a. Ayah</td>
								<td>: {{ $tanggal_lahir['ayah'] }}</td>
							</tr>
							<tr>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;a. Ibu</td>
								<td>: {{ $tanggal_lahir['ibu'] }}</td>
							</tr>
							<tr>
								<td width="50" colspan="2">3. Pekerjaan</td>
							</tr>
							<tr>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;a. Ayah</td>
								<td>: {{ $siswa->siswa_ayah[0]->sa_pekerjaan }}</td>
							</tr>
							<tr>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;a. Ibu</td>
								<td>: {{ $siswa->siswa_ibu[0]->si_pekerjaan }}</td>
							</tr>
							<tr>
								<td width="50" colspan="2">4. Alamat Tempat Tinggal</td>
							</tr>
							<tr>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;a. Ayah</td>
								<td>: {{ $siswa->siswa_ayah[0]->sa_alamat }}</td>
							</tr>
							<tr>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;a. Ibu</td>
								<td>: {{ $siswa->siswa_ibu[0]->si_alamat }}</td>
							</tr>
							<tr>
								<td width="50" colspan="2">5. Keterangan</td>
							</tr>
							<tr>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;a. Ayah</td>
								<td>: @if ($siswa->siswa_ayah[0]->sa_status == 'H')
									Masih Hidup
								@else Meninggal @endif</td>
							</tr>
							<tr>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;a. Ibu</td>
								<td>: @if ($siswa->siswa_ibu[0]->si_status == 'H')
									Masih Hidup
								@else Meninggal @endif</td>
							</tr>
						</table>
					</div>
					<div class="col-sm-6" style="margin-top: 10px;">
						<table style="width: 100%;margin-top: 10px">
							<tr>
								<td colspan="2"><b>C. Data Pendidikan Sebelumnya</b></td>
							</tr>
							<tr>
								<td>1. Nama Sekolah</td>
								<td>: {{ $siswa->siswa_pendidikan[0]->sp_nama_sekolah }}</td>
							</tr>
							<tr>
								<td>2. Nomor Ijazah</td>
								<td>: {{ $siswa->siswa_pendidikan[0]->sp_ijazah  }}</td>
							</tr>
							<tr>
								<td>3. Tanggal Ijazah</td>
								<td>: {{ $tanggal_lahir['ijazah'] }}</td>
							</tr>
						</table>
					</div>
					<div class="col-sm-6" style="margin-top: 10px;">
						<table style="width: 100%;margin-top: 10px">
							<tr>
								<td colspan="2"><b>D. Data Periodik Calon Siswa</b></td>
							</tr>
							<tr>
								<td>1. Tinggi Badan</td>
								<td>: {{ $siswa->sdd_tinggi }}</td>
							</tr>
							<tr>
								<td>2. Berat Badan</td>
								<td>: {{ $siswa->sdd_berat }}</td>
							</tr>
							<tr>
								<td>3. Riwayat Penyakit</td>
								<td>: 
									@php
										$c = count($siswa->siswa_kesehatan) - 1;
									@endphp
									@foreach ($siswa->siswa_kesehatan as $i=>$k)
										@if ($i == $c)
											{{ $k->sk_nama_penyakit }}
										@else
											{{ $k->sk_nama_penyakit }},
										@endif
									@endforeach
								</td>
							</tr>
						</table>
					</div>
					<div class="col-sm-12 row" style="margin-top: 20px;">
						<div class="col-sm-12">
							<p><b>Cek Lampiran</b></p>
						</div>
						<div class="col-sm-4">
							<p>1. Pas Photo 3 x 4 cm <input style="width: 30px" class="input-sm" readonly="" type="text" name=""></p>
						</div>
						<div class="col-sm-4">
							<p>3. Akta Kelahiran <input style="width: 30px" class="input-sm" readonly="" type="text" name=""></p>
						</div>
						<div class="col-sm-4">
							<p>5. Ijazah Terakhir <input style="width: 30px" class="input-sm" readonly="" type="text" name=""></p>
						</div>
						<div class="col-sm-4">
							<p>2. Kartu Keluarga <input style="width: 30px" class="input-sm" readonly="" type="text" name=""></p>
						</div>
						<div class="col-sm-4">
							<p>4. KPS / KKS (jika menerima) <input style="width: 30px" class="input-sm" readonly="" type="text" name=""></p>
						</div>
						<div class="col-sm-4">
							<p>6. .............................. <input style="width: 30px" class="input-sm" readonly="" type="text" name=""></p>
						</div>
					</div>
					<div class="col-sm-12 row" >
						
						<div class="col-sm-4">
							<p style="text-align: center;margin-top: 40px">Diketahui Oleh <br>Orang Tua/Wali Murid</p>
							<input type="text" readonly="" style="border-right: none;border-left: none;border-top: none;text-align: center;width: 100%;display: block;padding-top: 50px;border-color: black" name="">
						</div>
						<div class="col-sm-4">
							<h6 class="label" align="center">FOTO</h6>
							<img style="width: 150px;height: 200px; margin-left: 22%" src="{{ asset('storage/uploads/data_siswa/original') }}/{{ $siswa->sdd_image }}">
						</div>
						<div class="col-sm-4">
							<p style="text-align: center;margin-top: 40px">ADMIN SEKOLAH</p>
							<input type="text" readonly="" style="border-right: none;border-left: none;border-top: none;text-align: center;width: 100%;display: block;padding-top: 73px;border-color: black" name="">
						</div>
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
	
