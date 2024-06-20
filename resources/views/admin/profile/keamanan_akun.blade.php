<!-- Kerangka Template Main -->
@extends('admin.layout.tplmain')

<!-- Title -->
@section('title', 'DirektoriPT - Admin')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/@form-validation/form-validation.css') }}" />
@endsection

@section('page-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-account-settings.css') }}" />
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/@form-validation/popular.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/@form-validation/bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/@form-validation/auto-focus.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/cleavejs/cleave.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/pages-account-settings-security.js') }}"></script>
@endsection

<!-- Konten -->
@section('content')

    <!-- Content -->
    <div class="row">
        <div class="col-md-12">
            <div class="nav-align-top">
                <ul class="nav nav-pills flex-column flex-md-row mb-6 gap-2 gap-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pengaturan_akun') }}"><i class="ri-group-line me-2"></i>
                            Akun</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('keamanan_akun') }}"><i class="ri-lock-line me-2"></i> Keamanan</a>
                    </li>
                </ul>
            </div>
            <!-- Change Password -->
            <div class="card mb-6">
                <h5 class="card-header">Ganti Password</h5>
                <div class="card-body pt-1">
                    <form id="formAccountSettings" method="GET" onsubmit="return false">
                        <div class="row">
                            <div class="mb-5 col-md-6 form-password-toggle">
                                <div class="input-group input-group-merge">
                                    <div class="form-floating form-floating-outline">
                                        <input class="form-control" type="password" name="katasandisaatini"
                                            id="katasandisaatini"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                        <label for="katasandisaatini">Kata Sandi Saat Ini</label>
                                    </div>
                                    <span class="input-group-text cursor-pointer"><i class="ri-eye-off-line"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="row g-5 mb-6">
                            <div class="col-md-6 form-password-toggle">
                                <div class="input-group input-group-merge">
                                    <div class="form-floating form-floating-outline">
                                        <input class="form-control" type="password" id="katasandibaru" name="katasandibaru"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                        <label for="katasandibaru">Kata Sandi Baru</label>
                                    </div>
                                    <span class="input-group-text cursor-pointer"><i class="ri-eye-off-line"></i></span>
                                </div>
                            </div>
                            <div class="col-md-6 form-password-toggle">
                                <div class="input-group input-group-merge">
                                    <div class="form-floating form-floating-outline">
                                        <input class="form-control" type="password" name="konfirmkatasandibaru"
                                            id="konfirmkatasandibaru"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                        <label for="konfirmkatasandibaru">Konfirmasi Kata Sandi Baru</label>
                                    </div>
                                    <span class="input-group-text cursor-pointer"><i class="ri-eye-off-line"></i></span>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-body">Persyaratan Kata Sandi:</h6>
                        <ul class="ps-4 mb-0">
                            <li class="mb-4">Panjang minimal 8 karakter - semakin banyak, semakin baik</li>
                            <li class="mb-4">Setidaknya satu karakter huruf kecil</li>
                            <li>Setidaknya satu angka, simbol, atau karakter spasi</li>
                        </ul>
                        <div class="mt-6">
                            <button type="submit" class="btn btn-primary me-3">Simpan Perubahan</button>
                            <button type="reset" class="btn btn-outline-secondary">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
            <!--/ Change Password -->

            <!-- Recent Devices -->
            <div class="card">
                <h6 class="card-header">Perangkat Terbaru</h6>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-truncate">Browser</th>
                                <th class="text-truncate">Device</th>
                                <th class="text-truncate">Location</th>
                                <th class="text-truncate">Recent Activities</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-truncate text-heading">
                                    <i class="ri-macbook-line ri-20px text-warning me-3"></i>Chrome on Windows
                                </td>
                                <td class="text-truncate">HP Spectre 360</td>
                                <td class="text-truncate">Switzerland</td>
                                <td class="text-truncate">10, July 2021 20:07</td>
                            </tr>
                            <tr>
                                <td class="text-truncate text-heading">
                                    <i class="ri-android-line ri-20px text-success me-3"></i>Chrome on iPhone
                                </td>
                                <td class="text-truncate">iPhone 12x</td>
                                <td class="text-truncate">Australia</td>
                                <td class="text-truncate">13, July 2021 10:10</td>
                            </tr>
                            <tr>
                                <td class="text-truncate text-heading">
                                    <i class="ri-smartphone-line ri-20px text-danger me-3"></i>Chrome on Android
                                </td>
                                <td class="text-truncate">Oneplus 9 Pro</td>
                                <td class="text-truncate">Dubai</td>
                                <td class="text-truncate">14, July 2021 15:15</td>
                            </tr>
                            <tr>
                                <td class="text-truncate text-heading">
                                    <i class="ri-mac-line ri-20px text-info me-3"></i>Chrome on MacOS
                                </td>
                                <td class="text-truncate">Apple iMac</td>
                                <td class="text-truncate">India</td>
                                <td class="text-truncate">16, July 2021 16:17</td>
                            </tr>
                            <tr>
                                <td class="text-truncate text-heading">
                                    <i class="ri-macbook-line ri-20px text-warning me-3"></i>Chrome on Windows
                                </td>
                                <td class="text-truncate">HP Spectre 360</td>
                                <td class="text-truncate">Switzerland</td>
                                <td class="text-truncate">20, July 2021 21:01</td>
                            </tr>
                            <tr class="border-transparent">
                                <td class="text-truncate text-heading">
                                    <i class="ri-android-line ri-20px text-success me-3"></i>Chrome on Android
                                </td>
                                <td class="text-truncate">Oneplus 9 Pro</td>
                                <td class="text-truncate">Dubai</td>
                                <td class="text-truncate">21, July 2021 12:22</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--/ Recent Devices -->

        </div>
    </div>
    <!-- / Content -->

@endsection
