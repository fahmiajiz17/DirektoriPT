<!-- Kerangka Template Main -->
@extends('admin.layout.tplmain')

<!-- Title -->
@section('title', 'DirektoriPT - Kelola Data')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
@endsection

@section('page-style')

@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <!-- Flat Picker -->
    <script src="{{ asset('assets/vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/tables-datatables-advanced.js') }}"></script>
    <script src="{{ asset('assets/js/cards-actions.js') }}"></script>
@endsection

<!-- Konten -->
@section('content')

    <!-- Datatable -->
    <div class="card card-action mb-12">
        <div class="card-alert"></div>
        <div class="card-header">
            <h5 class="card-action-title mb-0">Data Program Studi</h5>
            <div class="card-action-element">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item">
                        <a href="javascript:void(0);" class="card-collapsible"><i
                                class="tf-icons ri-arrow-up-s-line"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="javascript:void(0);" class="card-expand"><i class="tf-icons ri-fullscreen-line"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="javascript:void(0);" class="card-close"><i class="tf-icons ri-close-line"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="collapse show">

            <!-- Card -->
            <div class="card-body">
                <table id="prodi" class="table table-bordered ">
                    <thead>
                        <tr>
                            <th style="width: 7%;">No</th>
                            <th style="width: 15%;">Kode Prodi</th>
                            <th style="width: 35%;">Nama Prodi</th>
                            <th style="width: 15%;">Jenjang</th>
                            <th style="width: 40%;">Perguruan Tinggi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data will be loaded by DataTables via AJAX -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- End Datatable -->

    <style>
       /* Bootstrap CSS untuk tabel */
        #prodi {
            width: 100%;
            max-width: 100%;
            background-color: transparent;
            border-collapse: separate;
            border-spacing: 0;
            border: 1px solid rgba(0, 0, 0, 0.125);
            border-radius: 10px;
            /* Menambahkan lengkungan pada sudut tabel */
            overflow: hidden;
            /* Agar sudut lengkung terlihat rapi */
        }

        #prodi th,
        #prodi td {
            border-top: 1px solid rgba(0, 0, 0, 0.125);
        }
    </style>

    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#prodi').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('getkelola_data_prodi') }}',
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'kode_prodi',
                        name: 'kode_prodi'
                    },
                    {
                        data: 'nama_prodi',
                        name: 'nama_prodi'
                    },
                    {
                        data: 'nm_jenj_didik',
                        name: 'nm_jenj_didik'
                    },
                    {
                        data: 'nama_pt',
                        name: 'nama_pt'
                    }
                ],
                columnDefs: [{
                    targets: 0,
                    render: function(data, type, full, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                }]
            });
        });
    </script>


@endsection
{{-- End Konten --}}
