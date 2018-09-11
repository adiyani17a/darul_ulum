<div class="col-sm-6">
  <table class="table tabel_modal1">
    <tr>
      <td>Nama Group</td>
      <td>
        <input type="text" name="ga_nama" placeholder="Nama Group" value="{{ $group_akun->ga_nama }}" class="ga_nama1 huruf_besar form-control form-control-sm">
        <input type="hidden" name="ga_id" placeholder="Nama Group" value="{{ $group_akun->ga_id }}" class="ga_id huruf_besar form-control form-control-sm">
      </td>
    </tr>
    <tr>
      <td>Jenis Group</td>
      <td colspan="2">
        <select class="form-control ga_jenis_group1 " name="ga_jenis_group">
          <option value="">Pilih - Group</option>
          <option @if ($group_akun->ga_jenis_group == 'neraca')
            selected="" 
          @endif value="neraca">NERACA (Balance Sheet)</option>
          <option @if ($group_akun->ga_jenis_group == 'labarugi')
            selected="" 
          @endif value="labarugi">LABA/RUGI</option>
        </select>
      </td>
    </tr>

    <tr class="group_neraca1" @if ($group_akun->ga_jenis_group != 'neraca')
      hidden="" 
      @endif>
      <td>Type Group Neraca</td>
      <td colspan="2">
        <select class="form-control  ga_jenis_neraca1" name="ga_jenis_neraca">
          <option selected="" value="">Pilih - Group Neraca</option>
          <option @if ($group_akun->ga_jenis_neraca == 'A')
            selected="" 
          @endif value="A">Aset</option>
          <option @if ($group_akun->ga_jenis_neraca == 'L')
            selected="" 
          @endif value="L">Liabilitas</option>
        </select>
      </td>
    </tr>
  </table>
</div>
<div class="col-sm-6" >
  <div class="col-sm-6">
    <div class="input-group input-group-sm" style="margin-bottom: 10px;">
      <span class="input-group-addon" id="sizing-addon3"><i class="fa fa-search"></i></span>
        <input type="text" class="form-control form-sm" placeholder="Kata Kunci" id="list_akun_search_keyword" >
    </div>
  </div>
  <div class="col-sm-12" style="overflow-y: scroll;max-height: 300px">
    <table class="table tabel_akun table-bordered table-hover" style="background:white;">
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
            @if (in_array($val->a_master_akun, $data))
              <input checked="" type="checkbox" class="a_id_check_edit form-control">
            @else
              <input type="checkbox" class="a_id_check_edit form-control">
            @endif
            <input type="hidden" class="a_id1" name="a_id" value="{{ $val->a_master_akun }}">
          </td>
          <td>{{ $val->a_master_akun }}</td>
          <td>{{ $val->a_master_nama }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>