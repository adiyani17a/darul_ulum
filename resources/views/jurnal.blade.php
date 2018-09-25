<table class="table table-bordered" style="background: white">
	<thead class="bg-gradient-info">
		<tr>
			<th>Kode AKun</th>
			<th>Nama Akun</th>
			<th>DEBET</th>
			<th>KREDIT</th>
		</tr>
	</thead>
	<tbody>
		@if ($data != null)
			@foreach($data->jurnal_dt as $data)
			<tr>
				<td>{{ $data->jd_akun }}</td>
				<td>{{ $data->jd_keterangan }}</td>
				<td align="right">@if($data->jd_statusdk == 'DEBET')
					@if ($data->jd_value<0)
					{{ number_format($data->jd_value*-1, 2, ",", ".") }}  
					@else
					{{ number_format($data->jd_value, 2, ",", ".") }}  
					@endif
				@endif</td>
				<td align="right">@if($data->jd_statusdk == 'KREDIT')
					@if ($data->jd_value<0)
					{{ number_format($data->jd_value*-1, 2, ",", ".") }}  
					@else
					{{ number_format($data->jd_value, 2, ",", ".") }}  
					@endif
				@endif</td>
			</tr>
			@endforeach
			<tr>
				<td colspan="2">Total</td>
				<td align="right" colspan="1">{{ number_format($d, 2, ",", ".") }}</td>
				<td align="right" colspan="1">{{ number_format($k, 2, ",", ".") }}</td>
			</tr>
		@else
		<tr>
			<td colspan="4" align="center">Tidak Terdapat Jurnal</td>
		</tr>
		@endif
	</tbody>
</table>