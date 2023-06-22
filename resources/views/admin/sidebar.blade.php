<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <span class="brand-text font-center-light">GIS sekolah</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
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
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                <li class="nav-item">
                    <a href="/dashboard" class="nav-link {{ $title === 'dashboard' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                            <span class="right badge badge-danger"></span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/peta" class="nav-link {{ $title === 'Peta Sekolah' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-map"></i>
                        <p>
                            Peta Sekolah
                            <span class="right badge badge-danger"></span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/kecamatan" class="nav-link {{ $title === 'Kecamatan' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-landmark"></i>
                        <p>
                            Kecamatan
                            <span class="right badge badge-danger"></span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/school" class="nav-link {{ $title === 'sekolah' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-school"></i>
                        <p>
                            Sekolah
                            <span class="right badge badge-danger"></span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/lokasi" class="nav-link {{ $title === 'Lokasi Sekolah' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-map-marker"></i>
                        <p>
                            Lokasi Sekolah
                            <span class="right badge badge-danger"></span>
                        </p>
                    </a>
                </li>
                </li>
                <!-- Add Logout button -->
                <li class="nav-item">
                    <a href="/" class="nav-link" data-toggle="modal" data-target="#logout">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<!-- Modal  -->
<div class="modal fade" id="logout" tabindex="-1" aria-labelledby="logout" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logout">Logout</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Yakin Ingin Keluar
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" onclick="logout()">Ya</button>
            </div>
        </div>
    </div>
</div>

<script>
    function logout() {
        window.location.href = "/";
    }
</script>
