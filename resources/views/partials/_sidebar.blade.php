<!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="{{url('/home')}}">
          <img src="{{asset('assets/atonergi.png')}}" alt="logo" style="margin-left: auto;">
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
                  <li class="nav-item" > <a href="{{ url('/setting/jabatan/') }}" class="nav-link {{Request::is('setting/jabatan') ? 'active' : '' || Request::is('setting/jabatan/*') ? 'active' : '' }}">Setting Jabatan</a></li>

                  <li class="nav-item"> <a href="{{ url('/setting/akun/') }}" class="nav-link {{Request::is('setting/akun') ? 'active' : '' || Request::is('setting/akun/*') ? 'active' : '' }}">Setting User </a></li>

                  <li class="nav-item"> <a href="{{ url('/setting/hak_akses/') }}" class="nav-link {{Request::is('setting/hak_akses') ? 'active' : '' || Request::is('setting/hak_akses/*') ? 'active' : '' }}">Setting Hak Akses</a></li>

                  <li class="nav-item"> <a href="{{ url('/setting/daftar_menu/') }}" class="nav-link {{Request::is('setting/daftar_menu') ? 'active' : '' || Request::is('setting/daftar_menu/*') ? 'active' : '' }}">Setting Daftar Menu</a></li>
                </ul>
                </div>
            </li>
            {{-- MASTER --}}
            <li class="nav-item   {{Request::is('master') ? 'active' : '' || Request::is('master/*') ? 'active' : '' }}">
              <a class="nav-link " data-toggle="collapse" href="#master" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Master</span>
                <span class="d-none">
                  Master Data Sekolah
                  Master Data Murid
                  Master Data Akun
                  Master Data Pegawai
                </span>
                <i class="menu-arrow"></i>
                <i class="mdi menu-icon mdi-archive"></i>
              </a>
              <div class="collapse {{Request::is('master') ? 'show' : '' || Request::is('master/*') ? 'show' : '' }}" id="master">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item" > <a href="{{ url('/master/sekolah/') }}" class="nav-link {{Request::is('master/sekolah') ? 'active' : '' || Request::is('master/sekolah/*') ? 'active' : '' }}">Master Sekolah</a></li>
                </ul>
                </div>
            </li>
          </ul>          
        </nav>





