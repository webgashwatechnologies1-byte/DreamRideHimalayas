<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 | Page Not Found</title>
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

    <style>
      

        .error-box {
            padding: 30px;
            display: flex;
            justify-content: center
        }

        ._404heading {
            font-size: 120px;
            margin: 0;
            color: #fcd34d; /* your theme yellow */
        }

        .describeerror {
            font-size: 20px;
            margin: 15px 0 30px;
        }

        .backhomebtn {
            background: #fcd34d;
            color: #000;
            padding: 12px 30px;
            border-radius: 8px;
            font-size: 18px;
            text-decoration: none;
            transition: 0.3s ease;
        }

        .backhomebtn:hover {
            background: #ffe58f;
        }
        .error-box-child{
            display: flex;
            flex-direction: column;
            justify-content: center;align-items: center;
            padding:100px 30px;
        }
    </style>
</head>

    
<body class="body header-fixed counter-scroll">


    <div id="wrapper">
        <div id="pagee" class="clearfix">

            <!-- Main Header -->
           @include('cms.layout.header') 

            <div class="error-box">
                <div class="error-box-child">

                    <h1 class="_404heading">404</h1>
                        <p class="describeerror">The page you are looking for has been removed or doesn't exist.</p>

                        <a class="backhomebtn" href="{{ url('/') }}">Back to Home</a>
                    
                    </div>

                </div>


    @include("cms.layout.footer");
      </div>
        <!-- /#page -->
    </div>
   
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
