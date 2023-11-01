<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link rel="stylesheet" href="{{ asset('bootstrap-5.3.2/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('styles.css') }}">
        <link rel="stylesheet" href="{{ asset('fontawesome-6.4.2/css/all.min.css') }}">
        <link rel="shortcut icon" href="{{ asset('image/dosencoding-bw.png') }}" type="image/x-icon">
        <script src="{{ asset('bootstrap-5.3.2/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('fontawesome-6.4.2/js/all.min.js') }}"></script>
        <script src="{{ asset('scripts.js') }}"></script>
    </head>
    <body class="sb-nav-fixed">
        @include('template.navigasi-atas')
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                @include('template.navigasi-kiri')
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4 pt-4">
                        @include('template.pesan-kilat')
                        @yield('konten')
                    </div>
                </main>
                @include('template.footer')
            </div>
        </div>
    </body>
</html>
