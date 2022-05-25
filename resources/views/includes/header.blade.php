<header id="header" class="header">
    <div class="top-left">
        <div class="navbar-header">
            <a class="navbar-brand" href="">PT. Duta Jaya Friztama</a>
            <a class="navbar-brand hidden" href=""><img src="{{ url('backend/images/Travel-in.png') }}" alt="Logo"></a>
            <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
        </div>
    </div>
    <div class="top-right">
        <div class="header-menu justify-content-between align-items-center">
            {{-- <h4 class="color-gray">Selamat Datang <span class="text-capitalize font-weight-bold">toni</span></h4> --}}
            <h6 class="">Copyright &copy; 2022</h6>
            <div class="user-area dropdown">
                <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <h6 class="mr-2">toni</h6>
                    <img class="user-avatar rounded-circle" src="{{ url('backend/images/admin.jpg') }}" alt="User Avatar">
                </a>

                <div class="user-menu dropdown-menu">
                    <a href="" class="nav-link"><i class="fa fa-power -off"></i>Logout</a>
                </div>
            </div>

        </div>
    </div>
</header>