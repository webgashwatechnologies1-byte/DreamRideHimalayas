<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('meta_title', 'DreamRide') </title>

  @yield('meta')
  {{-- Example using Bootstrap (or Tailwind if you prefer) --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/app/css/app.css">
    <link rel="stylesheet" href="/app/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="/app/css/map.min.css">
    <link rel="stylesheet" href="/app/css/app.css">
    <link rel="stylesheet" type="text/css" href="/app/css/magnific-popup.css">
    <link rel="stylesheet" type="text/css" href="/app/css/jquery.fancybox.min.css">
    <link rel="stylesheet" type="text/css" href="/app/css/textanimation.css">
    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="/assets/images/dreamridelogo.webp">
    <link rel="apple-touch-icon-precomposed" href="/assets/images/dreamridelogo.webp">

</head>

<body class="body header-fixed counter-scroll">


    <div id="wrapper">
        <div id="pagee" class="clearfix">

            <!-- Main Header -->
           @include('cms.layout.header') 

            <!-- End Main Header -->
            <main id="main">
              @yield('content')
            </main>


    @include("cms.layout.footer");
      </div>
        <!-- /#page -->
    </div>
    <a id="scroll-top" class="button-go"></a>
  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

 <!-- Javascript -->
    <script src="/app/js/jquery.min.js"></script>
    <script src="/app/js/jquery.nice-select.min.js"></script>
    <script src="/app/js/bootstrap.min.js"></script>
    <script src="/app/js/swiper-bundle.min.js"></script>
    <script src="/app/js/swiper.js"></script>
    <script src="/app/js/plugin.js"></script>
    <script src="/app/js/count-down.js"></script>
    <script src="/app/js/countto.js"></script>
    <script src="/app/js/jquery.fancybox.js"></script>
    <script src="/app/js/jquery.magnific-popup.min.js"></script>
    <script src="/app/js/price-ranger.js"></script>
    <script src="/app/js/textanimation.js"></script>
    <script src="/app/js/wow.min.js"></script>
    <script src="/app/js/shortcodes.js"></script>
    <script src="/app/js/main.js"></script>

</body>
</html>
