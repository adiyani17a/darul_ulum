<div class="col-sm-12 height mt-2" >
	<div class="col-sm-12 row" style="margin-top: 15px" >
		<div class="col-sm-2" style="display: inline-block;width: 14%;">
			<img style="width: 100%;" src="{{ asset('storage/uploads/sekolah/original/'.$data->sekolah->s_logo.'') }}">
			<div style="width: 100%;height: 15px">
				
			</div>
		</div>
		<div  align="center" style="display: ;width: 75%;display: inline-block">
			<h4 style="color: #3b734c">YAYASAN DARUL ULUM GRESIK</h4>
			<h3 style="color: #374a3d">{{ $data->sekolah->s_nama }}</h3>
			<p>{{ $data->sekolah->s_alamat }}</p>
		</div>
		<div class="col-sm-12">
		<hr class="black" style="border-bottom: 2px solid black">
		</div>
	</div>
	<div class="col-sm-4" style="display: block;margin-top: 10px">
		<div style="width: 20%;display: inline-block">
			BKK
		</div>
		<div style="width: 10%;display: inline-block">
			:
		</div>
		<div style="width: 20%;display: inline-block">
			{{ $bkk->bkk_pc_ref }}
			
		</div>
	</div>
	<div class="col-sm-4" style="display: block;">
		<div style="width: 20%;display: inline-block">
			Tanggal Kas Keluar
		</div>
		<div style="width: 10%;display: inline-block">
			:
		</div>
		<div style="width: 20%;display: inline-block">
			{{ Carbon\carbon::parse($bkk->petty_cash->updated_at)->format('d/m/Y') }}
		</div>
	</div>
	<div class="col-sm-4" style="display: block;">
		<div style="width: 20%;display: inline-block">
			Tanggal Posting
		</div>
		<div style="width: 10%;display: inline-block">
			:
		</div>
		<div style="width: 20%;display: inline-block">
			{{ Carbon\carbon::parse($bkk->bkk_tanggal)->format('d/m/Y') }}
		</div>
	</div>
	<div class="col-sm-4" style="display: block;">
		<div style="width: 20%;display: inline-block">
			Pemohon
		</div>
		<div style="width: 10%;display: inline-block">
			:
		</div>
		<div style="width: 20%;display: inline-block">
			{{ $bkk->petty_cash->pc_pemohon }}
		</div>
	</div>
	<div class="col-sm-4" style="display: block;">
		<div style="width: 20%;display: inline-block">
			Keterangan
		</div>
		<div style="width: 10%;display: inline-block">
			:
		</div>
		<div style="width: 20%;display: inline-block">
			{{ $bkk->bkk_keterangan }}
		</div>
	</div>
	<div style="display: block;margin-top: 50px">
		<table border="1"  style="width: 100%;border-collapse: collapse;">
			<thead>
				<tr>
					<th  align="center">No</th>
					<th  align="center">Nama Barang</th>
					<th  align="center">Qty</th>
					<th  align="center">Total Harga</th>
				</tr>
			</thead>
			<tbody>
				@php
					$total = 0;
				@endphp
				@foreach ($bkk->bukti_kas_keluar_detail as $i=>$val)
					<tr>
						<td align="center">{{ $i+1 }}</td>
						@if ($val->bkkd_jenis == 'POSTING')
							@foreach ($bkk->petty_cash->petty_cash_detail as $a=>$val1)
								@if ($val1->pcd_detail == $val->bkkd_pcd_detail)
									@if ($bkk->petty_cash->pc_jenis == 'ANGGARAN')
										<td>{{ $val1->barang->b_nama }}</td>
									@else
										<td>{{ $val1->pcd_keterangan }}</td>
									@endif
								@else

								@endif
							@endforeach
						@else
							<td>{{ $val->bkkd_keterangan }}</td>
						@endif
						<td align="center">{{ $val->bkkd_qty }}</td>
						<td align="right"> {{ number_format($val->bkkd_harga,0,',','.')}} </td>
					</tr>
					@php
						$total += $val->bkkd_harga;
					@endphp
				@endforeach
			</tbody>
			<tfoot>
				<tr>
					<td colspan="3" align="right">Total Pembelian</td>
					<td align="right">{{ number_format($total,0,',','.') }}</td>
				</tr>
				<tr>
					<td colspan="3" align="right">Kas Dikeluarkan</td>
					<td align="right">{{ number_format($bkk->petty_cash->pc_total,0,',','.') }}</td>
				</tr>
				<tr>
					<td colspan="3" align="right">Sisa</td>
					<td align="right">{{ number_format($bkk->bkk_sisa_kembali,0,',','.') }}</td>
				</tr>
			</tfoot>
		</table>
		<div style="display: block">
			<ol>
				<li>Periksa Kembali Data Anda Sebelum Diserahkan Ke Yayasan</li>
				<li>Harap Lampirkan Bukti Pembelian Saat Diserahkan Ke Yayasan</li>
			</ol>
		</div>
		<div style="display: block;position: absolute;top: 600px;float: right">
			<div style="display: block;">
				<input type="text" readonly="" style="border-right: none;border-left: none;border-top: none;" name="">
				<p style="margin-left: 30px">ADMIN YAYASAN</p>
			</div>
		</div>
		<div style="display: block;position: absolute;top: 600px;float: left;">
			<div style="display: block;">
				<input type="text" readonly="" style="border-right: none;border-left: none;border-top: none;" name="">
				<p style="margin-left: 30px">ADMIN SEKOLAH</p>
			</div>
		</div>
	</div>
</div>
