<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="/admin/dashboard">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/admin/user">
                <i class="icon-head menu-icon"></i>
                <span class="menu-title">Data user</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Data Lokasi</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/admin/kota">Kabupaten/Kota</a></li>
                <li class="nav-item"> <a class="nav-link" href="/admin/kecamatan">Kecamatan</a></li>
              </ul>
            </div>
          </li>

        {{-- <li class="nav-item">
            <a class="nav-link" href="/admin/kota">
                <i class="icon-bar-graph menu-icon"></i>
                <span class="menu-title">Data Kota</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/admin/kecamatan">
                <i class="icon-bar-graph menu-icon"></i>
                <span class="menu-title">Data Kecamatan</span>
            </a>
        </li> --}}
        <li class="nav-item">
            <a class="nav-link" href="/admin/villa">
                <i class="icon-columns menu-icon"></i>
                <span class="menu-title">Data Villa</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/admin/pemesanan">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Data Pemesanan</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/admin/rating">
                <i class="icon-contract menu-icon"></i>
                <span class="menu-title">Data Review</span>
            </a>
        </li>
    </ul>
</nav>
