<!-- Kerangka Template Main -->
@extends('homepage.layout.tplmain')

<!-- Title -->
@section('title', 'DirektoriPT - Homepage')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
@endsection

@section('page-style')
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/cards-actions.js') }}"></script>
    <script src="{{ asset('assets/js/tables-datatables-advanced.js') }}"></script>
@endsection

@section('content')

    <div class="col-xl-12">
        <!-- Datatable -->
        <div class="card card-action mb-12">
            <div class="card-alert"></div>
            <div class="card-header">
                <h5 class="card-action-title mb-0">Data Perguruan Tinggi</h5>
                <div class="card-action-element">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <a href="javascript:void(0);" class="card-collapsible"><i
                                    class="tf-icons ri-arrow-up-s-line"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="javascript:void(0);" class="card-expand"><i
                                    class="tf-icons ri-fullscreen-line"></i></a>
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
                    <table id="pt" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>KODE</th>
                                <th>NAMA PERGURUAN TINGGI</th>
                                <th>APT</th>
                                <th>Alamat</th>
                                <th>Jenis PT</th>
                                <th>ΣPS</th>
                                <th>Domisili</th>
                                <th>Provinsi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <!-- End Datatable -->
    </div>

    <style>
        /* Bootstrap CSS untuk tabel */
        #pt {
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

        #pt th,
        #pt td {
            border-top: 1px solid rgba(0, 0, 0, 0.125);
        }

        .top-left {
            float: left;
        }

        .top-right {
            float: right;
            margin-top: 20px;
        }

        .dt-buttons .btn {
            background-color: #6F75FF !important;
            color: white !important;
        }

        .dt-buttons .btn:hover {
            background-color: #5a61d1 !important;
            color: white !important;
        }
    </style>

    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>

    <script>
        $(document).ready(function() {
            var table = $('#pt').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('getlistPT') }}',
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'kode_pt',
                        name: 'kode_pt'
                    },
                    {
                        data: 'nama_pt',
                        name: 'nama_pt',
                        render: function(data, type, row, meta) {
                            return '<a href="#">' + data + '</a>';
                        }
                    },
                    {
                        data: 'peringkat_aipt',
                        name: 'peringkat_aipt'
                    },
                    {
                        data: 'alamat',
                        name: 'alamat'
                    },
                    {
                        data: 'jenis_pt',
                        name: 'jenis_pt'
                    },
                    {
                        data: 'total_prodi',
                        name: 'total_prodi'
                    },
                    {
                        data: 'nama_kota_kab',
                        name: 'nama_kota_kab'
                    },
                    {
                        data: 'nama_provinsi',
                        name: 'nama_provinsi'
                    }
                ],
                responsive: true,
                order: [
                    [1, 'asc']
                ],
                paging: false, // Menonaktifkan paginasi
                dom: '<"top-left"f><"top-right"B>rt<"bottom"i><"clear">',
                buttons: [{
                    extend: 'collection',
                    text: 'Export',
                    buttons: [
                        'copy',
                        'csv',
                        'excel',
                        'pdf',
                        'print'
                    ]
                }],
                language: {
                    search: "Cari:" // Mengubah label pencarian jika diperlukan
                }
            });
        });
    </script>

@endsection
