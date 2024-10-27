<x-guest-layout title="Formulir Open Recruitment">
    <script src="{{ asset('js/jquery.js') }}"></script>
    @component('components.navbar')
        <div class="mx-auto py-2">
            <h5>FORMULIR PENDAFTARAN</h5>
        </div>
    @endcomponent
    <div class="container my-3">
        @include('layouts.partials.alert')

        <form action="/oprec/form/{{ $OR->id }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="old_ektm" value="{{ $OR->ektm }}">
            <input type="hidden" name="old_follow" value="{{ $OR->follow }}">
            <input type="hidden" name="old_follow_dpc" value="{{ $OR->follow_dpc }}">
            <div class="card my-3">
                <div class="card-body">
                    <div class="input">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                            id="email" placeholder="Masukan email" required value="{{ old('email', $OR->email) }}">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card my-3">
                <div class="card-body">
                    <div class="input">
                        <label for="full_name" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control @error('full_name') is-invalid @enderror"
                            name="full_name" id="full_name" placeholder="Masukan nama lengkap" required
                            value="{{ old('full_name', $OR->full_name) }}">
                        @error('full_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card my-3">
                <div class="card-body">
                    <div class="input">
                        <label for="NIM" class="form-label">NIM</label>
                        <input type="text" class="form-control @error('NIM') is-invalid @enderror" id="NIM"
                            name="NIM" value="{{ old('NIM', $OR->NIM) }}">
                        @error('NIM')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card my-3">
                <div class="card-body">
                    <div class="input">
                        <label for="campus" class="form-label">Asal Kampus</label>
                        <select class="form-control @error('campus') is-invalid @enderror" name="campuses_id">
                            @foreach ($campuses as $campus)
                                <option value="{{ $campus->id }}" @selected(old('campuses_id', $OR->campuses->id) === $campus->id)>{{ $campus->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('campus')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card my-3">
                <div class="card-body">
                    <div class="input">
                        <label for="semester" class="form-label">Semester</label>
                        <input type="number" class="form-control @error('semester') is-invalid @enderror"
                            name="semester" id="semester" placeholder="Masukan semester" required
                            value="{{ old('semester', $OR->semester) }}">
                        @error('semester')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card my-3">
                <div class="card-body">
                    <div class="input">
                        <label for="whatsapp" class="form-label">No. Whatsapp</label>
                        <p style="font-size: 0.70rem; margin-bottom: 12px" class="text-danger">
                            *Mohon ubah No. WA dengan benar karena No. WA akan menjadi password default anda
                        </p>
                        <input type="number" class="form-control @error('whatsapp') is-invalid @enderror"
                            name="whatsapp" id="whatsapp" placeholder="Masukan nomor whatsapp" required
                            value="{{ old('whatsapp', $OR->whatsapp) }}">
                        @error('whatsapp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card my-3">
                <div class="card-body">
                    <div class="input">
                        <label for="instagram" class="form-label">Instagram</label>
                        <p style="font-size: 0.70rem; margin-bottom: 12px" class="text-danger">
                            *Masukkan instagram hanya dengan usernamenya saja contoh: <span class="text-primary">
                                kobokanaeru </span>
                        </p>
                        <input type="text" class="form-control @error('instagram') is-invalid @enderror"
                            name="instagram" id="instagram" placeholder="Masukan username instagram" required
                            value="{{ old('instagram', $OR->instagram) }}">
                        @error('instagram')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>

            {{-- BUKTI E-KTM --}}
            <div class="card my-3">
                <div class="card-body">
                    <div class="modal fade" id="ektm-modal" tabindex="-1" aria-labelledby="ektm-modalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                </div>
                                <div class="modal-body d-flex justify-content-center">
                                    <img class="img-preview img-fluid mb-3 col-5"
                                        src="{{ asset('storage/' . $OR->ektm) }}">
                                </div>
                                <div class="modal-footer justify-content-center">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <img class="img-preview img-fluid mb-3 col-5 d-none">
                    <div class="input-ektm d-none">
                        <label for="ektm" class="form-label">Upload Screenshot E-KTM</label>
                        <input type="file" accept="image/png, image/jpeg, image/jpg"
                            class="form-control @error('ektm') is-invalid @enderror" name="ektm" id="ektm"
                            onchange="previewEktm()">
                        @error('ektm')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="button-rubah mt-2">
                        <button type="button" class="btn btn-info btn-sm my-2" data-bs-toggle="modal"
                            data-bs-target="#ektm-modal" id="btn-ektm-modal">
                            Preview E-KTM
                        </button>
                        <button type="button" class="btn btn-sm btn-primary" id="rubah-ektm">Ubah E-KTM</button>
                        <button type="button" class="btn btn-sm btn-danger d-none" id="batal-rubah-ektm">Batal
                            Ubah</button>
                    </div>
                </div>
            </div>

            {{-- BUKTI FOLLOW --}}
            <div class="card my-3">
                <div class="card-body">
                    <div class="modal fade" id="follow-modal" tabindex="-1" aria-labelledby="follow-modalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                </div>
                                <div class="modal-body d-flex justify-content-center">
                                    <img class="img-preview img-fluid mb-3 col-5"
                                        src="{{ asset('storage/' . $OR->follow) }}">
                                </div>
                                <div class="modal-footer justify-content-center">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <img class="img-preview img-fluid mb-3 col-5 d-none">
                    <div class="input-follow d-none">
                        <label for="follow" class="form-label">Upload Screenshot Bukti Follow</label>
                        <input type="file" accept="image/png, image/jpeg, image/jpg"
                            class="form-control @error('follow') is-invalid @enderror" name="follow" id="follow"
                            onchange="previewFollow()">
                        @error('follow')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="button-rubah mt-2">
                        <button type="button" class="btn btn-info btn-sm my-2" data-bs-toggle="modal"
                            data-bs-target="#follow-modal" id="btn-follow-modal">
                            Preview Bukti Follow
                        </button>
                        <button type="button" class="btn btn-sm btn-primary" id="rubah-follow">Ubah Bukti</button>
                        <button type="button" class="btn btn-sm btn-danger d-none" id="batal-rubah-follow">Batal
                            Ubah</button>
                    </div>
                </div>
            </div>

            {{-- BUKTI FOLLOW DPC --}}
            @if ($OR->follow_dpc == null)
                <div class="card my-3" hidden>
                    <div class="card-body">
                        <div class="modal fade" id="follow-dpc-modal" tabindex="-1"
                            aria-labelledby="follow-dpc-modalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">

                                    </div>
                                    <div class="modal-body d-flex justify-content-center">

                                        <img class="img-preview img-fluid mb-3 col-5"
                                            src="{{ asset('storage/' . $OR->follow_dpc) }}">
                                    </div>
                                    <div class="modal-footer justify-content-center">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <img class="img-preview img-fluid mb-3 col-5 d-none">
                        <div class="input-follow-dpc d-none">
                            <label for="follow-dpc" class="form-label">Unggah Screenshot Bukti Follow IG HIMSI
                                DPC </label>
                            <input type="file" accept="image/png, image/jpeg, image/jpg"
                                class="form-control @error('follow-dpc') is-invalid @enderror" name="follow_dpc"
                                id="follow_dpc" onchange="previewFollowDpc()">
                            @error('follow-dpc')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="button-rubah mt-2">
                            <button type="button" class="btn btn-info btn-sm my-2" data-bs-toggle="modal"
                                data-bs-target="#follow-dpc-modal" id="btn-follow-dpc-modal">
                                Preview Bukti Follow DPC
                            </button>
                            <button type="button" class="btn btn-sm btn-primary" id="rubah-follow-dpc">Ubah
                                Bukti</button>
                            <button type="button" class="btn btn-sm btn-danger d-none"
                                id="batal-rubah-follow-dpc">Batal
                                Ubah</button>
                        </div>
                    </div>
                </div>
            @else
                <div class="card my-3">
                    <div class="card-body">
                        <div class="modal fade" id="follow-dpc-modal" tabindex="-1"
                            aria-labelledby="follow-dpc-modalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">

                                    </div>
                                    <div class="modal-body d-flex justify-content-center">

                                        <img class="img-preview img-fluid mb-3 col-5"
                                            src="{{ asset('storage/' . $OR->follow_dpc) }}">
                                    </div>
                                    <div class="modal-footer justify-content-center">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <img class="img-preview img-fluid mb-3 col-5 d-none">
                        <div class="input-follow-dpc d-none">
                            <label for="follow-dpc" class="form-label">Unggah Screenshot Bukti Follow IG HIMSI
                                DPC </label>
                            <input type="file" accept="image/png, image/jpeg, image/jpg"
                                class="form-control @error('follow-dpc') is-invalid @enderror" name="follow_dpc"
                                id="follow_dpc" onchange="previewFollowDpc()">
                            @error('follow-dpc')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="button-rubah mt-2">
                            <button type="button" class="btn btn-info btn-sm my-2" data-bs-toggle="modal"
                                data-bs-target="#follow-dpc-modal" id="btn-follow-dpc-modal">
                                Preview Bukti Follow DPC
                            </button>
                            <button type="button" class="btn btn-sm btn-primary" id="rubah-follow-dpc">Ubah
                                Bukti</button>
                            <button type="button" class="btn btn-sm btn-danger d-none"
                                id="batal-rubah-follow-dpc">Batal
                                Ubah</button>
                        </div>
                    </div>
                </div>
            @endif


            {{-- ALASAN BERGABUNG --}}
            <div class="card my-3">
                <div class="card-body">
                    <div class="input">
                        <label for="motivasi_bergabung" class="form-label">Alasan Anda Ingin Bergabung HIMSI?</label>
                        <textarea name="motivasi_bergabung" id="motivasi_bergabung"><?= old('motivasi_bergabung', $OR->motivasi_bergabung) ?></textarea>
                        @error('motivasi_bergabung')
                            <p class="text-danger"><small>{{ $message }}</small></p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="my-3 text-center">
                <button type="submit" class="btn btn-primary px-5">KIRIM</button>
            </div>
        </form>

    </div>

    <script src="<?= asset('plugins/tinymce/tinymce.min.js') ?>"></script>
    <script>
        tinymce.init({
            selector: 'textarea#motivasi_bergabung',
            menubar: false,
            toolbar: false,
            height: 200
        });

        // KODE UBAH EKTM
        const previewEktm = () => {
            const image = document.querySelector('#ektm');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';
            imgPreview.classList.remove('d-none')
            $('#btn-ektm-modal').addClass('d-none')

            const ofReader = new FileReader();
            ofReader.readAsDataURL(image.files[0]);
            ofReader.onload = function(ofREvent) {
                imgPreview.src = ofREvent.target.result
            }
        }

        $('#rubah-ektm').on('click', function() {
            $(this).addClass('d-none');
            $('.input-ektm').removeClass('d-none')
            $('#batal-rubah-ektm').removeClass('d-none');
        })
        $('#batal-rubah-ektm').on('click', function() {
            $(this).addClass('d-none');
            $('#btn-ektm-modal').removeClass('d-none')
            $('.input-ektm').addClass('d-none')
            $('.input-ektm input').val(null)
            $('#rubah-ektm').removeClass('d-none');
        })

        // KODE UBAH FOLLOW
        const previewFollow = () => {
            const image = document.querySelector('#follow');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';
            imgPreview.classList.remove('d-none');
            $('#btn-follow-modal').addClass('d-none');

            const ofReader = new FileReader();
            ofReader.readAsDataURL(image.files[0]);
            ofReader.onload = function(ofREvent) {
                imgPreview.src = ofREvent.target.result;
            };
        }

        $('#rubah-follow').on('click', function() {
            $(this).addClass('d-none');
            $('.input-follow').removeClass('d-none');
            $('#batal-rubah-follow').removeClass('d-none');
        });

        $('#batal-rubah-follow').on('click', function() {
            $(this).addClass('d-none');
            $('#btn-follow-modal').removeClass('d-none');
            $('.input-follow').addClass('d-none');
            $('.input-follow input').val(null);
            $('#rubah-follow').removeClass('d-none');
        });

        // KODE UBAH FOLLOW DPC
        const previewFollowDpc = () => {
            const image = document.querySelector('#follow-dpc');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';
            imgPreview.classList.remove('d-none');
            $('#btn-follow-dpc-modal').addClass('d-none');

            const ofReader = new FileReader();
            ofReader.readAsDataURL(image.files[0]);
            ofReader.onload = function(ofREvent) {
                imgPreview.src = ofREvent.target.result;
            };
        };

        $('#rubah-follow-dpc').on('click', function() {
            $(this).addClass('d-none');
            $('.input-follow-dpc').removeClass('d-none');
            $('#batal-rubah-follow-dpc').removeClass('d-none');
        });

        $('#batal-rubah-follow-dpc').on('click', function() {
            $(this).addClass('d-none');
            $('#btn-follow-dpc-modal').removeClass('d-none');
            $('.input-follow-dpc').addClass('d-none');
            $('.input-follow-dpc input').val(null);
            $('#rubah-follow-dpc').removeClass('d-none');
        });

        // $('#rubah-cv').on('click', function() {
        //     $(this).addClass('d-none');
        //     $('#btn-cv-modal').addClass('d-none');
        //     $('.input-cv').removeClass('d-none')
        //     $('#batal-rubah-cv').removeClass('d-none');
        // })
        // $('#batal-rubah-cv').on('click', function() {
        //     $(this).addClass('d-none');
        //     $('.input-cv').addClass('d-none')
        //     $('.input-cv input').val(null)
        //     $('#btn-cv-modal').removeClass('d-none')
        //     $('#rubah-cv').removeClass('d-none');
        // })
    </script>
</x-guest-layout>
