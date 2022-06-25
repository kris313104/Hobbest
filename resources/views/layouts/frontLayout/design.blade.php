<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <meta name="keywords" content="Hobbest, dating app, best dating app" />
    <meta name="description" content="Hobbest" />
    <meta name="robots" content="noindex,nofollow" />
    <title>Hobbest</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/hobbest_favicon.ico') }}" />
    <!-- Favicons -->
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Appland - v4.7.0
  * Template URL: https://bootstrapmade.com/free-bootstrap-app-landing-page-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <figure class="preloader" id="preloader">
        <div class="circles-group">
          <div class="circle"></div>
          <div class="circle"></div>
          <div class="circle"></div>
          <div class="circle"></div>
        </div>
      </figure>

    @include('layouts.frontLayout.header')

    @yield('content')

    @include('layouts.frontLayout.footer')

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <script>
        const preloader = document.querySelector('#preloader');

        preloader.classList.add('show-preloader');

        window.addEventListener('load', function() {
            setTimeout(function() {
                preloader.classList.remove('show-preloader');
            }, 100);
        });
    </script>
    <style>
        body {
  margin: 0;
}

.preloader {
  display: flex;
  justify-content: center;
  align-items: center;
  position: fixed;
  z-index: 10000;
  visibility: hidden;
  opacity: 0;
  width: 100vw;
  height: 100vh;
  top: 0;
  margin: 0;
  background-color: #d8a600;
  transition: opacity 400ms ease-in-out, visibility 0s 400ms;
}

.show-preloader {
  visibility: visible;
  opacity: 1;
}

.circle {
  background-color: #f9dc97;
  height: 10px;
  width: 10px;
  border-radius: 50%;
  display: inline-block;
  -webkit-animation: stretchdelay 0.7s infinite ease-in-out;
  animation: stretchdelay 0.7s infinite ease-in-out;
}

.preloader .circle:nth-child(1) {
  -webkit-animation-delay: -0.6s;
  animation-delay: -0.6s;
}

.preloader .circle:nth-child(2) {
  -webkit-animation-delay: -0.5s;
  animation-delay: -0.5s;
}

.preloader .circle:nth-child(3) {
  -webkit-animation-delay: -0.4s;
  animation-delay: -0.4s;
}

.preloader .circle:nth-child(4) {
  -webkit-animation-delay: -0.3s;
  animation-delay: -0.3s;
}

@keyframes stretchdelay {
  0%,
  40%,
  100% {
    transform: translateY(-10px);
    -webkit-transform: translateY(-10px);
  }
  20% {
    transform: translateY(-20px);
    -webkit-transform: translateY(-20px);
  }
}




    </style>
</body>
