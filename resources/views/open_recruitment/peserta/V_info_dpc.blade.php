<x-peserta-layout>
    <div class="content">
        <div class="container-fluid text-center">
            <h5 class="page-title" style="margin-bottom: 30px; font-size: 1.5em;">
                <span class="text-primary">
                    Struktural HIMSI DPC {{ $campus->name }}
                </span>
            </h5>

            @component('components.struktural-dpc', ['dpc' => $dpc])
            @endcomponent

        </div>

        <div class="container mt-3 d-lg-none">
            <div class="card text-center w-100" id="infoCard">
                <div class="card-body d-flex justify-content-center align-items-center">
                    <p class="card-text" id="cardText">Struktural HIMSI DPC {{ $campus->name }}</p>
                </div>
                <div class="card-footer">
                    2024
                </div>
            </div>
        </div>

        <div class="container d-flex justify-content-center mt-3">
            <a target="_blank" href="{{ $campus->instagram }}" class="m-2">
                <div class="card p-2 shadow-lg" style="border-radius: 25%;">
                    <i class="fab fa-instagram" style="font-size: 25px; color: #E1306C"> </i>
                </div>
            </a>
            <a href="/peserta" class="m-2">
                <div class="card p-2 shadow-lg d-lg-none text-dark d-flex justify-content-center"
                    style="border-radius: 20%; height: 43px;">
                    <i class="fas fa-home" style="font-size: 20px;"> </i>
                </div>
            </a>
            <a href="{{ $campus->group_wa }}" class="m-2">
                <div target="_blank" class="card p-2 shadow-lg" style="border-radius: 25%;">
                    <i class="fab fa-whatsapp" style="font-size: 25px; color: #25D366"> </i>
                </div>
            </a>
        </div>

    </div>

</x-peserta-layout>
