<style>
    .carousel-indicators [data-bs-target] {
        width: 5px;
        height: 5px;
        border-radius: 50%;
        background-color: #000;
        margin: 3px;
    }

    .carousel-indicators .active {
        background-color: #FFF;
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        background-color: rgb(248, 248, 248);
        border-radius: 50%;
        padding: 2px;
        background-size: 10px 10px;
        background-repeat: no-repeat;
        background-position: center;
    }

    .carousel-control-prev-icon {
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23000' viewBox='0 0 16 16'%3E%3Cpath d='M11.354 15.354a.5.5 0 0 0 0-.708l-6-6a.5.5 0 0 0 0-.708l6-6a.5.5 0 1 0-.708-.708l-6.5 6.5a.5.5 0 0 0 0 .708l6.5 6.5a.5.5 0 0 0 .708 0z' stroke='%23000' stroke-width='2'/%3E%3C/svg%3E");
    }

    .carousel-control-next-icon {
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23000' viewBox='0 0 16 16'%3E%3Cpath d='M4.646 15.354a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 0-.708l-6-6a.5.5 0 1 1 .708-.708l6.5 6.5a.5.5 0 0 1 0 .708l-6.5 6.5a.5.5 0 0 1-.708 0z' stroke='%23000' stroke-width='2'/%3E%3C/svg%3E");
    }

    .carousel-control-prev,
    .carousel-control-next {
        background-color: transparent;
        border: none;
        outline: none;
    }

    .carousel-control-prev:hover,
    .carousel-control-next:hover,
    .carousel-control-prev:focus,
    .carousel-control-next:focus {
        background-color: transparent;
        outline: none;
    }

    @media (min-width: 768px) and (max-width: 991.98px) {
        .row {
            justify-content: center;
        }

        .col-5 {
            margin-left: 15px;
            margin-right: 15px;
        }
    }
</style>

<div class="container">
    <!-- Tampilan Desktop -->
    <h5 class="card-title text-center mb-4" style="color: #2E3192;">[STRUKTURAL HIMPUNAN MAHASISWA]</h5>

    <div class="d-none d-lg-flex row mb-3 justify-content-center">
        <div class="col-lg-3">
            <img src="{{ asset('img/struktural/dpp/ketum.webp') }}" class="img-fluid rounded" alt="Ketua Umum">
        </div>
        <div class="col-lg-3">
            <img src="{{ asset('img/struktural/dpp/waketum.webp') }}" class="img-fluid rounded" alt="Wakil Ketua Umum">
        </div>
    </div>

    <div class="d-none d-lg-flex row mb-3 justify-content-center">
        <div class="col-lg-3">
            <img src="{{ asset('img/struktural/dpp/sekretaris-1.webp') }}" class="img-fluid rounded" alt="Sekretaris">
        </div>
        <div class="col-lg-3">
            <img src="{{ asset('img/struktural/dpp/sekretaris-2.webp') }}" class="img-fluid rounded" alt="Sekretaris">
        </div>
        <div class="col-lg-3">
            <img src="{{ asset('img/struktural/dpp/bendahara.webp') }}" class="img-fluid rounded" alt="Bendahara">
        </div>
    </div>

    <div class="d-none d-lg-flex row">
        <div class="col-lg-3">
            <img src="{{ asset('img/struktural/dpp/kominfo.webp') }}" class="img-fluid rounded" alt="Kominfo">
        </div>
        <div class="col-lg-3">
            <img src="{{ asset('img/struktural/dpp/PSDM.webp') }}" class="img-fluid rounded" alt="PSDM">
        </div>
        <div class="col-lg-3">
            <img src="{{ asset('img/struktural/dpp/pendidikan.webp') }}" class="img-fluid rounded" alt="Pendidikan">
        </div>
        <div class="col-lg-3">
            <img src="{{ asset('img/struktural/dpp/sosmas.webp') }}" class="img-fluid rounded" alt="Sosmas">
        </div>
    </div>

    <!-- Tampilan Tablet -->
    <div class="d-none d-md-flex d-lg-none row justify-content-center align-items-center mb-3">
        <div class="col-5 mb-3">
            <img src="{{ asset('img/struktural/dpp/ketum.webp') }}" class="img-fluid rounded" alt="Ketua Umum">
        </div>
        <div class="col-5 mb-3">
            <img src="{{ asset('img/struktural/dpp/waketum.webp') }}" class="img-fluid rounded" alt="Wakil Ketua Umum">
        </div>
        <div class="col-5">
            <img src="{{ asset('img/struktural/dpp/sekretaris-1.webp') }}" class="img-fluid rounded" alt="Sekretaris">
        </div>
        <div class="col-5">
            <img src="{{ asset('img/struktural/dpp/sekretaris-2.webp') }}" class="img-fluid rounded" alt="Bendahara">
        </div>
    </div>

    <div class="d-none d-md-flex d-lg-none row justify-content-center align-items-center mb-3">
        <div class="col-5">
            <img src="{{ asset('img/struktural/dpp/bendahara.webp') }}" class="img-fluid rounded" alt="Bendahara">
        </div>
    </div>

    <div class="d-none d-md-flex d-lg-none row justify-content-center align-items-center">
        <div class="col-5 mb-3">
            <img src="{{ asset('img/struktural/dpp/kominfo.webp') }}" class="img-fluid rounded" alt="Kominfo">
        </div>
        <div class="col-5 mb-3">
            <img src="{{ asset('img/struktural/dpp/PSDM.webp') }}" class="img-fluid rounded" alt="PSDM">
        </div>
        <div class="col-5">
            <img src="{{ asset('img/struktural/dpp/pendidikan.webp') }}" class="img-fluid rounded" alt="Pendidikan">
        </div>
        <div class="col-5">
            <img src="{{ asset('img/struktural/dpp/sosmas.webp') }}" class="img-fluid rounded" alt="Sosmas">
        </div>
    </div>

    <!-- Tampilan Mobile -->
    <div id="carousel" class="carousel slide d-md-none mb-3" data-bs-ride="carousel" data-bs-interval="3000">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active" aria-current="true"
                aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
            <button type="button" data-bs-target="#carousel" data-bs-slide-to="4" aria-label="Slide 5"></button>
            <button type="button" data-bs-target="#carousel" data-bs-slide-to="5" aria-label="Slide 6"></button>
            <button type="button" data-bs-target="#carousel" data-bs-slide-to="6" aria-label="Slide 7"></button>
            <button type="button" data-bs-target="#carousel" data-bs-slide-to="7" aria-label="Slide 8"></button>
            <button type="button" data-bs-target="#carousel" data-bs-slide-to="8" aria-label="Slide 9"></button>
        </div>

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('img/struktural/dpp/ketum.webp') }}" class="d-block w-100 rounded"
                    alt="Ketua Umum">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/struktural/dpp/waketum.webp') }}" class="d-block w-100 rounded"
                    alt="Wakil Ketua Umum">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/struktural/dpp/sekretaris-1.webp') }}" class="d-block w-100 rounded"
                    alt="Sekretaris">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/struktural/dpp/sekretaris-2.webp') }}" class="d-block w-100 rounded"
                    alt="Sekretaris">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/struktural/dpp/bendahara.webp') }}" class="d-block w-100 rounded"
                    alt="Bendahara">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/struktural/dpp/kominfo.webp') }}" class="d-block w-100 rounded"
                    alt="Kominfo">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/struktural/dpp/PSDM.webp') }}" class="d-block w-100 rounded" alt="PSDM">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/struktural/dpp/pendidikan.webp') }}" class="d-block w-100 rounded"
                    alt="Pendidikan">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/struktural/dpp/sosmas.webp') }}" class="d-block w-100 rounded"
                    alt="Sosmas">
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    {{-- <div id="carouselBottom" class="carousel slide d-md-none" data-bs-ride="carousel" data-bs-interval="3000">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselBottom" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 5"></button>
            <button type="button" data-bs-target="#carouselBottom" data-bs-slide-to="1"
                aria-label="Slide 6"></button>
            <button type="button" data-bs-target="#carouselBottom" data-bs-slide-to="2"
                aria-label="Slide 7"></button>
            <button type="button" data-bs-target="#carouselBottom" data-bs-slide-to="3"
                aria-label="Slide 8"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('img/struktural/kominfo.webp') }}" class="d-block w-100 rounded" alt="Kominfo">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/struktural/PSDM.webp') }}" class="d-block w-100 rounded" alt="PSDM">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/struktural/pendidikan.webp') }}" class="d-block w-100 rounded"
                    alt="Pendidikan">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/struktural/sosmas.webp') }}" class="d-block w-100 rounded" alt="Sosmas">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselBottom" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselBottom" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div> --}}
</div>
