<table class="table table-bordered table_detail" style="background: white">
	<thead style="background: grey;color: white">
		<th>Nama Barang</th>
		<th>Perkiraan Harga Barang</th>
		<th>Jumlah</th>
		<th>Terbeli</th>
	</thead>
	<tbody>
		@foreach ($data->rencana_pembelian_d as $val)
			<tr>
				<td>{{ $val->barang->b_nama }}</td>
				<td align="right">{{ number_format($val->barang->b_harga_tertinggi, 2, ",", ".") }}</td>
				<td>{{ $val->rpd_jumlah }}</td>
				<td>{{ $val->rpd_jumlah - $val->rpd_sisa }}</td>
			</tr>
		@endforeach
	</tbody>
</table>

<script type="text/javascript">
	$('.table_detail').DataTable();
</script>