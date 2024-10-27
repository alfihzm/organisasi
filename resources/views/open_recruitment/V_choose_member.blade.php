<x-guest-layout title="Choose Member">
    <style>
        body {
            height: 100vh;
        }

        .card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
    </style>

    @component('components.navbar')
        <div class="mx-auto py-2">
            <h5>KAMPUS</h5>
        </div>
        <img src="<?= asset('img/logo/organization.webp') ?>" class="logo-navbar">
    @endcomponent

    <div class="container d-flex justify-content-evenly align-items-center mt-5" style="height: auto;">

        <div class="d-flex flex-wrap justify-content-evenly" style="width: 100%;">

            <div class="card mb-3 m-2 border border-primary"
                style="width: 18rem; transition: transform 0.2s; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                <div class="d-flex justify-content-center mt-3">
                    <img src="<?= asset('img/logo/organization.webp') ?>" class="card-img-top"
                        alt="Dewan Pengurus Cabang" style="object-fit: cover; max-width: 80%; height: auto;">
                </div>
                <div class="card-body">
                    <h5 class="card-title text-center text-primary">Himpunan Mahasiswa Cabang</h5>
                </div>
                <div class="d-flex justify-content-center mb-4">
                    <a class="btn btn-secondary" href="choose-campus" style="width: 50%"> Pilih </a>
                </div>
            </div>

            <div class="card mb-3 m-2 border border-primary"
                style="width: 18rem; transition: transform 0.2s; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                <div class="d-flex justify-content-center mt-3">
                    <img src="<?= asset('img/logo/organization.webp') ?>" class="card-img-top"
                        alt="Dewan Pengurus Cabang" style="object-fit: cover; max-width: 80%; height: auto;">
                </div>
                <div class="card-body">
                    <h5 class="card-title text-center text-danger">Himpunan Mahasiswa Pusat</h5>
                </div>
                <div class="d-flex justify-content-center mb-4">
                    <a class="btn btn-danger" href="/oprec-dpp" style="width: 50%"> Pilih </a>
                </div>
            </div>

        </div>

    </div>

</x-guest-layout>
