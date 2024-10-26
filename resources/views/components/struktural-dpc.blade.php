<div class="row">
    <div class="col-md-12">
        @if (
            !empty($dpc->ketua) ||
                !empty($dpc->wakil_ketua) ||
                !empty($dpc->sekretaris_satu) ||
                !empty($dpc->bendahara_satu) ||
                !empty($dpc->koor_rsdm) ||
                !empty($dpc->koor_kominfo) ||
                !empty($dpc->koor_pendidikan) ||
                !empty($dpc->koor_litbang))

            <!-- Tampilan Desktop -->
            @if (!empty($dpc->sekretaris_dua) || !empty($dpc->bendahara_dua))
                {{-- KONDISI ADA SEKRETARIS DUA & ADA BENDAHARA DUA --}}
                <div class="d-none d-lg-flex row mb-3 justify-content-around">
                    @if (!empty($dpc->ketua))
                        <div class="col-lg-3">
                            <img src="{{ asset($dpc->ketua) }}" class="img-fluid rounded border border-dark"
                                alt="Ketua">
                        </div>
                    @endif
                    @if (!empty($dpc->wakil_ketua))
                        <div class="col-lg-3">
                            <img src="{{ asset($dpc->wakil_ketua) }}" class="img-fluid rounded border border-dark"
                                alt="Wakil Ketua">
                        </div>
                    @endif
                </div>

                <div class="d-none d-lg-flex row mb-3 justify-content-center">
                    @if (!empty($dpc->sekretaris_satu))
                        <div class="col-lg-3">
                            <img src="{{ asset($dpc->sekretaris_satu) }}" class="img-fluid rounded border border-dark"
                                alt="Sekretaris Satu">
                        </div>
                    @endif
                    @if (!empty($dpc->sekretaris_dua))
                        <div class="col-lg-3">
                            <img src="{{ asset($dpc->sekretaris_dua) }}" class="img-fluid rounded border border-dark"
                                alt="Sekretaris Dua">
                        </div>
                    @endif
                    @if (!empty($dpc->bendahara_satu))
                        <div class="col-lg-3">
                            <img src="{{ asset($dpc->bendahara_satu) }}" class="img-fluid rounded border border-dark"
                                alt="Bendahara Satu">
                        </div>
                    @endif
                    @if (!empty($dpc->bendahara_dua))
                        <div class="col-lg-3">
                            <img src="{{ asset($dpc->bendahara_dua) }}" class="img-fluid rounded border border-dark"
                                alt="Bendahara Dua">
                        </div>
                    @endif
                </div>

                <div class="d-none d-lg-flex row mb-3">
                    @if (!empty($dpc->koor_rsdm))
                        <div class="col-lg-3">
                            <img src="{{ asset($dpc->koor_rsdm) }}" class="img-fluid rounded border border-dark"
                                alt="Koordinator RSDM">
                        </div>
                    @endif
                    @if (!empty($dpc->koor_kominfo))
                        <div class="col-lg-3">
                            <img src="{{ asset($dpc->koor_kominfo) }}" class="img-fluid rounded border border-dark"
                                alt="Koordinator KOMINFO">
                        </div>
                    @endif
                    @if (!empty($dpc->koor_pendidikan))
                        <div class="col-lg-3">
                            <img src="{{ asset($dpc->koor_pendidikan) }}" class="img-fluid rounded border border-dark"
                                alt="Koordinator Pendidikan">
                        </div>
                    @endif
                    @if (!empty($dpc->koor_litbang))
                        <div class="col-lg-3">
                            <img src="{{ asset($dpc->koor_litbang) }}" class="img-fluid rounded border border-dark"
                                alt="Koordinator Litbang">
                        </div>
                    @endif
                </div>
            @else
                {{-- KONDISI SEKRETARIS DUA == NULL & BENDAHARA DUA == NULL --}}
                <div class="d-none d-lg-flex row mb-3">
                    @if (!empty($dpc->ketua))
                        <div class="col-lg-3">
                            <img src="{{ asset($dpc->ketua) }}" class="img-fluid rounded border border-dark"
                                alt="Ketua">
                        </div>
                    @endif
                    @if (!empty($dpc->wakil_ketua))
                        <div class="col-lg-3">
                            <img src="{{ asset($dpc->wakil_ketua) }}" class="img-fluid rounded border border-dark"
                                alt="Wakil Ketua">
                        </div>
                    @endif
                    @if (!empty($dpc->sekretaris_satu))
                        <div class="col-lg-3">
                            <img src="{{ asset($dpc->sekretaris_satu) }}" class="img-fluid rounded border border-dark"
                                alt="Sekretaris Satu">
                        </div>
                    @endif
                    @if (!empty($dpc->bendahara_satu))
                        <div class="col-lg-3">
                            <img src="{{ asset($dpc->bendahara_satu) }}" class="img-fluid rounded border border-dark"
                                alt="Bendahara Satu">
                        </div>
                    @endif
                </div>

                <div class="d-none d-lg-flex row mb-3">
                    @if (!empty($dpc->koor_rsdm))
                        <div class="col-lg-3">
                            <img src="{{ asset($dpc->koor_rsdm) }}" class="img-fluid rounded border border-dark"
                                alt="Koordinator RSDM">
                        </div>
                    @endif
                    @if (!empty($dpc->koor_kominfo))
                        <div class="col-lg-3">
                            <img src="{{ asset($dpc->koor_kominfo) }}" class="img-fluid rounded border border-dark"
                                alt="Koordinator KOMINFO">
                        </div>
                    @endif
                    @if (!empty($dpc->koor_pendidikan))
                        <div class="col-lg-3">
                            <img src="{{ asset($dpc->koor_pendidikan) }}" class="img-fluid rounded border border-dark"
                                alt="Koordinator Pendidikan">
                        </div>
                    @endif
                    @if (!empty($dpc->koor_litbang))
                        <div class="col-lg-3">
                            <img src="{{ asset($dpc->koor_litbang) }}" class="img-fluid rounded border border-dark"
                                alt="Koordinator Litbang">
                        </div>
                    @endif
                </div>
            @endif

            {{-- Tampilan Tablet --}}
            @if (!empty($dpc->sekretaris_dua) || !empty($dpc->bendahara_dua))
                <div class="d-none d-md-flex d-lg-none row justify-content-center align-items-center mb-3">
                    <div class="col-5 mb-3">
                        <img src="{{ asset($dpc->ketua) }}" class="img-fluid rounded border border-dark"
                            alt="Ketua DPC">
                    </div>
                    <div class="col-5 mb-3">
                        <img src="{{ asset($dpc->wakil_ketua) }}" class="img-fluid rounded border border-dark"
                            alt="Wakil Ketua DPC">
                    </div>
                    <div class="col-5 mb-3">
                        <img src="{{ asset($dpc->sekretaris_satu) }}" class="img-fluid rounded border border-dark"
                            alt="Sekretaris Satu">
                    </div>
                    <div class="col-5 mb-3">
                        <img src="{{ asset($dpc->sekretaris_dua) }}" class="img-fluid rounded border border-dark"
                            alt="Sekretaris Dua">
                    </div>
                </div>

                <div class="d-none d-md-flex d-lg-none row justify-content-center align-items-center">
                    <div class="col-5 mb-3">
                        <img src="{{ asset($dpc->bendahara_satu) }}" class="img-fluid rounded border border-dark"
                            alt="Bendahara Satu">
                    </div>
                </div>

                <div class="d-none d-md-flex d-lg-none row justify-content-center align-items-center">
                    <div class="col-5 mb-3">
                        <img src="{{ asset($dpc->koor_rsdm) }}" class="img-fluid rounded border border-dark"
                            alt="Koordinator RSDM">
                    </div>
                    <div class="col-5 mb-3">
                        <img src="{{ asset($dpc->koor_kominfo) }}" class="img-fluid rounded border border-dark"
                            alt="Koordinator KOMINFO">
                    </div>
                    <div class="col-5">
                        <img src="{{ asset($dpc->koor_pendidikan) }}" class="img-fluid rounded border border-dark"
                            alt="Koordinator Pendidikan">
                    </div>
                    <div class="col-5">
                        <img src="{{ asset($dpc->koor_litbang) }}" class="img-fluid rounded border border-dark"
                            alt="Koordinator Litbang">
                    </div>
                </div>
            @elseif (!empty($dpc->sekretaris_dua) || !empty($dpc->bendahara_dua))
                <div class="d-none d-md-flex d-lg-none row justify-content-center align-items-center mb-3">
                    <div class="col-5 mb-3">
                        <img src="{{ asset($dpc->ketua) }}" class="img-fluid rounded" alt="Ketua DPC">
                    </div>
                    <div class="col-5 mb-3">
                        <img src="{{ asset($dpc->wakil_ketua) }}" class="img-fluid rounded" alt="Wakil Ketua DPC">
                    </div>
                    <div class="col-5 mb-3">
                        <img src="{{ asset($dpc->sekretaris_satu) }}" class="img-fluid rounded"
                            alt="Sekretaris Satu">
                    </div>
                    <div class="col-5 mb-3">
                        <img src="{{ asset($dpc->sekretaris_dua) }}" class="img-fluid rounded" alt="Sekretaris Dua">
                    </div>
                    <div class="col-5">
                        <img src="{{ asset($dpc->bendahara_satu) }}" class="img-fluid rounded" alt="Bendahara Satu">
                    </div>
                </div>

                <div class="d-none d-md-flex d-lg-none row justify-content-center align-items-center">
                    <div class="col-5 mb-3">
                        <img src="{{ asset($dpc->koor_rsdm) }}" class="img-fluid rounded" alt="Koordinator RSDM">
                    </div>
                    <div class="col-5 mb-3">
                        <img src="{{ asset($dpc->koor_kominfo) }}" class="img-fluid rounded"
                            alt="Koordinator KOMINFO">
                    </div>
                    <div class="col-5">
                        <img src="{{ asset($dpc->koor_pendidikan) }}" class="img-fluid rounded"
                            alt="Koordinator Pendidikan">
                    </div>
                    <div class="col-5">
                        <img src="{{ asset($dpc->koor_litbang) }}" class="img-fluid rounded"
                            alt="Koordinator Litbang">
                    </div>
                </div>
            @else
                <div class="d-none d-md-flex d-lg-none row justify-content-center align-items-center mb-3">
                    <div class="col-5 mb-3">
                        <img src="{{ asset($dpc->ketua) }}" class="img-fluid rounded" alt="Ketua DPC">
                    </div>
                    <div class="col-5 mb-3">
                        <img src="{{ asset($dpc->wakil_ketua) }}" class="img-fluid rounded" alt="Wakil Ketua DPC">
                    </div>
                    <div class="col-5 mb-3">
                        <img src="{{ asset($dpc->sekretaris_satu) }}" class="img-fluid rounded"
                            alt="Sekretaris Satu">
                    </div>
                    <div class="col-5">
                        <img src="{{ asset($dpc->bendahara_satu) }}" class="img-fluid rounded" alt="Bendahara Satu">
                    </div>
                </div>

                <div class="d-none d-md-flex d-lg-none row justify-content-center align-items-center">
                    <div class="col-5 mb-3">
                        <img src="{{ asset($dpc->koor_rsdm) }}" class="img-fluid rounded" alt="Koordinator RSDM">
                    </div>
                    <div class="col-5 mb-3">
                        <img src="{{ asset($dpc->koor_kominfo) }}" class="img-fluid rounded"
                            alt="Koordinator KOMINFO">
                    </div>
                    <div class="col-5">
                        <img src="{{ asset($dpc->koor_pendidikan) }}" class="img-fluid rounded"
                            alt="Koordinator Pendidikan">
                    </div>
                    <div class="col-5">
                        <img src="{{ asset($dpc->koor_litbang) }}" class="img-fluid rounded"
                            alt="Koordinator Litbang">
                    </div>
                </div>
            @endif

            <!-- Tampilan Mobile -->
            <div id="carouselExampleIndicators"
                class="carousel slide d-lg-none d-md-none border border-dark shadow-lg" data-ride="carousel">
                <ol class="carousel-indicators">
                    @foreach ([$dpc->ketua, $dpc->wakil_ketua, $dpc->sekretaris_satu, $dpc->sekretaris_dua, $dpc->bendahara_satu, $dpc->bendahara_dua, $dpc->koor_rsdm, $dpc->koor_kominfo, $dpc->koor_pendidikan, $dpc->koor_litbang] as $index => $image)
                        @if (!empty($image))
                            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $index }}"
                                class="{{ $index == 0 ? 'active' : '' }}"></li>
                        @endif
                    @endforeach
                </ol>
                <div class="carousel-inner">
                    @foreach ([$dpc->ketua, $dpc->wakil_ketua, $dpc->sekretaris_satu, $dpc->sekretaris_dua, $dpc->bendahara_satu, $dpc->bendahara_dua, $dpc->koor_rsdm, $dpc->koor_kominfo, $dpc->koor_pendidikan, $dpc->koor_litbang] as $index => $image)
                        @if (!empty($image))
                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                <img src="{{ asset($image) }}" class="d-block w-100 rounded"
                                    alt="Jabatan {{ $index + 1 }}">
                            </div>
                        @endif
                    @endforeach
                </div>

                <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators"
                    data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators"
                    data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </button>
            </div>
        @else
            <div class="text-center">
                <p> Belum ada data struktural yang bisa ditampilkan untuk HIMSI DPC {{ $campus->name }}.
                </p>
            </div>
        @endif
    </div>
</div>
