 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="s" class="brand-link text-decoration-none text-center">
      <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
      <span class="brand-text text-center font-weight-light">Pengaduan Mahasiswa</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->


      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{ route('dashboard') }}" class="nav-link bg-transparent">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="{{ route('keluhan.index') }}" class="nav-link bg-transparent">
              <i class="nav-icon fas fa-book"></i>
              <p>Daftar Keluhan</p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="{{ route('keluhan.saya', Auth::user()->mahasiswa_id) }}" class="nav-link bg-transparent">
              <i class="nav-icon fas fa-user"></i>
              <p>Keluhan Saya</p>
            </a>
          </li>
          @can('administrator')
          <li class="nav-item menu-open">
            <a href="{{ route('user.index') }}" class="nav-link bg-transparent">
              <i class="nav-icon fas fa-users"></i>
              <p>Akun User</p>
            </a>
          </li>
          @endcan
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>