<x-guest-layout title="Choose Campuses">
    <style>
        .card-header.deadline {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            font-family: 'Arial', sans-serif;
        }

        .card-header.deadline p {
            font-size: 18px;
            color: #333;
            margin: 0;
            font-weight: 500;
            display: inline-block;
        }

        .card-header.deadline i {
            color: #007bff;
            font-size: 20px;
            margin-right: 8px;
        }

        .card-header.deadline:hover {
            background-color: #e9ecef;
            transition: background-color 0.3s ease;
        }
    </style>

    @component('components.navbar')
        <div class="mx-auto py-2">
            <h5>KAMPUS</h5>
        </div>
        <img src="<?= asset('img/logo/bsi.png') ?>" class="logo-navbar">
    @endcomponent
    <div class="container my-3">
        <div class="card">
            <div class="card-header judul-halaman">
                <div class="text-center my-3">
                    <h4>ASAL KAMPUS</h4>
                    <p>Silahkan pilih kampus kalian</p>
                </div>
            </div>
            <div class="card-header deadline">
                <p><i class="fas fa-calendar-alt"></i> Akhir Pendaftaran: <span class="text-danger"> 7 Oktober 2024
                    </span></p>
            </div>
            <div class="card-body list-kampus">
                <div class="row row-cols-2 justify-content-center">
                    @foreach ($campuses as $c)
                        <div class="col my-2">
                            <div id="campus">
                                <div class="card text-center"
                                    onclick="window.location.href = '/oprec/choose-campus/{{ $c->name }}'">
                                    <img src="<?= asset('img/campuses/' . $c->image) ?>" height="150px">
                                    <div class="card-body p-2">
                                        <h6 class="text-uppercase">{{ $c->name }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
