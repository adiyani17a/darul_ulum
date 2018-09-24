<div class="col-sm-6">
	<table class="table " style="color: grey">
		<tr>
			<td style="border:none;"><b>Nota</b></td>
			<td style="border:none;"><b>{{ $data->pc_nota }}</b></td>
		</tr>
		<tr>
			<td style="border:none;"><b>Tanggal</b></td>
			<td style="border:none;"><b>{{ $data->pc_tanggal }}</b></td>
		</tr>
		<tr>
			<td style="border:none;"><b>Sekolah</b></td>
			<td style="border:none;"><b>{{ $data->sekolah->s_nama }}</b></td>
		</tr>
	</table>
</div>
<div class="col-sm-6">
	<table class="table " style="color: grey">
		<tr>
			<td style="border:none;"><b>Pemohon</b></td>
			<td style="border:none;"><b>{{ $data->pc_pemohon }}</b></td>
		</tr>
		<tr>
			<td style="border:none;"><b>Total</b></td>
			<td style="border:none;"><b>{{ number_format($data->pc_total, 2, ",", ".") }}</b></td>
		</tr>
		
	</table>
</div>

<table class="table table-bordered table_detail" style="background: white">
	<thead style="background: grey;color: white">
		<th>Nama Barang</th>
		<th>Nominal</th>
		<th>Qty</th>
		<th>Keterangan</th>
	</thead>
	<tbody>
		@foreach ($data->petty_cash_detail as $val)
			@if ($val->pcd_jumlah != 0)
				<tr>
					@if ($data->pc_jenis == 'ANGGARAN')
						<td>{{ $val->barang->b_nama }}</td>
					@else
						<td>{{ $val->akun->a_nama }}</td>
					@endif
					<td align="right">{{ number_format($val->pcd_jumlah, 2, ",", ".") }}</td>
					@if ($data->pc_jenis == 'ANGGARAN')
						<td>{{ $val->pcd_qty }}</td>
					@else
						<td> - </td>
					@endif
					<td>{{ $val->pcd_keterangan }}</td>
				</tr>
			@endif
		@endforeach
	</tbody>
</table>

<script type="text/javascript">
	$('.table_detail').DataTable();
</script>