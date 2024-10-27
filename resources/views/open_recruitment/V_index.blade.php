<x-guest-layout title="Pengenalan HIMSI">

    @component('components.navbar')
        <div class="ms-auto">
            <a href="/auth/login" class="btn btn-warning btn-sm p-2">Login</a>
            <a href="/oprec/choose-member" class="btn btn-primary btn-sm p-2">Daftar</a>
        </div>
    @endcomponent

    <div class="container mb-3">
        <div class="mt-2">
            @include('layouts.partials.alert')
        </div>
        <div class="card shadow position-relative">
            <div class="card-body">
                <div class="d-flex justify-content-center">
                    <ul class="nav nav-tabs d-flex align-items-center">

                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link active" href="#profil" data-bs-toggle="tab">PROFIL</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#struktural" data-bs-toggle="tab">STRUKTURAL</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#galeri" data-bs-toggle="tab">GALERI</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#divisi" data-bs-toggle="tab">DIVISI</a>
                            </li>
                        </ul>

                    </ul>
                </div>

                <div class="tab-content mt-4">

                    <!-- Profil HIMSI -->
                    <div class="tab-pane fade show active" id="profil">
                        @component('components.description')
                        @endcomponent
                    </div>

                    <!-- Galeri HIMSI -->
                    <div class="tab-pane fade" id="galeri">
                        @component('components.galeri')
                        @endcomponent
                    </div>

                    <!-- Struktural HIMSI -->
                    <div class="tab-pane fade" id="struktural">
                        @component('components.struktural')
                        @endcomponent
                    </div>

                    <!-- Divisi HIMSI -->
                    <div class="tab-pane fade" id="divisi">
                        @component('components.guest-divisi')
                        @endcomponent
                    </div>

                </div>
            </div>
        </div>

    </div>

</x-guest-layout>
