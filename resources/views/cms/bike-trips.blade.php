<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>
    <meta charset="utf-8">
    <title>Bike-Trips</title>

    <meta name="author" content="themesflat.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="/app/css/app.css">
    <link rel="stylesheet" href="/app/css/map.min.css">
    <link rel="stylesheet" href="/app/css/jquery.fancybox.min.css">

    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="/assets/images/dreamridelogo.webp">
    <link rel="apple-touch-icon-precomposed" href="/assets/images/dreamridelogo.webp">
</head>

<body class="body header-fixed ">


    <div id="wrapper">
        <div id="pagee" class="clearfix">

            <!-- Main Header -->
            <header class="main-header flex">
                <!-- Header Lower -->
                 @include('cms.layout.header') 
                <!-- Mobile Menu  -->
                <div class="close-btn"><span class="icon flaticon-cancel-1"></span></div>
                <div class="mobile-menu">
                    <div class="menu-backdrop"></div>
                    <nav class="menu-box">
                        <div class="nav-logo"><a href="index.html">
                                <img src="/assets/images/dreamridelogo.webp" alt=""></a></div>
                        <div class="bottom-canvas">
                            <div class="menu-outer">
                            </div>
                        </div>
                    </nav>
                </div>
                <!-- End Mobile Menu -->

            </header>
            <!-- End Main Header -->
            <main id="main">

              <section style="position: relative;">
                    <div class="tf-container full">
                        <div class="row">
                            <div class="col-md-12" style="position: relative;">
                                <img 
                                    src="/assets/images/destination/bikebnr.jpg" 
                                    alt="Dream Ride Himalaya"
                                    style="width: 100%; height: 500px; object-fit: cover; display: block;"
                                >
                                <!-- Overlay Text -->
                                <div style="
                                    position: absolute;
                                    top: 50%;
                                    left: 50%;
                                    transform: translate(-50%, -50%);
                                    color: #fff;
                                    text-align: center;
                                    background: rgba(0, 0, 0, 0.4);
                                    padding: 20px;
                                    border-radius: 10px;
                                ">
                                    <h1 style="font-size: 48px; margin: 0;color: white;">Ride Beyond Limits</h1>
                                    <p style="font-size: 20px; margin-top: 10px;">Adventure Awaits in the Himalayas</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="pd-main">
                    <div class="tf-container">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="single-destinaion-content">
                                    <div class="inner-haeder mb-50">
                                        <div class="flex-three">
                                            <i class="icon-15"></i>
                                        </div>
                                        <h2 class="title">Ride Through the Majestic Himalayas</h2>
                                        <p class="des">Join Dream Ride Himalaya for an unforgettable adventure exploring scenic Himalayan trails, remote villages, and high-altitude passes.</p>
                                    </div>
                                    <div class="description-wrap mb-40">
                                        <span class="description">About the Adventure:</span>
                                        <p class="des">Dream Ride Himalaya offers carefully curated motorcycle tours through breathtaking landscapes of Himachal Pradesh and Ladakh. Ride across snow-capped peaks, lush valleys, and serene rivers while enjoying fully supported trips with expert guidance and camping facilities.</p>
                                    </div>
                                    <div class="image-wrap flex-three mb-40">
                                        <img src="/assets/images/page/im2.jpg" alt="Himalayan Ride 1">
                                        <img src="/assets/images/page/des-single2.jpg" alt="Himalayan Ride 2">
                                    </div>
                                    <div class="description-wrap mb-40">
                                        <span class="description">Highlights:</span>
                                        <p class="des mb-18">Experience thrilling bike trips, camping under the stars, and scenic routes designed for adventure enthusiasts and riders of all levels.</p>
                                        <ul class="listing-des">
                                            <li><p>Leh-Ladakh Motorcycle Expedition</p></li>
                                            <li><p>Spiti Valley Adventure Ride</p></li>
                                            <li><p>High-altitude Himalayan Passes</p></li>
                                            <li><p>Cultural Experiences in Remote Villages</p></li>
                                        </ul>
                                    </div>
                                    <div class="row mb-40">
                                        <div class="col-4">
                                            <img src="/assets/images/destination/dest1.jpg" alt="Himalayan Trail"
                                                style="width: 100%; height: 250px; object-fit: cover; border-radius: 8px;">
                                        </div>
                                        <div class="col-4">
                                            <img src="/assets/images/destination/dest2.jpg" alt="Himalayan Valley"
                                                style="width: 100%; height: 250px; object-fit: cover; border-radius: 8px;">
                                        </div>
                                        <div class="col-4">
                                            <img src="/assets/images/destination/dest3.jpg" alt="Adventure Ride"
                                                style="width: 100%; height: 250px; object-fit: cover; border-radius: 8px;">
                                        </div>
                                    </div>

                                    <div class="description-wrap mb-30">
                                        <span class="description">What You’ll Experience:</span>
                                        <p class="des mb-25">Ride through picturesque valleys, winding roads, and iconic mountain passes. Enjoy secure camping, expert guides, and unforgettable Himalayan views throughout your journey.</p>
                                        <p class="des mb-30">Dream Ride Himalaya focuses on adventure, safety, and comfort to make every trip an epic memory for all riders.</p>
                                        <ul class="listing-icon">
                                            <li class="flex-three">
                                                <i class="icon-10"></i>
                                                <p>Scenic Himalayan Routes</p>
                                            </li>
                                            <li class="flex-three">
                                                <i class="icon-10"></i>
                                                <p>Bike Rentals & Support Vehicles</p>
                                            </li>
                                            <li class="flex-three">
                                                <i class="icon-10"></i>
                                                <p>Secure Camping & Luxury Cabins</p>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <img src="/assets/images/destination/destin1.jpg" alt="Himalayan Adventure">
                                        </div>
                                        <div class="col-6">
                                            <img src="/assets/images/destination/destin2.jpg" alt="Adventure Ride">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="side-bar-right">
                                    <div class="sidebar-widget">
                                        <h4 class="block-heading">Search Trips</h4>
                                        <form action="/" id="search-bar-widget">
                                            <input type="text" placeholder="Search here...">
                                            <button type="button"><i class="icon-search-2"></i></button>
                                        </form>
                                    </div>
                                    <div class="sidebar-widget">
                                        <h4 class="block-heading">Popular Packages</h4>
                                        <ul class="category-blog">
                                            <li>
                                                <a href="#" class="flex-two">
                                                    <span>Leh-Ladakh Expedition</span>
                                                    <span>05</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="flex-two">
                                                    <span>Spiti Valley Adventure</span>
                                                    <span>04</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="flex-two">
                                                    <span>Manali to Leh Ride</span>
                                                    <span>03</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="flex-two">
                                                    <span>Himalayan Scenic Trail</span>
                                                    <span>06</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="sidebar-widget">
                                        <h4 class="block-heading">Recent Adventures</h4>
                                        <div class="recent-post-list">
                                            <div class="list-recent flex-three">
                                                <a href="#" class="recent-image">
                                                    <img src="/assets/images/travel-list/spiti2.jpg" alt="Spiti Ride">
                                                </a>
                                                <div class="recent-info">
                                                    <h4 class="title"><a href="#">Spiti Valley Adventure</a></h4>
                                                    <p>From <span class="text-main">₹Price On Request</span></p>
                                                </div>
                                            </div>
                                            <div class="list-recent flex-three">
                                                <a href="#" class="recent-image">
                                                    <img src="/assets/images/travel-list/leh.jpg" alt="Leh Ride">
                                                </a>
                                                <div class="recent-info">
                                                    <h4 class="title"><a href="#">Leh-Ladakh Expedition</a></h4>
                                                    <p>From <span class="text-main">₹Price On Request</span></p>
                                                </div>
                                            </div>
                                            <div class="list-recent flex-three">
                                                <a href="#" class="recent-image">
                                                    <img src="/assets/images/travel-list/spiti4.jpg" alt="Himalayan Trails">
                                                </a>
                                                <div class="recent-info">
                                                    <h4 class="title"><a href="#">Himalayan Scenic Trail</a></h4>
                                                    <p>From <span class="text-main">₹Price On Request</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sidebar-widget-single">
                                        <div class="banner-part-item booking-style-1 relative bg-part-gray overflow-hidden">
                                            <span class="text-main sale-up mb-10">Save up to 20%</span>
                                            <div class="font-yes title">Limited Time Adventure Offer</div>
                                            <a href="#" class="tour1 btn-booking mt-27">Book Now <i class="icon-arrow-right"></i></a>
                                            <img src="/assets/images/explore/ex-pl-1.png" alt="image" class="mask-banner-part">
                                            <span class="price-banner-part flex-five center">From ₹2999</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="mb--93">
                    <div class="tf-container">
                        <div class="callt-to-action flex-two z-index3 relative">
                            <div class="callt-to-action-content flex-three">
                                <div class="image">
                                    <img src="/assets/images/page/ready.png" alt="Image">
                                </div>
                                <div class="content">
                                    <h2 class="title-call">Ready to adventure and enjoy natural</h2>
                                    <p class="des">Get ready to embark on thrilling adventures while exploring and enjoying the beauty of nature.</p>
                                </div>
                            </div>
                            <img src="/assets/images/page/vector4.png" alt="" class="shape-ab">
                            <div class="callt-to-action-button">
                                <a href="#" class="get-call">Let,s get started</a>
                            </div>
                        </div>
                    </div>

                </section>

            </main>

             @include('cms.layout.footer') 

            <!-- Bottom -->
        </div>
        <!-- /#page -->
    </div>

    <!-- Modal Popup Bid -->

    <a id="scroll-top" class="button-go"></a>


    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight">
        <div class="offcanvas-header">
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="logo-canvas">
                <img src="/assets/images/logo.png" alt="image">
            </div>
            <p class="des">The world’s first and largest digital market
                for crypto collectibles and non-fungible
            </p>
            <ul class="canvas-info">
                <li class="flex-three">
                    <i class="icon-noun-mail-5780740-1"></i>
                    <p>Info@webmail.com</p>
                </li>
                <li class="flex-three">
                    <i class="icon-Group-9"></i>
                    <p>684 555-0102 490</p>
                </li>
                <li class="flex-three">
                    <i class="icon-Layer-19"></i>
                    <p>6391 Elgin St. Celina, NYC 10299</p>
                </li>
            </ul>
            <ul class="social flex-three">
                <li>
                    <a href="#">
                        <i class="icon-icon-2"></i>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="icon-x"></i>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="icon-8"></i>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="icon-6"></i>
                    </a>
                </li>
            </ul>

        </div>
    </div>

    <!-- Javascript -->
    <script src="/app/js/jquery.min.js"></script>
    <script src="/app/js/jquery.nice-select.min.js"></script>
    <script src="/app/js/bootstrap.min.js"></script>
    <script src="/app/js/swiper-bundle.min.js"></script>
    <script src="/app/js/swiper.js"></script>
    <script src="/app/js/plugin.js"></script>
    <script src="/app/js/jquery.fancybox.js"></script>
    <script src="/app/js/map.min.js"></script>
    <script src="/app/js/map.js"></script>
    <script src="/app/js/shortcodes.js"></script>
    <script src="/app/js/main.js"></script>

</body>

</html>
