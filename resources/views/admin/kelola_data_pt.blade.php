<!-- Kerangka Template Main -->
@extends('tpl.layout.tplmain')

<!-- Title -->
@section('title', 'DirektoriPT - Kelola Data')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
@endsection
<link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/checkbox.css') }}" />
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
            <h5 class="card-action-title mb-0">Rekap Data Akreditasi Perguruan Tinggi</h5>
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
                            <th style="width: 6%;">NO</th>
                            <th style="width: 8%;">KODE</th>
                            <th style="width: 30%;">NAMA PERGURUAN TINGGI</th>
                            <th style="width: 15%;">AKREDITASI</th>
                            <th style="width: 7%;">ΣPS</th>
                            <th style="width: 15%;">Domisili</th>
                            <th style="width: 10%;">Status PT</th>
                            <th style="width: 5%;">Aksi</th>
                            <th style="width: 5%;">ID_SP</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pt as $key => $pt)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $pt->kode_pt }}</td>
                                <td>
                                    <a
                                        href="{{ route('daftar_prodi', ['kode_pt' => $pt->kode_pt]) }}">{{ $pt->nama_pt }}</a>
                                </td>
                                <td>
                                    @if ($pt->peringkat_aipt != 'Tidak Terakreditasi')
                                        {{ $pt->peringkat_aipt }} -<a href="#"> history</a>
                                    @else
                                        {{ $pt->peringkat_aipt }}
                                    @endif
                                </td>
                                <td>{{ $pt->total_prodi }}</td>
                                <td>{{ $pt->nama_kota_kab }}</td>
                                <td>{{ $pt->status_pt }}</td>
                                <td>
                                    <button class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#editModal{{ $pt->kode_pt }}">Edit</button>
                                </td>
                                <td>
                                    <a href="#"><i class="fa-solid fa-check" style="color: #63E6BE;"></i></a>
                                </td>
                            </tr>
                            <!-- Include Modal Edit -->
                            @include('admin.kelola_data_pt_modal')
                            <!-- End Include Modal Edit -->
                        @endforeach
                    </tbody>
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
    </style>

    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

    <script>
        new DataTable('#pt');
    </script>

@endsection
