<!-- Modal -->
<div id="tambah-akun" class="modal fade" role="dialog">
  <div class="modal-dialog modal-m">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-gradient-info">
        <h4 class="modal-title">Group Akun</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">
            <table class="table tabel_modal">
              <tr>
                <td>Nama Group</td>
                <td>
                  <input type="text" name="ga_nama" placeholder="Nama Group" class="ga_nama huruf_besar form-control wajib form-control-sm">
                </td>
              </tr>
              <tr>
                <td>Jenis Group</td>
                <td colspan="2">
                  <select class="form-control ga_jenis_group option" name="ga_jenis_group">
                    <option selected="" value="">Pilih - Group</option>
                    <option value="neraca">NERACA (Balance Sheet)</option>
                    <option value="labarugi">LABA/RUGI</option>
                  </select>
                </td>
              </tr>
              <tr class="group_neraca ">
                <td>Type Group Neraca</td>
                <td colspan="2">
                  <select class="form-control ga_jenis_neraca" name="ga_jenis_neraca">
                    <option value="A">Aset</option>
                    <option value="L">Liabilitas</option>
                  </select>
                </td>
              </tr>
              <tr class="">
                <td><i style="color: red" class="count_akun">0 Akun Ditambahkan</i></td>
                <td colspan="2" align="center">
                  <button class="btn btn-success tambah_akun">Tambah Akun</button>
                </td>
              </tr>
            </table>
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
  <div class="modal-dialog modal-lg" style="width: 50% !important">
    <!-- Modal content-->
    <div class="modal-content" style="background: white !important">
      <div class="modal-header bg-gradient-info">
        <h4 class="modal-title">Master Akun</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-sm-6">
              <div class="input-group input-group-sm">
                <span class="input-group-addon" id="sizing-addon3"><i class="fa fa-search"></i></span>
                  <input type="text" class="form-control form-sm" placeholder="Kata Kunci" id="list_akun_search_keyword">
              </div>
            </div>
            <div class="col-sm-12 append_table_akun" style="overflow-y: scroll;">
              
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary selesai" data-dismiss="modal" >Selesai</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div id="tambah-akun2" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-gradient-info">
        <h4 class="modal-title">Edit Group Akun</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row append_table_akun1">
          
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary update" >Update Data</button>
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>