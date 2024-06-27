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

    <div class="col-xl-12">
        <!-- Datatable -->
        <div class="card card-action mb-12">
            <div class="card-alert"></div>
            <div class="card-header">
                <h5 class="card-action-title mb-0">Pemantauan Tatap Muka</h5>
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
                    <table id="pemantauanTM" class="table table-bordered" style="font-size: 14px;">
                        <thead>
                            <tr>
                                <th rowspan="2">NO</th>
                                <th rowspan="2">PERGURUAN TINGGI</th>
                                <th colspan="3" style="text-align: center;">PERSENTASE PEMENUHAN</th>
                            </tr>
                            <tr>
                                <th>PERSIAPAN</th>
                                <th>PELAKSANAAN</th>
                                <th>PEMANTAUAN</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pemantauanTM as $key => $pemantauanTM)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $pemantauanTM->nama_pt }}</td>
                                    {{-- <td>{{ $pemantauanTM-># }}</td>
                                <td>{{ $pemantauanTM-># }}</td>
                                <td>{{ $pemantauanTM-># }}</td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- End Datatable -->
    </div>

    <style>
        /* Bootstrap CSS untuk tabel */
        #pemantauanTM {
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

        #pemantauanTM th,
        #pemantauanTM td {
            border-top: 1px solid rgba(0, 0, 0, 0.125);
        }
    </style>

    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

    <script>
        new DataTable('#pemantauanTM');
    </script>


@endsection
