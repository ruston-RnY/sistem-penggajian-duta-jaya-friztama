<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href=""><i class
                        ="menu-icon fa fa-laptop"></i>Dashboard</a>
                </li>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user"></i>Karyawan</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li>
                            <i class="menu-icon fa fa-archive"></i><a href="{{ route('employees.index') }}">Data Master</a>
                        </li>
                        <li>
                            <i class="menu-icon fa fa-plus"></i><a href="{{ route('employees.create') }}">Tambah Karyawan</a>
                        </li>
                        <li>
                            <i class="menu-icon fa fa-plus"></i><a href="{{ route('positions.index') }}">Data Jabatan</a>
                        </li>
                    </ul>
                </li>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-calendar-check-o"></i>Absensi</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li>
                            <i class="menu-icon fa fa-archive"></i><a href="">Data Master</a>
                        </li>
                        <li>
                            <i class="menu-icon fa fa-plus"></i><a href="">Tambah Paket Travel</a>
                        </li>
                    </ul>
                </li>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-credit-card"></i>Pinjaman Karyawan</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li>
                            <i class="menu-icon fa fa-archive"></i><a href="">Data Master</a>
                        </li>
                        <li>
                            <i class="menu-icon fa fa-plus"></i><a href="">Tambah Paket Travel</a>
                        </li>
                    </ul>
                </li>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-money"></i>Penggajian</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li>
                            <i class="menu-icon fa fa-archive"></i><a href="">Data Master</a>
                        </li>
                        <li>
                            <i class="menu-icon fa fa-plus"></i><a href="">Tambah Paket Travel</a>
                        </li>
                    </ul>
                </li>

                <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cog" aria-hidden="true"></i>Pengaturan</a>
                <ul class="sub-menu children dropdown-menu">
                    <li>
                        <i class="menu-icon fa fa-users"></i><a href="">Manage User</a>
                    </li>
                    <li>
                        <i class="menu-icon fa fa-plus"></i><a href="">Tambah Paket Travel</a>
                    </li>
                </ul>
            </li>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-book"></i>Laporan</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li>
                            <i class="menu-icon fa fa-archive"></i><a href="">Data Gaji</a>
                        </li>
                        <li>
                            <i class="menu-icon fa fa-plus"></i><a href="">Tambah Paket Travel</a>
                        </li>
                    </ul>
                </li>

                
                
            </ul>
        </div>
    </nav>
</aside>