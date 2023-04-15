<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content=""/>
    <meta name="author" content="Serhii Matsenko"/>
    <meta name="robots" content=""/>
    <meta name="description" content="STO Service"/>
    <meta property="og:title" content="STO Service"/>
    <meta property="og:description" content="STO Service - Якісний ремонт вашого авто"/>
    <meta property="og:image" content="https://samar.dexignzone.com/xhtml/social-image.png"/>
    <meta name="format-detection" content="telephone=no">

    <!-- Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Title -->
    <title>STO Service</title>

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" href="images/favicon.png">

    <!-- Stylesheet -->
    <link href="{{ mix('samar/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ mix('samar/css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ mix('samar/css/animate.css') }}" rel="stylesheet">

    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="{{ mix('samar/css/style.css') }}">
    <link class="skin" rel="stylesheet" href="{{ mix('samar/css/skin-2.css') }}">

    <script src="{{ mix('samar/js/jquery.min.js') }}" type="text/javascript"></script><!-- JQUERY.MIN JS -->
    <script src="{{ mix('samar/js/wow.js') }}"></script><!-- WOW JS -->
    <script src="{{ mix('samar/js/popper.min.js') }}"></script><!-- POPPER.MIN JS -->
    <script src="{{ mix('samar/js/bootstrap.bundle.min.js') }}"></script><!-- BOOTSTRAP.MIN JS -->
    <script src="{{ mix('samar/js/owl.carousel.js') }}"></script><!-- OWL-CAROUSEL JS -->
    <script src="{{ mix('samar/js/magnific-popup.js') }}"></script><!-- MAGNIFIC-POPUP JS -->
    <script src="{{ mix('samar/js/waypoints-min.js') }}"></script><!-- WAYPOINTS JS -->
    <script src="{{ mix('samar/js/counterup.min.js') }}"></script><!-- COUNTERUP JS -->
    <script src="{{ mix('samar/js/isotope.pkgd.min.js') }}"></script><!-- ISOTOPE -->
    <script src="{{ mix('samar/js/imagesloaded.js') }}"></script><!-- IMAGESLOADED -->
    <script src="{{ mix('samar/js/masonry-4.2.2.js') }}"></script><!-- MASONRY -->
    <script src="{{ mix('samar/js/bootstrap-select.min.js') }}"></script><!-- BOOTSTRAP SELECT -->
    <script src="{{ mix('samar/js/dz.carousel.js') }}"></script><!-- OWL-CAROUSEL -->
    <script src="{{ mix('samar/js/dz.ajax.js') }}"></script><!-- CONTACT JS  -->
    <script src="{{ mix('samar/js/custom.js') }}"></script><!-- CUSTOM JS -->
</head>
<body id="bg">
{{--<div id="loading-area" class="loading-02"></div>--}}
<div class="page-wraper">
    @include('user_side.partials.header')
    <!-- Header End -->
    @yield('content')
    <!-- Footer -->
    @include('user_side.partials.footer')
    <!-- Footer End -->
    <button class="scroltop icon-up" type="button"><i class="fa fa-arrow-up"></i></button>
</div>
@include('user_side.partials.scripts')
@yield('scripts')
</body>
</html>
