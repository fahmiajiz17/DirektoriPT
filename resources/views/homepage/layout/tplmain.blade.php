<!doctype html>

<html lang="en" class="light-style layout-navbar-fixed layout-wide" dir="ltr" data-theme="theme-default"
    data-assets-path="../../assets/" data-template="front-pages-no-customizer" data-style="light">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>@yield('title')</title>

    <meta name="description" content="" />

    <!-- CSS -->
    @include('homepage.include.style')

</head>

<body>

    <!-- Header -->
    @include('homepage.include.header')

    <div data-bs-spy="scroll" class="scrollspy-example">
        <section id="landingTeam" class="section-py bg-body landing-team">
            <div class="container bg-icon-right position-relative">
                <div class="row gy-lg-5 gy-12 mt-2">

                    <!-- Content -->
                    @yield('content')

                </div>
            </div>
        </section>
    </div>

    <!-- Footer -->
    @include('homepage.include.footer')

    <!-- JavaScript -->
    @include('homepage.include.script')

</body>

</html>
