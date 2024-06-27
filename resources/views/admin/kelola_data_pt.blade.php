<!-- Kerangka Template Main -->
@extends('admin.layout.tplmain')

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
                        <!-- Data akan diisi oleh DataTables -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- End Datatable -->

    <!-- Modal Container -->
    <div id="modal-container">
        <!-- Modals will be appended here -->
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

        /* Posisikan tombol pencarian ke kiri atas */
        div.dataTables_wrapper div.dataTables_filter {
            float: left;
            text-align: left;
        }
    </style>

    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            var table = $('#pt').DataTable({
                "processing": true,
                "serverSide": true,
                "paging": false, // Nonaktifkan pagination
                "ajax": "{{ route('getkelola_data_pt') }}",
                "columns": [
                    { "data": "DT_RowIndex", "orderable": false, "searchable": false },
                    { "data": "kode_pt" },
                    { "data": "nama_pt" },
                    { "data": "peringkat_aipt" },
                    { "data": "total_prodi" },
                    { "data": "nama_kota_kab" },
                    { "data": "status_pt" },
                    { "data": "aksi", "orderable": false, "searchable": false },
                    { "data": "id_sp", "orderable": false, "searchable": false }
                ],
                "dom": 'f<"clear">rt<"bottom"ilp><"clear">'
            });

            table.on('draw', function() {
                // Clear the modal container
                $('#modal-container').empty();
                
                // Append the modals to the container
                table.ajax.json().data.forEach(function(row) {
                    $('#modal-container').append(row.modal);
                });
            });
        });
    </script>

@endsection


