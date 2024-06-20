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
    <script src="{{ asset('assets/js/cards-actions.js') }}"></script>
@endsection

<!-- Konten -->
@section('content')

    <!-- Datatable -->
    <div class="card card-action mb-12">
        <div class="card-alert"></div>
        <div class="card-header">
            <h5 class="card-action-title mb-0">Data Kerjasama Perguruan Tinggi</h5>
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
                <table id="kspt" class="table table-bordered table-hover" style="font-size: 14px;">
                    <thead>
                        <tr>
                            <th style="width: 3%;">NO</th>
                            <th style="width: 15%;">PERGURUAN TINGGI</th>
                            <th style="width: 7%;">STATUS KERJASAMA</th>
                            <th style="width: 15%;">JENIS KERJASAMA</th>
                            <th style="width: 17%;">MASA WAKTU</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <!-- End Datatable -->

    <style>
        /* Bootstrap CSS untuk tabel */
        #kspt {
            width: 100%;
            max-width: 100%;
            margin-bottom: 1rem;
            background-color: transparent;
            border-collapse: collapse;
            border-spacing: 0;
            border: 1px solid rgba(0, 0, 0, 0.125);
        }

        #kspt th,
        #kspt td {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid rgba(0, 0, 0, 0.125);
        }

        #kspt thead th {
            vertical-align: bottom;
            border-bottom: 2px solid rgba(0, 0, 0, 0.125);
        }

        #kspt tbody+tbody {
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
            $('#kspt').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('getkerjasamaPT') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'nama_pt',
                        name: 'nama_pt'
                    },
                    {
                        data: 'status_kerjasama',
                        name: 'status_kerjasama'
                    },
                    {
                        data: 'jenis_kerjasama',
                        name: 'jenis_kerjasama'
                    },
                    {
                        data: 'masa_waktu',
                        name: 'masa_waktu'
                    }
                ]
            });
        });
    </script>
@endsection
