<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from live.themewild.com/eduka/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 26 Apr 2025 20:26:49 GMT -->

<head>
    <!-- meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- title -->
    <title>@yield('title')</title>

    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('temp-admin') }}/app-assets/images/logo/logo-dpm.png">

    <!-- css -->
    <link rel="stylesheet" href="{{ asset('temp-pages') }}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('temp-pages') }}/assets/css/all-fontawesome.min.css">
    <link rel="stylesheet" href="{{ asset('temp-pages') }}/assets/css/animate.min.css">
    <link rel="stylesheet" href="{{ asset('temp-pages') }}/assets/css/magnific-popup.min.css">
    <link rel="stylesheet" href="{{ asset('temp-pages') }}/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('temp-pages') }}/assets/css/style.css">

</head>

<body>

    <!-- preloader -->
    <div class="preloader">
        <div class="loader-book">
            <div class="loader-book-page"></div>
            <div class="loader-book-page"></div>
            <div class="loader-book-page"></div>
        </div>
    </div>
    <!-- preloader end -->


    <!-- header area -->
    @include('pages.partials.header')
    <!-- header area end -->


    <!-- popup search -->
    <div class="search-popup">
        <button class="close-search"><span class="far fa-times"></span></button>
        <form id="popup-search-form" onsubmit="return false;">
            <div class="form-group">
                <input type="search" id="popup-search-input" name="search-field" placeholder="Cari Disini..." required>
                <button type="submit"><i class="far fa-search"></i></button>
            </div>
        </form>

    </div>
    <!-- popup search end -->


    <main class="main">
        @yield('content')
    </main>


    <!-- footer area -->
    @include('pages.partials.footer')
    <!-- footer area end -->


    <!-- scroll-top -->
    <a href="#" id="scroll-top"><i class="far fa-arrow-up-from-arc"></i></a>
    <!-- scroll-top end -->


    <!-- js -->
    <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{ asset('temp-pages') }}/assets/js/jquery-3.7.1.min.js"></script>
    <script src="{{ asset('temp-pages') }}/assets/js/modernizr.min.js"></script>
    <script src="{{ asset('temp-pages') }}/assets/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('temp-pages') }}/assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="{{ asset('temp-pages') }}/assets/js/jquery.magnific-popup.min.js"></script>
    <script src="{{ asset('temp-pages') }}/assets/js/isotope.pkgd.min.js"></script>
    <script src="{{ asset('temp-pages') }}/assets/js/jquery.appear.min.js"></script>
    <script src="{{ asset('temp-pages') }}/assets/js/jquery.easing.min.js"></script>
    <script src="{{ asset('temp-pages') }}/assets/js/owl.carousel.min.js"></script>
    <script src="{{ asset('temp-pages') }}/assets/js/counter-up.js"></script>
    <script src="{{ asset('temp-pages') }}/assets/js/wow.min.js"></script>
    <script src="{{ asset('temp-pages') }}/assets/js/main.js"></script>

</body>


<!-- Mirrored from live.themewild.com/eduka/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 26 Apr 2025 20:27:32 GMT -->

</html>
