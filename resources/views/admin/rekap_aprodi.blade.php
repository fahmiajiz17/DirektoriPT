<!-- Kerangka Template Main -->
@extends('tpl.layout.tplmain')

<!-- Title -->
@section('title', 'DirektoriPT - Rekap Data')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/spinkit/spinkit.css') }}" />
@endsection

@section('page-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/checkbox.css') }}" />
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/block-ui/block-ui.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/sortablejs/sortable.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/cards-actions.js') }}"></script>
@endsection

<!-- Konten -->
@section('content')

    <!-- Cards Action -->
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

                <form id="filterFormAProdi">
                    @csrf
                    <!-- Bagian Filter -->

                    <!-- Tabel Kabupaten/Kota -->
                    <table class="table table-bordered" style="border-top: 5px solid #6F75FF;">
                        <tbody>
                            <tr>
                                <td>
                                    <div class="row with-border">
                                        <h5 style="margin-bottom: 15px; margin-top: 7px;">Pilih Kabupaten/Kota
                                        </h5>
                                        <div class="col-md-12">
                                            <input type="checkbox" id="checkAllKota" />
                                            <label for="checkAllKota" style="font-size: 14px;">Checklist
                                                All</label>
                                        </div>
                                    </div>
                                    @php $chunkedKabupatenKota = $kabupatenKota->chunk(5); @endphp
                                    @foreach ($chunkedKabupatenKota as $chunk)
                                        <div class="row with-border">
                                            @foreach ($chunk as $kota)
                                                <div class="col-md-2 checkbox-container">
                                                    <input type="checkbox"
                                                        id="kabupatenKota{{ $loop->parent->index }}_{{ $loop->index }}"
                                                        name="kabupatenKota[]" value="{{ $kota->nama_kota_kab }}">
                                                    <label for="kabupatenKota{{ $loop->parent->index }}_{{ $loop->index }}"
                                                        style="font-size: 14px;">{{ $kota->nama_kota_kab }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endforeach
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <br>

                    <!-- Tabel Akreditasi -->
                    <table class="table table-bordered" style="border-top: 5px solid #6F75FF;">
                        <tbody>
                            <tr>
                                <td style="padding-left: 20px;">
                                    <h5 style="margin-bottom: 15px; margin-top: 10px;">Pilih Akreditasi</h5>
                                    <input type="checkbox" id="checkAllAkreditasi" />
                                    <label for="checkAllAkreditasi" style="font-size: 14px;">Checklist
                                        All</label>
                                    @foreach ($akreditasi as $akr)
                                        <!-- Hilangkan div class="row with-border" dan sesuaikan layout -->
                                        <div style="margin-top: 0px;">
                                            <input type="checkbox" id="akreditasi{{ $loop->index }}" name="akreditasi[]"
                                                value="{{ $akr->peringkat_akreditasi_banpt }}">
                                            <label for="akreditasi{{ $loop->index }}" style="font-size: 14px;">
                                                {{ $akr->peringkat_akreditasi_banpt_label ?? $akr->peringkat_akreditasi_banpt }}
                                            </label>
                                        </div>
                                    @endforeach
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <br>

                    <!-- Tabel Filter Prodi -->
                    <table class="table table-bordered" style="border-top: 5px solid #6F75FF;">
                        <tbody>
                            <tr>
                                <td style="padding-left: 20px;">
                                    <h5 style="margin-bottom: 15px; margin-top: 10px;">Pilih Filter Program
                                        Studi</h5>
                                    <div class="row" style="margin-top: 5px; margin-bottom: 0;">
                                        <div class="col-md-12">
                                            <input type="checkbox" id="prodiBaru" name="prodiBaru" value="1">
                                            <label for="prodiBaru" style="font-size: 14px;">Prodi Baru < 2 Tahun</label>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top: 0px; margin-bottom: 0;">
                                        <div class="col-md-12">
                                            <input type="checkbox" id="prodiKadaluarsa" name="prodiKadaluarsa"
                                                value="1">
                                            <label for="prodiKadaluarsa" style="font-size: 14px;">Prodi Kadaluarsa < 1 Bulan</label>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <br>

                    <!-- Tombol Proses -->
                    <button type="button" id="prosesFilterAProdi" class="btn btn-primary">Proses</button>

                </form>

                <br>

                <!-- Tabel Hasil Filter -->
                <div class="row">
                    <div class="col-xs-12">
                        <div id="tabelDataAProdi" class="table-responsive" data-pattern="priority-columns">
                            {{-- Data Tabel Tampil Disini --}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Card -->
        </div>
    </div>


    {{-- Fitur Proses dan Expor --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // Tombol Proses
            $('#prosesFilterAProdi').click(function() {
                $.ajax({
                    url: "{{ route('prosesFilterAProdi') }}",
                    type: "POST",
                    data: $('#filterFormAProdi').serialize(),
                    success: function(response) {
                        $('#tabelDataAProdi').html(response);
                    },
                    error: function(xhr, status, error) {
                        console.error("Error: ", xhr.responseText);
                    }
                });
            });

            // Kirim data filter ke fungsi exportToExcel menggunakan AJAX
            $('#exportToExcel').click(function() {
                $.ajax({
                    type: "GET",
                    url: "{{ route('export.excelAProdi') }}",
                    success: function(response) {
                        // Redirect ke URL file Excel yang dihasilkan
                        window.location.href = response;
                    },
                    error: function(xhr, status, error) {
                        console.error("Error: ", xhr.responseText);
                    }
                });
            });

            // Ketika halaman dimuat ulang
            if (!window.location.search.includes('scroll=false')) {
                $(window).scrollTop(0); // Set scroll ke atas jika tidak ada parameter 'scroll=false'
            }
        });
    </script>

@endsection
{{-- End Konten --}}
