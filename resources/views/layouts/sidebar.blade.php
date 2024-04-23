<div class="sidebar" style="">
    <!-- Sidebar user (optional) -->
    {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Alexander Pierce</a>
      </div>
    </div> --}}

    <!-- SidebarSearch Form -->
    {{-- <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div> --}}

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="{{ url('/dashboard') }}" class="nav-link" {{ ($activeMenu == 'dashboard')? 'active' : '' }}>
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
        </li>
        <li class="nav-header">Data Buku</li>
        <li class="nav-item">
            <a href="{{ url('/admin') }}" class="nav-link {{ ($activeMenu == 'admin') ? 'active' : '' }} ">
                <i class="nav-icon fas fa-book"></i>
                <p>Data Buku</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('/penerbit') }}" class="nav-link {{ ($activeMenu == 'penerbit') ? 'active' : '' }}">
                <i class="nav-icon fa fa-male"></i>
                <p>Data Penerbit</p>
            </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('/kategori') }}" class="nav-link {{ ($activeMenu == 'kategori') ? 'active' : '' }}">
              <i class="nav-icon fas fa-list"></i>
              <p>Data Kategori</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('/lokasi') }}" class="nav-link {{ ($activeMenu == 'lokasi') ? 'active' : '' }}">
              <i class="nav-icon fa fa-map-marker"></i>
              <p>Data Lokasi Buku</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>