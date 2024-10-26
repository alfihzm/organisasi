<x-peserta-layout>

    <style>
        /* Chrome, Safari, Edge, dan Opera */
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>

    <div class="content">
        <div class="container-fluid">
            <h4 class="page-title">Ubah Profil Kamu</h4>

            <div class="row">
                <div class="col-md-12">
                    <div class="card card-stats">
                        <div class="card-body">

                            <form action="{{ route('peserta.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="full_name">Nama Lengkap:</label>
                                    <input type="text" class="form-control @error('full_name') is-invalid @enderror"
                                        id="full_name" name="full_name"
                                        value="{{ old('full_name', $peserta->full_name) }}">
                                    @error('full_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nim">NIM:</label>
                                    <input type="number" class="form-control @error('NIM') is-invalid @enderror"
                                        id="nim" name="NIM" value="{{ old('NIM', $peserta->NIM) }}">
                                    @error('NIM')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" name="email" value="{{ old('email', $peserta->email) }}">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="whatsapp">Nomor Whatsapp:
                                        <div>
                                            <small class="text-danger">
                                                *Mohon diperhatikan, jika mengubah no. whatsapp maka akan mengubah
                                                password.
                                            </small>
                                        </div>
                                    </label>
                                    <input type="number" class="form-control @error('whatsapp') is-invalid @enderror"
                                        id="whatsapp" name="whatsapp"
                                        value="{{ old('whatsapp', $peserta->whatsapp) }}">
                                    @error('whatsapp')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="instagram">Instagram:
                                        <div>
                                            <small class="text-danger">
                                                *Masukkan instagram hanya dengan usernamenya saja contoh: <span
                                                    class="text-primary">
                                                    kobokanaeru </span>
                                            </small>
                                        </div>
                                    </label>
                                    <input type="text" class="form-control @error('instagram') is-invalid @enderror"
                                        id="instagram" name="instagram"
                                        value="{{ old('instagram', $peserta->instagram) }}">
                                    @error('instagram')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="campus" class="form-label">Kampus</label>
                                    <select class="form-control @error('campuses_id') is-invalid @enderror"
                                        name="campuses_id">
                                        @foreach ($campuses as $campus)
                                            <option value="{{ $campus->id }}" @selected(old('campuses_id', $peserta->campuses_id) == $campus->id)>
                                                {{ $campus->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('campuses_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="semester">Semester:</label>
                                    <input type="text" class="form-control @error('semester') is-invalid @enderror"
                                        id="semester" name="semester"
                                        value="{{ old('semester', $peserta->semester) }}">
                                    @error('semester')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-primary">Kirim</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

</x-peserta-layout>
