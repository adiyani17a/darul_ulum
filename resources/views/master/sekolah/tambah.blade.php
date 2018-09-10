<!-- Modal -->
<div id="tambah-akun" class="modal fade" role="dialog">
  <div class="modal-dialog modal-m">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-gradient-info">
        <h4 class="modal-title">Form Sekolah</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">
            <table class="table tabel_modal">
              <tr>
                <td>Nama Sekolah</td>
                <td>
                  {{ csrf_field() }}
                  {{-- <input type="hidden" name="_token" class="token" value=""> --}}
                  <input type="text" name="s_nama"  placeholder="Nama Sekolah" class="s_nama wajib huruf_besar form-control form-control-sm">
                  <input type="hidden" name="id" class="id " >
                </td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td>
                  <input type="text" name="s_alamat" placeholder="Alamat" class="s_alamat wajib form-control huruf_besar form-control-sm">
                </td>
              </tr>
              <tr>
                <td>Telpon</td>
                <td>
                  <input type="text" name="s_telpon" placeholder="Telpon" class="s_telpon form-control wajib form-control-sm">
                </td>
              </tr>
              <tr>
                <td>Logo</td>
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
