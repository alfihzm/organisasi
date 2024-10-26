<x-panitia-layout>
    <div class="page-wrapper">
        <div class="container">

            <div class="row">
                <div class="col-12">
                    @include('layouts.partials.alert-bs4')
                    <div class="card">
                        <div class="card-header">
                            <ul class="nav nav-pills card-header-pills">
                                <li class="nav-item">
                                    <a class="nav-link active" id="admin-tab" data-bs-toggle="tab" href="#admin"
                                        role="tab" aria-controls="admin" aria-selected="true">Admin</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="peserta-tab" data-bs-toggle="tab" href="#peserta"
                                        role="tab" aria-controls="peserta" aria-selected="false">Peserta</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="admin" role="tabpanel"
                                    aria-labelledby="admin-tab">
                                    <h4 class="card-title">Data Histori (Admin)</h4>
                                    <div class="table-responsive">
                                        <table id="admin_table" class="table table-striped table-bordered no-wrap"
                                            style="width: 100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-capitalize text-center"
                                                        style="width: 65px; vertical-align: middle">No</th>
                                                    <th class="text-capitalize">Keterangan</th>
                                                    <th class="text-capitalize text-center"
                                                        style="vertical-align: middle">Waktu</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($notifications as $n)
                                                    <tr>
                                                        <th class="text-center" scope="row">{{ $loop->iteration }}
                                                        </th>
                                                        <td>{!! $n->keterangan !!}</td>
                                                        <td class="text-center">
                                                            {{ $n->created_at->timezone('Asia/Jakarta')->format('H:i') }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="peserta" role="tabpanel" aria-labelledby="peserta-tab">
                                    <h4 class="card-title">Data Histori (Peserta)</h4>
                                    <div class="table-responsive">
                                        <table id="peserta_table" class="table table-striped table-bordered no-wrap"
                                            style="width: 100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-capitalize text-center"
                                                        style="width: 65px; vertical-align: middle">No</th>
                                                    <th class="text-capitalize"
                                                        style="width: 150px; vertical-align: middle">NIM</th>
                                                    <th class="text-capitalize"
                                                        style="width: 170px; vertical-align: middle">Kampus</th>
                                                    <th class="text-capitalize">Keterangan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($oprecHistory as $o)
                                                    <tr>
                                                        <th class="text-center" scope="row">{{ $loop->iteration }}
                                                        </th>
                                                        <td>{!! $o->NIM !!}</td>
                                                        <td>{!! $o->kampus !!}</td>
                                                        <td>{!! $o->keterangan !!}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <link href="{{ asset('template/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}"
        rel="stylesheet">
    <script src="{{ asset('template/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#admin_table').DataTable();
            $('#peserta_table').DataTable();
        });
    </script>
</x-panitia-layout>
