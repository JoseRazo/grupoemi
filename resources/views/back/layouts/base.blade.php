<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Grupo EMI - Panel de Administración</title>

    <meta content="Grupo EMI" name="keywords" />
    <meta content="Grupo EMI" name="description" />

    <link rel="icon" type="image/png" href="{{ asset('assets/images/logo-gremi.jpeg') }}" />

    <!-- Fonts and icons -->
    <script src="{{ asset('assets/admin/assets/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: {
                families: ["Public Sans:300,400,500,600,700"]
            },
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                urls: ["{{ asset('assets/admin/assets/css/fonts.min.css') }}"],
            },
            active: function() {
                sessionStorage.fonts = true;
            },
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/admin/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/assets/css/plugins.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/assets/css/kaiadmin.min.css') }}" />

    <!-- Multi.js CSS -->
    <link href="{{ asset('assets/admin/assets/multijs/multi.css') }}" rel="stylesheet">

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{ asset('assets/admin/assets/css/demo.css') }}" />

    @vite(['resources/js/app.js'])
    @livewireStyles

    @stack('styles')

</head>

<body>

    <div class="wrapper">
        @include('back.layouts.sidebar')
        <div class="main-panel">
            @include('back.layouts.header')
            <div class="container">
                <div class="page-inner">
                    @yield('content')
                </div>
            </div>
            @include('back.layouts.footer')
        </div>
    </div>

    <!--   Core JS Files   -->
    <script src="{{ asset('assets/admin/assets/js/core/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/admin/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/admin/assets/js/core/bootstrap.min.js') }}"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{ asset('assets/admin/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

    <!-- Chart JS -->
    <script src="{{ asset('assets/admin/assets/js/plugin/chart.js/chart.min.js') }}"></script>

    <!-- jQuery Sparkline -->
    <script src="{{ asset('assets/admin/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

    <!-- Chart Circle -->
    <script src="{{ asset('assets/admin/assets/js/plugin/chart-circle/circles.min.js') }}"></script>

    <!-- Datatables -->
    <script src="{{ asset('assets/admin/assets/js/plugin/datatables/datatables.min.js') }}"></script>

    <!-- Bootstrap Notify -->
    <script src="{{ asset('assets/admin/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

    <!-- jQuery Vector Maps -->
    <script src="{{ asset('assets/admin/assets/js/plugin/jsvectormap/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('assets/admin/assets/js/plugin/jsvectormap/world.js') }}"></script>

    <!-- Sweet Alert -->
    <script src="{{ asset('assets/admin/assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

    <!-- Kaiadmin JS -->
    <script src="{{ asset('assets/admin/assets/js/kaiadmin.min.js') }}"></script>

    <!-- Multi.js -->
    <script src="{{ asset('assets/admin/assets/multijs/multi.js') }}"></script>

    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    <script src="{{ asset('assets/admin/assets/js/setting-demo.js') }}"></script>
    <script src="{{ asset('assets/admin/assets/js/demo.js') }}"></script>
    @livewireScripts
    @stack('scripts')
</body>

</html>
