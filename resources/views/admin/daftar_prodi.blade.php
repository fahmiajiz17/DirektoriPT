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
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/checkbox.css') }}" />
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
            <h5 class="card-action-title mb-0">
                <a href="{{ route('kelola_data_pt') }}" style="color: black;">List Perguruan Program Studi</a> - <span
                    style="color: #6F75FF">{{ $nama_pt }}</span>
            </h5>
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
                <table id="daftar_prodi" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Kode Prodi</th>
                            <th>Nama Prodi</th>
                            <th>Akreditasi</th>
                            <th>Jenjang</th>
                            <th>Status Prodi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($prodi as $key => $prodi)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $prodi->kode_prodi }}</td>
                                <td>{{ $prodi->nama_prodi }}</td>
                                <td>{{ $prodi->peringkat_akreditasi_banpt }}-<a href="#"> history</a></td>
                                <td>{{ $prodi->nm_jenj_didik }}</td>
                                <td>{{ $prodi->status_prodi }}</td>
                                <td>
                                    <button class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#editModal{{ $prodi->kode_prodi }}">Edit</i></button>
                                </td>
                            </tr>
                            <!-- Include Modal Edit -->
                            @include('admin.daftar_prodi_modal')
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
        #daftar_prodi {
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

        #daftar_prodi th,
        #daftar_prodi td {
            border-top: 1px solid rgba(0, 0, 0, 0.125);
        }

        /* Posisikan tombol pencarian ke kiri atas */
        div.dataTables_wrapper div.dataTables_filter {
            float: left;
            text-align: left;
        }
    </style>

    {{-- DataTables CSS --}}
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    {{-- JQuery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- Bootstrap JS --}}
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    {{-- DataTables JS --}}
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#daftar_prodi').DataTable({
                "paging": false,
                "dom": 'f<"clear">rt<"bottom"ilp><"clear">'
            });
        });
    </script>
@endsection
{{-- End Konten --}}
