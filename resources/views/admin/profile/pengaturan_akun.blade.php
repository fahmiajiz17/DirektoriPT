<!-- Kerangka Template Main -->
@extends('admin.layout.tplmain')

<!-- Title -->
@section('title', 'DirektoriPT - Admin')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/tagify/tagify.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/@form-validation/form-validation.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/animate-css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
@endsection

@section('page-style')
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/tagify/tagify.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/@form-validation/popular.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/@form-validation/bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/@form-validation/auto-focus.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/cleavejs/cleave.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
@endsection

<!-- Konten -->
@section('content')

    <!-- Content -->
    <div class="row">
        <div class="col-md-12">
            <div class="nav-align-top">
                <ul class="nav nav-pills flex-column flex-md-row mb-6 gap-2 gap-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('pengaturan_akun') }}"><i
                                class="ri-group-line me-2"></i>Akun</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('keamanan_akun') }}"><i
                                class="ri-lock-line me-2"></i>Keamanan</a>
                    </li>
                </ul>
            </div>
            <div class="card mb-6">
                <!-- Account -->
                <div class="card-body">
                    <div class="d-flex align-items-start align-items-sm-center gap-6">
                        <img src="../../assets/img/avatars/1.png" alt="user-avatar"
                            class="d-block w-px-100 h-px-100 rounded-4" id="uploadedAvatar" />
                        <div class="button-wrapper">
                            <label for="upload" class="btn btn-primary me-3 mb-4" tabindex="0">
                                <span class="d-none d-sm-block">Upload foto baru</span>
                                <i class="ri-upload-2-line d-block d-sm-none"></i>
                                <input type="file" id="upload" class="account-file-input" hidden
                                    accept="image/png, image/jpeg" />
                            </label>
                            <button type="button" class="btn btn-outline-danger account-image-reset mb-4">
                                <i class="ri-refresh-line d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Reset</span>
                            </button>

                            <div>Diizinkan JPG, GIF atau PNG. Ukuran maksimal 800K</div>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <form id="formAccountSettings" method="GET" onsubmit="return false">
                        <div class="row mt-1 g-5">
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input class="form-control" type="text" id="namalengkap" name="namalengkap"
                                        value="Admin Pertama" autofocus />
                                    <label for="namalengkap">Nama Lengkap</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" class="form-control" id="jabatan" name="jabatan"
                                        value="Ketua Tim Kerja ARMI LLDIKTI 4" />
                                    <label for="jabatan">Jabatan</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input class="form-control" type="text" name="username" id="username"
                                        value="Admin" />
                                    <label for="username">Username</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input class="form-control" type="text" id="email" name="email"
                                        value="admin@gmail.com" placeholder="john.doe@example.com" />
                                    <label for="email">E-mail</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group input-group-merge">
                                    <div class="form-floating form-floating-outline">
                                        <input type="text" id="nomorhandphone" name="nomorhandphone" class="form-control"
                                            value="089 626 045 061" />
                                        <label for="nomorhandphone">Nomor Handphone</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <select id="user_level" class="select2 form-select">
                                        <option value="Administrator">Administrator</option>
                                        <option value="Admin PTS">Admin PTS</option>
                                        <option value="Admin Koperti" selected>Admin Kopertis</option>
                                        <option value="Dosen">Dosen</option>
                                    </select>
                                    <label for="user_level">User Level</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input class="form-control" type="text" id="iduser" name="iduser"
                                        value="2734" />
                                    <label for="iduser">Id User</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" class="form-control" id="kodept" name="kodept"
                                        value="19" maxlength="6" />
                                    <label for="kodept">Kode PT</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating form-floating-outline">
                                    <select id="user_status" class="select2 form-select">
                                        <option value="Aktif" selected>Aktif</option>
                                        <option value="Non-Aktif">Non-Aktif</option>
                                    </select>
                                    <label for="user_status">User Status</label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-6">
                            <button type="submit" class="btn btn-primary me-3">Simpan Perubahan</button>
                            <button type="reset" class="btn btn-outline-secondary">Reset</button>
                        </div>
                    </form>
                </div>
                <!-- /Account -->
            </div>
            <div class="card">
                <h5 class="card-header mb-1">Delete Account</h5>
                <div class="card-body">
                    <div class="mb-6 col-12 mb-0">
                        <div class="alert alert-warning">
                            <h6 class="alert-heading mb-1">Apakah Anda yakin ingin menghapus akun Anda?</h6>
                            <p class="mb-0">Setelah Anda menghapus akun Anda, tidak ada jalan untuk kembali. Harap yakin.
                            </p>
                        </div>
                    </div>
                    <form id="formAccountDeactivation" onsubmit="return false">
                        <div class="form-check mb-6">
                            <input class="form-check-input" type="checkbox" name="accountActivation"
                                id="accountActivation" />
                            <label class="form-check-label" for="accountActivation">Saya mengonfirmasi penonaktifan akun
                                saya</label>
                        </div>
                        <button type="submit" class="btn btn-danger deactivate-account" disabled>
                            Nonaktifkan Akun
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->

@endsection
