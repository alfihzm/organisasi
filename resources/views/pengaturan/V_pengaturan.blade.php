<x-panitia-layout>
    <style>
        .toggle-switch {
            position: relative;
            width: 52.5px;
            height: 35px;
        }

        .toggle-switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 34px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 25px;
            width: 25px;
            left: 1px;
            bottom: 0.2px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }

        input:checked+.slider {
            background-color: #4b7afc;
        }

        input:checked+.slider:before {
            transform: translateX(26px);
        }

        .toggle-switch .slider:after {
            content: 'OFF';
            position: absolute;
            color: white;
            font-size: 10px;
            top: 7px;
            right: 5px;
        }

        input:checked+.slider:after {
            content: 'ON';
            left: 10px;
            right: unset;
        }
    </style>

    <div class="page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card mt-3">
                        <div class="card-header">
                            <h4>Tombol Pengaturan</h4>
                        </div>

                        @include('layouts.partials.alert-bs4')

                        <div class="card-body">
                            <p>
                                Klik untuk
                                {{ $is_active ? 'mematikan' : 'menyalakan' }}
                                OPREC HIMA CABANG
                            </p>

                            <form id="status-form">
                                @csrf
                                <div class="toggle-switch">
                                    <input type="checkbox" id="switch" name="is_active" value="1"
                                        onchange="updateStatus(this)" {{ $is_active ? 'checked' : '' }} />
                                    <label class="slider" for="switch"></label>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function updateStatus(element) {
            var isActive = $(element).is(':checked') ? 1 : 0;

            $.ajax({
                url: "{{ route('pengaturan.update-status') }}",
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    is_active: isActive
                },
                success: function(response) {
                    var statusText = isActive ? 'mematikan' : 'menyalakan';
                    $('p').text('Klik untuk ' + statusText + ' OPREC HIMSI DPC');
                },
                error: function(xhr) {
                    console.error('Error updating status:', xhr.responseText);
                }
            });
        }
    </script>
</x-panitia-layout>
