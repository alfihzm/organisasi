<x-peserta-layout>

    <div class="content">
        <div class="container-fluid">
            <h4 class="page-title d-block d-md-none">
                <span class="text-primary"> Selamat datang,</span> <br>
                {{ $peserta->full_name }}
            </h4>

            <h4 class="page-title d-none d-md-block">
                <span class="text-primary"> Selamat datang,</span>
                {{ $peserta->full_name }}
            </h4>

            <div class="row">
                <div class="col-md-4">
                    <div class="card card-stats card-warning">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <div class="icon-big text-center">
                                        <i class="la la-university"></i>
                                    </div>
                                </div>
                                <div class="col-8 d-flex align-items-center">
                                    <div class="numbers">
                                        <p class="card-category">Jumlah Kampus Utama UBSI</p>
                                        <h4 class="card-title">{{ $totalCampus }} Kampus</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-stats card-primary">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <div class="icon-big text-center">
                                        <i class="la la-home"></i>
                                    </div>
                                </div>
                                <div class="col-8 d-flex align-items-center">
                                    <div class="numbers">
                                        <p class="card-category">Jumlah Cabang HIMSI</p>
                                        <h4 class="card-title">8 DPC</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-stats card-success">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <div class="icon-big text-center">
                                        <i class="la la-users"></i>
                                    </div>
                                </div>
                                <div class="col-8 d-flex align-items-center">
                                    <div class="numbers">
                                        <p class="card-category">Jumlah Anggota HIMSI</p>
                                        <h4 class="card-title">392 Anggota</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="la la-check icon mt-2">
                                {{ session('success') }}
                            </i>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @elseif ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-circle icon"></i>
                            <i class="mt-2">
                                @foreach ($errors->all() as $error)
                                    {{ $error }}
                                @endforeach
                            </i>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                </div>

                {{-- <div class="col-md-6">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div> --}}

                <div class="col-md-12">
                    @if ($peserta->cv == null)
                        <div class="card card-stats">
                            <div class="card-body shadow-sm">
                                <h6> Status: <span class="text-danger"> Kamu belum mengumpulkan CV </span>
                                </h6>
                                <small id="cvUploadHelp" class="form-text text-muted mb-2">
                                    *Batas pengumpulan CV pada tanggal: <span class="text-danger"> 26
                                        September 2024 </span>
                                </small>
                                @if ($campus && $campus->template_cv)
                                    <h6> Unduh Template CV:</h6>
                                    <a class="btn btn-dark" href="{{ $campus->template_cv }}" target="_blank"> Unduh
                                    </a>
                                @else
                                    {{-- <h6> Unduh Template CV:</h6>
                                    <p>Template CV belum tersedia untuk kampus {{ $campus->name }}.</p> --}}
                                @endif
                            </div>
                        </div>

                        <div class="card card-stats">
                            <div class="card-body shadow-sm">
                                <h6>Silahkan kumpulkan CV kamu di sini</h6>
                                <form action="{{ route('upload.cv') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="cvUpload" class="form-label">Pilih CV kamu:</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="cvUpload"
                                                name="cv" aria-describedby="cvUploadHelp">
                                            <label class="custom-file-label" for="cvUpload">Pilih file</label>
                                            <small id="cvUploadHelp" class="form-text text-muted">
                                                Unggah file CV dalam format <span class="text-danger">PDF</span>
                                                dengan ukuran maks: <span class="text-danger">2MB</span>.
                                            </small>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Unggah CV</button>
                                </form>
                            </div>
                        </div>
                    @else
                        <div class="card card-stats">
                            <div class="card-body shadow-sm">
                                Status: <span class="text-success"> Kamu sudah mengumpulkan CV </span>
                                <div class="mt-1">
                                    <a target="_blank" href="/storage/document/cv/{{ $peserta->cv }}"
                                        class="btn btn-dark mt-2" style="border-radius: 8px; font-weight: normal;">
                                        <i class="fas fa-eye"></i>
                                        <span class="ml-1" style="font-weight: normal;">Lihat CV</span>
                                    </a>
                                </div>

                                <hr>

                                <div id="editCvMessage">
                                    <p>
                                        <span class="text-danger"> CV ada kesalahan? </span>
                                        {{-- <a class="text-primary" href="#" id="editCvButton"> Edit CV </a> --}}
                                        <span class="text-primary"> Silahkan hubungi
                                            panitia untuk menghapus CV </span>
                                        <br>
                                        <span class="text-dark"> Group Koordinasi:
                                            <a class="text-success"
                                                href="https://chat.whatsapp.com/D9qPrc240biGVxaLRq7bEv"> Group HIMSI
                                            </a>
                                        </span>
                                    </p>
                                </div>

                                <div id="editCvForm" style="display:none;">

                                    <p> Silahkan ubah CV kamu di sini </p>
                                    <form action="{{ route('edit.cv') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="cvUpload" class="form-label">Pilih CV kamu:</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="cvUpload"
                                                    name="cv" aria-describedby="cvUploadHelp">
                                                <label class="custom-file-label" for="cvUpload">Pilih file</label>
                                                <small id="cvUploadHelp" class="form-text text-muted">
                                                    Unggah file CV dalam format <span class="text-danger">PDF</span>
                                                    dengan ukuran maks: <span class="text-danger">2MB</span>.
                                                </small>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Unggah CV</button>
                                    </form>

                                </div>

                            </div>

                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    </body>

</x-peserta-layout>

</html>
