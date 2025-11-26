<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{ $place['name'] }} - Dream Ride Himalayas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="/app/css/app.css">
    <link rel="stylesheet" href="/app/css/jquery.fancybox.min.css">
    <link rel="shortcut icon" href="/assets/images/dreamridelogo.webp">
</head>

<body class="body header-fixed">
    <div id="wrapper">
        <div id="pagee" class="clearfix">

            @include('cms.layout.header')

            <main id="main">

                {{-- -------------------- BREADCRUMB --------------------- --}}
                <section class="breadcumb-section">
                    <div class="tf-container">
                        <div class="row">
                            <div class="col-lg-12 center z-index1">
                                <h1 class="title">{{ $place['name'] }} - Tour</h1>

                                <ul class="breadcumb-list flex-five">
                                    <li><a href="/">Home</a></li>
                                    <li><span>{{ $place['name'] }} - Tour</span></li>
                                </ul>

                                <img class="bcrumb-ab" src="/assets/images/page/mask-bcrumb.png" alt="">
                            </div>
                        </div>
                    </div>
                </section>

                {{-- -------------------- TOURS LIST --------------------- --}}
                <section class="tour-destination pd-main">
                    <div class="tf-container">
                        <div class="row">

                            @foreach($place['tours'] as $t)
                                <div class="col-md-4 mb-37">
                                    <a href="/pages/tours/{{ $t['id'] }}/{{ $t['name'] }}" class="destination-style relative">
                                        <span class="tour">{{ $t['packages_count'] }}  packages</span>

                                        <img src="/{{ $t['image'] }}" alt="{{ $t['name'] }}">

                                        <div class="destination-content">
                                            <div class="travel font-yes text-white">Travel to</div>
                                            <p class="text-white">{{ $t['name'] }}</p>
                                        </div>
                                    </a>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </section>

                {{-- -------------------- CTA SECTION STATIC --------------------- --}}
                <section class="mb--75">
                    <div class="tf-container">
                        <div class="callt-to-action flex-two">
                            <div class="callt-to-action-content flex-three">
                                <div class="image">
                                    <img src="/assets/images/page/ready.png" alt="">
                                </div>
                                <div class="content">
                                    <h2 class="title-call">Ready to adventure and enjoy natural</h2>
                                    <p class="des">Experience thrilling adventures and explore the beauty of nature</p>
                                </div>
                            </div>

                            <img src="/assets/images/page/vector4.png" alt="" class="shape-ab">

                            <div class="callt-to-action-button">
                                <a href="/all-packages" class="get-call">Let’s get started</a>
                            </div>
                        </div>
                    </div>
                </section>

            </main>

            @include('cms.layout.footer')

        </div>
    </div>

    <script src="/app/js/jquery.min.js"></script>
    <script src="/app/js/jquery.nice-select.min.js"></script>
    <script src="/app/js/bootstrap.min.js"></script>
    <script src="/app/js/swiper-bundle.min.js"></script>
    <script src="/app/js/swiper.js"></script>
    <script src="/app/js/plugin.js"></script>
    <script src="/app/js/jquery.fancybox.js"></script>
    <script src="/app/js/price-ranger.js"></script>
    <script src="/app/js/shortcodes.js"></script>
    <script src="/app/js/main.js"></script>

</body>
</html>
