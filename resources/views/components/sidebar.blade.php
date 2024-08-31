
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-book"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Pustaka Booking</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="/dashboard">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            
            <!-- Heading -->
            <div class="sidebar-heading">
                Transaksi
            </div>


            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link py-2" href="/data-booking">
                    <i class="fas fa-fw fa-clipboard-list"></i>
                    <span>Data Booking</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link py-2" href="/data-peminjaman">
                    <i class="fas fa-fw fa-user-tag"></i>
                    <span>Data Peminjaman</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Master Data
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed py-2" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Manage Buku</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Manage Books:</h6>
                        <a class="collapse-item" href="/data-buku">Data Buku</a>
                        <a class="collapse-item" href="/data-kategori">Data Kategori</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed py-2" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Manage Users</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Manage User:</h6>
                        <a class="collapse-item" href="/data-anggota">Data Anggota</a>
                        <a class="collapse-item" href="/data-admin">Data Admin</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Laporan
            </div>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link py-2" href="/laporan-peminjaman">
                    <i class="fas fa-fw fa-file-alt"></i>
                    <span>Laporan Data Peminjaman</span></a>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link py-2" href="/laporan-buku">
                    <i class="fas fa-fw fa-file-alt"></i>
                    <span>Laporan Data Buku</span></a>
            </li>


            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link py-2" href="laporan-anggota">
                    <i class="fas fa-fw fa-file-alt"></i>
                    <span>Laporan Data Anggota</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            

        </ul>
        <!-- End of Sidebar -->