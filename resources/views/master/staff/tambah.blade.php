<!-- Modal -->
<div id="tambah-akun" class="modal fade" role="dialog">
  <div class="modal-dialog modal-m">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-gradient-info">
        <h4 class="modal-title">Form Staff</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">
            <table class="table tabel_modal">
              <tr>
                <td>Nama</td>
                <td>
                  {{ csrf_field() }}
                  {{-- <input type="hidden" name="_token" class="token" value=""> --}}
                  <input type="text" name="st_nama"  placeholder="nama" class="st_nama wajib form-control form-control-sm">
                  <input type="hidden" name="id" class="id " >
                </td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td>
                  <input type="text" name="st_alamat" placeholder="alamat" class="st_alamat wajib form-control form-control-sm">
                </td>
              </tr>
              <tr>
                <td>Tempat Lahir</td>
                <td>
                  <input type="text" name="st_tempat_lahir" placeholder="tempat lahir" class="st_tempat_lahir form-control wajib form-control-sm">
                </td>
              </tr>
              <tr>
                <td>Tanggal Lahir</td>
                <td>
                  <input type="text" name="st_tanggal_lahir" placeholder="tanggal lahir" class="st_tanggal_lahir date form-control wajib form-control-sm">
                </td>
              </tr>
              <tr>
                <td>Telpon</td>
                <td>
                  <input type="text" name="st_telpon" placeholder="telpon" class="st_telpon wajib form-control form-control-sm">
                </td>
              </tr>
              <tr>
                <td>Posisi</td>
                <td class="level_td">
                  <select class="st_posisi form-control option " name="st_posisi">
                    <option selected="" value="">Pilih - Posisi</option>
                    @foreach($posisi as $val)
                      <option value="{{$val->p_id}}">{{$val->p_nama}}</option>
                    @endforeach
                  </select>
                </td>
              </tr>
              <tr>
                <td>Foto</td>
                <td>
                  <div class="file-upload">
                    <div class="file-select">
                      <div class="file-select-button" id="fileName">Image</div>
                      <div class="file-select-name" id="noFile">Choose Image...</div> 
                      <input type="file" name="image" onchange="loadFile(event)" id="chooseFile">
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <td>Preview</td>
                <td align="center">
                  <div class="preview_td">
                      <img style="width: 100px;height: 100px;border:1px solid pink" id="output" >
                  </div>
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
