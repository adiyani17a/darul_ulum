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

	.noborder{
		border:0px solid #fff !important;
	}

	.head{
		cursor: pointer;
	}

	.table-condensed{
		width: 100% !important;
	}
</style>

<body style="background-color: grey;">
	<nav class="navbar transparency fixed-top navbar-dark bg-dark">
		<div class="container-fluid">
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
					<li><i class="fa fa-sliders" onclick="openModal()"></i></li>
				</ul>
			</div>
		</div>
	</nav>
	
	<div class="container-fluid" id="printArea" style="margin-top: 100px;background-color: white">
	    <div class="row col-sm-12 body-jurnal">
			<div class="col-sm-12" style="margin-top: 20px" >
				<h2 class="black"><b>LABA RUGI</b></h2>
				<h5 class="black">YAYASAN DARUL ULUM</h5>
				@if (!Auth::user()->akses('LAPORAN LABA RUGI','sekolah'))
				<p class="black">{{ Auth::user()->sekolah->s_nama }}</p>
				@endif 
				<hr class="black" style="border-bottom: 2px solid black">
			</div>
			@if ($data['head'] != null)
				<div class="col-sm-6 table-responsive" style="font-size: 10px">
					<label>Transaksi : {{ carbon\carbon::parse($min)->format('d F Y') }} - {{ carbon\carbon::parse($max)->format('d F Y') }}</label>
					<h5 style="margin-top: 12px;"><b>LABA/RUGI KESELURUHAN</b></h5>
					@php
						$total = [];
						$total['persen'] = 100;
						$total['pendapatan'] = 0;
						$total['hutang'] = 0;
						$total['biaya'] = 0;
						$total['depresiasi'] = 0;

						foreach ($data['jurnal'] as $i => $j) {
							foreach ($j->jurnal_dt as $i1 => $j1) {
								if (substr($j1->jd_akun, 0,1) == 4) {
									$total['pendapatan'] += $j1->jd_value;
								}

								if (substr($j1->jd_akun, 0,1) == 2) {
									$total['hutang'] += $j1->jd_value;
								}

								if (substr($j1->jd_akun, 0,1) == 6) {
									$total['biaya'] += $j1->jd_value;
								}

								if (substr($j1->jd_akun, 0,1) == 7) {
									$total['depresiasi'] += $j1->jd_value;
								}
							}
						}
						$total['persen_hutang'] = $total['hutang']/$total['pendapatan']*100;
						$total['persen_biaya'] = $total['biaya']/$total['pendapatan']*100;
						// $total['persen_biaya'] = $total['depresiasi']/$total['pendapatan']*100;
					@endphp
		        	<table class="table" >
		        		<thead class="bg-secondary " style="color: white">
		        			<th>Nama Transaksi</th>
		        			<th style="width: 120px">Total</th>
		        			<th style="width: 82px">%</th>
		        		</thead>
		        		<tbody>
		        			<tr class="pendapatan head">
		        				<th class="noborder text-left"><i class="fa pendapatan_panah fa-caret-right"></i> PENDAPATAN</th>
		        				<th class="text-right noborder">{{ number_format($total['pendapatan'],2,',','.') }}</th>
		        				<th class="noborder">{{ $total['persen'] }} %</th>
		        			</tr>
		        			@foreach ($data['akun'] as $i => $a)
		        				@if (substr($a->a_id, 0,1) == 4)
		        					@php
		        						$data['total'] = 0;
		        						$data['persen'] = 0;
		        						if ($a->jurnal_dt != null) {
		        							foreach ($a->jurnal_dt as $i1 => $a1) {
		        								$data['total'] += $a1->jd_value;
		        							}

		        							$data['persen'] = $data['total']/$total['pendapatan']*$total['persen'];
		        						}
		        						
		        					@endphp
		        					<tr class="pendapatan_child" hidden="">
				        				<td class="noborder" style="text-indent: 30px">{{ $a->a_nama }}</td>
				        				<td class="text-right noborder">{{ number_format($data['total'] ,2,',','.') }}</td>
				        				<td class="text-center noborder">{{ round($data['persen'],2) }} %</td>
				        			</tr>
		        				@endif
		        			@endforeach
		        			<tr class="hutang head">
		        				<th class="noborder text-left"><i class="fa hutang_panah fa-caret-right"></i> BEBAN HUTANG</th>
		        				<th class="text-right noborder">{{ number_format($total['hutang'],2,',','.') }}</th>
		        				<th class="noborder">{{ round($total['persen_hutang'],2) }} %</th>
		        			</tr>
		        			@foreach ($data['akun'] as $i => $a)
		        				@if (substr($a->a_id, 0,1) == 2)
		        					@php
		        						$data['total'] = 0;
		        						$data['persen'] = 0;
		        						if ($a->jurnal_dt != null) {
		        							foreach ($a->jurnal_dt as $i1 => $a1) {
		        								$data['total'] += $a1->jd_value;
		        							}
		        							if ($total['hutang'] != 0) {
		        								$data['persen'] = $data['total']/$total['hutang']*$total['persen_hutang'];
		        							}
		        						}
		        						
		        					@endphp
		        					<tr class="hutang_child" hidden="">
				        				<td class="noborder" style="text-indent: 30px">{{ $a->a_nama }}</td>
				        				<td class="text-right noborder">{{ number_format($data['total'] ,2,',','.') }}</td>
				        				<td class="text-center noborder">{{ round($data['persen'],2) }} %</td>
				        			</tr>
		        				@endif
		        			@endforeach
		        			<tr class="biaya head">
		        				<th class="noborder text-left"><i class="fa biaya_panah fa-caret-right"></i> BEBAN BIAYA</th>
		        				<th class="text-right noborder">{{ number_format($total['biaya'],2,',','.') }}</th>
		        				<th class="noborder">{{ round($total['persen_biaya'],2) }}  %</th>
		        			</tr>
		        			@foreach ($data['akun'] as $i => $a)
		        				@if (substr($a->a_id, 0,1) == 6)
		        					@php
		        						$data['total'] = 0;
		        						$data['persen'] = 0;
		        						if ($a->jurnal_dt != null) {
		        							foreach ($a->jurnal_dt as $i1 => $a1) {
		        								$data['total'] += $a1->jd_value;
		        							}
		        							if ($total['biaya'] != 0) {
		        								$data['persen'] = $data['total']/$total['biaya']*$total['persen_biaya'];
		        							}
		        						}
		        						
		        					@endphp
		        					<tr class="biaya_child" hidden="">
				        				<td class="noborder" style="text-indent: 30px">{{ $a->a_nama }}</td>
				        				<td class="text-right noborder">{{ number_format($data['total'] ,2,',','.') }}</td>
				        				<td class="text-center noborder">{{ round($data['persen'],2) }} %</td>
				        			</tr>
		        				@endif
		        			@endforeach
		        		</tbody>
	        			<tfoot class="bg-secondary " style="color: white">
	        				<th>NETTO GROSS</th>
	        				<th>{{ number_format($total['pendapatan'] - $total['hutang'] - $total['biaya'],2,',','.') }}</th>
	        				<th>{{ round($total['persen'] - $total['persen_hutang'] - $total['persen_biaya'],2) }} %</th>
	        			</tfoot>
		        	</table>
		      	</div>
		      	<div class="col-sm-6 table-responsive" style="font-size: 10px">
					<h5><b>LABA/RUGI</b></h5>
					<div style="width: 100%;overflow-y: scroll;max-height: 32.8%;" >
						@foreach ($data['head'] as $z => $h)
							@php
								$total = [];
								$total['persen'] = 100;
								$total['pendapatan'] = 0;
								$total['hutang'] = 0;
								$total['biaya'] = 0;
								$total['depresiasi'] = 0;

								foreach ($data['jurnal'] as $i => $j) {
									foreach ($j->jurnal_dt as $i1 => $j1) {
										if ($data['head'][$z] == carbon\carbon::parse($j1->jurnal->j_tanggal)->format('Y-m')) {
											if (substr($j1->jd_akun, 0,1) == 4) {
												$total['pendapatan'] += $j1->jd_value;
											}

											if (substr($j1->jd_akun, 0,1) == 2) {
												$total['hutang'] += $j1->jd_value;
											}

											if (substr($j1->jd_akun, 0,1) == 6) {
												$total['biaya'] += $j1->jd_value;
											}

											if (substr($j1->jd_akun, 0,1) == 7) {
												$total['depresiasi'] += $j1->jd_value;
											}
										}
									}
								}
								$total['persen_hutang'] = $total['hutang']/$total['pendapatan']*100;
								$total['persen_biaya'] = $total['biaya']/$total['pendapatan']*100;
								// $total['persen_biaya'] = $total['depresiasi']/$total['pendapatan']*100;
							@endphp
							<table class="table" style="width: 100%">
			        			<thead class="bg-secondary " style="color: white">
			        				<tr >
				        				<th colspan="3">{{ $data['bulan'][$z] }}</th>
			        				</th>
				        			<tr>
					        			<th>NAMA</th>
					        			<th>TOTAL</th>
					        			<th>%</th>
					        		</tr>
				        		</thead>
				        		<tbody>
				        			<tr class="pendapatan head">
				        				<th class="noborder text-left"><i class="fa pendapatan_panah fa-caret-right"></i> PENDAPATAN</th>
				        				<th class="text-right noborder">{{ number_format($total['pendapatan'],2,',','.') }}</th>
				        				<th class="noborder">{{ $total['persen'] }} %</th>
				        			</tr>
				        			@foreach ($data['akun'] as $i => $a)
				        				@if (substr($a->a_id, 0,1) == 4)
				        					@php
				        						$data['total'] = 0;
				        						$data['persen'] = 0;
				        						if ($a->jurnal_dt != null) {
			        								foreach ($a->jurnal_dt as $i1 => $a1) {
			        									if (carbon\carbon::parse($a1->jurnal->j_tanggal)->format('Y-m') == $data['head'][$z]) {
				        									$data['total'] += $a1->jd_value;
			        									}
				        							}
				        							
				        							$data['persen'] = $data['total']/$total['pendapatan']*$total['persen'];
				        						}
				        						
				        					@endphp
				        					<tr class="pendapatan_child" hidden="">
						        				<td class="noborder" style="text-indent: 30px">{{ $a->a_nama }}</td>
						        				<td class="text-right noborder">{{ number_format($data['total'] ,2,',','.') }}</td>
						        				<td class="text-center noborder">{{ round($data['persen'],2) }} %</td>
						        			</tr>
				        				@endif
				        			@endforeach
				        			<tr class="hutang head">
				        				<th class="noborder text-left"><i class="fa hutang_panah fa-caret-right"></i> BEBAN HUTANG</th>
				        				<th class="text-right noborder">{{ number_format($total['hutang'],2,',','.') }}</th>
				        				<th class="noborder">{{ round($total['persen_hutang'],2) }} %</th>
				        			</tr>
				        			@foreach ($data['akun'] as $i => $a)
				        				@if (substr($a->a_id, 0,1) == 2)
				        					@php
				        						$data['total'] = 0;
				        						$data['persen'] = 0;
				        						if ($a->jurnal_dt != null) {
				        							foreach ($a->jurnal_dt as $i1 => $a1) {
				        								$data['total'] += $a1->jd_value;
				        							}
				        							if ($total['hutang'] != 0) {
				        								$data['persen'] = $data['total']/$total['hutang']*$total['persen_hutang'];
				        							}
				        						}
				        						
				        					@endphp
				        					<tr class="hutang_child" hidden="">
						        				<td class="noborder" style="text-indent: 30px">{{ $a->a_nama }}</td>
						        				<td class="text-right noborder">{{ number_format($data['total'] ,2,',','.') }}</td>
						        				<td class="text-center noborder">{{ round($data['persen'],2) }} %</td>
						        			</tr>
				        				@endif
				        			@endforeach
				        			<tr class="biaya head">
				        				<th class="noborder text-left"><i class="fa biaya_panah fa-caret-right"></i> BEBAN BIAYA</th>
				        				<th class="text-right noborder">{{ number_format($total['biaya'],2,',','.') }}</th>
				        				<th class="noborder">{{ round($total['persen_biaya'],2) }}  %</th>
				        			</tr>
				        			@foreach ($data['akun'] as $i => $a)
				        				@if (substr($a->a_id, 0,1) == 6)
				        					@php
				        						$data['total'] = 0;
				        						$data['persen'] = 0;
				        						if ($a->jurnal_dt != null) {
				        							foreach ($a->jurnal_dt as $i1 => $a1) {
				        								$data['total'] += $a1->jd_value;
				        							}
				        							if ($total['biaya'] != 0) {
				        								$data['persen'] = $data['total']/$total['biaya']*$total['persen_biaya'];
				        							}
				        						}
				        						
				        					@endphp
				        					<tr class="biaya_child" hidden="">
						        				<td class="noborder" style="text-indent: 30px">{{ $a->a_nama }}</td>
						        				<td class="text-right noborder">{{ number_format($data['total'] ,2,',','.') }}</td>
						        				<td class="text-center noborder">{{ round($data['persen'],2) }} %</td>
						        			</tr>
				        				@endif
				        			@endforeach
				        		</tbody>
			        			<tfoot class="bg-secondary " style="color: white">
			        				<th>NETTO GROSS</th>
			        				<th>{{ number_format($total['pendapatan'] - $total['hutang'] - $total['biaya'],2,',','.') }}</th>
			        				<th>{{ round($total['persen'] - $total['persen_hutang'] - $total['persen_biaya'],2) }} %</th>
			        			</tfoot>
					        </table>
				        @endforeach
					</div>
		      	</div>
		    @else
			    <div class="col-sm-12">
					<h5 class="text-center"><b>TIDAK ADA DATA</b></h5>
			    </div>
			@endif
	    </div>
  	</div>
</body>
<!-- Modal -->
<div id="filterModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-m">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-gradient-info">
        <h4 class="modal-title">Filter Laba Rugi</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">
        	<div class="col-md-12 form-group">
            	<label>Tanggal Awal</label>
            	<input type="text" class="min date form-control" name="min" >
            </div>
            <div class="col-md-12 form-group">
            	<label>Tanggal Akhir</label>
            	<input type="text" class="max date form-control" name="max">
            </div>
            <div class="col-md-12 form-group">
            	<label>Sekolah</label>
            	<select class="form-control sekolah" name="sekolah">
            		<option value="">Semua Sekolah</option>
            		@foreach ($data['sekolah'] as $i => $s)
            			<option value="{{ $s->s_id }}">{{ $s->s_nama }}</option>
            		@endforeach
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
</html>
	
<script type="text/javascript">
	function openModal(argument) {
		$('.date').val('');
		$('#filterModal').modal('show');
	}

	function filter() {
		var min = $('.min').val();
		var max = $('.max').val();
		var sekolah = $('.sekolah').val();
		location.href =' {{ url('laporan/laba_rugi') }}'+'?min='+min+'&sekolah='+sekolah+'&max='+max;
	}

	$('.date').datepicker({
  		autoclose: true,
  		format: "yyyy-mm",
	    viewMode: "months", 
	    minViewMode: "months"
	});

	$('.pendapatan').click(function(){
		if ($(this).hasClass('active')) {
			$('.pendapatan_child').prop('hidden',true);
			$(this).removeClass('active');
			$('.pendapatan_panah').removeClass('fa-caret-down');
			$('.pendapatan_panah').addClass('fa-caret-right');
		}else{
			$('.pendapatan_child').prop('hidden',false);
			$(this).addClass('active');
			$('.pendapatan_panah').addClass('fa-caret-down');
			$('.pendapatan_panah').removeClass('fa-caret-right');
		}
	});

	$('.hutang').click(function(){
		if ($(this).hasClass('active')) {
			$('.hutang_child').prop('hidden',true);
			$(this).removeClass('active');
			$('.hutang_panah').removeClass('fa-caret-down');
			$('.hutang_panah').addClass('fa-caret-right');
		}else{
			$('.hutang_child').prop('hidden',false);
			$(this).addClass('active');
			$('.hutang_panah').addClass('fa-caret-down');
			$('.hutang_panah').removeClass('fa-caret-right');
		}
	});

	$('.biaya').click(function(){
		if ($(this).hasClass('active')) {
			$('.biaya_child').prop('hidden',true);
			$(this).removeClass('active');
			$('.biaya_panah').removeClass('fa-caret-down');
			$('.biaya_panah').addClass('fa-caret-right');
		}else{
			$('.biaya_child').prop('hidden',false);
			$(this).addClass('active');
			$('.biaya_panah').addClass('fa-caret-down');
			$('.biaya_panah').removeClass('fa-caret-right');
		}
	});
</script>