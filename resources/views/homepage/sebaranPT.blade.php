<!-- Kerangka Template Main -->
@extends('homepage.layout.tplmain')

<!-- Title -->
@section('title', 'DirektoriPT - Homepage')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/leaflet/leaflet.css') }}" />
@endsection

@section('page-style')
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/leaflet/leaflet.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/maps-leaflet.js') }}"></script>
    <script src="{{ asset('assets/js/cards-actions.js') }}"></script>
@endsection

<!-- Konten -->
@section('content')
    <div class="col-xl-12">
        <!-- Layer Control -->
        <div class="card card-action mb-12">
            <div class="card-alert"></div>
            <div class="card-header">
                <h5 class="card-action-title mb-0">Sebaran Perguruan Tinggi</h5>
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

                <div class="card-body">
                    <div class="leaflet-map" id="layerControl"></div>
                </div>

            </div>
        </div>
        <!-- /Layer Control -->

        <!-- Layer Control -->
        <div class="card card-action mb-12">
            <div class="card-alert"></div>
            <div class="card-header">
                <h5 class="card-action-title mb-0">Sebaran Perguruan Tinggi Berdasarkan Bentuk Lembaga</h5>
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
                <div class="card-body">

                    <div class="row mb-12 g-6">
                        <!-- Rekap Perguruan Tinggi Table -->
                        <div class="col-lg-4">
                            <div class="card"
                                style="border-top: 5px solid #6F75FF; border-right: 1px solid #c7c7c7; 
                                                border-bottom: 1px solid #c7c7c7; border-left: 1px solid #c7c7c7; min-height: 550px;">
                                <div class="card-body">
                                    <h5 class="card-header">Rekap Perguruan Tinggi</h5>
                                    <div class="table-responsive text-nowrap">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr class="text-nowrap">
                                                    <th>No</th>
                                                    <th>Bentuk</th>
                                                    <th>Jumlah</th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-border-bottom-0">
                                                <tr>
                                                    @foreach ($bentukpt as $no => $pt)
                                                        <th scope="row">{{ $no + 1 }}</td>
                                                        <td>{{ $pt->namabentuk }}</td>
                                                        <td>{{ $pt->total }}</td>
                                                </tr>
                                                @endforeach
                                                <tr>
                                                    <td colspan="2"><b>Total</b></td>
                                                    <td colspan="2"><b>{{ $tpt }}</b></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Rekap Perguruan Tinggi Table -->

                        <!-- Akreditasi Perguruan Tinggi Table -->
                        <div class="col-lg-8">
                            <div class="card"
                                style="border-top: 5px solid #6F75FF; border-right: 1px solid #c7c7c7; 
                                                border-bottom: 1px solid #c7c7c7; border-left: 1px solid #c7c7c7; min-height: 550px;">
                                <div class="card-body">
                                    <div id="JumlahPerBentuk"></div>
                                </div>
                            </div>
                        </div>
                        <!-- End Akreditasi Perguruan Tinggi Table -->
                    </div>

                </div>
            </div>
        </div>
        <!-- /Layer Control -->

        <!-- Layer Control -->
        <div class="card card-action mb-12">
            <div class="card-alert"></div>
            <div class="card-header">
                <h5 class="card-action-title mb-0">Sebaran Perguruan Tinggi Berdasarkan Kabupaten/Kota</h5>
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
                <div class="card-body">

                    <div class="row mb-12 g-6">
                        <!-- Rekap Perguruan Tinggi Table -->
                        <div class="col-lg-4">
                            <div class="card"
                                style="border-top: 5px solid #6F75FF; border-right: 1px solid #c7c7c7; 
                                                border-bottom: 1px solid #c7c7c7; border-left: 1px solid #c7c7c7; min-height: 1815px;">
                                <div class="card-body">
                                    <h5 class="card-header">Berdasarkan Kabupaten/Kota</h5>
                                    <div class="table-responsive text-nowrap">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr class="text-nowrap">
                                                    <th>No</th>
                                                    <th>Kabupaten/Kota</th>
                                                    <th>Jumlah</th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-border-bottom-0">
                                                <tr>
                                                    @foreach ($wilayahpt as $no => $wilayahpt)
                                                        <th scope="row">{{ $no + 1 }}</td>
                                                        <td>{{ $wilayahpt->nama_kota_kab }}</td>
                                                        <td>{{ $wilayahpt->total }}</td>
                                                </tr>
                                                @endforeach
                                                <tr>
                                                    <td colspan="2"><b>Total</b></td>
                                                    <td colspan="2"><b>{{ $tpt }}</b></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Rekap Perguruan Tinggi Table -->

                        <!-- Rekap Perguruan Tinggi Table -->
                        <div class="col-lg-8">
                            <div class="card"
                                style="border-top: 5px solid #6F75FF; border-right: 1px solid #c7c7c7; 
                                                border-bottom: 1px solid #c7c7c7; border-left: 1px solid #c7c7c7; min-height: 1815px;">
                                <div class="card-body">
                                    <div id="JumlahWilayah"></div>
                                </div>
                            </div>
                        </div>
                        <!-- End Rekap Perguruan Tinggi Table -->

                    </div>

                </div>
            </div>
        </div>
        <!-- /Layer Control -->
    </div>

@endsection

@include('homepage.include.highchartSebaran')
