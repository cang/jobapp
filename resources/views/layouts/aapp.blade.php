<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <meta http-equiv="x-ua-compatible" content="ie=edge">   
  <meta name="description" content="">
<!--   <link rel="manifest" href="site.webmanifest"> -->
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}">  
  
  <!-- CSS here -->
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  
    
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/price_rangs.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    

<!-- JS here -->

<script src="{{ asset('js/app.js') }}" crossorigin="anonymous"></script>
  
<!-- All JS Custom Plugins Link Here here -->
<script src="{{ asset('assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>

<!-- Jquery, Popper, Bootstrap -->
<script src="{{ asset('assets/js/vendor/jquery-1.12.4.min.js') }}" crossorigin="anonymous"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}" crossorigin="anonymous"></script>
<!-- Jquery Mobile Menu -->
<script src="{{ asset('assets/js/jquery.slicknav.min.js') }}"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/slick.min.js') }}"></script>
<script src="{{ asset('assets/js/price_rangs.js') }}"></script>

<!-- One Page, Animated-HeadLin -->
<script src="{{ asset('assets/js/wow.min.js') }}"></script>
<script src="{{ asset('assets/js/animated.headline.js') }}"></script>
<script src="{{ asset('assets/js/jquery.magnific-popup.js') }}"></script>

<!-- Scrollup, nice-select, sticky -->
<script src="{{ asset('assets/js/jquery.scrollUp.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.sticky.js') }}"></script>

<!-- contact js -->
<script src="{{ asset('assets/js/contact.js') }}"></script>
<script src="{{ asset('assets/js/jquery.form.js') }}"></script>
<script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('assets/js/mail-script.js') }}"></script>
<script src="{{ asset('assets/js/jquery.ajaxchimp.min.js') }}"></script>

<!-- Jquery Plugins, main Jquery -->	
<script src="{{ asset('assets/js/plugins.js') }}"></script>



  <title>
    @section('title')
      {{ config('app.name', 'Laravel') }}
    @show
  </title>
</head>


<body>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    
  @include('components.aheader')
  
  <main>
  
    @yield('content')

  </main>
  
  <x-footer />
  
  
</body>
</html>
