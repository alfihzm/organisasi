<x-guest-layout title="Berhasil Mendaftar">
    @component('components.navbar')
        <div class="mx-auto">
            <h5>HIMSI UBSI</h5>
        </div>
        <img src="<?= asset('img/logo/bsi.png') ?>" class="logo-navbar">
    @endcomponent
    <div class="container">
        <div class="d-flex justify-content-center align-items-center mt-4">
            <div class="card shadow position-relative" style="width: 90%">
                <div class="card-header">
                    <h1>Selamat Anda Berhasil Mendaftar</h1>
                </div>
                <div class="card-body">
                    <ul>

                        @if ($data->campuses->instagram)
                            <li>
                                Untuk update mengenai HIMSI
                                {{ $data->campuses->name }} <br> <a target="_blank" style="text-decoration: none"
                                    href="{{ $data->campuses->instagram }}">Klik
                                    Instagram</a>
                            </li>
                        @else
                            {{-- <p> Mohon maaf tidak ada instagram untuk HIMSI {{ $data->campuses->name }}, silahkan
                                    follow HIMSI DPP.</p> --}}
                        @endif

                        <br>
                        <li>Untuk update mengenai HIMSI DPP <br> <a style="text-decoration: none"
                                href="https://www.instagram.com/himsi.ubsi" target="_blank">Klik
                                Instagram</a></li>
                        <br>
                        <li>
                            Untuk mendapatkan koordinasi dari HIMSI DPP, silahkan masuk grup pada link berikut:
                            <br>
                            {{-- {{ $data->campuses->name }} : --}}
                            <a style="text-decoration: none" href="https://chat.whatsapp.com/D9qPrc240biGVxaLRq7bEv"
                                target="_blank">Masuk Grup
                            </a>
                        </li>
                        <br>
                        @if ($data->campuses->group_wa)
                            <li>
                                Untuk mendapatkan koordinasi lebih lanjut dari HIMSI {{ $data->campuses->name }},
                                silahkan masuk grup pada link berikut:
                                <br>
                                <a style="text-decoration: none" href="{{ $data->campuses->group_wa }}"
                                    target="_blank">Masuk Grup</a>
                            </li>
                        @else
                            {{-- <p> Mohon maaf tidak ada grup untuk HIMSI {{ $data->campuses->name }}, silahkan masuk
                                grup HIMSI Pusat untuk koordinasi lebih lanjut. </p> --}}
                        @endif
                        {{-- <li>Untuk membuat twibbon klik &raquo;
                            <a style="text-decoration: none" href="https://bit.ly/3czNHde" target="_blank">Buat
                                Twibbon
                            </a>
                        </li> --}}
                    </ul>
                    <div class="my-3">
                        Ada kesalahan? <a style="text-decoration: none" href="/oprec/edit/{{ $data->id }}">Edit data
                            pendaftaran</a>
                    </div>
                    <div class="my-3">
                        Silahkan login untuk ke halaman peserta <a style="text-decoration: none"
                            href="/auth/login">Masuk</a>
                    </div>
                    <div class="my-3">
                        <a style="text-decoration: none" href="/">&laquo; Kembali ke beranda </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
