<table class="table table-bordered table_detail table-hover" style="background: white">
	<thead style="background: grey;color: white">
		<th>Kode Rencana</th>
		<th>Tahun</th>
		<th>Perkiraan Total Harga</th>
		<th>Keterangan</th>
	</thead>
	<tbody>
		@foreach ($data as $val)
			<tr style="cursor: pointer;" onclick="pilih('{{ $val->rp_kode }}')" data-dismiss="modal">
				<td>{{ $val->rp_kode }}</td>
				<td align="right">{{ $val->rp_tahun }}</td>
				<td>{{ number_format($val->rp_total, 2, ",", ".") }}</td>
				<td>{{ $val->rp_keterangan }}</td>
			</tr>
		@endforeach
	</tbody>
</table>

<script type="text/javascript">
	$('.table_detail').DataTable();
</script>