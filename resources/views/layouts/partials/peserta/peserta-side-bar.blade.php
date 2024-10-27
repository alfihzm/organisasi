<div class="sidebar">
    <div class="scrollbar-inner sidebar-wrapper">
        <div class="user">
            <div class="photo">
                <img src="{{ asset('img/users/default.jpg') }}">
            </div>
            <div class="info">
                <a class="" data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                    <span>
                        {{ $peserta->NIM }}
                        <span class="user-level">Peserta</span>
                        <span class="caret"></span>
                    </span>
                </a>
                <div class="clearfix"></div>

                <div class="collapse in" id="collapseExample" aria-expanded="true" style="">
                    <ul class="nav">
                        <li>
                            <a href="/peserta/ubah-profil">
                                <span class="link-collapse">Ubah Profil</span>
                            </a>
                        </li>
                        <li>
                            <a href="/auth/logout">
                                <span class="link-collapse text-danger">Keluar</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav">
            <li class="nav-item {{ Request::is('peserta') ? 'active' : '' }}">
                <a href="/peserta">
                    <i class="la la-home"></i>
                    <p> Beranda </p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('info-dpc') ? 'active' : '' }}">
                <a href="/info-dpc">
                    <i class="la la-users"></i>
                    <p> Struktural Cabang {{ $campus->name }} </p>
                </a>
            </li>
        </ul>
    </div>
</div>
