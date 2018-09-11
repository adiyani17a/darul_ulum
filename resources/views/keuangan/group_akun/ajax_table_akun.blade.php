@if ($flag == 'create')
<table class="table tabel_akun table-bordered table-hover">
  <thead class="bg-gradient-info">
    <tr>
      <th>Aksi</th>
      <th>Kode Akun</th>
      <th>Nama Akun</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($akun as $val)
    <tr>
      <td>
        @if (in_array($val->a_master_akun, $simpan_akun))
          <input checked="" type="checkbox" class="a_id_check form-control">
        @else
          <input type="checkbox" class="a_id_check form-control">
        @endif
        <input type="hidden" class="a_id" name="a_id" value="{{ $val->a_master_akun }}">
      </td>
      <td>{{ $val->a_master_akun }}</td>
      <td>{{ $val->a_master_nama }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
@elseif($flag == 'lihat')
<table class="table tabel_akun table-bordered table-hover">
  <thead class="bg-gradient-info">
    <tr>
      <th>Kode Akun</th>
      <th>Nama Akun</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($akun as $val)
    <tr>
      <td>{{ $val->a_master_akun }}</td>
      <td>{{ $val->a_master_nama }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
@endif


<script type="text/javascript">
  $('.tabel_akun').DataTable({
    searching:false,
    paging:false,
  });
</script>