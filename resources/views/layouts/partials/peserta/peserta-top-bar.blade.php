<nav class="navbar navbar-header navbar-expand-lg">
    <div class="container-fluid">

        <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
            <li class="nav-item dropdown hidden-caret">
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                    <img src="{{ asset('img/users/default.jpg') }}" alt="user-img" width="36" class="img-circle">
                    <span>{{ $peserta->full_name }}</span>
                </a>

                <ul class="dropdown-menu dropdown-user">
                    <li>
                        <div class="user-box">
                            <div class="u-img"><img src="{{ asset('img/users/default.jpg') }}" alt="user">
                            </div>
                            <div class="u-text">
                                <h4>{{ $peserta->NIM }}</h4>
                            </div>
                        </div>
                    </li>
                    {{-- <a class="dropdown-item" href="#"><i class="ti-user"></i> My Profile</a> --}}
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="peserta/ubah-profil"><i class="fa fa-pen"
                            style="margin-right: 7px"></i>
                        Ubah Profil</a>
                    <a class="dropdown-item text-danger" href="/auth/logout"><i class="fa fa-door-open mr-1"></i>
                        Keluar</a>
                </ul>
                <!-- /.dropdown-user -->
            </li>
        </ul>
    </div>
</nav>
