<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    {{-- ============================
         🔹 SEO PRINCIPAL
    ============================ --}}
    <title>{{ $siteSettings->company_name }} - @yield('title')</title>

    <meta name="description"
        content="{{ $siteSettings->meta_description ?? 'Grupo Electromecánico Industrial (Grupo EMI) ofrece servicios profesionales en electricidad y mecánica industrial en Salamanca, Guanajuato. Diseño, instalación y mantenimiento de sistemas electromecánicos, automatización y proyectos eléctricos.' }}">
    <meta name="keywords"
        content="{{ $siteSettings->meta_keywords ?? 'electromecánica, electricidad industrial, mecánica industrial, automatización de procesos, tableros eléctricos, subestaciones eléctricas, mantenimiento industrial, Grupo EMI, Salamanca, Guanajuato' }}">
    <meta name="author" content="{{ $siteSettings->company_name }}">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- ============================
         🔹 FAVICON
    ============================ --}}
    <link rel="icon" type="image/png" href="{{ asset('storage/' . $siteSettings->logo_url) }}">
    <link rel="apple-touch-icon" href="{{ asset('storage/' . $siteSettings->logo_url) }}">
    <meta name="theme-color" content="#004aad">

    {{-- ============================
         🔹 LOCAL SEO
    ============================ --}}
    <meta name="geo.region" content="MX-GUA">
    <meta name="geo.placename" content="Salamanca, Guanajuato, México">
    <meta name="geo.position" content="20.57;-101.18">
    <meta name="ICBM" content="20.57, -101.18">

    {{-- ============================
         🔹 OPEN GRAPH (Facebook / LinkedIn / WhatsApp)
    ============================ --}}
    <meta property="og:type" content="website">
    <meta property="og:locale" content="es_MX">
    <meta property="og:site_name" content="{{ $siteSettings->company_name }}">
    <meta property="og:title" content="{{ $siteSettings->company_name }} - @yield('title')">
    <meta property="og:description"
        content="{{ $siteSettings->meta_description ?? 'Servicios electromecánicos industriales con calidad, innovación y compromiso en Salamanca, Guanajuato.' }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('storage/' . $siteSettings->og_image_url ?? $siteSettings->logo_url) }}">

    {{-- ============================
         🔹 TWITTER CARD
    ============================ --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $siteSettings->company_name }} - @yield('title')">
    <meta name="twitter:description"
        content="{{ $siteSettings->meta_description ?? 'Grupo EMI: especialistas en proyectos electromecánicos en Salamanca, Guanajuato.' }}">
    <meta name="twitter:image" content="{{ asset('storage/' . $siteSettings->og_image_url ?? $siteSettings->logo_url) }}">

    {{-- ============================
         🔹 JSON-LD (Datos estructurados para Google)
    ============================ --}}
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "name": "{{ $siteSettings->company_name }}",
            "alternateName": "Grupo EMI",
            "url": "{{ url('/') }}",
            "logo": "{{ asset('storage/' . $siteSettings->logo_url) }}",
            "description": "{{ $siteSettings->meta_description ?? 'Servicios electromecánicos industriales en Salamanca, Guanajuato.' }}",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "Valtierrilla",
                "addressLocality": "Salamanca",
                "addressRegion": "Guanajuato",
                "postalCode": "36700",
                "addressCountry": "MX"
            },
            "contactPoint": {
                "@type": "ContactPoint",
                "telephone": "{{ $siteSettings->phone ?? '+52' }}",
                "contactType": "Atención al cliente",
                "availableLanguage": "es"
            },
            "areaServed": {
                "@type": "Place",
                "name": "México"
            }
        }
    </script>

    {{-- ============================
         🔹 FUENTES Y ESTILOS
    ============================ --}}
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.timepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    @vite(['resources/js/app.js'])
    @stack('styles')

</head>

<body>
    @include('front.layouts.header')
    @include('front.layouts.navbar')

    @yield('content')

    @include('front.layouts.footer')
    @include('front.layouts.modal-quote')

    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen">
        <svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke-miterlimit="10" stroke="#F96D00" />
        </svg>
    </div>

    {{-- ============================
         🔹 SCRIPTS
    ============================ --}}
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.timepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/scrollax.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

    @stack('scripts')
</body>

</html>
