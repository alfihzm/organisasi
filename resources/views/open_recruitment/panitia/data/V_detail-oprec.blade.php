<x-panitia-layout>
    <!-- This page plugin CSS -->
    <link href="{{ asset('template/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}"
        rel="stylesheet">

    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @include('layouts.partials.alert-bs4')
                    <div class="card">
                        <div class="card-body">
                            <div class="action text-right">
                                @can('admin')
                                    <form action="/panitia/openrecruitment/{{ $oprec->id }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Yakin ingin menghapus?')"
                                            class="btn btn-sm btn-danger">HAPUS PESERTA</button>
                                    </form>
                                @endcan
                                <button type="button" data-target="#ubah-status" data-toggle="modal"
                                    class="btn btn-sm btn-primary">UBAH STATUS</button>
                            </div>
                            <div class="row row-cols-2 row-cols-sm-1 my-3">
                                <div class="col col-md-4 d-flex flex-column align-items-center" style="gap: 1rem">
                                    <img src="/storage/{{ $oprec->ektm }}"
                                        style="width: 30vh; border-radius:1rem;height: fit-content;">
                                    <div class="text-center">
                                        <h3 class="text-capitalize">{{ $oprec->full_name }}</h2>
                                    </div>
                                </div>
                                <div class="col my-2">
                                    <table class="table table-responsive table-striped table-hover table-sm">
                                        <tbody>
                                            <tr>
                                                <td class="align-middle">No Anggota</td>
                                                <td class="align-middle text-center"><span class="mx-2">:</span></td>
                                                <td class="align-middle">
                                                    {{ $oprec->no_anggota ? $oprec->no_anggota : '-' }}</td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle">NIM</td>
                                                <td class="align-middle text-center"><span class="mx-2">:</span></td>
                                                <td class="align-middle">{{ $oprec->NIM }}</td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle" style="vertical-align: top;">Nama Lengkap</td>
                                                <td class="align-middle text-center"><span class="mx-2">:</span></td>
                                                <td class="align-middle text-capitalize">{{ $oprec->full_name }}</td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle">Asal Kampus</td>
                                                <td class="align-middle text-center"><span class="mx-2">:</span></td>
                                                <td class="align-middle">{{ $oprec->campuses->name }}</td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle">Semester</td>
                                                <td class="align-middle text-center"><span class="mx-2">:</span></td>
                                                <td class="align-middle">{{ $oprec->semester }}</td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle">Email</td>
                                                <td class="align-middle text-center"><span class="mx-2">:</span></td>
                                                <td class="align-middle">
                                                    <a href="mailto:{{ $oprec->email }}">{{ $oprec->email }}</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle">Whatsapp</td>
                                                <td class="align-middle text-center"><span class="mx-2">:</span></td>
                                                <td class="align-middle">
                                                    <a
                                                        href="https://wa.me/{{ $oprec->whatsapp[0] == '0' ? '62' . substr($oprec->whatsapp, 1) : $oprec->whatsapp }}">{{ $oprec->whatsapp }}</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle">Instagram</td>
                                                <td class="align-middle text-center"><span class="mx-2">:</span></td>
                                                <td class="align-middle">
                                                    <a href="https://www.instagram.com/{{ $oprec->instagram }}"
                                                        target="_blank">
                                                        {{ $oprec->instagram }}
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle">E-KTM
                                                </td>
                                                <td class="align-middle text-center"><span class="mx-2">:</span></td>
                                                <td class="align-middle">
                                                    <button type="button" class="btn btn-sm btn-info"
                                                        data-toggle="modal" data-target="#ektm-modal"
                                                        style="border-radius: 8px">LIHAT</button>
                                                </td>
                                            </tr>
                                            <tr class="">
                                                <td class="align-middle">Bukti Follow HIMSI DPP</td>
                                                <td class="align-middle text-center"><span class="mx-2">:</span></td>
                                                <td class="align-middle">
                                                    <button type="button" class="btn btn-sm btn-info"
                                                        data-toggle="modal" data-target="#follow-modal"
                                                        style="border-radius: 8px">LIHAT</button>
                                                </td>
                                            </tr>
                                            @if ($oprec->follow_dpc == null)
                                                <tr>
                                                    <td class="align-middle" style="vertical-align: top;">Bukti Follow
                                                        HIMSI {{ $oprec->campuses->name }}</td>
                                                    <td class="align-middle text-center"
                                                        style="vertical-align: middle;"><span class="mx-2">:</span>
                                                    </td>
                                                    <td class="align-middle text-capitalize text-danger">Peserta belum
                                                        mengirim bukti follow</td>
                                                </tr>
                                            @else
                                                <tr class="">
                                                    <td class="align-middle">Bukti Follow HIMSI
                                                        {{ $oprec->campuses->name }}</td>
                                                    <td class="align-middle text-center"><span class="mx-2">:</span>
                                                    </td>
                                                    <td class="align-middle">
                                                        <button type="button" class="btn btn-sm btn-info"
                                                            data-toggle="modal" data-target="#follow-dpc-modal"
                                                            style="border-radius: 8px">LIHAT</button>
                                                    </td>
                                                </tr>
                                            @endif

                                            @if ($oprec->cv == null)
                                                <tr>
                                                    <td class="align-middle" style="vertical-align: top;">Curriculum
                                                        Vitae</td>
                                                    <td class="align-middle text-center"
                                                        style="vertical-align: middle;"><span class="mx-2">:</span>
                                                    </td>
                                                    <td class="align-middle text-capitalize text-danger">Peserta belum
                                                        mengunggah CV</td>
                                                </tr>
                                            @else
                                                <tr>
                                                    <td class="align-middle">Curriculum Vitae</td>
                                                    <td class="align-middle text-center"><span class="mx-2">:</span>
                                                    </td>
                                                    <td class="align-middle">
                                                        <a target="_blank"
                                                            href="/storage/document/cv/{{ $oprec->cv }}"
                                                            class="btn btn-sm btn-info" style="border-radius: 8px">
                                                            LIHAT
                                                        </a>
                                                        @can('admin')
                                                            <form action="{{ route('hapusCV', $oprec->id) }}"
                                                                method="POST" class="d-inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    onclick="return confirm('Yakin ingin menghapus?')"
                                                                    class="btn btn-sm btn-danger"
                                                                    style="border-radius: 8px">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                            </form>
                                                        @endcan
                                                    </td>
                                                </tr>
                                            @endif
                                            <tr>
                                                <td class="align-middle">Status Pengecekan</td>
                                                <td class="align-middle text-center"><span class="mx-2">:</span>
                                                </td>
                                                <td class="align-middle"><span
                                                        class="text-capitalize @if ($oprec->status_interview == 'belum') text-danger @else text-success @endif">{{ $oprec->status_interview }}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle" style="vertical-align: top;">Motivasi
                                                    Bergabung</td>
                                                <td></td>
                                                <td class="align-middle"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="p-2 shadow mt-2"
                                        style="border: 0.5px solid rgb(129, 129, 129);border-radius: 8px">
                                        {!! $oprec->motivasi_bergabung !!}
                                    </div>

                                    <div class="modal fade" id="ektm-modal" tabindex="-1"
                                        aria-labelledby="ektm-modalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="ektm-modalLabel">E-KTM
                                                        {{ $oprec->full_name }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body d-flex justify-content-center">
                                                    <img class="img-preview img-fluid mb-3 col-5"
                                                        src="/storage/{{ $oprec->ektm }}">
                                                </div>
                                                <div class="modal-footer justify-content-center">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="follow-modal" tabindex="-1"
                                        aria-labelledby="follow-modalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="follow-modalLabel">Bukti Follow</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body d-flex justify-content-center">
                                                    <img class="img-preview img-fluid mb-3 col-5"
                                                        src="/storage/{{ $oprec->follow }}">
                                                </div>
                                                <div class="modal-footer justify-content-center">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="follow-dpc-modal" tabindex="-1"
                                        aria-labelledby="follow-dpc-modalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="follow-dpc-modalLabel">Bukti Follow
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body d-flex justify-content-center">
                                                    <img class="img-preview img-fluid mb-3 col-5"
                                                        src="/storage/{{ $oprec->follow_dpc }}">
                                                </div>
                                                <div class="modal-footer justify-content-center">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="ubah-status" tabindex="-1"
                                        aria-labelledby="ektm-modalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <form action="/panitia/openrecruitment/interview/{{ $oprec->id }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="ektm-modalLabel">Status
                                                            Pengecekan
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="input-group-text">
                                                                    <input type="radio" name="status_interview"
                                                                        id="status" value="belum"
                                                                        {{ $oprec->status_interview == 'belum' ? 'checked' : '' }}><label
                                                                        class="mx-2">Belum</label>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="input-group-text">
                                                                    <input type="radio" name="status_interview"
                                                                        id="status" value="lolos"
                                                                        {{ $oprec->status_interview == 'lolos' ? 'checked' : '' }}><label
                                                                        class="mx-2">Lolos</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer justify-content-center">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-success">Simpan</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        {{-- <footer class="footer text-center text-muted">
            All Rights Reserved by Adminmart. Designed and Developed by <a href="https://wrappixel.com">WrapPixel</a>.
        </footer> --}}
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
    <!--This page plugins -->
    <script src="{{ asset('template/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('template/dist/js/pages/datatable/datatable-basic.init.js') }}"></script>
</x-panitia-layout>
