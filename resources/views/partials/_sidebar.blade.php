<!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="{{url('/home')}}" >
          <h3 style="width: 100%">
            <img style="width: 30px;height: 30px;margin: 0" src="{{asset('assets/images/logo1.png')}}" alt="logo"/>
            <label style="margin-top: 10px;margin-bottom: 0px">DARUL ULUM</label>
          </h3>
          <!-- <h1 style="margin:auto; ">Kinaya</h1> -->
        </a>
        <a class="navbar-brand brand-logo-mini" href="{{url('/home')}}">
          <img src="{{asset('assets/atonergi-mini.png')}}" alt="logo"/>
          <!-- <h1 style="margin:auto; ">A</h1> -->
        </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="mdi mdi-menu"></span>
        </button>
        <div class="search-field ml-4 d-none d-md-block">
          <form class="d-flex align-items-stretch h-100" action="#">
            <div class="input-group">
              <input id="filterInput" type="text" class="form-control bg-transparent border-0" onchange="myFunction()" onfocus="myFunction()" onkeyup="myFunction()" placeholder="Search Menu">
              <div class="input-group-btn">
                <button id="btn-reset" type="button" class="btn bg-transparent px-0 d-none" onclick="btnReset()" style="cursor: pointer;"><i class="fa fa-times"></i></button>
              </div>
              <div class="input-group-addon bg-transparent border-0 search-button">
                <button type="button" class="btn btn-sm bg-transparent px-0">
                  <i class="mdi mdi-magnify"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item d-none d-lg-block full-screen-link">
            <a class="nav-link">
              <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="mdi mdi-bell-outline"></i>
              <span class="count"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <h6 class="p-3 mb-0">Notifications</h6>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-success">
                    <i class="mdi mdi-calendar"></i>
                  </div>
                </div>
                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                  <h6 class="preview-subject font-weight-normal mb-1">Event today</h6>
                  <p class="text-gray ellipsis mb-0">
                    Just a reminder that you have an event today
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-warning">
                    <i class="mdi mdi-settings"></i>
                  </div>
                </div>
                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                  <h6 class="preview-subject font-weight-normal mb-1">Settings</h6>
                  <p class="text-gray ellipsis mb-0">
                    Update dashboard
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-info">
                    <i class="mdi mdi-link-variant"></i>
                  </div>
                </div>
                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                  <h6 class="preview-subject font-weight-normal mb-1">Launch Admin</h6>
                  <p class="text-gray ellipsis mb-0">
                    New admin wow!
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <h6 class="p-3 mb-0 text-center">See all notifications</h6>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle nav-profile" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <img src="{{route('thumbnail').'/'.Auth::user()->image}}" alt="image">
              <span class="d-none d-lg-inline">{{Auth::user()->name}}</span>
            </a>
            <div class="dropdown-menu navbar-dropdown w-100" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="#">
                <i class="mdi mdi-cached mr-2 text-success"></i>
                Activity Log
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" onclick="document.getElementById('logout-form').submit();" href="#">
                <i class="mdi mdi-logout mr-2 text-primary"></i>
                Signout
              </a>
            </div>
          </li>
          <li class="nav-item nav-logout d-none d-lg-block">
            <a class="nav-link" onclick="document.getElementById('logout-form').submit();" href="#">
              <i class="mdi mdi-power"></i>
            </a>
          </li>
          <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none;">
              {{ csrf_field() }}
          </form>
          <li class="nav-item nav-settings d-none d-lg-block">
            <a class="nav-link" href="#">
              <i class="mdi mdi-format-line-spacing"></i>
            </a>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <div class="row row-offcanvas row-offcanvas-right">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav" id="ayaysir">
            <li class="nav-item  {{Request::is('home') ? 'active' : ''}}">
              <a class="nav-link" href="{{url('/home')}}">
                <span class="menu-title">Dashboard</span>
                <span class="menu-sub-title">( 2 new updates )</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item   {{Request::is('setting') ? 'active' : '' || Request::is('setting/*') ? 'active' : '' }}">
              <a class="nav-link " data-toggle="collapse" href="#setting" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Setting</span>
                <span class="d-none">
                  Setting Level Account
                  Setting Account 
                  Setting Hak Akses
                  Setting Daftar Menu
                </span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-settings menu-icon mdi-spin"></i>
              </a>
              <div class="collapse {{Request::is('setting') ? 'show' : '' || Request::is('setting/*') ? 'show' : '' }}" id="setting">
                <ul class="nav flex-column sub-menu">
                  @if (Auth::user()->akses('SETTING JABATAN','aktif'))
                    <li class="nav-item" > <a href="{{ url('/setting/jabatan/') }}" class="nav-link {{Request::is('setting/jabatan') ? 'active' : '' || Request::is('setting/jabatan/*') ? 'active' : '' }}">Setting Jabatan</a></li>
                  @endif
                  @if (Auth::user()->akses('SETTING USER','aktif'))
                    <li class="nav-item"> <a href="{{ url('/setting/akun/') }}" class="nav-link {{Request::is('setting/akun') ? 'active' : '' || Request::is('setting/akun/*') ? 'active' : '' }}">Setting User </a></li>
                  @endif

                  @if (Auth::user()->akses('SETTING HAK AKSES','aktif'))
                    <li class="nav-item"> <a href="{{ url('/setting/hak_akses/') }}" class="nav-link {{Request::is('setting/hak_akses') ? 'active' : '' || Request::is('setting/hak_akses/*') ? 'active' : '' }}">Setting Hak Akses</a></li>
                  @endif

                  @if (Auth::user()->akses('SETTING DAFTAR MENU','aktif'))
                    <li class="nav-item"> <a href="{{ url('/setting/daftar_menu/') }}" class="nav-link {{Request::is('setting/daftar_menu') ? 'active' : '' || Request::is('setting/daftar_menu/*') ? 'active' : '' }}">Setting Daftar Menu</a></li>
                  @endif
                </ul>
                </div>
            </li>
            {{-- MASTER --}}
            <li class="nav-item   {{Request::is('master') ? 'active' : '' || Request::is('master/*') ? 'active' : '' }}">
              <a class="nav-link " data-toggle="collapse" href="#master" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Master</span>
                <span class="d-none">
                  Master Data Sekolah
                  Master Data Posisi
                  Master Data Staff
                  Master Data Barang
                  Master Group SPP
                  Master Kelas
                </span>
                <i class="menu-arrow"></i>
                <i class="mdi menu-icon mdi-archive"></i>
              </a>
              <div class="collapse {{Request::is('master') ? 'show' : '' || Request::is('master/*') ? 'show' : '' }}" id="master">
                <ul class="nav flex-column sub-menu">
                  @if (Auth::user()->akses('MASTER SEKOLAH','aktif'))
                    <li class="nav-item" > <a href="{{ url('/master/sekolah/') }}" class="nav-link {{Request::is('master/sekolah') ? 'active' : '' || Request::is('master/sekolah/*') ? 'active' : '' }}">Master Sekolah</a></li>
                  @endif
                  @if (Auth::user()->akses('MASTER POSISI','aktif'))
                    <li class="nav-item" > <a href="{{ url('/master/posisi/') }}" class="nav-link {{Request::is('master/posisi') ? 'active' : '' || Request::is('master/posisi/*') ? 'active' : '' }}">Master Posisi</a></li>
                  @endif
                  @if (Auth::user()->akses('MASTER STAFF','aktif'))
                    <li class="nav-item" > <a href="{{ url('/master/staff/') }}" class="nav-link {{Request::is('master/staff') ? 'active' : '' || Request::is('master/staff/*') ? 'active' : '' }}">Master Staff</a></li>
                  @endif
                  @if (Auth::user()->akses('MASTER BARANG','aktif'))
                    <li class="nav-item" > <a href="{{ url('/master/barang/') }}" class="nav-link {{Request::is('master/barang') ? 'active' : '' || Request::is('master/barang/*') ? 'active' : '' }}">Master Barang</a></li>
                  @endif
                  @if (Auth::user()->akses('MASTER GROUP SPP','aktif'))
                    <li class="nav-item" > <a href="{{ url('/master/group_spp/') }}" class="nav-link {{Request::is('master/group_spp') ? 'active' : '' || Request::is('master/group_spp/*') ? 'active' : '' }}">Master Group SPP</a></li>
                  @endif
                  @if (Auth::user()->akses('MASTER KELAS','aktif'))
                    <li class="nav-item" > <a href="{{ url('/master/kelas/') }}" class="nav-link {{Request::is('master/kelas') ? 'active' : '' || Request::is('master/kelas/*') ? 'active' : '' }}">Master kelas</a></li>
                  @endif
                </ul>
                </div>
            </li>
            {{-- KEUANGAN --}}
            <li class="nav-item   {{Request::is('keuangan/keuangan') ? 'active' : '' || Request::is('keuangan/*') ? 'active' : '' }}">
              <a class="nav-link " data-toggle="collapse" href="#keuangan" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Keuangan</span>
                <span class="d-none">
                  keuangan Data Akun Keuangan
                  keuangan Group Akun
                </span>
                <i class="menu-arrow"></i>
                <i class="mdi menu-icon mdi-cash"></i>
              </a>
              <div class="collapse {{Request::is('keuangan') ? 'show' : '' || Request::is('keuangan/*') ? 'show' : '' }}" id="keuangan">
                <ul class="nav flex-column sub-menu">
                  @if (Auth::user()->akses('GROUP AKUN KEUANGAN','aktif'))
                    <li class="nav-item" > <a href="{{ url('/keuangan/group_akun/') }}" class="nav-link {{Request::is('keuangan/group_akun') ? 'active' : '' || Request::is('keuangan/group_akun/*') ? 'active' : '' }}">Group Akun Keuangan</a></li>
                  @endif
                  @if (Auth::user()->akses('MASTER AKUN KEUANGAN','aktif'))
                    <li class="nav-item" > <a href="{{ url('/keuangan/keuangan/') }}" class="nav-link {{Request::is('keuangan/keuangan') ? 'active' : '' || Request::is('keuangan/keuangan/*') ? 'active' : '' }}">Master Akun Keuangan</a></li>
                  @endif
                </ul>
                </div>
            </li>
            {{-- KESISWAAN --}}
            <li class="nav-item   {{Request::is('penerimaaan') ? 'active' : '' || Request::is('penerimaaan/*') ? 'active' : '' }}">
              <a class="nav-link " data-toggle="collapse" href="#penerimaan" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Kesiswaan</span>
                <span class="d-none">
                  Penerimaan Siswa Baru
                  Alumni Siswa
                </span>
                <i class="menu-arrow"></i>
                <i class="mdi menu-icon mdi-account-multiple"></i>
              </a>
              <div class="collapse {{Request::is('penerimaan') ? 'show' : '' || Request::is('penerimaan/*') ? 'show' : '' }}" id="penerimaan">
                <ul class="nav flex-column sub-menu">
                  @if (Auth::user()->akses('PENERIMAAN SISWA BARU','aktif'))
                    <li class="nav-item" > <a href="{{ url('/penerimaan/siswa/') }}" class="nav-link {{Request::is('penerimaan/siswa') ? 'active' : '' || Request::is('penerimaan/siswa/*') ? 'active' : '' }}">Penerimaan Siswa Baru</a></li>
                  @endif
                  @if (Auth::user()->akses('KONFIRMASI SISWA BARU','aktif'))
                    <li class="nav-item" > <a href="{{ url('/penerimaan/konfirmasi/') }}" class="nav-link {{Request::is('penerimaan/konfirmasi') ? 'active' : '' || Request::is('penerimaan/konfirmasi/*') ? 'active' : '' }}">Konfirmasi Siswa Baru</a></li>
                  @endif
                  @if (Auth::user()->akses('REKAP SISWA','aktif'))
                    <li class="nav-item" > <a href="{{ url('/penerimaan/rekap_siswa/') }}" class="nav-link {{Request::is('penerimaan/rekap_siswa') ? 'active' : '' || Request::is('penerimaan/rekap_siswa/*') ? 'active' : '' }}">Data Siswa</a></li>
                  @endif
                  @if (Auth::user()->akses('KELAS','aktif'))
                    <li class="nav-item" > <a href="{{ url('/penerimaan/kelas/') }}" class="nav-link {{Request::is('penerimaan/kelas') ? 'active' : '' || Request::is('penerimaan/kelas/*') ? 'active' : '' }}">Manajemen Siswa</a></li>
                  @endif
                </ul>
              </div>
            </li>
            {{-- KAS MASUK --}}
            <li class="nav-item   {{Request::is('kas_masuk') ? 'active' : '' || Request::is('kas_masuk/*') ? 'active' : '' }}">
              <a class="nav-link " data-toggle="collapse" href="#kas_masuk" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Kas Masuk</span>
                <span class="d-none">
                  Pemasukan Kas
                  Pembayaran Spp
                </span>
                <i class="menu-arrow"></i>
                <i class="mdi menu-icon mdi-arrow-up"></i>
              </a>
              <div class="collapse {{Request::is('kas_masuk') ? 'show' : '' || Request::is('kas_masuk/*') ? 'show' : '' }}" id="kas_masuk">
                <ul class="nav flex-column sub-menu">
                  @if (Auth::user()->akses('PEMASUKAN KAS','aktif'))
                    <li class="nav-item" > <a href="{{ url('/kas_masuk/pemasukan_kas/') }}" class="nav-link {{Request::is('kas_masuk/pemasukan_kas') ? 'active' : '' || Request::is('kas_masuk/pemasukan_kas/*') ? 'active' : '' }}">Pemasukan Kas</a></li>
                  @endif
                  @if (Auth::user()->akses('PEMBAYARAN SPP','aktif'))
                    <li class="nav-item" > <a href="{{ url('/kas_masuk/spp/') }}" class="nav-link {{Request::is('kas_masuk/spp') ? 'active' : '' || Request::is('kas_masuk/spp/*') ? 'active' : '' }}">Pembayaran SPP</a></li>
                  @endif
                </ul>
                </div>
            </li>

            {{-- KAS KELUAR --}}
            <li class="nav-item   {{Request::is('kas_keluar') ? 'active' : '' || Request::is('kas_keluar/*') ? 'active' : '' }}">
              <a class="nav-link " data-toggle="collapse" href="#kas_keluar" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Kas Keluar</span>
                <span class="d-none">
                  Rencana Pembelian
                  Konfirmasi Pembelian
                  Petty Cash
                  Bukti Kas Keluar
                </span>
                <i class="menu-arrow"></i>
                <i class="mdi menu-icon mdi-arrow-down"></i>
              </a>
              <div class="collapse {{Request::is('kas_keluar') ? 'show' : '' || Request::is('kas_keluar/*') ? 'show' : '' }}" id="kas_keluar">
                <ul class="nav flex-column sub-menu">
                  @if (Auth::user()->akses('RENCANA PEMBELIAN','aktif'))
                    <li class="nav-item" > <a href="{{ url('/kas_keluar/rencana_pembelian/') }}" class="nav-link {{Request::is('kas_keluar/rencana_pembelian') ? 'active' : '' || Request::is('kas_keluar/rencana_pembelian/*') ? 'active' : '' }}">Rencana Pembelian</a></li>
                  @endif
                  @if (Auth::user()->akses('PENGELUARAN ANGGARAN','aktif'))
                    <li class="nav-item" > <a href="{{ url('/kas_keluar/pengeluaran_anggaran/') }}" class="nav-link {{Request::is('kas_keluar/pengeluaran_anggaran') ? 'active' : '' || Request::is('kas_keluar/pengeluaran_anggaran/*') ? 'active' : '' }}">Pengeluaran Anggaran</a></li>
                  @endif
                  @if (Auth::user()->akses('PETTY CASH','aktif'))
                    <li class="nav-item" > <a href="{{ url('/kas_keluar/petty_cash/') }}" class="nav-link {{Request::is('kas_keluar/petty_cash') ? 'active' : '' || Request::is('kas_keluar/petty_cash/*') ? 'active' : '' }}">Petty Cash</a></li>
                  @endif
                  @if (Auth::user()->akses('KONFIRMASI PENGELUARAN','aktif'))
                    <li class="nav-item" > <a href="{{ url('/kas_keluar/konfirmasi_pengeluaran_kas/') }}" class="nav-link {{Request::is('kas_keluar/konfirmasi_pengeluaran_kas') ? 'active' : '' || Request::is('kas_keluar/konfirmasi_pengeluaran_kas/*') ? 'active' : '' }}">Konfirmasi Pengeluaran Kas</a></li>
                  @endif
                  @if (Auth::user()->akses('BUKTI KAS KELUAR','aktif'))
                    <li class="nav-item" > <a href="{{ url('/kas_keluar/bukti_kas_keluar/') }}" class="nav-link {{Request::is('kas_keluar/bukti_kas_keluar') ? 'active' : '' || Request::is('kas_keluar/bukti_kas_keluar/*') ? 'active' : '' }}">Bukti Kas Keluar</a></li>
                  @endif
                </ul>
                </div>
            </li>
            {{-- LAPORAN --}}
            <li class="nav-item   {{Request::is('laporan') ? 'active' : '' || Request::is('laporan/*') ? 'active' : '' }}">
              <a class="nav-link " data-toggle="collapse" href="#laporan" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Laporan</span>
                <span class="d-none">
                  LAPORAN REGISTER JURNAL
                  LAPORAN LABA RUGI
                </span>
                <i class="menu-arrow"></i>
                <i class="mdi menu-icon mdi-chart-areaspline"></i>
              </a>
              <div class="collapse {{Request::is('laporan') ? 'show' : '' || Request::is('laporan/*') ? 'show' : '' }}" id="laporan">
                <ul class="nav flex-column sub-menu">
                  @if (Auth::user()->akses('LAPORAN REGISTER JURNAL','aktif'))
                    <li class="nav-item" > <a href="{{ url('/laporan/register_jurnal/') }}" class="nav-link {{Request::is('laporan/register_jurnal') ? 'active' : '' || Request::is('laporan/register_jurnal/*') ? 'active' : '' }}">Laporan Register Jurnal</a></li>
                  @endif
                  @if (Auth::user()->akses('LAPORAN LABA RUGI','aktif'))
                    <li class="nav-item" > <a href="{{ url('/laporan/laba_rugi/') }}" class="nav-link {{Request::is('laporan/laba_rugi') ? 'active' : '' || Request::is('laporan/laba_rugi/*') ? 'active' : '' }}">Laporan Laba Rugi</a></li>
                  @endif
                </ul>
                </div>
            </li>
          </ul>          
        </nav>





