@extends('main')
@section('content')
<style type="text/css">
.no-border td,th{
  border: none !important;
  color: grey;
}
</style>
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
    <form id="save">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title pull-left">PENERIMAAN SISWA BARU</h4>
            <button style="margin-left: 10px;" type="button" class="btn btn-success simpan pull-right" onclick="simpan_data()"><i class="fa fa-save" ></i>&nbsp;&nbsp;Simpan</button>
            <a  href="{{ url('penerimaan/rekap_siswa') }}"><button type="button" class="btn btn-warning btn_modal pull-right" data-toggle="modal" data-target="#tambah-akun"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Kembali</button></a>
          </div>
          <div class="card-body">
            <div class="row" style="margin-bottom: 50px">
              <div class="card col-lg-12">
                <div class="card-header bg-gradient-info text-white">
                  <b>INFORMASI SEKOLAH</b>
                </div>
                <div class="card-body">
                  <table class="table table-hover no-border data_sekolah">
                    <tr>
                      <td width="474px">Group SPP</td>
                      <td>
                        <select class="sdd_group_spp form-control option" name="sdd_group_spp">
                          <option value="">Pillih - Data</option>
                          @foreach ($group_spp as $val)
                            <option @if ($data->sdd_group_spp == $val->gs_id)
                              selected
                            @endif value="{{ $val->gs_id }}">{{ $val->gs_nama }} ( Rp. {{ number_format($val->gs_nilai,0,',','.')}} )</option>
                          @endforeach
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>Tahun Ajaran</td>
                      <td>
                        <select class="sdd_tahun_ajaran form-control option" name="sdd_tahun_ajaran">
                          <option value="">Pillih - Data</option>
                          @foreach ($additionalData['tahun_ajaran'] as $i=>$val)
                            <option @if ($data->sdd_tahun_ajaran == $additionalData['tahun_ajaran'][$i])
                              selected="" 
                            @endif value="{{ $additionalData['tahun_ajaran'][$i] }}">{{$additionalData['tahun_ajaran'][$i]}}</option>
                          @endforeach
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>NIS</td>
                      <td>
                        <input maxlength="50" type="text" value="{{ $data->sdd_nomor_induk }}" placeholder="Untuk Sementara Masih Manual" class="form-control sdd_nomor_induk wajib" name="sdd_nomor_induk">
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
              <div class="card col-lg-12">
                <div class="card-header bg-gradient-info text-white">
                  <b>1. DATA SISWA</b>
                </div>
                <div class="card-body">
                  <table class="table table-hover no-border data_siswa">
                    <tr>
                      <td align="left">
                        <div class="preview_td">
                            <img src="{{ asset('storage/uploads/data_siswa/original') }}/{{ $data->sdd_image }}" style="width: 150px;height: 170px;border:1px solid pink;border-radius: 0" id="output" >
                        </div>
                      </td>
                      <td>
                        <div class="file-upload active">
                          <div class="file-select">
                            <div class="file-select-button" id="fileName">Image</div>
                            <div class="file-select-name" id="noFile">{{ $data->sdd_image }}</div> 
                            <input type="file" name="image" onchange="loadFile(event)" id="chooseFile">
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <th>NAMA LENGKAP</th>
                      <td>
                        <input type="text" value="{{ $data->sdd_nama }}" name="sdd_nama" class="sdd_nama form-control wajib">
                        <input type="hidden" value="{{ $data->sdd_id }}" name="id" class="id form-control wajib">
                      </td>
                    </tr>
                    <tr>
                      <th>NAMA PANGGILAN</th>
                      <td>
                        <input type="text" value="{{ $data->sdd_panggilan }}" name="sdd_panggilan" class="sdd_panggilan form-control wajib">
                      </td>
                    </tr>
                    <tr>
                      <th>NOMOR INDUK SISWA NASIONAL</th>
                      <td>
                        <input maxlength="10" type="text" value="{{ $data->sdd_nomor_induk_nasional }}" name="sdd_nomor_induk_nasional" class="sdd_nomor_induk_nasional form-control wajib">
                      </td>
                    </tr>
                    <tr>
                      <th>JENIS KELAMIN</th>
                      <td>
                        <select class="form-control option sdd_jenis_kelamin" name="sdd_jenis_kelamin">
                          <option value="">Pilih - Data</option>
                          <option @if ($data->sdd_jenis_kelamin == 'L')
                            selected="" 
                          @endif value="L">Laki</option>
                          <option @if ($data->sdd_jenis_kelamin == 'P')
                            selected="" 
                          @endif value="P">Perempuan</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <th>TEMPAT LAHIR</th>
                      <td>
                        <input value="{{ $data->sdd_tempat_lahir }}"  type="text" name="sdd_tempat_lahir" class="sdd_tempat_lahir form-control wajib">
                      </td>
                    </tr>
                    <tr>
                      <th>TANGGAL LAHIR</th>
                      <td>
                        <input value="{{ carbon\carbon::parse($data->sdd_tanggal_lahir)->format('d/m/Y') }}" type="text" name="sdd_tanggal_lahir" class="sdd_tanggal_lahir date form-control wajib">
                      </td>
                    </tr>
                    <tr>
                      <th>AGAMA</th>
                      <td>
                        <select class="form-control option sdd_agama" name="sdd_agama">
                          <option value="">Pilih - Data</option>
                          <option @if ($data->sdd_agama == 'ISLAM')
                            selected="" 
                          @endif value="ISLAM">ISLAM</option>
                          <option @if ($data->sdd_agama == 'KRISTEN')
                            selected="" 
                          @endif value="KRISTEN">KRISTEN</option>
                          <option @if ($data->sdd_agama == 'KATHOLIK')
                            selected="" 
                          @endif  value="KATHOLIK">KATHOLIK</option>
                          <option @if ($data->sdd_agama == 'HINDU')
                            selected="" 
                          @endif  value="HINDU">HINDU</option>
                          <option @if ($data->sdd_agama == 'BUDHA')
                            selected="" 
                          @endif  value="BUDHA">BUDHA</option>
                          <option @if ($data->sdd_agama == 'KONG_HU_CU')
                            selected="" 
                          @endif  value="KONG_HU_CU">KONG HU CU</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <th>KEWARGANEGARAAN</th>
                      <td>
                        <input value="{{ $data->sdd_kewarganegaraan }}" type="text" name="sdd_kewarganegaraan" class="sdd_kewarganegaraan form-control wajib">
                      </td>
                    </tr>
                    <tr>
                      <th>ANAK KE</th>
                      <td>
                        <input value="{{ $data->sdd_urutan_anak }}" type="text" name="sdd_urutan_anak" class="sdd_urutan_anak hanya_angka form-control wajib">
                      </td>
                    </tr>
                    <tr>
                      <th>JUMLAH SAUDARA</th>
                      <td>
                        <input value="{{ $data->sdd_saudara_kandung }}" type="text" name="sdd_saudara_kandung" class="sdd_saudara_kandung hanya_angka form-control wajib">
                      </td>
                    </tr>
                    <tr>
                      <th>BAHASA SEHARI HARI</th>
                      <td>
                        <input value="{{ $data->sdd_bahasa }}" type="text" name="sdd_bahasa" class="sdd_bahasa form-control wajib">
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
              <div class="card col-lg-12">
                <div class="card-header bg-gradient-info text-white ">
                  <b>2. TEMPAT TINGGAL</b>
                </div>
                <div class="card-body">
                  <table class="table table-hover no-border tempat_tinggal">
                    <tr>
                      <th>ALAMAT</th>
                      <td>
                        <input value="{{ $data->siswa_tempat_tinggal[0]->stt_alamat }}" type="text" name="stt_alamat" class="stt_alamat form-control wajib">
                      </td>
                    </tr>
                    <tr>
                      <th>NOMOR TELPON</th>
                      <td>
                        <input value="{{ $data->siswa_tempat_tinggal[0]->stt_no_telp }}" type="text" name="stt_no_telp" class="stt_no_telp hanya_angka form-control wajib">
                      </td>
                    </tr>
                    <tr>
                      <th>TINGGAL DENGAN</th>
                      <td>
                       <select class="form-control option stt_status_tempat_tinggal" name="stt_status_tempat_tinggal">
                          <option value="">Pilih - Data</option>
                          <option @if ($data->siswa_tempat_tinggal[0]->stt_status_tempat_tinggal == 'ORANG TUA')
                            selected="" 
                          @endif value="ORANG TUA">ORANG TUA</option>
                          <option @if ($data->siswa_tempat_tinggal[0]->stt_status_tempat_tinggal == 'KONTRAK')
                            selected="" 
                          @endif value="KRISTEN">KONTRAK</option>
                          <option @if ($data->siswa_tempat_tinggal[0]->stt_status_tempat_tinggal == 'KOS')
                            selected="" 
                          @endif value="KOS">KOS</option>
                          <option @if ($data->siswa_tempat_tinggal[0]->stt_status_tempat_tinggal == 'RUMAH SENDIRI')
                            selected="" 
                          @endif value="RUMAH SENDIRI">RUMAH SENDIRI</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <th>JARAK KE SEKOLAH</th>
                      <td>
                        <input value="{{ $data->siswa_tempat_tinggal[0]->stt_jarak_rumah }}" type="text" name="stt_jarak_rumah" class="stt_jarak_rumah hanya_angka form-control wajib">
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
              <div class="card col-lg-12">
                <div class="card-header bg-gradient-info text-white">
                  <b>3. KESEHATAN</b>
                </div>
                <div class="card-body">
                  <table class="table no-border kesehatan">
                    <tr>
                      <th>BERAT BADAN</th>
                      <td>
                        <input value="{{ $data->sdd_berat }}" type="text" name="sdd_berat"  class="sdd_berat hanya_angka form-control wajib">
                      </td>
                    </tr>
                    <tr>
                      <th>TINGGI BADAN</th>
                      <td>
                        <input value="{{ $data->sdd_tinggi }}" type="text" name="sdd_tinggi" class="sdd_tinggi hanya_angka form-control wajib">
                      </td>
                    </tr>
                    <tr>
                      <th>GOLONGAN DARAH</th>
                      <td>
                        <input value="{{ $data->sdd_golongan_darah }}" type="text" name="sdd_golongan_darah" class="sdd_golongan_darah form-control wajib">
                      </td>
                    </tr>
                    <tr>
                      <td colspan="2">
                        <table class="table table-hover riwayat_kesehatan">
                          <thead class="bg-gradient-warning">
                            <tr>
                              <th style="color: white !important">Nama Penyakit / Kelainan</th>
                              <th style="color: white !important">Keterangan</th>
                              <th style="color: white !important">
                                <button type="button" class="btn btn-primary btn-sm tambah_riwayat">
                                  <i class="fa fa-plus"></i>
                                </button>
                              </th>
                            </tr>
                          </thead>
                          <tbody class="append_riwayat">
                              @foreach ($data->siswa_kesehatan as $k => $val)
                                @if ($k == 0)
                                  <tr class="tr_kesehatan">
                                    <td><input value="{{ $val->sk_nama_penyakit }}" type="text" class="form-control sk_nama_penyakit" name="sk_nama_penyakit[]"></td>
                                    <td><input value="{{ $val->sk_keterangan }}" type="text" class="form-control sk_keterangan" name="sk_keterangan[]"></td>
                                    <td align="center" class="append_button">-</td>
                                  </tr>
                                @else
                                  <tr class="tr_kesehatan">
                                    <td><input value="{{ $val->sk_nama_penyakit }}" type="text" class="form-control sk_nama_penyakit" name="sk_nama_penyakit[]"></td>
                                    <td><input value="{{ $val->sk_keterangan }}" type="text" class="form-control sk_keterangan" name="sk_keterangan[]"></td>
                                    <td align="center" class="append_button">
                                      <button type="button" class="btn btn-danger btn-sm hapus_riwayat">
                                        <i class="fa fa-minus"></i>
                                      </button> 
                                    </td>
                                  </tr>
                                @endif
                              @endforeach
                          </tbody>
                        </table>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
              <div class="card col-lg-12">
                <div class="card-header bg-gradient-info text-white">
                  <b>4. PENDIDIKAN</b>
                </div>
                <div class="card-body">
                  <table class="table no-border pendidikan">
                    <tr>
                      <th>PENDIDIKAN SEBELUMNYA</th>
                      <td>
                        <select class="form-control option sdd_jenjang_sebelumnya" name="sdd_jenjang_sebelumnya">
                          <option value="">Pilih - Data</option>
                          <option @if ($data->sdd_jenjang_sebelumnya == 'TIDAK SEKOLAH')
                            selected="" 
                          @endif value="TIDAK SEKOLAH">TIDAK SEKOLAH</option>
                          <option @if ($data->sdd_jenjang_sebelumnya == 'TK')
                            selected="" 
                          @endif value="TK">TK</option>
                          <option @if ($data->sdd_jenjang_sebelumnya == 'SD')
                            selected="" 
                          @endif value="SD">SD</option>
                          <option @if ($data->sdd_jenjang_sebelumnya == 'SMP')
                            selected="" 
                          @endif value="SMP">SMP</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <th>NAMA SEKOLAH TERAKHIR</th>
                      <td>
                        <input value="{{ $data->siswa_pendidikan[0]->sp_nama_sekolah }}" type="text" name="sp_nama_sekolah" class="sp_nama_sekolah form-control wajib">
                      </td>
                    </tr>
                    <tr>
                      <th>NOMOR IJAZAH TERAKHIR</th>
                      <td>
                        <input value="{{ $data->siswa_pendidikan[0]->sp_ijazah }}" type="text" name="sp_ijazah" class="sp_ijazah form-control wajib">
                      </td>
                    </tr>
                    <tr>
                      <th>TANGGAL IJAZAH TERAKHIR</th>
                      <td>
                        <input value="{{ carbon\carbon::parse($data->siswa_pendidikan[0]->sdd_tanggal_lahir)->format('d/m/Y') }}" type="text" name="sp_tanggal_ijazah" class="sp_tanggal_ijazah date form-control wajib">
                      </td>
                    </tr>
                    <tr>
                      <th>DAFTAR DI SEKOLAH</th>
                        @if (Auth::user()->akses('PENERIMAAN SISWA BARU','sekolah'))
                          <td>
                            <select class="sdd_sekolah form-control option " name="sdd_sekolah">
                              <option value="">Pilih - Sekolah</option>
                              @foreach($sekolah as $val)
                                <option @if ($data->sdd_sekolah == $val->s_id)
                                  selected="" 
                                @endif value="{{$val->s_id}}">{{$val->s_nama}}</option>
                              @endforeach
                            </select>
                          </td>
                        @else
                          <td class="disabled">
                            <select class="sdd_sekolah form-control option" name="sdd_sekolah">
                              <option value="">Pilih - Sekolah</option>
                              @foreach($sekolah as $val)
                                <option @if ($data->sdd_sekolah == $val->s_id)
                                  selected="" 
                                @endif value="{{$val->s_id}}">{{$val->s_nama}}</option>
                              @endforeach
                            </select>
                          </td>
                        @endif
                    </tr>
                    <tr>
                      <th>KETERANGAN</th>
                      <td>
                        <input value="{{ $data->siswa_pendidikan[0]->sp_keterangan }}" type="text" name="sp_keterangan" class="sp_keterangan form-control wajib">
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
              <div class="card col-lg-6">
                <div class="card-header bg-gradient-info text-white">
                  <b>5. AYAH KANDUNG</b>
                </div>
                <div class="card-body">
                  <table class="table no-border ayah">
                    <tr>
                      <th>NAMA</th>
                      <td>
                        <input value="{{ $data->siswa_ayah[0]->sa_nama }}" type="text" name="sa_nama" class="sa_nama form-control wajib">
                      </td>
                    </tr>
                    <tr>
                      <th>TEMPAT LAHIR</th>
                      <td>
                        <input value="{{ $data->siswa_ayah[0]->sa_tempat_lahir }}" type="text" name="sa_tempat_lahir" class="sa_tempat_lahir form-control wajib">
                      </td>
                    </tr>
                    <tr>
                      <th>TANGGAL LAHIR</th>
                      <td>
                        <input value="{{ carbon\carbon::parse($data->siswa_ayah[0]->sa_tanggal_lahir)->format('d/m/Y') }}" type="text" name="sa_tanggal_lahir" class="sa_tanggal_lahir date form-control wajib">
                      </td>
                    </tr>
                    <tr>
                      <th>AGAMA</th>
                      <td>
                        <select class="form-control option sa_agama" name="sa_agama">
                          <option value="">Pilih - Data</option>
                          <option @if ($data->siswa_ayah[0]->sa_agama == 'ISLAM')
                            selected="" 
                          @endif value="ISLAM">ISLAM</option>
                          <option @if ($data->siswa_ayah[0]->sa_agama == 'KRISTEN')
                            selected="" 
                          @endif value="KRISTEN">KRISTEN</option>
                          <option @if ($data->siswa_ayah[0]->sa_agama == 'KATHOLIK')
                            selected="" 
                          @endif  value="KATHOLIK">KATHOLIK</option>
                          <option @if ($data->siswa_ayah[0]->sa_agama == 'HINDU')
                            selected="" 
                          @endif  value="HINDU">HINDU</option>
                          <option @if ($data->siswa_ayah[0]->sa_agama == 'BUDHA')
                            selected="" 
                          @endif  value="BUDHA">BUDHA</option>
                          <option @if ($data->siswa_ayah[0]->sa_agama == 'KONG_HU_CU')
                            selected="" 
                          @endif  value="KONG_HU_CU">KONG HU CU</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <th>KEWARGANEGARAAN</th>
                      <td>
                        <input value="{{ $data->siswa_ayah[0]->sa_kewarganegaraan }}" type="text" name="sa_kewarganegaraan" class="sa_kewarganegaraan form-control wajib">
                      </td>
                    </tr>
                    <tr>
                      <th>PENDIDIKAN TERAKHIR</th>
                      <td>
                        <select class="form-control option sa_pendidikan" name="sa_pendidikan">
                          <option value="">Pilih - Data</option>
                          <option @if ($data->siswa_ayah[0]->sa_pendidikan == 'TIDAK SEKOLAH')
                            selected="" 
                          @endif value="TIDAK SEKOLAH">TIDAK SEKOLAH</option>
                          <option @if ($data->siswa_ayah[0]->sa_pendidikan == 'TK')
                            selected="" 
                          @endif value="TK">TK</option>
                          <option @if ($data->siswa_ayah[0]->sa_pendidikan == 'SD')
                            selected="" 
                          @endif value="SD">SD</option>
                          <option @if ($data->siswa_ayah[0]->sa_pendidikan == 'SMP')
                            selected="" 
                          @endif value="SMP">SMP</option>
                          <option @if ($data->siswa_ayah[0]->sa_pendidikan == 'SMA')
                            selected="" 
                          @endif value="SMA">SMA</option>
                          <option @if ($data->siswa_ayah[0]->sa_pendidikan == 'SARJANA')
                            selected="" 
                          @endif value="SARJANA">SARJANA</option>

                        </select>
                      </td>
                    </tr>
                    <tr>
                      <th>PEKERJAAN</th>
                      <td>
                        <input value="{{ $data->siswa_ayah[0]->sa_pekerjaan }}" type="text" name="sa_pekerjaan" class="sa_pekerjaan form-control wajib">
                      </td>
                    </tr>
                    <tr>
                      <th>PENGHASILAN</th>
                      <td>
                        <input value="{{ $data->siswa_ayah[0]->sa_penghasilan }}" type="text" name="sa_penghasilan" class="sa_penghasilan penghasilan form-control wajib">
                      </td>
                    </tr>
                    <tr>
                      <th>ALAMAT</th>
                      <td>
                        <input value="{{ $data->siswa_ayah[0]->sa_alamat }}" type="text" name="sa_alamat" class="sa_alamat form-control wajib">
                      </td>
                    </tr>
                    <tr>
                      <th>TELPON</th>
                      <td>
                        <input value="{{ $data->siswa_ayah[0]->sa_telpon }}" type="text" name="sa_telpon" class="sa_telpon hanya_angka form-control wajib">
                      </td>
                    </tr>
                    <tr>
                      <th>STATUS</th>
                      <td>
                        <select class="form-control option sa_status" name="sa_status">
                          <option value="">Pilih - Data</option>
                          <option @if ($data->siswa_ayah[0]->sa_status == 'H')
                            selected="" 
                          @endif value="H">Masih Hidup</option>
                          <option @if ($data->siswa_ayah[0]->sa_status == 'M')
                            selected="" 
                          @endif value="M">Meninggal</option>
                        </select>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
              <div class="card col-lg-6">
                <div class="card-header bg-gradient-info text-white">
                  <b>6. IBU KANDUNG</b>
                </div>
                <div class="card-body">
                  <table class="table no-border ibu">
                    <tr>
                      <th>NAMA</th>
                      <td>
                        <input value="{{ $data->siswa_ibu[0]->si_nama }}" type="text" name="si_nama" class="si_nama form-control wajib">
                      </td>
                    </tr>
                    <tr>
                      <th>TEMPAT LAHIR</th>
                      <td>
                        <input value="{{ $data->siswa_ibu[0]->si_tempat_lahir }}" type="text" name="si_tempat_lahir" class="si_tempat_lahir form-control wajib">
                      </td>
                    </tr>
                    <tr>
                      <th>TANGGAL LAHIR</th>
                      <td>
                        <input value="{{ carbon\carbon::parse($data->siswa_ibu[0]->si_tanggal_lahir)->format('d/m/Y') }}" type="text" name="si_tanggal_lahir" class="si_tanggal_lahir date form-control wajib">
                      </td>
                    </tr>
                    <tr>
                      <th>AGAMA</th>
                      <td>
                        <select class="form-control option si_agama" name="si_agama">
                          <option value="">Pilih - Data</option>
                          <option @if ($data->siswa_ibu[0]->si_agama == 'ISLAM')
                            selected="" 
                          @endif value="ISLAM">ISLAM</option>
                          <option @if ($data->siswa_ibu[0]->si_agama == 'KRISTEN')
                            selected="" 
                          @endif value="KRISTEN">KRISTEN</option>
                          <option @if ($data->siswa_ibu[0]->si_agama == 'KATHOLIK')
                            selected="" 
                          @endif  value="KATHOLIK">KATHOLIK</option>
                          <option @if ($data->siswa_ibu[0]->si_agama == 'HINDU')
                            selected="" 
                          @endif  value="HINDU">HINDU</option>
                          <option @if ($data->siswa_ibu[0]->si_agama == 'BUDHA')
                            selected="" 
                          @endif  value="BUDHA">BUDHA</option>
                          <option @if ($data->siswa_ibu[0]->si_agama == 'KONG_HU_CU')
                            selected="" 
                          @endif  value="KONG_HU_CU">KONG HU CU</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <th>KEWARGANEGARAAN</th>
                      <td>
                        <input value="{{ $data->siswa_ibu[0]->si_kewarganegaraan }}" type="text" name="si_kewarganegaraan" class="si_kewarganegaraan form-control wajib">
                      </td>
                    </tr>
                    <tr>
                      <th>PENDIDIKAN TERAKHIR</th>
                      <td>
                        <select class="form-control option si_pendidikan" name="si_pendidikan">
                          <option value="">Pilih - Data</option>
                          <option @if ($data->siswa_ibu[0]->si_pendidikan == 'TIDAK SEKOLAH')
                            selected="" 
                          @endif value="TIDAK SEKOLAH">TIDAK SEKOLAH</option>
                          <option @if ($data->siswa_ibu[0]->si_pendidikan == 'TK')
                            selected="" 
                          @endif value="TK">TK</option>
                          <option @if ($data->siswa_ibu[0]->si_pendidikan == 'SD')
                            selected="" 
                          @endif value="SD">SD</option>
                          <option @if ($data->siswa_ibu[0]->si_pendidikan == 'SMP')
                            selected="" 
                          @endif value="SMP">SMP</option>
                          <option @if ($data->siswa_ibu[0]->si_pendidikan == 'SMA')
                            selected="" 
                          @endif value="SMA">SMA</option>
                          <option @if ($data->siswa_ibu[0]->si_pendidikan == 'SARJANA')
                            selected="" 
                          @endif value="SARJANA">SARJANA</option>

                        </select>
                      </td>
                    </tr>
                    <tr>
                      <th>PEKERJAAN</th>
                      <td>
                        <input value="{{ $data->siswa_ibu[0]->si_pekerjaan }}" type="text" name="si_pekerjaan" class="si_pekerjaan form-control wajib">
                      </td>
                    </tr>
                    <tr>
                      <th>PENGHASILAN</th>
                      <td>
                        <input value="{{ $data->siswa_ibu[0]->si_penghasilan }}" type="text" name="si_penghasilan" class="si_penghasilan penghasilan form-control wajib">
                      </td>
                    </tr>
                    <tr>
                      <th>ALAMAT</th>
                      <td>
                        <input value="{{ $data->siswa_ibu[0]->si_alamat }}" type="text" name="si_alamat" class="si_alamat form-control wajib">
                      </td>
                    </tr>
                    <tr>
                      <th>TELPON</th>
                      <td>
                        <input value="{{ $data->siswa_ibu[0]->si_telpon }}" type="text" name="si_telpon" class="si_telpon hanya_angka form-control wajib">
                      </td>
                    </tr>
                    <tr>
                      <th>STATUS</th>
                      <td>
                        <select class="form-control option si_status" name="si_status">
                          <option value="">Pilih - Data</option>
                          <option @if ($data->siswa_ibu[0]->si_status == 'H')
                            selected="" 
                          @endif value="H">Masih Hidup</option>
                          <option @if ($data->siswa_ibu[0]->si_status == 'M')
                            selected="" 
                          @endif value="M">Meninggal</option>
                        </select>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
              <div class="card col-lg-12">
                <div class="card-header bg-gradient-info text-white">
                  <b>7. WALI SISWA</b>
                </div>
                <div class="card-body">
                  <table class="table no-border wali">
                    <tr>
                      <th>NAMA</th>
                      <td>
                        <input value="{{ $data->siswa_wali[0]->sw_nama }}" type="text" name="sw_nama" class="sw_nama form-control wajib">
                      </td>
                    </tr>
                    <tr>
                      <th>TEMPAT LAHIR</th>
                      <td>
                        <input value="{{ $data->siswa_wali[0]->sw_tempat_lahir }}" type="text" name="sw_tempat_lahir" class="sw_tempat_lahir form-control wajib">
                      </td>
                    </tr>
                    <tr>
                      <th>TANGGAL LAHIR</th>
                      <td>
                        <input value="{{ carbon\carbon::parse($data->siswa_wali[0]->sw_tanggal_lahir)->format('d/m/Y') }}" type="text" name="sw_tanggal_lahir" class="sw_tanggal_lahir date form-control wajib">
                      </td>
                    </tr>
                    <tr>
                      <th>AGAMA</th>
                      <td>
                        <select class="form-control option sw_agama" name="sw_agama">
                          <option value="">Pilih - Data</option>
                          <option @if ($data->siswa_wali[0]->sw_agama == 'ISLAM')
                            selected="" 
                          @endif value="ISLAM">ISLAM</option>
                          <option @if ($data->siswa_wali[0]->sw_agama == 'KRISTEN')
                            selected="" 
                          @endif value="KRISTEN">KRISTEN</option>
                          <option @if ($data->siswa_wali[0]->sw_agama == 'KATHOLIK')
                            selected="" 
                          @endif  value="KATHOLIK">KATHOLIK</option>
                          <option @if ($data->siswa_wali[0]->sw_agama == 'HINDU')
                            selected="" 
                          @endif  value="HINDU">HINDU</option>
                          <option @if ($data->siswa_wali[0]->sw_agama == 'BUDHA')
                            selected="" 
                          @endif  value="BUDHA">BUDHA</option>
                          <option @if ($data->siswa_wali[0]->sw_agama == 'KONG_HU_CU')
                            selected="" 
                          @endif  value="KONG_HU_CU">KONG HU CU</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <th>KEWARGANEGARAAN</th>
                      <td>
                        <input value="{{ $data->siswa_wali[0]->sw_kewarganegaraan }}" type="text" name="sw_kewarganegaraan" class="sw_kewarganegaraan form-control wajib">
                      </td>
                    </tr>
                    <tr>
                      <th>PENDIDIKAN TERAKHIR</th>
                      <td>
                        <select class="form-control option sw_pendidikan" name="sw_pendidikan">
                          <option value="">Pilih - Data</option>
                          <option @if ($data->siswa_wali[0]->sw_pendidikan == 'TIDAK SEKOLAH')
                            selected="" 
                          @endif value="TIDAK SEKOLAH">TIDAK SEKOLAH</option>
                          <option @if ($data->siswa_wali[0]->sw_pendidikan == 'TK')
                            selected="" 
                          @endif value="TK">TK</option>
                          <option @if ($data->siswa_wali[0]->sw_pendidikan == 'SD')
                            selected="" 
                          @endif value="SD">SD</option>
                          <option @if ($data->siswa_wali[0]->sw_pendidikan == 'SMP')
                            selected="" 
                          @endif value="SMP">SMP</option>
                          <option @if ($data->siswa_wali[0]->sw_pendidikan == 'SMA')
                            selected="" 
                          @endif value="SMA">SMA</option>
                          <option @if ($data->siswa_wali[0]->sw_pendidikan == 'SARJANA')
                            selected="" 
                          @endif value="SARJANA">SARJANA</option>

                        </select>
                      </td>
                    </tr>
                    <tr>
                      <th>PEKERJAAN</th>
                      <td>
                        <input value="{{ $data->siswa_wali[0]->sw_pekerjaan }}" type="text" name="sw_pekerjaan" class="sw_pekerjaan form-control wajib">
                      </td>
                    </tr>
                    <tr>
                      <th>PENGHASILAN</th>
                      <td>
                        <input value="{{ $data->siswa_wali[0]->sw_penghasilan }}" type="text" name="sw_penghasilan" class="sw_penghasilan penghasilan form-control wajib">
                      </td>
                    </tr>
                    <tr>
                      <th>ALAMAT</th>
                      <td>
                        <input value="{{ $data->siswa_wali[0]->sw_alamat }}" type="text" name="sw_alamat" class="sw_alamat form-control wajib">
                      </td>
                    </tr>
                    <tr>
                      <th>TELPON</th>
                      <td>
                        <input value="{{ $data->siswa_wali[0]->sw_telpon }}" type="text" name="sw_telpon" class="sw_telpon hanya_angka form-control wajib">
                      </td>
                    </tr>
                    <tr>
                      <th>STATUS</th>
                      <td>
                        <select class="form-control option sw_status" name="sw_status">
                          <option value="">Pilih - Data</option>
                          <option @if ($data->siswa_wali[0]->sw_status == 'H')
                            selected="" 
                          @endif value="H">Masih Hidup</option>
                          <option @if ($data->siswa_wali[0]->sw_status == 'M')
                            selected="" 
                          @endif value="M">Meninggal</option>
                        </select>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
              <div class="col-lg-12">
                <button type="button" class="btn btn-success simpan" onclick="simpan_data()"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
                <a href="{{ url('penerimaan/rekap_siswa') }}"><button type="button" class="btn btn-warning btn_modal" data-toggle="modal" data-target="#tambah-akun"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Kembali</button></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
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
$('.date').datepicker({
  format: "dd/mm/yyyy",
  autoclose: true
});

$('.penghasilan').maskMoney({thousands:'.',allowZero:true,defaultZero:true,precision:0});

$('#chooseFile').bind('change', function () {
  var filename = $("#chooseFile").val();
  var fsize = $('#chooseFile')[0].files[0].size;
  var ftype = $('#chooseFile')[0].files[0].type;
  if(fsize>5048576) //do something if file size more than 1 mb (1048576)
  {
      iziToast.warning({
        icon: 'fa fa-times',
        message: 'Maksimal Ukuran Foto Adalah 5MB!',
      });
      return false;
  }

  if(ftype == 'image/jpeg' || ftype == 'image/png') //do something if file size more than 1 mb (1048576)
  {
      
  }else{
    iziToast.warning({
        icon: 'fa fa-times',
        message: 'Format Yang Diijinkan PNG DAN JPG!',
      });
      return false;
  }
  if (/^\s*$/.test(filename)) {
    $(".file-upload").removeClass('active');
    $("#noFile").text("No file chosen..."); 
  }
  else {
    $(".file-upload").addClass('active');
    $("#noFile").text(filename.replace("C:\\fakepath\\", "")); 
  }
});


var loadFile = function(event) {
  var fsize = $('#chooseFile')[0].files[0].size;
  if(fsize>5048576) //do something if file size more than 1 mb (1048576)
  {
      iziToast.warning({
        icon: 'fa fa-times',
        message: 'Maksimal Ukuran Foto Adalah 5MB!',
      });
      return false;
  }
  var reader = new FileReader();
  reader.onload = function(){
    var output = document.getElementById('output');
    output.src = reader.result;
  };
  reader.readAsDataURL(event.target.files[0]);
};


$('.tambah_riwayat').click(function(){
  var par = $('.sk_nama_penyakit').eq(0).parents('.tr_kesehatan');
  $(par).clone(true,true).appendTo('.append_riwayat');
  var min_button =  '<button type="button" class="btn btn-danger btn-sm hapus_riwayat">'+
                    '<i class="fa fa-minus"></i>'+
                    '</button>';
  $('.append_button').last().html(min_button);
})

$(document).on('click','.hapus_riwayat',function(){
  var par = $(this).parents('.tr_kesehatan');
  console.log(par);
  $(par).remove();
})


function simpan_data() {

  var validator = [];
  var validator_name = [];

  $('.wajib').each(function(){
    if ($(this).val() == '') {
      $(this).addClass('error');
      validator.push(0);
    }
  })

  $('.option').each(function(){
    if ($(this).val() == '') {
      var par =$(this).parents('td');
      par.find('span').eq(0).addClass('error');
      validator.push(0);
    }
  })

  var index = validator.indexOf(0);
  if (index != -1) {
    iziToast.warning({
        icon: 'fa fa-times',
        title: 'Terjadi Kesalahan',
        message: 'Semua Inputan Harus Diisi',
    });
    return false;
  }

  iziToast.show({
    overlay: true,
    close: false,
    timeout: 20000, 
    color: 'dark',
    icon: 'fas fa-question-circle',
    title: 'Simpan Data!',
    message: 'Apakah Anda Yakin ?!',
    position: 'center',
    progressBarColor: 'rgb(0, 255, 184)',
    buttons: [
    [
        '<button style="background-color:#32CD32;">Simpan</button>',
        function (instance, toast) {

          $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var all= $('.data_siswa input').serialize()+'&'+
                     $('.data_siswa select').serialize()+'&'+
                     $('.tempat_tinggal input').serialize()+'&'+
                     $('.kesehatan input').serialize()+'&'+
                     $('.riwayat_kesehatan input').serialize()+'&'+
                     $('.pendidikan input').serialize()+'&'+
                     $('.pendidikan select').serialize()+'&'+
                     $('.ayah input').serialize()+'&'+
                     $('.ayah select').serialize()+'&'+
                     $('.ibu input').serialize()+'&'+
                     $('.ibu select').serialize()+'&'+
                     $('.wali input').serialize()+'&'+
                     $('.data_sekolah input').serialize()+'&'+
                     $('.data_sekolah select').serialize()+'&'+
                     $('.wali select').serialize();
            var form  = $('#save');
            if (window.FormData){
                formdata = new FormData(form[0]);
            }
            $.ajax({
                url:baseUrl +'/penerimaan/update_rekap_siswa',
                type:'POST',
                data:formdata ? formdata : form.serialize(),
                dataType:'json',
                processData: false,
                contentType: false,
                success:function(data){
                  if (data.status == 1) {
                    iziToast.success({
                          icon: 'fa fa-check',
                          title: 'Berhasil',
                          color:'yellow',
                          message: 'Menyimpan Data!',
                    });
                    location.reload();
                  }else{
                    iziToast.warning({
                          icon: 'fa fa-times',
                          title: 'Oops,',
                          message: data.pesan,
                    });
                  }
                },
                error:function(){
                  iziToast.warning({
                    icon: 'fa fa-times',
                    message: 'Terjadi Kesalahan!',
                  });
                }
            });
            instance.hide({
                transitionOut: 'fadeOutUp'
            }, toast);
        }
    ],
    [
        '<button style="background-color:#44d7c9;">Cancel</button>',
        function (instance, toast) {
          instance.hide({
            transitionOut: 'fadeOutUp'
          }, toast);
        }
      ]
    ]
  });
}
</script>
@endsection