<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>
    <meta charset="utf-8">
    <title>Booking - Dynamic Package</title>
    <meta name="author" content="themesflat.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="/app/css/app.css">
    <link rel="stylesheet" href="/app/css/map.min.css">
    <link rel="stylesheet" href="/app/css/jquery.fancybox.min.css">
    <link rel="shortcut icon" href="/assets/images/dreamridelogo.webp">
    <link rel="apple-touch-icon-precomposed" href="/assets/images/dreamridelogo.webp">

    <style>
        /* small overrides to ensure dynamic badge looks good */
        .feature.dynamic-badge {
            padding: 6px 12px;
            border-radius: 24px;
            color: #fff;
            font-weight: 700;
            display: inline-block;
        }
        .image-gallery-single img { width:100%; height:auto; object-fit:cover; border-radius:6px; }
        .gallery-thumb { cursor:pointer; opacity:.9; }
        .gallery-thumb:hover { opacity:1; transform:scale(1.02); transition:all .18s ease; }
    </style>
  {!! ToastMagic::styles() !!}

</head>

<body class="body header-fixed ">
      <div class="preload preload-container">
        <svg class="pl" width="240" height="240" viewBox="0 0 240 240">
            <circle class="pl__ring pl__ring--a" cx="120" cy="120" r="105" fill="none" stroke="#000" stroke-width="20" stroke-dasharray="0 660" stroke-dashoffset="-330" stroke-linecap="round"></circle>
            <circle class="pl__ring pl__ring--b" cx="120" cy="120" r="35" fill="none" stroke="#000" stroke-width="20" stroke-dasharray="0 220" stroke-dashoffset="-110" stroke-linecap="round"></circle>
            <circle class="pl__ring pl__ring--c" cx="85" cy="120" r="70" fill="none" stroke="#000" stroke-width="20" stroke-dasharray="0 440" stroke-linecap="round"></circle>
            <circle class="pl__ring pl__ring--d" cx="155" cy="120" r="70" fill="none" stroke="#000" stroke-width="20" stroke-dasharray="0 440" stroke-linecap="round"></circle>
        </svg>
    </div>
    <div id="wrapper">
        <div id="pagee" class="clearfix">

            <!-- Main Header -->
            <header class="main-header flex">
                @include('cms.layout.header')
                <!-- Mobile Menu  -->
                <div class="close-btn"><span class="icon flaticon-cancel-1"></span></div>
                <div class="mobile-menu">
                    <div class="menu-backdrop"></div>
                    <nav class="menu-box">
                        <div class="nav-logo"><a href="/"><img src="/assets/images/dreamridelogo.webp" alt=""></a></div>
                        <div class="bottom-canvas">
                            <div class="menu-outer"></div>
                        </div>
                    </nav>
                </div>
                <!-- End Mobile Menu -->
            </header>
            <!-- End Main Header -->

            <main id="main">
                <!-- Hero -->
                <section id="hero-section" style="position: relative; overflow: hidden;">
                    <img id="hero-image" src="/assets/images/page/bnarhero.jpg" alt="Bookings - Dream Ride Himalaya"
                        style="width: 100%; height: 500px; object-fit: cover; display: block; filter: brightness(50%);">
                    <div style="position: absolute; inset:0; background: linear-gradient(281deg, rgba(0,0,0,0.15) 0%, rgba(0,0,0,0.15) 100%);"></div>
                    <div style="position: absolute; top:50%; left:50%; transform:translate(-50%,-50%); text-align:center; color:#fff; padding:0 20px;">
                        <h1 id="hero-title" style="font-size:56px; font-weight:800; letter-spacing:1px; margin-bottom:12px; color:white;">
                            Book Your Next Ride
                        </h1>
                        <p id="hero-sub" style="font-size:20px; max-width:700px; margin:0 auto 25px; line-height:1.6; opacity:.9;">
                            Adventure awaits! Secure your spot for the ultimate Himalayan biking experience.
                        </p>
                        <a href="#book" id="hero-cta" style="background: linear-gradient(90deg,#ff6a00,#ffbb33); color:#fff; padding:14px 34px; font-size:18px; font-weight:600; border-radius:50px; text-decoration:none; box-shadow:0 8px 20px rgba(0,0,0,0.3);">
                            Book Now
                        </a>
                    </div>
                </section>

                <!-- Package content (tabs) -->
                <section class="tour-single">
                    <div class="tf-container">
                        <div class="row">
                            <div style="z-index:999" class="col-lg-12">
                                <ul class="nav justify-content-between tab-tour-single" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="pills-information-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-information" type="button" role="tab"
                                            aria-controls="pills-information" aria-selected="true"><i class="icon-Vector-51"></i> Information</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-tour-planing-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-tour-planing" type="button" role="tab"
                                            aria-controls="pills-tour-planing" aria-selected="false"><i class="icon-destination-2-1"></i> Tour Planning</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-location-share-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-location-share" type="button" role="tab"
                                            aria-controls="pills-location-share" aria-selected="false"><i class="icon-map-1"></i> Location share</button>
                                    </li>
                                    <li class="nav-item" role="presentation" id="reviews-tab-item">
                                        <button class="nav-link" id="pills-reviews-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-reviews" type="button" role="tab"
                                            aria-controls="pills-reviews" aria-selected="false"><i class="icon-favourite-1"></i> Reviews</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-shot-gallery-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-shot-gallery" type="button" role="tab"
                                            aria-controls="pills-shot-gallery" aria-selected="false"><i class="icon-image-gallery-1"></i> Shot Gallery</button>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- TAB CONTENT -->
                        <div class="row pd-main">
                            <div class="col-lg-12">
                                <div class="tab-content" id="pills-tabContent">

                                    <!-- INFORMATION TAB -->
                                    <div class="tab-pane fade show active" id="pills-information" role="tabpanel" aria-labelledby="pills-information-tab">
                                        <div class="row mb-50">
                                            <div class="col-lg-12">
                                                <div class="inner-heading-wrap flex-two">
                                                    <div class="inner-heading">
                                                        <span id="badge-type" class="feature dynamic-badge">Featured</span>
                                                        <h2 id="package-title" class="title">Package title</h2>
                                                        <ul class="flex-three list-wrap-heading">
                                                            <li class="flex-three">
                                                                <i class="icon-time-left"></i>
                                                                <span id="days-nights">7 Days / 6 Nights</span>
                                                            </li>
                                                            <li class="flex-three">
                                                                <i class="icon-user"></i>
                                                                <span id="max-riders">Max Riders: 15</span>
                                                            </li>
                                                            <li class="flex-three">
                                                                <i class="icon-18"></i>
                                                                <span id="start-point">Starting Point: Manali</span>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <div class="inner-price">
                                                        <div class="flex-three">
                                                            <div class="start" id="rating-stars">
                                                                <!-- stars inserted here if reviews present -->
                                                            </div>
                                                            <span id="reviews-count" class="review" style="margin-left:8px; display:inline-block;"></span>
                                                        </div>
                                                        <p class="price-sale text-main"><span id="price-main">₹24,999</span> <span class="price" id="price-old" style="margin-left:8px; color:#999; font-size:14px;"></span></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- IMAGE GALLERY (main images) -->
                                        <div class="row mb-40 image-gallery-single" id="image-gallery">
                                            <!-- images inserted dynamically -->
                                        </div>

                                        <!-- LEFT CONTENT + SIDEBAR -->
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div class="information-content-tour">
                                                    <div class="description-wrap mb-40">
                                                        <span class="description">Overview</span>
                                                        <p id="package-description" class="des">Package description goes here.</p>
                                                    </div>

                                                    <div class="description-wrap mb-40">
                                                        <span class="description">Highlights</span>
                                                        <ul id="package-highlights" class="listing-des"></ul>
                                                    </div>

                                                    <div class="expect-wrap mb-70">
                                                        <h4 class="title mb-18">What to Expect</h4>
                                                        <div class="expect flex-three">
                                                            <span>Starting Point</span>
                                                            <p id="expect-start">Manali, Himachal Pradesh</p>
                                                        </div>
                                                        <div class="expect flex-three">
                                                            <span>Ending Point</span>
                                                            <p id="expect-end">Leh, Ladakh</p>
                                                        </div>
                                                        <div class="expect flex-three">
                                                            <span>Departure Time</span>
                                                            <p id="expect-depart">7:00 AM</p>
                                                        </div>
                                                        <div class="expect flex-three">
                                                            <span>Difficulty Level</span>
                                                            <p id="expect-diff">Moderate</p>
                                                        </div>
                                                    </div>

                                                    <div class="expect-wrap mb-70">
                                                        <h4 class="title mb-40">Included / Excluded</h4>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <ul id="included-list" class="listing-clude"></ul>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <ul id="excluded-list" class="listing-clude"></ul>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="expect-wrap">
                                                        <h4 class="title mb-40">Tour Amenities</h4>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <ul id="amenities-list" class="listing-icon"></ul>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <!-- SIDEBAR -->
                                            <div class="col-lg-4">
                                                <div class="side-bar-right">
                                                    <div class="sidebar-widget" id="book">
    <h6 class="block-heading">Book This Expedition</h6>

    <form id="form-book-tour">

        <!-- DATE -->
        <div class="input-wrap mb-30">
            <input id="book-date" type="date" required>
        </div>

        <!-- Arrival Time -->
        <div class="flex-two mb-20">
            <span class="label">Arrival Time:</span>
            <p id="arrival-time" style="font-weight:600;"></p>
        </div>

        <!-- RIDERS INPUT -->
        <div class="input-wrap mb-30">
            <span class="label">Number of Riders:</span>
            <input id="riders-count"
                   type="number"
                   min="1"
                   value="1"
                   class="form-control"
                   required>
        </div>

        <!-- DYNAMIC EXTRAS -->
        <div class="input-wrap-checkbox mb-30">
            <span class="label">Add Extras</span>
            <div id="services-container"></div>
        </div>

        <!-- TOTAL -->
        <div class="flex-two mb-40">
            <span class="label">Total:</span>
            <span class="total text-main" id="booking-total">₹0</span>
        </div>

        <!-- BUTTONS -->
        <button type="button" id="btn-book" class="btn w-100 mb-2">Proceed to Book</button>
        <button type="button" id="btn-enquiry" class="btn btn-warning w-100">Enquiry Now</button>

    </form>
</div>



                                                    <div class="sidebar-widget">
                                                        <h6 class="block-heading">Book With Confidence</h6>
                                                        <ul class="category-confidence">
                                                            <li class="flex-three"><i class="icon-customer-service-1"></i><span>24/7 Customer Support</span></li>
                                                            <li class="flex-three"><i class="icon-Vector-6"></i><span>Handpicked Routes & Stays</span></li>
                                                            <li class="flex-three"><i class="icon-insurance-1"></i><span>Free Backup Support</span></li>
                                                            <li class="flex-three"><i class="icon-price-tag-1-1"></i><span>Best Price Guarantee</span></li>
                                                        </ul>
                                                    </div>

                                                    <div class="sidebar-widget">
                                                        <h4 class="block-heading">Recent Adventures</h4>
                                                        <div class="recent-post-list">
                                                            <div class="list-recent flex-three">
                                                                <a href="#" class="recent-image"><img src="/assets/images/blog/re-blog1.jpg" alt="Image"></a>
                                                                <div class="recent-info">
                                                                    <div class="start">
                                                                        <i class="icon-Star"></i><i class="icon-Star"></i><i class="icon-Star"></i><i class="icon-Star"></i><i class="icon-Star"></i>
                                                                    </div>
                                                                    <h4 class="title"><a href="#">Riding Through Spiti Valley</a></h4>
                                                                    <p>From <span class="text-main">₹29,999</span></p>
                                                                </div>
                                                            </div>

                                                            <div class="list-recent flex-three">
                                                                <a href="#" class="recent-image"><img src="/assets/images/blog/re-blog2.jpg" alt="Image"></a>
                                                                <div class="recent-info">
                                                                    <div class="start">
                                                                        <i class="icon-Star"></i><i class="icon-Star"></i><i class="icon-Star"></i><i class="icon-Star"></i><i class="icon-Star"></i>
                                                                    </div>
                                                                    <h4 class="title"><a href="#">Exploring Ladakh on Wheels</a></h4>
                                                                    <p>From <span class="text-main">₹32,999</span></p>
                                                                </div>
                                                            </div>

                                                            <div class="list-recent flex-three">
                                                                <a href="#" class="recent-image"><img src="/assets/images/blog/re-blog3.jpg" alt="Image"></a>
                                                                <div class="recent-info">
                                                                    <div class="start">
                                                                        <i class="icon-Star"></i><i class="icon-Star"></i><i class="icon-Star"></i><i class="icon-Star"></i><i class="icon-Star"></i>
                                                                    </div>
                                                                    <h4 class="title"><a href="#">Manali to Leh Bike Expedition</a></h4>
                                                                    <p>From <span class="text-main">₹35,000</span></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- end left + sidebar -->
                                    </div>

                                    <!-- TOUR PLANNING TAB -->
                                    <div class="tab-pane fade" id="pills-tour-planing" role="tabpanel" aria-labelledby="pills-tour-planing-tab">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div class="planing-content-tour">
                                                    <h3 class="title-plan">Tour Plan :</h3>
                                                    <div id="tour-plan-container"></div>
                                                </div>
                                            </div>

                                            <!-- planning sidebar simplified -->
                                            <div class="col-lg-4">
                                                <div class="side-bar-right">
                                                    <div class="sidebar-widget">
                                                        <h6 class="block-heading">Book This Ride</h6>
                                                        <form id="form-book-tour-2">
                                                            <div class="input-wrap mb-30">
                                                                <input type="date">
                                                            </div>
                                                            <div class="flex-two mb-30">
                                                                <span class="label">Start Time:</span>
                                                                <div class="radio">
                                                                    <input id="t1" type="radio" name="times" value="07:00" checked>
                                                                    <label for="t1">07:00 AM</label>
                                                                    <input id="t2" type="radio" name="times" value="09:00">
                                                                    <label for="t2">09:00 AM</label>
                                                                </div>
                                                            </div>
                                                            <div class="input-wrap-sellect mb-30">
                                                                <span class="label">Select Riders:</span>
                                                                <div class="flex-two mb-15">
                                                                    <p>Single Rider ₹<span id="price-solo-2">0</span></p>
                                                                    <div class="nice-select" tabindex="0">
                                                                        <select id="sel-solo-2"><option>1</option><option>2</option></select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="flex-two mb-40">
                                                                <span class="label">Total:</span>
                                                                <span class="total text-main" id="booking-total-2">₹0</span>
                                                            </div>
                                                            <button type="submit">Proceed to Booking</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- LOCATION SHARE -->
                                    <div class="tab-pane fade" id="pills-location-share" role="tabpanel" aria-labelledby="pills-location-share-tab">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div class="localtion-content-tour">
                                                    <div class="map2 relative mb-32">
                                                        <div id="map2" style="height:300px; background:#eee; display:flex; align-items:center; justify-content:center;">Map placeholder</div>
                                                    </div>
                                                    <div class="flex-three map-list mb-50">
                                                        <i class="icon-18"></i>
                                                        <p id="location-share-text">Location share text</p>
                                                    </div>

                                                    <h3 class="title-location">Description:</h3>
                                                    <p id="location-desc" class="des mb-22"></p>

                                                    <ul id="location-list" class="listing-des"></ul>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <!-- sidebar copy (optional dynamic) -->
                                                <div class="side-bar-right"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- REVIEWS -->
                                    <div class="tab-pane fade" id="pills-reviews" role="tabpanel" aria-labelledby="pills-reviews-tab">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div id="reviews-container"></div>
                                            </div>
                                            <div class="col-lg-4">
                                                <!-- reviews sidebar -->
                                            </div>
                                        </div>
                                    </div>

                                    <!-- SHOT GALLERY -->
                                    <div class="tab-pane fade" id="pills-shot-gallery" role="tabpanel" aria-labelledby="pills-shot-gallery-tab">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div id="shot-gallery" class="gallery-content-tour"></div>
                                            </div>
                                            <div class="col-lg-4">
                                                <!-- gallery sidebar -->
                                            </div>
                                        </div>
                                    </div>

                                </div> <!-- end tab-content -->
                            </div> <!-- end col-lg-12 -->
                        </div> <!-- end pd-main -->
                    </div> <!-- end tf-container -->
                </section>

                <section class="mb--93">
                    <div class="tf-container">
                        <div class="callt-to-action flex-two z-index3 relative">
                            <div class="callt-to-action-content flex-three">
                                <div class="image"><img src="/assets/images/page/ready.png" alt="Image"></div>
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

    <a id="scroll-top" class="button-go"></a>

    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight">
        <div class="offcanvas-header">
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="logo-canvas"><img src="/assets/images/logo.png" alt="image"></div>
            <p class="des">The world’s first and largest digital market for crypto collectibles and non-fungible</p>
            <ul class="canvas-info">
                <li class="flex-three"><i class="icon-noun-mail-5780740-1"></i><p>Info@webmail.com</p></li>
                <li class="flex-three"><i class="icon-Group-9"></i><p>684 555-0102 490</p></li>
                <li class="flex-three"><i class="icon-Layer-19"></i><p>6391 Elgin St. Celina, NYC 10299</p></li>
            </ul>
            <ul class="social flex-three">
                <li><a href="#"><i class="icon-icon-2"></i></a></li>
                <li><a href="#"><i class="icon-x"></i></a></li>
                <li><a href="#"><i class="icon-8"></i></a></li>
                <li><a href="#"><i class="icon-6"></i></a></li>
            </ul>
        </div>
    </div>

    <!-- Javascript Assets -->
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

    <!-- ====== DYNAMIC SCRIPT ====== -->
    <script>
          function findPackageIdFromUrl() {
                // Try to find a numeric segment in URL (works for /packages/11/slug or /pages/tours/11/slug)
                const seg = window.location.pathname.split('/').filter(Boolean);
                for (let i = 0; i < seg.length; i++) {
                    if (/^\d+$/.test(seg[i])) return seg[i];
                }
                // fallback: try last segment numeric
                const last = seg[seg.length - 1];
                if (/^\d+$/.test(last)) return last;
                // default fallback
                return '11';
            }

        (function () {
            // ----- helpers -----
            function fixUrl(url) {
                if (!url) return '/assets/no-image.jpg';
                // if already absolute
                if (url.startsWith('http://') || url.startsWith('https://') || url.startsWith('/')) {
                    return url.startsWith('/') ? url : '/' + url;
                }
                return '/' + url.replace(/^\/+/, '');
            }

          

            const packageId = findPackageIdFromUrl();

            // DOM elements
            const elTitle = document.getElementById('package-title');
            const elBadge = document.getElementById('badge-type');
            const elDaysNights = document.getElementById('days-nights');
            const elMaxRiders = document.getElementById('max-riders');
            const elStartPoint = document.getElementById('start-point');
            const elPriceMain = document.getElementById('price-main');
            const elPriceOld = document.getElementById('price-old');
            const elDescription = document.getElementById('package-description');
            const elHighlights = document.getElementById('package-highlights');
            const elIncluded = document.getElementById('included-list');
            const elAmenities = document.getElementById('amenities-list');
            const elImageGallery = document.getElementById('image-gallery');
            const elTourPlan = document.getElementById('tour-plan-container');
            const elShotGallery = document.getElementById('shot-gallery');
            const elExpectStart = document.getElementById('expect-start');
            const elExpectEnd = document.getElementById('expect-end');
            const elExpectDepart = document.getElementById('expect-depart');
            const elExpectDiff = document.getElementById('expect-diff');
            const elLocationShareText = document.getElementById('location-share-text');
            const elLocationDesc = document.getElementById('location-desc');
            const elReviewsCount = document.getElementById('reviews-count');
            const elRatingStars = document.getElementById('rating-stars');

            // Booking related
            const selSolo = document.getElementById('sel-solo');
            const selPillion = document.getElementById('sel-pillion');
            const goproCheckbox = document.getElementById('extra-gopro');
            const supportCheckbox = document.getElementById('extra-support');
            const bookingTotalEl = document.getElementById('booking-total');
            const supportPriceEl = document.getElementById('support-price');

            // data holder
            let packageData = null;
            let includedDetails = [];
            let amenitiesDetails = [];
            let servicesDetails = [];

            // fetch package
            function loadPackage() {
                fetch(`/api/package/${packageId}`)
                    .then(res => {
                        if (!res.ok) throw new Error('Failed to load package');
                        return res.json();
                    })
                    .then(data => {
                        packageData = data;
                        // render
                        window.currentPackageTitle = data.information?.title || "Package";

                        renderPackage(data);
                        attachBookingListeners();
                    })
                   
            }

            function renderStars(score = 5) {
                // simple fixed 5 stars; could be enhanced when you have rating number
                let html = '';
                for (let i = 0; i < 5; i++) html += '<i class="icon-Star"></i>';
                return html;
            }

            function renderPackage(data) {
                const info = data.information || {};
                // title & hero
                elTitle.textContent = info.title || 'Package Title';
                document.getElementById('hero-title').textContent = info.title || 'Book Your Next Ride';
                document.getElementById('hero-sub').textContent = info.subtitle || document.getElementById('hero-sub').textContent;

                // badge / type - package.information.type is an id, but backend may not supply type object.
                // If server returned a 'type' object, use it, otherwise fall back to mapping.
                let typeName = (data.type && data.type.name) ? data.type.name : (info.type ? ( {1:'Premium',2:'Adventure',3:'Featured'}[info.type] || '' ) : '');
                let typeColor = (data.type && data.type.color) ? data.type.color : ( info.type ? ({1:'#FFCC00',2:'#FA4E4E',3:'#0080FF'}[info.type] || '#333') : '#333');

                elBadge.textContent = typeName || '';
                elBadge.style.background = typeColor || '#333';
                elBadge.classList.add('dynamic-badge');

                // days / nights
                const days = Array.isArray(data.tour) ? data.tour.length : 0;
                const nights = days > 0 ? days - 1 : 0;
                elDaysNights.textContent = `${days} Days / ${nights} Nights`;
                elMaxRiders.textContent = `Max Riders: ${info.noofriders || '-'}`;
                elStartPoint.textContent = `Starting Point: ${info.whattoexpect?.startingpoint || '-'}`;
                elExpectStart.textContent = info.whattoexpect?.startingpoint || '-';
                elExpectEnd.textContent = info.whattoexpect?.endingpoint || '-';
                elExpectDepart.textContent = info.whattoexpect?.departuretime || '-';
                elExpectDiff.textContent = info.whattoexpect?.difficultylevel || '-';
                // set arrival time dynamically from API
                document.getElementById('arrival-time').textContent =
                    data.information?.whattoexpect?.departuretime || 'Not Provided';

                // PACKAGE SINGLE PRICE
                window.__package_price_single = Number(data.pricing);

                // Riders input
                const ridersInput = document.getElementById("riders-count");

                // dynamic services list
                const servicesWrap = document.getElementById("services-container");
                servicesWrap.innerHTML = "";

                // create checkboxes for services
                data.services_details.forEach(service => {
                    servicesWrap.innerHTML += `
                        <div class="checkbox">
                            <input type="checkbox" class="service-extra"
                                data-price="${service.price}"
                                data-id="${service.id}"
                                data-name="${service.name}"
                                id="service-${service.id}">
                            <label for="service-${service.id}">
                                ${service.name} (₹${Number(service.price).toLocaleString()})
                            </label>
                        </div>
                    `;
                });
            // Attach listeners for dynamic services checkboxes
            document.querySelectorAll(".service-extra").forEach(chk => {
                chk.addEventListener("change", calculateBookingTotal);
            });

            // Riders input listener
            document.getElementById("riders-count")
                    .addEventListener("input", calculateBookingTotal);

                // price
                elPriceMain.textContent = `₹${(data.pricing || 0).toLocaleString()}`;
                // old price placeholder (if you have 'old_price' change)
                elPriceOld.textContent = '';

                // description / highlights
                elDescription.textContent = info.description || '';
                elHighlights.innerHTML = '';
                if (Array.isArray(info.highlight) && info.highlight.length) {
                    info.highlight.forEach(h => {
                        const li = document.createElement('li');
                        li.innerHTML = `<p>${escapeHtml(h)}</p>`;
                        elHighlights.appendChild(li);
                    });
                } else {
                    elHighlights.innerHTML = '<li><p>No highlights available</p></li>';
                }

                // included/excluded lists (we got included_details and amenities_details in API if your controller was updated)
                // included_details and amenities_details may already be present on response
                includedDetails = data.included_details || [];
                amenitiesDetails = data.amenities_details || [];
                servicesDetails = data.services_details || [];

                elIncluded.innerHTML = '';
                if (includedDetails.length) {
                    includedDetails.forEach(it => {
                        const li = document.createElement('li');
                        li.className = 'flex-three';
                        li.innerHTML = `<i class="icon-Vector-7"></i><p>${escapeHtml(it.name)}</p>`;
                        elIncluded.appendChild(li);
                    });
                } else {
                    elIncluded.innerHTML = '<li class="flex-three"><p>Nothing included</p></li>';
                }

                // if you want to show excluded items, you can implement logic; currently keep right column empty or show placeholders
                // document.getElementById('excluded-list').innerHTML = '<li class="flex-three"><p>Exclusions will be listed here at checkout</p></li>';

                // amenities
                elAmenities.innerHTML = '';
                if (amenitiesDetails.length) {
                    amenitiesDetails.forEach(it => {
                        const li = document.createElement('li');
                        li.className = 'flex-three';
                        li.innerHTML = `<i class="icon-10"></i><p>${escapeHtml(it.name)}</p>`;
                        elAmenities.appendChild(li);
                    });
                } else {
                    elAmenities.innerHTML = '<li class="flex-three"><p>No amenities listed</p></li>';
                }

                // images gallery (main + thumbnails)
                elImageGallery.innerHTML = '';
                const images = info.images || [];
                if (images.length) {
                    // left: show first two images arranged like your template
                    // We'll create 3 columns if available
                    images.forEach((img, idx) => {
                        const col = document.createElement('div');
                        if (idx === 0) col.className = 'col-12 col-sm-6';
                        else col.className = 'col-6 col-sm-3';
                        const imgEl = document.createElement('img');
                        imgEl.src = fixUrl(img.url);
                        imgEl.alt = info.title || 'image';
                        imgEl.style = 'width:100%; height:220px; object-fit:cover; border-radius:6px;';
                        col.appendChild(imgEl);
                        elImageGallery.appendChild(col);
                    });
                } else {
                    elImageGallery.innerHTML = '<div class="col-12"><img src="/assets/images/no-image.jpg" alt="no-image" style="width:100%;height:300px;object-fit:cover;"></div>';
                }

                // shot gallery
                elShotGallery.innerHTML = '';
                const shots = info.shot_gallery || [];
                if (shots.length) {
                    shots.forEach(s => {
                        const div = document.createElement('div');
                        div.className = 'image-gallery-item mb-20';
                        div.innerHTML = `<img src="${fixUrl(s.url)}" alt="shot" style="width:100%;border-radius:6px;">`;
                        elShotGallery.appendChild(div);
                    });
                } else {
                    elShotGallery.innerHTML = '<p>No shot gallery available</p>';
                }

                // tour plan
                elTourPlan.innerHTML = '';
                if (Array.isArray(data.tour) && data.tour.length) {
                    data.tour.forEach((day, idx) => {
                        const block = document.createElement('div');
                        block.className = 'tour-planing-section flex';
                        block.innerHTML = `
                            <div class="number-box flex-five">${String(idx+1).padStart(2,'0')}</div>
                            <div class="content-box">
                                <h5 class="title">${escapeHtml(day.location || 'Stop')}</h5>
                                <p class="des">${escapeHtml(day.locationDescription || '')}</p>
                            </div>
                        `;
                        elTourPlan.appendChild(block);
                    });
                } else {
                    elTourPlan.innerHTML = '<p>No tour plan available</p>';
                }

                // location share
                elLocationShareText.textContent = (data.locationshare?.highlight && data.locationshare.highlight.length) ? data.locationshare.highlight.join(', ') : 'Location details not available';
                elLocationDesc.textContent = data.locationshare?.description || 'No location description available';
                // location-list placeholders (if needed)
                const locList = document.getElementById('location-list');
                locList.innerHTML = '';
                if (Array.isArray(info.highlight) && info.highlight.length) {
                    info.highlight.forEach(h => {
                        const li = document.createElement('li');
                        li.innerHTML = `<p>${escapeHtml(h)}</p>`;
                        locList.appendChild(li);
                    });
                } else {
                    locList.innerHTML = '<li><p>No highlights</p></li>';
                }

                // reviews
                elReviewsCount.textContent = (data.reviews && data.reviews.length) ? `(${data.reviews.length} Reviews)` : '';
                elRatingStars.innerHTML = (data.reviews && data.reviews.length) ? renderStars(5) : '';
// SHOW / HIDE REVIEWS TAB
const reviewsTabItem = document.getElementById('reviews-tab-item');

if (data.reviews && data.reviews.length > 0) {
    // Show tab
    reviewsTabItem.style.display = 'block';
} else {
    // Hide tab
    reviewsTabItem.style.display = 'none';
}

                // set booking default prices & labels
                // We'll assume single price (data.pricing) is per rider (with bike).
                window.__package_price_single = Number(data.pricing || 0);
                // pillion price: estimate 0.6 * single if not provided


                // initial total calc
                calculateBookingTotal();
            }

            // Booking listeners & calculation
            function attachBookingListeners() {
                if (!selSolo) return;
                [selSolo, selPillion, goproCheckbox, supportCheckbox].forEach(el => {
                    if (!el) return;
                    el.addEventListener('change', calculateBookingTotal);
                });

                // On submit, show a simple confirmation — you can wire to real checkout API
                document.getElementById('form-book-tour').addEventListener('submit', function (e) {
                 const toast = new ToastMagic();

                    e.preventDefault();
                    const date = document.getElementById('book-date').value;
                    if (!date) {
                                    toast.error("Error!", "Please Select a Date!");
                        return;
                    }
                    const payload = {
                        package_id: packageId,
                        date,
                        start_time: document.querySelector('input[name="startTime"]:checked').value,
                        riders: parseInt(selSolo.value, 10),
                        pillion: parseInt(selPillion.value, 10),
                        extras: {
                            gopro: goproCheckbox.checked,
                            support: supportCheckbox.checked
                        },
                        total: window.__last_total || 0
                    };
                    console.log('Booking payload', payload);
                    toast.success("Success!", "Proceeding to checkout — see console for payload.");

                    // TODO: POST to your booking endpoint
                });
            }

            function calculateBookingTotal() {
                const riders = parseInt(document.getElementById("riders-count").value || "1", 10);

                let base = riders * window.__package_price_single;

                // Extras
                let extraTotal = 0;
                document.querySelectorAll(".service-extra:checked").forEach(chk => {
                    extraTotal += Number(chk.dataset.price);
                });

                const total = base + extraTotal;
                document.getElementById("booking-total").textContent =
                    `₹${total.toLocaleString()}`;

                window.__last_total = total;
            }


            // small helper to escape HTML
            function escapeHtml(text) {
                if (!text && text !== 0) return '';
                return String(text)
                    .replace(/&/g, '&amp;')
                    .replace(/</g, '&lt;')
                    .replace(/>/g, '&gt;')
                    .replace(/"/g, '&quot;')
                    .replace(/'/g, '&#039;');
            }

            // init
            loadPackage();

        })();



        // now for forms
      window.currentPackageId = findPackageIdFromUrl();;

$("#btn-book").on("click", function () {

    let date = $("#book-date").val();
    let riders = parseInt($("#riders-count").val());
    let amount = window.__last_total || 0;

    // collect selected services
    let services = [];
    let servicesText = "";

    document.querySelectorAll(".service-extra:checked").forEach(chk => {
        services.push({
            id: chk.dataset.id,
            name:chk.dataset.name,
            price: chk.dataset.price
        });

        servicesText += `• ${chk.labels[0].innerText}\n`;
    });

    // Hidden fields for backend
    $("#b_package_id").val(window.currentPackageId);
    $("#b_date").val(date);
    $("#b_riders").val(riders);
    $("#b_services").val(JSON.stringify(services));

    // Visible fields for user
    $("#b_date_show").val(date);
    $("#b_riders_show").val(riders);
    $("#b_services_show").val(servicesText || "No extras selected" );

    $("#b_amount").val(amount);

    $("#booking-modal-title").text("Book: " + window.currentPackageTitle);
    $("#bookingModal").modal("show");
});


$("#btn-enquiry").on("click", function () {

    let date = $("#book-date").val();
    let riders = parseInt($("#riders-count").val());

    let services = [];
    let servicesText = "";

    document.querySelectorAll(".service-extra:checked").forEach(chk => {
        services.push({
            id: chk.dataset.id,
            name:chk.dataset.name,
            price: chk.dataset.price
        });

        servicesText += `• ${chk.labels[0].innerText}\n`;
    });

    // Hidden fields for backend
    $("#e_package_id").val(window.currentPackageId);
    $("#e_date").val(date);
    $("#e_riders").val(riders);
    $("#e_services").val(JSON.stringify(services));

    // Visible fields for user
    $("#e_date_show").val(date);
    $("#e_riders_show").val(riders);
    $("#e_services_show").val(servicesText || "No extras selected" );

    $("#enquiry-modal-title").text("Enquiry for: " + window.currentPackageTitle);
    $("#enquiryModal").modal("show");
});




// SUBMIT BOOKING
$(document).on("click", "#bookingSubmitBtn", function (e) {

    e.preventDefault();
                 const toast = new ToastMagic();

    const data = {
        package_id: $("#b_package_id").val(),
        date: $("#b_date").val(),
        user_name: $("#b_name").val(),
        user_phone: $("#b_phone").val(),
        user_email: $("#b_email").val(),
        no_of_riders: $("#b_riders").val(),
        services: JSON.parse($("#b_services").val()),
        amount: $("#b_amount").val(),
        payment_status: "pending",
        message: $("#b_message").val()
    };
        console.log(data);

    fetch("/api/bookings", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(data)
    })
    .then(res => res.json())
    .then(() => {
                    toast.success("Success!", "Booking Successful!");

        $("#bookingModal")?.modal("hide");
    });
});

// Submit Enquiery
$(document).on("click", "#enquirySubmitBtn", function (e) {
    e.preventDefault();
                 const toast = new ToastMagic();

    const data = {
        package_id: $("#e_package_id").val(),
        date: $("#e_date").val(),
        user_name: $("#e_name").val(),
        user_phone: $("#e_phone").val(),
        user_email: $("#e_email").val(),
        no_of_riders: $("#e_riders").val(),
        services: JSON.parse($("#e_services").val()),
        message: $("#e_message").val()
    };
        

    fetch("/api/enquiries", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(data)
    })
    .then(res => res.json())
    .then(() => {
                    toast.success("Success!", "Enquiry Submitted!");

        $("#enquiryModal").modal("hide");
    });
});



    </script>
    {{-- @include('components.booking') --}}
@include('components.modal-booking')
@include('components.modal-enquiry')
  {!! ToastMagic::scripts() !!}

</body>

</html>
