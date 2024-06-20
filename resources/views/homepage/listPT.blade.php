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
                <table id="pt" class="table table-bordered table-hover">
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

    <style>
        /* Bootstrap CSS untuk tabel */
        #pt {
            width: 100%;
            max-width: 100%;
            margin-bottom: 1rem;
            background-color: transparent;
            border-collapse: collapse;
            border-spacing: 0;
            border: 1px solid rgba(0, 0, 0, 0.125);
        }

        #pt th,
        #pt td {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid rgba(0, 0, 0, 0.125);
        }

        #pt thead th {
            vertical-align: bottom;
            border-bottom: 2px solid rgba(0, 0, 0, 0.125);
        }

        #pt tbody+tbody {
            border-top: 2px solid rgba(0, 0, 0, 0.125);
        }

        /* CSS untuk mengubah warna teks pagination menjadi hitam */
        .pagination .page-link {
            color: black !important;
            /* warna teks hitam */
        }

        /* CSS untuk mengubah warna teks pagination menjadi putih saat diklik */
        .pagination .page-item.active .page-link {
            color: white !important;
            /* warna teks putih */
        }

        .top-left {
            float: left;
        }
    </style>

    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#pt').DataTable({
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
                order: [
                    [1, 'asc']
                ],
                paging: false, // Menonaktifkan paginasi
                dom: '<"top-left"f>rt<"bottom"i><"clear">',
                language: {
                    search: "Cari:" // Mengubah label pencarian jika diperlukan
                }
            });
        });
    </script>

@endsection
