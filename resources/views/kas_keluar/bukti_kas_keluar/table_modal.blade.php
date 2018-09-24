<table class="table table-bordered table_detail table-hover" style="background: white">
	<thead style="background: grey;color: white">
		<th>Petty Cash</th>
		<th>Tanggal</th>
		<th>Total Petty Cash</th>
		<th>Keterangan</th>
		<th>Pemohon</th>
	</thead>
	<tbody>
		@foreach ($data as $val)
			<tr style="cursor: pointer;" onclick="pilih('{{ $val->pc_nota }}')" data-dismiss="modal">
				<td>{{ $val->pc_nota }}</td>
				<td>{{ $val->created_at }}</td>
				<td align="right">{{ number_format($val->pc_total, 2, ",", ".") }}</td>
				<td>{{ $val->pc_keterangan }}</td>
				<td>{{ $val->pc_pemohon }}</td>
			</tr>
		@endforeach
	</tbody>
</table>

<script type="text/javascript">
	$('.table_detail').DataTable();
</script>