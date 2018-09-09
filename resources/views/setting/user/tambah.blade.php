<!-- Modal -->
<div id="tambah-akun" class="modal fade" role="dialog">
  <div class="modal-dialog modal-m">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-gradient-info">
        <h4 class="modal-title">Form Tambah User</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">
            <table class="table tabel_modal">
              <tr>
                <td>Username</td>
                <td>
                  {{ csrf_field() }}
                  {{-- <input type="hidden" name="_token" class="token" value=""> --}}
                  <input type="text" name="username"  placeholder="username" class="username wajib form-control form-control-sm">
                  <input type="hidden" name="id" class="id " >
                </td>
              </tr>
              <tr>
                <td>Password</td>
                <td>
                  <input type="text" name="password" placeholder="password" class="password wajib form-control form-control-sm">
                </td>
              </tr>
              <tr>
                <td>Email</td>
                <td>
                  <input type="email" name="email" placeholder="email" class="email form-control wajib form-control-sm">
                </td>
              </tr>
              <tr>
                <td>Nama</td>
                <td>
                  <input type="text" name="name" placeholder="nama" class="nama huruf_besar wajib form-control form-control-sm">
                </td>
              </tr>
              <tr>
                <td>Jabatan</td>
                <td class="level_td">
                  <select class="level form-control option " name="jabatan_id">
                    <option selected="" value="">Choose - Level</option>
                    @foreach($jabatan as $val)
                      <option value="{{$val->j_id}}">{{$val->j_nama}}</option>
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
