@extends('auth.layout.tplmain')

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

    <!-- Login -->
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
            <h4 class="mb-1">Welcome to DirektoriPT 👋</h4>
            <p class="mb-5">Silahkan masuk ke akun Anda untuk mengakses
                DirektoriPT LLDIKTI Wilayah 4</p>

            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>
            @endif
            @if (\Session::has('message'))
                <div class="alert alert-danger">
                    {{ \Session::get('message') }}
                </div>
            @endif

            <form method="POST" action="{{ route('postlogin') }}">
                @csrf
                <div class="form-floating form-floating-outline mb-5">
                    <input type="text" class="form-control" id="username" name="username"
                        value="{{ old('username', Cookie::get('username') ? Cookie::get('username') : '') }}"
                        placeholder="Masukkan Username Anda" autofocus />
                    <label for="username">Username</label>
                    @if ($errors->has('username'))
                        <span class="text-danger">{{ $errors->first('username') }}</span>
                    @endif
                </div>
                <div class="mb-5">
                    <div class="form-password-toggle">
                        <div class="input-group input-group-merge">
                            <div class="form-floating form-floating-outline">
                                <input type="password" id="password" class="form-control" name="password"
                                    value="{{ old('password', Cookie::get('password') ? Cookie::get('password') : '') }}"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password" />
                                <label for="password">Password</label>
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <span class="input-group-text cursor-pointer"><i class="ri-eye-off-line"></i></span>
                        </div>
                    </div>
                </div>
                <div class="mb-5 d-flex justify-content-between mt-5">
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" id="remember-me" name="remember" />
                        <label class="form-check-label" for="remember-me"> Remember Me </label>
                    </div>
                </div>
                <div class="mb-5">
                    <button class="btn btn-primary d-grid w-100" type="submit">Masuk</button>
                </div>
            </form>

            <p class="text-center">
                <span>Belum punya akun?</span>
                <a href="{{ route('registration') }}">
                    <span>Daftar sekarang</span>
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

    <img alt="mask" src="../../assets/img/illustrations/auth-basic-login-mask-light.png"
        class="authentication-image d-none d-lg-block" data-app-light-img="illustrations/auth-basic-login-mask-light.png"
        data-app-dark-img="illustrations/auth-basic-login-mask-dark.png" />

@endsection
