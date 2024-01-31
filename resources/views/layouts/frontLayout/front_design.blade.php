<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="msapplication-TileColor" content="#0E0E0E">
    <meta name="template-color" content="#0E0E0E">
    <meta name="description" content="Index page">
    <meta name="keywords" content="index, page">
    <meta name="author" content="">
    <title>
        @if (!empty($meta_title))
            {{ $meta_title }}
        @else
            {{ config('app.name') }}
        @endif
    </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @if (!empty($meta_description))
        <meta name="description" content="{{ $meta_title }}">
    @else
        <meta name="description" content="{{ config('app.name') }}">
    @endif

    <meta property="og:title" content="{{ config('app.name') }}" />
    <meta property="og:type" content="site" />
    <meta property="og:description" content="{{ config('app.name') }}" />
    <meta property="og:url" content="{{ url('/') }}" />

    <meta name="twitter:title" content="{{ config('app.name') }}">
    <meta name="twitter:description" content="{{ config('app.name') }}">
    <meta name="twitter:card" content="summary_large_image">

   

    <!-- <link rel="shortcut icon" type="image/png" href="{{ asset('images/frontend_images/favicon.png') }}"> -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon.png') }}">



  <!-- CSS============================================ -->

    <!-- Vendor CSS (Bootstrap & Icon Font) -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/customFonts.css') }}">
    
     <!-- Plugins CSS (All Plugins Files) -->
     <link rel="stylesheet" href="{{ asset('assets/css/plugins/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/ion.rangeSlider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/photoswipe.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/photoswipe-default-skin.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/slick.css') }}">

        <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.min.css') }}">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    @yield('styles')

</head>

<body class="homepage-bg1">

   
    <div class="section-wrapper">


 <!-- ========== Preloader start ========== -->
 <div id="preLoader"></div>
 <!-- ========== Preloader end ========== -->


    <!-- Page Header-->
    @include('layouts/frontLayout/front_header')

    @yield('content')

    <!-- Page Footer-->
    @include('layouts/frontLayout/front_footer')

    </div>
    <!--====== jquery js ======-->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <!--====== Bootstrap js ======-->
    


      <!-- JS============================================ -->

    <!-- Vendors JS -->
    <script src="{{ asset('assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery-migrate-3.1.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/bootstrap.bundle.min.js') }}"></script>

    <!-- Plugins JS -->
    <script src="{{ asset('assets/js/plugins/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/swiper.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/mo.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.matchHeight-min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/ion.rangeSlider.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/photoswipe.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/photoswipe-ui-default.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.zoom.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/ResizeSensor.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.sticky-sidebar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/product360.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/scrollax.min.js') }}"></script>

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <!-- <script src="assets/js/vendor/vendor.min.js"></script>
<script src="assets/js/plugins/plugins.min.js"></script> -->

    <!-- Main Activation JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
    AOS.init();
    </script>
    <script>
        AOS.init({disable: 'mobile'});
    </script>
    @yield('scripts')

</body>

</html>
