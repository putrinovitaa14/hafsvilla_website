<!doctype html>
<html class="no-js') }}" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Hafsvilla | Booking Villa</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/logo2.png') }}">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('assetp/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assetp/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assetp/css/gijgo.css') }}">
    <link rel="stylesheet" href="{{ asset('assetp/css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('assetp/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assetp/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assetp/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assetp/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assetp/css/slick.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assetp/css/nice-select.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('assetp/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assetp/css/responsive.css') }}">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    @if ($message = Session::get('error'))
        <script>
            Swal.fire({
                toast: true,
                position: 'top-right',
                icon: 'error',
                title: '{{ $message }}',
                showConfirmButton: false,
                timer: 2500,
                timerProgressBar: true
            })
        </script>
    @endif

    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <strong>HV</b>
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->

    @include('layouts.user.navbar')
    @yield('content')
    @include('layouts.user.footer')



    <!-- JS here -->

    <!-- All JS Custom Plugins Link Here here -->
    <script src="{{ asset('assetp/js/vendor/modernizr-3.5.0.min.js') }}"></script>

    <!-- Jquery, Popper, Bootstrap -->
    <script src="{{ asset('assetp/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('assetp/js/popper.min.js') }}"></script>
    <script src="{{ asset('assetp/js/bootstrap.min.js') }}"></script>
    <!-- Jquery Mobile Menu -->
    <script src="{{ asset('assetp/js/jquery.slicknav.min.js') }}"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="{{ asset('assetp/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assetp/js/slick.min.js') }}"></script>
    <!-- Date Picker -->
    <script src="{{ asset('assetp/js/gijgo.min.js') }}"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="{{ asset('assetp/js/wow.min.js') }}"></script>
    <script src="{{ asset('assetp/js/animated.headline.js') }}"></script>
    <script src="{{ asset('assetp/js/jquery.magnific-popup.js') }}"></script>

    <!-- Scrollup, nice-select, sticky -->
    <script src="{{ asset('assetp/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('assetp/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assetp/js/jquery.sticky.js') }}"></script>

    <!-- contact js -->
    <script src="{{ asset('assetp/js/contact.js') }}"></script>
    <script src="{{ asset('assetp/js/jquery.form.js') }}"></script>
    <script src="{{ asset('assetp/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assetp/js/mail-script.js') }}"></script>
    <script src="{{ asset('assetp/js/jquery.ajaxchimp.min.js') }}"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="{{ asset('assetp/js/plugins.js') }}"></script>
    <script src="{{ asset('assetp/js/main.js') }}"></script>
</body>

</html>
