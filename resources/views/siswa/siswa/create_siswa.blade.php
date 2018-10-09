@extends('main')
@section('content')

<!-- partial -->
<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12"> 
      <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb bg-info">
          <li class="breadcrumb-item"><i class="fa fa-home"></i>&nbsp;<a href="#">Home</a></li>
          <li class="breadcrumb-item">Kas Keluar</li>
          <li class="breadcrumb-item" aria-current="page">Bukti Kas Keluar</li>
          <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
        </ol>
      </nav>
    </div>
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">PENERIMAAN SISWA BARU</h4>
          <div class="row" style="margin-bottom: 50px">
            <div class="card col-lg-12">
              <div class="card-header bg-gradient-info text-white">
                <b>1. DATA SISWA</b>
              </div>
              <div class="card-body">
                <table class="table table-hover no-border">
                  <tr>
                    <th>NAMA LENGKAP</th>
                    <td>
                      <input type="text" name="sdd_nama" class="sdd_nama form-control wajib">
                    </td>
                  </tr>
                  <tr>
                    <th>NAMA PANGGILAN</th>
                    <td>
                      <input type="text" name="sdd_panggilan" class="sdd_panggilan form-control wajib">
                    </td>
                  </tr>
                  <tr>
                    <th>JENIS KELAMIN</th>
                    <td>
                      <input type="text" name="sdd_jenis_kelamin" class="sdd_jenis_kelamin form-control wajib">
                    </td>
                  </tr>
                  <tr>
                    <th>TEMPAT LAHIR</th>
                    <td>
                      <input type="text" name="sdd_tempat_lahir" class="sdd_tempat_lahir form-control wajib">
                    </td>
                  </tr>
                  <tr>
                    <th>TANGGAL LAHIR</th>
                    <td>
                      <input type="text" name="sdd_tanggal_lahir" class="sdd_tanggal_lahir date form-control wajib">
                    </td>
                  </tr>
                  <tr>
                    <th>AGAMA</th>
                    <td>
                      <select class="form-control option" class="sdd_agama">
                        <option value="ISLAM">ISLAM</option>
                        <option value="KRISTEN">KRISTEN</option>
                        <option value="KATHOLIK">KATHOLIK</option>
                        <option value="HINDU">HINDU</option>
                        <option value="BUDHA">BUDHA</option>
                        <option value="KONG_HU_CU">KONG HU CU</option>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <th>KEWARGANEGARAAN</th>
                    <td>
                      <input type="text" name="sdd_kewarganegaraan" class="sdd_kewarganegaraan form-control wajib">
                    </td>
                  </tr>
                  <tr>
                    <th>ANAK KE</th>
                    <td>
                      <input type="text" name="sdd_urutan_anak" class="sdd_urutan_anak hanya_angka form-control wajib">
                    </td>
                  </tr>
                  <tr>
                    <th>ANAK KE</th>
                    <td>
                      <input type="text" name="sdd_urutan_anak" class="sdd_urutan_anak hanya_angka form-control wajib">
                    </td>
                  </tr>
                </table>
              </div>
            </div>
            <div class="card col-lg-12">
              <div class="card-header bg-gradient-info text-white">
                <b>2. PENDIDIKAN</b>
              </div>
              <div class="card-body">
                <table class="table table-hover no-border">
                  <tr>
                    <th>NAMA LENGKAP</th>
                    <td>
                      <input type="text" name="sdd_nama" class="sdd_nama form-control wajib">
                    </td>
                  </tr>
                  <tr>
                    <th>NAMA PANGGILAN</th>
                    <td>
                      <input type="text" name="sdd_panggilan" class="sdd_panggilan form-control wajib">
                    </td>
                  </tr>
                  <tr>
                    <th>JENIS KELAMIN</th>
                    <td>
                      <input type="text" name="sdd_jenis_kelamin" class="sdd_jenis_kelamin form-control wajib">
                    </td>
                  </tr>
                  <tr>
                    <th>TEMPAT LAHIR</th>
                    <td>
                      <input type="text" name="sdd_tempat_lahir" class="sdd_tempat_lahir form-control wajib">
                    </td>
                  </tr>
                  <tr>
                    <th>TANGGAL LAHIR</th>
                    <td>
                      <input type="text" name="sdd_tanggal_lahir" class="sdd_tanggal_lahir date form-control wajib">
                    </td>
                  </tr>
                  <tr>
                    <th>AGAMA</th>
                    <td>
                      <select class="form-control option" class="sdd_agama">
                        <option value="ISLAM">ISLAM</option>
                        <option value="KRISTEN">KRISTEN</option>
                        <option value="KATHOLIK">KATHOLIK</option>
                        <option value="HINDU">HINDU</option>
                        <option value="BUDHA">BUDHA</option>
                        <option value="KONG_HU_CU">KONG HU CU</option>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <th>KEWARGANEGARAAN</th>
                    <td>
                      <input type="text" name="sdd_kewarganegaraan" class="sdd_kewarganegaraan form-control wajib">
                    </td>
                  </tr>
                  <tr>
                    <th>ANAK KE</th>
                    <td>
                      <input type="text" name="sdd_urutan_anak" class="sdd_urutan_anak hanya_angka form-control wajib">
                    </td>
                  </tr>
                  <tr>
                    <th>ANAK KE</th>
                    <td>
                      <input type="text" name="sdd_urutan_anak" class="sdd_urutan_anak hanya_angka form-control wajib">
                    </td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="modal_pemasukan_kas" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg" style="width: 60% !important">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-gradient-info">
        <h4 class="modal-title">Pilih PEMASUKAN KAS</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row table_append">
            
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- content-wrapper ends -->
@endsection
@section('extra_script')
<script>
  $('.date').datepicker();
</script>
@endsection