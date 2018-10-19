<!-- Modal -->
<div id="tambah-kelas" class="modal fade" role="dialog">
  <div class="modal-dialog modal-m">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-gradient-info">
        <h4 class="modal-title">Form Kelas</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">
            <table class="table tabel_modal">
              <tr>
                <td>Nama Kelas</td>
                <td>
                  <input type="text" name="k_nama"  placeholder="Harus diisi" class="wajib k_nama huruf_besar form-control form-control-sm">
                  <input type="hidden" name="id" class="id">
                </td>
              </tr>
              <tr>
                <td>Keterangan</td>
                <td>
                  <input type="text" name="k_keterangan"  placeholder="Harus diisi" class="wajib k_keterangan huruf_besar form-control form-control-sm">
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