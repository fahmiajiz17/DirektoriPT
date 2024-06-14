<!-- Kerangka Template Main -->
@extends('auth.tplmain')

<!-- Title -->
@section('title', 'DirektoriPT - Login')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/@form-validation/form-validation.css') }}" />
@endsection

@section('page-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}" />
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/@form-validation/popular.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/@form-validation/bootstrap5.js') }}"></script>
    <script src="{{ asset('/assets/vendor/libs/@form-validation/auto-focus.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/pages-auth.js') }}"></script>
@endsection

<!-- Konten -->
@section('content')

    <!-- Register Card -->
    <div class="card p-md-7 p-1">
        <!-- Logo -->
        <div class="app-brand justify-content-center mt-5">
            <a href="index.html" class="app-brand-link gap-2">
                <span class="app-brand-logo demo">
                    <span style="color: #666cff">
                        <img src="images/twh.png" width="33" height="33" alt="Logo">
                    </span>
                </span>
                <span class="app-brand-text demo text-heading fw-semibold">DirektoriPT</span>
            </a>
        </div>
        <!-- /Logo -->

        <div class="card-body mt-1">
            <h4 class="mb-1">Daftar Akun DirektoriPT 🚀</h4>
            <p class="mb-5">Buat akun baru untuk mendapatkan akses ke
                DirektoriPT LLDIKTI Wilayah 4 </p>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('postsignup') }}" class="mb-5" method="POST">
                @csrf
                <div class="form-floating form-floating-outline mb-5">
                    <input type="text" class="form-control" id="name" name="name"
                        placeholder="Masukkan nama Anda" autofocus />
                    <label for="name">Nama</label>
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="form-floating form-floating-outline mb-5">
                    <input type="text" class="form-control" id="email_address" name="email"
                        placeholder="Masukkan email yang valid" />
                    <label for="email">Email</label>
                </div>
                <div class="mb-5 form-password-toggle">
                    <div class="input-group input-group-merge">
                        <div class="form-floating form-floating-outline">
                            <input type="password" id="password" class="form-control" name="password"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                aria-describedby="password" />
                            <label for="password">Password</label>
                        </div>
                        <span class="input-group-text cursor-pointer"><i class="ri-eye-off-line"></i></span>
                    </div>
                </div>

                <div class="mb-5">
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" />
                        <label class="form-check-label" for="terms-conditions">
                            Saya Setuju
                        </label>
                    </div>
                </div>
                <button class="btn btn-primary d-grid w-100">Daftar</button>
            </form>

            <p class="text-center">
                <span>Sudah punya akun?</span>
                <a href="{{ route('login') }}">
                    <span>Masuk Sekarang</span>
                </a>
            </p>

            <div class="divider my-5">
                <div class="divider-text">or</div>
            </div>

            <div class="d-flex justify-content-center gap-2">
                <a href="{{ route('dashboard_homepage') }}">
                    <span>Halaman Depan</span>
                </a>
            </div>
        </div>
    </div>
    <!-- Register Card -->

    <img alt="mask" src="../../assets/img/illustrations/auth-basic-register-mask-light.png"
        class="authentication-image d-none d-lg-block" data-app-light-img="illustrations/auth-basic-register-mask-light.png"
        data-app-dark-img="illustrations/auth-basic-register-mask-dark.png" />

@endsection
