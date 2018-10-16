<!-- Modal -->
<div id="bayar_spp" class="modal fade" role="dialog">
  <div class="modal-dialog modal-m">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-gradient-info">
        <h4 class="modal-title">Form Pembayaran SPP</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">
            <table class="table tabel_modal">
              <tr>
                <td>Nota SPP</td>
                <td colspan="2">
                  <input readonly="" type="text" placeholder="Harus diisi" name="hs_nota" class="huruf_besar hs_nota form-control form-control-sm">
                </td>
              </tr>
              <tr>
                <td>Nama Siswa</td>
                <td colspan="2">
                  <input readonly="" type="text" placeholder="Harus diisi" class="huruf_besar sdd_nama form-control form-control-sm">
                  <input type="hidden" name="id" class="id">
                  <input type="hidden" name="detail" class="detail">
                </td>
              </tr>
              <tr>
                <td>Bulan SPP</td>
                <td><input readonly="" type="text" name="hs_bulan" placeholder="Harus diisi" class="hs_bulan huruf_besar form-control form-control-sm"></td>
                <td><input readonly="" type="text" name="hs_tahun" placeholder="Harus diisi" class="hs_tahun huruf_besar form-control form-control-sm"></td>
              </tr>
              <tr>
                <td>Golongan SPP</td>
                <td colspan="2"><input readonly="" type="text" name="sdd_group_spp" placeholder="Harus diisi" class="sdd_group_spp mask huruf_besar form-control form-control-sm"></td>
              </tr>
              <tr>
                <td>Jumlah SPP</td>
                <td colspan="2"><input readonly="" type="text" name="hs_jumlah" placeholder="Harus diisi" class="hs_jumlah huruf_besar form-control form-control-sm"></td>
              </tr>
              <tr>
                <td>Keterangan</td>
                <td colspan="2">
                  <input type="text" name="hs_keterangan"  placeholder="Harus diisi" class="hs_keterangan huruf_besar form-control form-control-sm">
                </td>
              </tr>
              <tr>
                <td>Akun Kas</td>
                <td colspan="2">
                  <select class="form-control option hs_akun_kas" name="hs_akun_kas">
                    <option value="">Pilih - Akun Biaya</option>
                    @foreach($akun_kas as $val)
                      <option @if ($val->a_master_akun == '11110')
                        selected="" 
                      @endif value="{{$val->a_master_akun}}">{{$val->a_master_akun}} - {{$val->a_master_nama}}</option>
                    @endforeach
                  </select>
                </td>
              </tr>
              <tr>
                <td>Akun</td>
                <td colspan="2">
                  <select class="form-control option hs_akun" name="hs_akun">
                    <option value="">Pilih - Akun Biaya</option>
                    @foreach($akun as $val)
                      <option @if ($val->a_master_akun == '41130')
                        selected="" 
                      @endif value="{{$val->a_master_akun}}">{{$val->a_master_akun}} - {{$val->a_master_nama}}</option>
                    @endforeach
                  </select>
                </td>
              </tr>
            </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary simpan" onclick="simpan_spp()">Save Data</button>
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>