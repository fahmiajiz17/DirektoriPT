<!-- Kerangka Template Main -->
@extends('admin.layout.tplmain')

<!-- Title -->
@section('title', 'DirektoriPT - Admin')

@section('vendor-style')
@endsection

@section('page-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/front-page-landing.css') }}" />
@endsection

@section('vendor-script')
@endsection

@section('page-script')
@endsection

<!-- Konten -->
@section('content')

    <!-- Card Border Shadow -->
    <div class="row g-6">
        <div class="col-lg-3 col-sm-6">
            <div class="card" style="border: 1px solid #c7c7c7;">
                <div class="bg-label-primary position-relative team-image-box"
                    style="height: 100px; display: flex; justify-content: center; align-items: center; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                    <img src="../../assets/img/front-pages/landing-page/campus1.png"
                        class="position-absolute card-img-position bottom-0" alt="human image"
                        style="width: 185px; height: auto;" />
                </div>
                <div class="card-body text-center" style="height: 100px;">
                    <h4 class="card-title mb-0">{{ $tpt }}</h4>
                    <h5 class="mb-3 fw-normal">Total Perguruan Tinggi</h5>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card" style="border: 1px solid #c7c7c7;">
                <div class="bg-label-danger position-relative team-image-box"
                    style="height: 100px; display: flex; justify-content: center; align-items: center; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                    <img src="../../assets/img/front-pages/landing-page/graduation1.png"
                        class="position-absolute card-img-position bottom-0" alt="human image"
                        style="width: 135px; height: auto;" />
                </div>
                <div class="card-body text-center" style="height: 100px;">
                    <h4 class="card-title mb-0">{{ $tprodi }}</h4>
                    <h5 class="fw-normal">Total Program Studi</h5>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card" style="border: 1px solid #c7c7c7;">
                <div class="bg-label-success position-relative team-image-box"
                    style="height: 100px; display: flex; justify-content: center; align-items: center; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                    <img src="../../assets/img/front-pages/landing-page/bentuk1.png"
                        class="position-absolute card-img-position bottom-0" alt="human image"
                        style="width: 155px; height: auto;" />
                </div>
                <div class="card-body text-center" style="height: 100px;">
                    <h4 class="card-title mb-0">{{ $tbentukpt }}</h4>
                    <h5 class="fw-normal">Total Bentuk PT</h5>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card" style="border: 1px solid #c7c7c7;">
                <div class="bg-label-info position-relative team-image-box"
                    style="height: 100px; display: flex; justify-content: center; align-items: center; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                    <img src="../../assets/img/front-pages/landing-page/map1.png"
                        class="position-absolute card-img-position bottom-0" alt="human image"
                        style="width: 130px; height: auto;" />
                </div>
                <div class="card-body text-center" style="height: 100px;">
                    <h4 class="card-title mb-0">{{ $twilayah }}</h4>
                    <h5 class="fw-normal">Total Wilayah</h5>
                </div>
            </div>
        </div>
        <!--/ Card Border Shadow -->

        <!-- Grafik dan Data -->
        <div class="col-xl-12">
            <div class="card text-center mb-4" style="border: 1px solid #c7c7c7;">
                <div class="card-header p-0">
                    <div class="nav-align-top">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <button type="button" class="nav-link d-flex flex-column gap-1 active" role="tab"
                                    data-bs-toggle="tab" data-bs-target="#navs-grafik-card" aria-controls="navs-grafik-card"
                                    aria-selected="true">
                                    <i class="tf-icons ri-bar-chart-box-line"></i> Grafik
                                </button>
                            </li>
                            <li class="nav-item">
                                <button type="button" class="nav-link d-flex flex-column gap-1" role="tab"
                                    data-bs-toggle="tab" data-bs-target="#navs-data-card" aria-controls="navs-data-card"
                                    aria-selected="false">
                                    <i class="tf-icons ri-table-line"></i> Data
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content pb-0">

                        <!-- Grafik -->
                        <div class="tab-pane fade show active" id="navs-grafik-card" role="tabpanel">
                            <div class="row mb-12 g-6">

                                <!-- Chart APT -->
                                <div class="col-md">
                                    <div class="card"
                                        style="border-top: 5px solid #6F75FF; border-right: 1px solid #c7c7c7; 
                                                border-bottom: 1px solid #c7c7c7; border-left: 1px solid #c7c7c7;">
                                        <div class="row g-0">
                                            <div class="col-md-12">
                                                <div class="card-body">
                                                    <div id="JumlahPeringkatApt"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Chart APT -->

                                <!-- Chart APS -->
                                <div class="col-md">
                                    <div class="card"
                                        style="border-top: 5px solid #6F75FF; border-right: 1px solid #c7c7c7; 
                                                border-bottom: 1px solid #c7c7c7; border-left: 1px solid #c7c7c7;">
                                        <div class="row g-0">
                                            <div class="col-md-12">
                                                <div class="card-body">
                                                    <div id="JumlahAkreditasiProdi"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Chart APS -->
                            </div>

                            <div class="row mb-12 g-6">
                                <!-- Chart Bentuk PT -->
                                <div class="col-md">
                                    <div class="card"
                                        style="border-top: 5px solid #6F75FF; border-right: 1px solid #c7c7c7; 
                                                border-bottom: 1px solid #c7c7c7; border-left: 1px solid #c7c7c7;">
                                        <div class="row g-0">
                                            <div class="col-md-12">
                                                <div class="card-body">
                                                    <div id="JumlahPerBentuk"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Chart Bentuk PT -->

                                <!-- Chart Wilayah -->
                                <div class="col-md">
                                    <div class="card"
                                        style="border-top: 5px solid #6F75FF; border-right: 1px solid #c7c7c7; 
                                                border-bottom: 1px solid #c7c7c7; border-left: 1px solid #c7c7c7;">
                                        <div class="row g-0">
                                            <div class="col-md-12">
                                                <div class="card-body">
                                                    <div id="JumlahPerProvinsi"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Chart Wilayah -->

                            </div>
                        </div>

                        <!-- Data -->
                        <div class="tab-pane fade" id="navs-data-card" role="tabpanel">

                            <div class="row mb-12 g-6">
                                <!-- Rekap Perguruan Tinggi Table -->
                                <div class="col-lg-6">
                                    <div class="card"
                                        style="border-top: 5px solid #6F75FF; border-right: 1px solid #c7c7c7; 
                                                border-bottom: 1px solid #c7c7c7; border-left: 1px solid #c7c7c7; min-height: 540px;">
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
                                <div class="col-lg-6">
                                    <div class="card"
                                        style="border-top: 5px solid #6F75FF; border-right: 1px solid #c7c7c7; 
                                                border-bottom: 1px solid #c7c7c7; border-left: 1px solid #c7c7c7; min-height: 540px;">
                                        <div class="card-body">
                                            <h5 class="card-header">Akreditasi Perguruan Tinggi</h5>
                                            <div class="table-responsive text-nowrap">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr class="text-nowrap">
                                                            <th>No</th>
                                                            <th>Peringkat Akreditasi</th>
                                                            <th>Jumlah</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="table-border-bottom-0">
                                                        <tr>
                                                            @foreach ($akred_pt as $no => $pt)
                                                                <th scope="row">{{ $no + 1 }}</td>
                                                                <td>{{ $pt->peringkat_aipt }}</td>
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
                                <!-- End Akreditasi Perguruan Tinggi Table -->
                            </div>

                            <div class="row mb-12 g-6">
                                <!-- Akreditasi Program Studi Table -->
                                <div class="col-lg-6">
                                    <div class="card"
                                        style="border-top: 5px solid #6F75FF; border-right: 1px solid #c7c7c7; 
                                                border-bottom: 1px solid #c7c7c7; border-left: 1px solid #c7c7c7; min-height: 666px;">
                                        <div class="card-body">
                                            <h5 class="card-header">Akreditasi Program Studi</h5>
                                            <div class="table-responsive text-nowrap">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr class="text-nowrap">
                                                            <th>No</th>
                                                            <th>Peringkat Akreditasi</th>
                                                            <th>Jumlah</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="table-border-bottom-0">
                                                        <tr>
                                                            @foreach ($akred_prodi as $no => $pt)
                                                                <th scope="row">{{ $no + 1 }}</td>
                                                                <td>{{ $pt->peringkat_akreditasi_banpt }}</td>
                                                                <td>{{ $pt->total }}</td>
                                                        </tr>
                                                        @endforeach
                                                        <tr>
                                                            <td colspan="2"><b>Total</b></td>
                                                            <td colspan="2"><b>{{ $tprodi }}</b></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Akreditasi Program Studi Table -->

                                <!-- Akreditasi Perguruan tinggi perbentuk Table -->
                                <div class="col-lg-6">
                                    <div class="card"
                                        style="border-top: 5px solid #6F75FF; border-right: 1px solid #c7c7c7; 
                                                border-bottom: 1px solid #c7c7c7; border-left: 1px solid #c7c7c7; min-height: 666px;">
                                        <div class="card-body">
                                            <h5 class="card-header">Akreditasi Perguruan Tinggi Perbentuk</h5>
                                            <div class="table-responsive text-nowrap">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr class="text-nowrap">
                                                            <th>Bentuk</th>
                                                            <th>Akreditasi A</th>
                                                            <th>Akreditasi B</th>
                                                            <th>Akreditasi C</th>
                                                            <th>Unggul</th>
                                                            <th>Baik Sekali</th>
                                                            <th>Baik</th>
                                                            <th>Tidak Terakreditasi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="table-border-bottom-0">
                                                        @foreach ($rekap as $value)
                                                            <tr>
                                                                <td>{{ $value->namabentuk }}</td>
                                                                <td>{{ $value->A }}</td>
                                                                <td>{{ $value->B }}</td>
                                                                <td>{{ $value->C }}</td>
                                                                <td>{{ $value->Unggul }}</td>
                                                                <td>{{ $value->BS }}</td>
                                                                <td>{{ $value->Baik }}</td>
                                                                <td>{{ $value->TdkAkred }}</td>
                                                            </tr>
                                                        @endforeach
                                                        <tr>
                                                            <td><strong>Sub Total</strong></td>
                                                            <td><b>{{ $totalAkred['TotalA'] }}</b></td>
                                                            <td><b>{{ $totalAkred['TotalB'] }}</b></td>
                                                            <td><b>{{ $totalAkred['TotalC'] }}</b></td>
                                                            <td><b>{{ $totalAkred['TotalUnggul'] }}</b></td>
                                                            <td><b>{{ $totalAkred['TotalBS'] }}</b></td>
                                                            <td><b>{{ $totalAkred['TotalBaik'] }}</b></td>
                                                            <td><b>{{ $totalAkred['TotalTdkAkred'] }}</b></td>
                                                        </tr>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td colspan="1"><b>Total</b></td>
                                                            <td colspan="7" class="text-center">
                                                                <b>{{ $total_semua_akred }}</b>
                                                            </td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Akreditasi Perguruan tinggi perbentuk Table -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Grafik dan Data -->

        <div class="col-xl-12">
            <div class="alert alert-solid-info d-flex align-items-center" role="alert">
                <span class="alert-icon rounded">
                    <i class="ri-information-line ri-22px"></i>
                </span>
                Data di atas adalah Perguruan Tinggi Aktif Versi LLDIKTI Wilayah IV berdasarkan ajuan dari Perguruan
                Tinggi
                Swasta di lingkungan LLDIKTI Wilayah IV
            </div>
        </div>

    </div>
    <!-- / Content -->

@endsection

@include('admin.include.highchart')
