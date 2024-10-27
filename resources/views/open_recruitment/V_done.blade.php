<x-guest-layout title="Berhasil Mendaftar">
    @component('components.navbar')
        <div class="mx-auto">
            <h5>HIMA</h5>
        </div>
        <img src="<?= asset('img/logo/organization.webp') ?>" class="logo-navbar">
    @endcomponent
    <div class="container">
        <div class="d-flex justify-content-center align-items-center mt-4">
            <div class="card shadow position-relative" style="width: 90%">
                <div class="card-header">
                    <h1>Selamat Anda Berhasil Mendaftar</h1>
                </div>
                <div class="card-body">
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
