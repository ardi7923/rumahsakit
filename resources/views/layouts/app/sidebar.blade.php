    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">

        <div class="sidebar-brand-text mx-3">RS Daerah Serui</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/dashboard') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/patient') }}">
          <i class="fas fa-fw fa-users"></i>
          <span>Pasien</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/doctor') }}">
          <i class="fas fa-fw fa-user-nurse"></i>
          <span>Dokter</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/user-doctor') }}">
          <i class="fas fa-fw fa-unlock-alt"></i>
          <span>User Dokter</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/account-consultation') }}">
          <i class="fas fa-fw fa-unlock-alt"></i>
          <span>User Konsultasi</span></a>
      </li>



      <hr class="sidebar-divider">




    </ul>
    <!-- Sidebar -->