<!-- Modal -->
<div id="tambah-akun" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-gradient-info">
        <h4 class="modal-title">Form Akun</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-6" >
            <table class="table group_a">
              <tr>
                <td>Kode Akun</td>
                <td>
                  <input type="text"  class="a_id1 form-control hanya_angka wajib tengah" name="a_id1">
                  <input type="hidden" class="id" name="id">
                </td>
                <td>
                  <input readonly="" type="text" class="a_id2 form-control" name="a_id2">
                </td>
              </tr>
              <tr>
                <td>Nama Akun</td>
                <td>
                  <input type="text"  class="a_nama1 huruf_besar form-control wajib tengah" name="a_nama1">
                </td>
                <td>
                  <input readonly="" type="text" class="a_nama2 form-control" name="a_nama2">
                </td>
              </tr>
              <tr>
                <td>Posisi D/K</td>
                <td colspan="2">
                  <select class="form-control a_akun_dka option" name="a_akun_dka">
                    <option value="">Pilih - Posisi</option>
                    <option value="DEBET">DEBET</option>
                    <option value="KREDIT">KREDIT</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td>Status Aktif</td>
                <td colspan="2">
                  <select class="form-control a_aktif option" name="a_aktif">
                    <option value="">Pilih - Status</option>
                    <option value="Y">YA</option>
                    <option value="N">TIDAK</option>
                  </select>
                </td>
              </tr>
            </table>
          </div>
          <div class="col-sm-6" >
            <table class="table group_b">
              <tr>
                <td>Sekolah</td>
                <td colspan="2">
                  <select class="form-control a_sekolah option" name="a_sekolah">
                    <option value="">Pilih - Sekolah</option>
                    <option value="all">Semua - Sekolah</option>
                    @foreach ($sekolah as $val)
                    <option value="{{ $val->s_id }}">{{ $val->s_nama }}</option>
                    @endforeach
                  </select>
                </td>
              </tr>
              <tr>
                <td>Saldo Awal</td>
                <td>
                  <input type="text"  class="a_saldo_awal form-control wajib" name="a_saldo_awal">
                </td>
              </tr>
              <tr>
                <td>Bulan Pembuka</td>
                <td >
                  <input type="text" class="a_tanggal_pembuka form-control date wajib" name="a_tanggal_pembuka">
                </td>
              </tr>
              <tr>
                <td>
                  Group Neraca
                </td>
                <td colspan="2">
                  <select class="form-control  a_group_neraca" name="a_group_neraca">
                    <option value="">Pilih - Neraca</option>
                    @foreach ($neraca as $val)
                      <option value="{{ $val->ga_id }}">{{ $val->ga_nama }}</option>
                    @endforeach
                  </select>
                </td>
              </tr>
              <tr>
                <td>
                  Group Laba Rugi
                </td>
                <td>
                  <select class="form-control  a_group_laba_rugi" name="a_group_laba_rugi">
                    <option value="">Pilih - Laba/Rugi</option>
                    @foreach ($laba_rugi as $val)
                      <option value="{{ $val->ga_id }}">{{ $val->ga_nama }}</option>
                    @endforeach
                  </select>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary simpan" >Save Data</button>
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div id="tambah-akun1" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-gradient-info">
        <h4 class="modal-title">Form Akun</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-6" >
            <table class="table group_a_e">
              <tr>
                <td>Kode Akun</td>
                <td colspan="2">
                  <input type="text" readonly="" class="e_id1 form-control hanye_angka wajib tengah" name="e_id1">
                  <input type="hidden" class="id" name="id">
                </td>
              </tr>
              <tr>
                <td>Nama Akun</td>
                <td colspan="2">
                  <input type="text"  class="e_nama1 huruf_besar form-control wajib tengah" name="e_nama1">
                </td>
              </tr>
              <tr>
                <td>Posisi D/K</td>
                <td colspan="2">
                  <select class="form-control e_akun_dka option" name="e_akun_dka">
                    <option value="DEBET">DEBET</option>
                    <option value="KREDIT">KREDIT</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td>Status Aktif</td>
                <td colspan="2">
                  <select class="form-control e_aktif option" name="e_aktif">
                    <option value="Y">YA</option>
                    <option value="N">TIDAK</option>
                  </select>
                </td>
              </tr>
            </table>
          </div>
          <div class="col-sm-6" >
            <table class="table group_b_e">
              <tr>
                <td>Sekolah</td>
                <td colspan="2" class="disabled">
                  <select class="form-control e_sekolah option" name="e_sekolah">
                    <option value="">Pilih - Sekolah</option>
                    <option value="all">Semua - Sekolah</option>
                    @foreach ($sekolah as $val)
                    <option value="{{ $val->s_id }}">{{ $val->s_nama }}</option>
                    @endforeach
                  </select>
                </td>
              </tr>
              <tr>
                <td>Saldo Awal</td>
                <td>
                  <input type="text"  class="e_saldo_awal form-control wajib" name="e_saldo_awal">
                </td>
              </tr>
              <tr>
                <td>Bulan Pembuka</td>
                <td >
                  <input type="text" class="e_tanggal_pembuka form-control date wajib" name="e_tanggal_pembuka">
                </td>
              </tr>
              <tr>
                <td>
                  Group Neraca
                </td>
                <td colspan="2">
                  <select class="form-control  e_group_neraca" name="e_group_neraca">
                    <option value="">Pilih - Neraca</option>
                    @foreach ($neraca as $val)
                      <option value="{{ $val->ga_id }}">{{ $val->ga_nama }}</option>
                    @endforeach
                  </select>
                </td>
              </tr>
              <tr>
                <td>
                  Group Laba Rugi
                </td>
                <td>
                  <select class="form-control  e_group_laba_rugi" name="e_group_laba_rugi">
                    <option value="">Pilih - Laba/Rugi</option>
                    @foreach ($laba_rugi as $val)
                      <option value="{{ $val->ga_id }}">{{ $val->ga_nama }}</option>
                    @endforeach
                  </select>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary update" >Update Data</button>
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
