<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
    <!-- Sidebar user panel -->
      
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item has-treeview">
                        <a href="{{url('/admin/dashboard')}}" class="nav-link" id="dashboard">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Dashboard</p>
                        </a>
                    </li>

                    <!-- DROPDOWN KONFIGURASI AKTOR -->
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link" id="konfigurasi_aktor">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>Konfigurasi Aktor
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                            <a href="{{url('/admin/admin')}}" class="nav-link">
                                <i class="fas fa-table nav-icon"></i>
                                <p>Admin</p>
                            </a>
                            </li>
                            <li class="nav-item">
                            <a href="{{url('/admin/user')}}" class="nav-link">
                                <i class="fa fa-tasks nav-icon"></i>
                                <p>User</p>
                            </a>
                            </li>
                            <li class="nav-item">
                            <a href="{{url('/admin/customer')}}" class="nav-link">
                                <i class="fa fa-tasks nav-icon"></i>
                                <p>Customer</p>
                            </a>
                            </li>
                            <li class="nav-item">
                            <a href="{{url('/admin/petani')}}" class="nav-link">
                                <i class="fa fa-tasks nav-icon"></i>
                                <p>Petani</p>
                            </a>
                            </li>
                        </ul>
                    </li>

                    <!-- VERIFIKASI LOKASI -->
                    <li class="nav-item has-treeview">
                            <a href="/admin/scan" class="nav-link" id="pemasaran_investasi">
                            <i class="nav-icon fas fa-camera-retro"></i>
                            <p>Scan Barcode Lokasi</p>
                            </a>
                        </li>

                        
                    <!-- VERIFIKASI CUSTOMER -->
                        <li class="nav-item has-treeview">
                            <a href="/admin/pemasaran" class="nav-link" id="pemasaran_investasi">
                            <i class="nav-icon fas fa-user"></i>
                            <p>Pemasaran Investasi</p>
                            </a>
                        </li>

                        

                    <!-- DROPDOWN Transaksi -->
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link" id="verifikasi_petani">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>Transaksi
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                            <a href="/admin/pembayaran" class="nav-link">
                                <i class="fas fa-table nav-icon"></i>
                                <p>Pembayaran Investasi</p>
                            </a>
                            </li>
                            <li class="nav-item">
                            <a href="/admin/pengembalian" class="nav-link">
                                <i class="fa fa-tasks nav-icon"></i>
                                <p>Pengembalian Dana</p>
                            </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Logout -->
                        <li class="nav-item">
                        <a href="/admin" class="nav-link">
                            <i class="fas fa-power-off nav-icon"></i>
                            <p> Keluar</p>
                        </a>
                        </li>

                </ul>
            </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
    </section>
    <!-- /.sidebar -->
</aside>