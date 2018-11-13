<!-- Modal -->
<div id="tambah-jabatan" class="modal fade" role="dialog">
  <div class="modal-dialog modal-m">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-gradient-info">
        <h4 class="modal-title">Form Setting Level Account</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">
            <table class="table tabel_modal">
              <tr>
                <td>Nama Posisi</td>
                <td>
                  <input type="text" name="p_nama"  placeholder="Posisi" class="p_nama huruf_besar form-control form-control-sm">
                  <input type="hidden" name="id" class="id">
                </td>
              </tr>
           {{--    <tr>
                <td>Gaji</td>
                <td><input type="text" name="p_gaji" placeholder="Gaji" class="p_gaji huruf_besar form-control form-control-sm"></td>
              </tr> --}}
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