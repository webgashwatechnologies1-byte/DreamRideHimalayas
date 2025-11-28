<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>
    <meta charset="utf-8">
    <title>Booking - Dream Ride Himalayan</title>
    <meta name="author" content="themesflat.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="/app/css/app.css">
    <link rel="stylesheet" href="/app/css/nice-select.css">
    <link rel="stylesheet" href="/app/css/map.min.css">
    <link rel="stylesheet" href="/app/css/jquery.fancybox.min.css">
    <link rel="shortcut icon" href="/assets/images/dreamridelogo.webp">
    <link rel="apple-touch-icon-precomposed" href="/assets/images/dreamridelogo.webp">

    <style>
        .summary-box p {
            margin-bottom: 8px;
            font-size: 15px;
        }
        #bookingModal .form-control {
            border-radius: 8px;
            padding: 10px 12px;
        }
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
                                            aria-controls="pills-location-share" aria-selected="false"><i class="icon-map-1"></i> Route/Dates</button>
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

                                                        <h4 class="title mb-20">Included</h4>
                                                        <ul id="included-list" class="listing-clude mb-40"></ul>

                                                        <h4 class="title mb-20">Excluded</h4>
                                                        <ul id="excluded-list" class="listing-clude mb-40"></ul>

                                                        <h4 class="title mb-20">Complimentary Benefits</h4>
                                                        <ul id="complimentary-list" class="listing-clude mb-40"></ul>

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
            <span class="label">Select Date</span>

            <div class="nice-select" id="dateDropdown" tabindex="0">
                <span class="current">Select Date</span>
                <ul class="list" id="dateList">
                    <li data-value="" class="option selected focus">Select Date</li>
                </ul>
            </div>

        </div>



        <!-- Arrival Time -->
        <div class="flex-two mb-30">
            <span class="label">Arrival Time:</span>
            <p id="arrival-time" style="font-weight:600;"></p>
        </div>

        <!-- RIDERS INPUT -->
      <div class="input-wrap mb-30">
            <span class="label">Choose Package Type</span>

            <div class="nice-select" id="priceDropdown" tabindex="0">
                <span class="current">Select Package Type</span>
                <ul class="list" id="priceList">
                    <li data-value="" class="option selected focus">Select Package Type</li>
                </ul>
            </div>

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
        <button type="button" id="btn-book"    class="btn-main-small rounded w-100 mb-2">Proceed to Book</button>
        <button type="button" id="btn-enquiry" class="btn-main-small rounded w-100">Enquiry Now</button>

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
                                                        <div id="route-map-container" style="display:none;">
                                                            <h3 class="title-location mb-3">Route Map</h3>
                                                            <div id="route-map" style="height:350px; background:#eee;"></div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4">
                                                        <h3 class="title-location mb-3">Available Dates</h3>
                                                        <ul id="date-list" class="listing-des"></ul>
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

                <section class="mb--75">
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
    <div class="modal fade" id="bookingModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content" style="border-radius:12px; overflow:hidden;">

        <div class="modal-header" style="background:#f8f9fa; border-bottom:1px solid #ddd;">
            <h5 class="modal-title" id="booking-modal-title" style="font-weight:700;"></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body p-4">

            <div class="row g-4">

            <!-- LEFT SIDE: USER DETAILS -->
            <div class="col-md-6">
                <h5 class="mb-3" style="font-weight:600;">Your Details</h5>

                <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" id="b_name" class="form-control" placeholder="Enter your name">
                </div>

                <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" id="b_email" class="form-control" placeholder="you@example.com">
                </div>

                <div class="mb-3">
                <label class="form-label">Phone Number</label>
                <input type="text" id="b_phone" class="form-control" placeholder="+91 98765 43210">
                </div>

                <div class="mb-3">
                <label class="form-label">Additional Message (Optional)</label>
                <textarea id="b_message" class="form-control" rows="3" placeholder="Write a message..."></textarea>
                </div>
            </div>


            <!-- RIGHT SIDE: BOOKING SUMMARY -->
            <div class="col-md-6">
                <h5 class="mb-3" style="font-weight:600;">Booking Summary</h5>

                <div class="summary-box p-3 mb-3" style="background:#f5f7fa; border-radius:8px;">
                <p><strong>Date:</strong> <span id="b_date_show"></span></p>
                <p><strong>Package Type:</strong> <span id="b_pack_type_show"></span></p>
                <p><strong>Riders:</strong> <span id="b_riders_show"></span></p>

                <p><strong>Selected Services:</strong></p>
                <pre id="b_services_show" style="background: #fff; padding:10px; border-radius:6px; white-space:pre-wrap;"></pre>

                <hr>
                <p style="font-size:18px; font-weight:700;">
                    Total Amount: <span class="text-success">₹<span id="b_amount"></span></span>
                </p>
                </div>

                <button id="bookingSubmitBtn" class="btn btn-success w-100" style="font-size:18px; padding:10px;">
                Confirm Booking
                </button>
            </div>

            </div>

        </div>

        </div>
    </div>
    </div>
    <div class="modal fade" id="enquiryModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content" style="border-radius: 12px; overflow: hidden;">

            <div class="modal-header" style="background:#f8f9fa; border-bottom:1px solid #ddd;">
                <h5 class="modal-title" id="enquiry-modal-title" style="font-weight:700;">Send Enquiry</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body p-4">
                <div class="row g-4">

                <!-- LEFT SIDE -->
                <div class="col-md-6">
                    <h5 class="mb-3" style="font-weight:600;">Enquiry Details</h5>

                    <!-- Date -->
                    <!-- START DATE -->
                    <div class="mb-3">
                    <label class="form-label">Start Date</label>
                    <input type="date" id="e_start_date" class="form-control">
                    </div>

                    <!-- END DATE -->
                    <div class="mb-3">
                    <label class="form-label">End Date</label>
                    <input type="date" id="e_end_date" class="form-control">
                    </div>

                    <input type="hidden" id="e_date">


                    <!-- Riders -->
                    <div class="mb-3">
                    <label class="form-label">Riders (How many?)</label>
                    <input type="number" id="e_riders" class="form-control" min="1" value="1">
                    </div>

                    <!-- Message -->
                    <div class="mb-3">
                    <label class="form-label">Message</label>
                    <textarea id="e_message" class="form-control" rows="5" placeholder="Write your message..."></textarea>
                    </div>

                    <input type="hidden" id="e_package_id">
                </div>

                <!-- RIGHT SIDE -->
                <div class="col-md-6">
                    <h5 class="mb-3" style="font-weight:600;">Your Contact Info</h5>

                    <div class="mb-3">
                    <label class="form-label">Full Name</label>
                    <input type="text" id="e_name" class="form-control" placeholder="Enter your name">
                    </div>

                    <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" id="e_email" class="form-control" placeholder="you@example.com">
                    </div>

                    <div class="mb-3">
                    <label class="form-label">Phone Number</label>
                    <input type="text" id="e_phone" class="form-control" placeholder="+91 98765 43210">
                    </div>

                    <button id="enquirySubmitBtn" class="btn btn-primary w-100" style="font-size:18px; padding:10px;">
                    Submit Enquiry
                    </button>
                </div>

                </div>
            </div>

            </div>
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
     const APP_URL = "{{ config('app.url') }}";

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
            const elImageGallery = document.getElementById('image-gallery');
            const elTourPlan = document.getElementById('tour-plan-container');
            const elShotGallery = document.getElementById('shot-gallery');
            const elExpectStart = document.getElementById('expect-start');
            const elExpectEnd = document.getElementById('expect-end');
            const elExpectDepart = document.getElementById('expect-depart');
            const elExpectDiff = document.getElementById('expect-diff');
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

                                        
                                                // ========== ROUTE / MAP + DATE ==========
                                            const dateList = document.getElementById("date-list");
                                            dateList.innerHTML = "";

                                            // Extract actual date array from API
                                            const dates = Array.isArray(data.dates) ? data.dates : [];

                                            if (dates.length > 0) {

                                                // Header row
                                                dateList.innerHTML += `
                                                    <li class="flex-two" style="font-weight:700; border-bottom:1px solid #ddd; padding-bottom:6px;">
                                                        <span>Starting</span>
                                                        <span>Ending</span>
                                                    </li>
                                                `;

                                                // Rows
                                                dates.forEach(d => {
                                                    dateList.innerHTML += `
                                                        <li class="flex-two" style="padding:16px 0; border-bottom:1px solid #eee;">
                                                            <span class="pl-4">${d.startingDate}</span>
                                                            <span>${d.endingDate}</span>
                                                        </li>
                                                    `;
                                                });

                                            } else {
                                                dateList.innerHTML = `<li><p>No dates available</p></li>`;
                                            }



                                                            // --- Map logic ---
                                                            let hasMapPoints = false;
                                                            let points = [];

                                                            if (Array.isArray(data.tour)) {
                                                                data.tour.forEach(day => {
                                                                    if (day.lat && day.long) {
                                                                        hasMapPoints = true;
                                                                        points.push([parseFloat(day.lat), parseFloat(day.long)]);
                                                                    }
                                                                });
                                                            }

                                                            if (hasMapPoints) {
                                                                document.getElementById("route-map-container").style.display = "block";

                                                                const map = L.map("route-map").setView(points[0], 7);
                                                                L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png").addTo(map);

                                                                L.polyline(points, { color: "yellow", weight: 5 }).addTo(map);

                                                                points.forEach((p, i) => {
                                                                    L.marker(p).addTo(map).bindPopup("Day " + (i + 1));
                                                                });

                                                                map.fitBounds(points);
                                                            }

                                                    // price
                                                // pricing = array → find min
                                                        let lowest = 0;

                                                        if (Array.isArray(data.pricing) && data.pricing.length) {
                                                            lowest = Math.min(...data.pricing.map(p => Number(p.price)));
                                                        }

                                                        elPriceMain.textContent = `Starting From ₹${lowest.toLocaleString()}`;

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

                                                    servicesDetails = data.services_details || [];

                                                            // ----- INCLUSION -----
                                                        elIncluded.innerHTML = "";
                                                            if (Array.isArray(info.inclusion) && info.inclusion.length) {
                                                                info.inclusion.forEach(item => {
                                                                    elIncluded.innerHTML += `<li class="flex-three mt-3"><i class="icon-Vector-7"></i><p>${escapeHtml(item)}</p></li>`;
                                                                });
                                                            } else {
                                                                elIncluded.innerHTML = `<li><p>No inclusion added</p></li>`;
                                                            }

                                            // ----- EXCLUSION -----
                                            const elExcluded = document.getElementById("excluded-list");
                                            elExcluded.innerHTML = "";
                                            if (Array.isArray(info.exclusion) && info.exclusion.length) {
                                                info.exclusion.forEach(item => {
                                                    elExcluded.innerHTML += `<li class="flex-three mt-3"><i class="icon-x"></i><p>${escapeHtml(item)}</p></li>`;
                                                });
                                            } else {
                                                elExcluded.innerHTML = `<li><p>No exclusion added</p></li>`;
                                            }

                                            // ----- COMPLIMENTARY BENEFITS -----
                                            const elCompl = document.getElementById("complimentary-list");
                                            elCompl.innerHTML = "";
                                            if (Array.isArray(info.complimentary_benefits) && info.complimentary_benefits.length) {
                                                info.complimentary_benefits.forEach(item => {
                                                    elCompl.innerHTML += `<li class="flex-three mt-3"><i class="icon-destination"></i><p>${escapeHtml(item)}</p></li>`;
                                                });
                                            } else {
                                                elCompl.innerHTML = `<li><p>No complimentary benefits</p></li>`;
                                            }
                                        // date drop down for booking form 
                    const dateDropdown = $('#dateDropdown');
                    const dateList1 = $('#dateList');

                    dateList1.empty().append(`
                        <li data-value="" class="option selected focus">Select Date</li>
                    `);

                   data.dates.forEach(d => {
                        const fullValue = `${d.startingDate} → ${d.endingDate}`;

                        dateList1.append(`
                            <li class="option"
                                data-full="${fullValue}"
                                data-start="${d.startingDate}"
                                data-end="${d.endingDate}">
                                ${fullValue}
                            </li>
                        `);
                    });


                    dateDropdown.on('click', '.option', function () {
                            const fullValue = $(this).data('full');
                            const start = $(this).data('start');
                            const end = $(this).data('end');

                            dateDropdown.find('.current').text(fullValue);
                            dateDropdown.find('.option').removeClass('selected focus');
                            $(this).addClass('selected focus');

                            // store full + individual
                            dateDropdown.attr('data-selected-date', fullValue);
                            dateDropdown.attr('data-start-date', start);
                            dateDropdown.attr('data-end-date', end);
                        });

// end here 
// start price for booking form 
                        const priceDropdown = $('#priceDropdown');
                        const priceList = $('#priceList');

                        priceList.empty().append(`
                            <li data-value="" class="option selected focus">Select Package Type</li>
                        `);

                        data.pricing.forEach(p => {
                            priceList.append(`
                                <li class="option"
                                    data-value="${p.name}"
                                    data-price="${p.price}"
                                    data-riders="${p.riders}">
                                    ${p.name} — ₹${Number(p.price).toLocaleString()}
                                </li>
                            `);
                        });

                       priceDropdown.on('click', '.option', function () {

                            const name = $(this).data('value');
                            const price = $(this).data('price');
                            const riders = $(this).data('riders'); // NEW ✔️

                            priceDropdown.find('.current').text($(this).text());
                            priceDropdown.find('.option').removeClass('selected focus');
                            $(this).addClass('selected focus');

                            priceDropdown.attr('data-selected-name', name);
                            priceDropdown.attr('data-selected-price', price);
                            priceDropdown.attr('data-selected-riders', riders); // NEW ✔️

                            calculateBookingTotal();
                        });


// end here
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
                            let date = $("#dateDropdown").attr("data-selected-date") || "";

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

                    // 1️⃣ GET SELECTED PACKAGE PRICE
                    const selectedPrice = Number($("#priceDropdown").attr("data-selected-price") || 0);

                    // 2️⃣ CALCULATE SELECTED SERVICES TOTAL
                    let extraTotal = 0;
                    document.querySelectorAll(".service-extra:checked").forEach(chk => {
                        extraTotal += Number(chk.dataset.price);
                    });

                    // 3️⃣ FINAL TOTAL
                    const total = selectedPrice + extraTotal;

                    // 4️⃣ SET TOTAL ON UI
                    document.getElementById("booking-total").textContent =
                        `₹${total.toLocaleString()}`;

                    // 5️⃣ STORE FOR BOOKING API
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

    const toast = new ToastMagic();

    // 1️⃣ CHECK DATE SELECTED
    let date = $("#dateDropdown").attr("data-selected-date") || "";
    if (!date) {
        toast.error("Error!", "Please select a date first!");
        return;
    }

    // 2️⃣ CHECK PACKAGE SELECTED
    let packageType = $("#priceDropdown").attr("data-selected-price") || "";
    if (!packageType) {
        toast.error("Error!", "Please select a package type!");
        return;
    }

    // 3️⃣ GET VALUES AFTER VALIDATION
    let riders = $("#priceDropdown").attr("data-selected-riders") || 1;
    let amount = window.__last_total || 0;
    let packType = $("#priceDropdown .current").text();

    let services = [];
    let servicesText = "";

    document.querySelectorAll(".service-extra:checked").forEach(chk => {
        services.push({
            id: chk.dataset.id,
            name: chk.dataset.name,
            price: chk.dataset.price
        });
        servicesText += `• ${chk.labels[0].innerText}\n`;
    });

    // Hidden fields
    $("#b_package_id").val(window.currentPackageId);
    $("#b_date").val(date);
    $("#b_riders").val(riders);
    $("#b_services").val(JSON.stringify(services));

    // Visible
    $("#b_date_show").text(date);
    $("#b_riders_show").text(riders);
    $("#b_pack_type_show").text(packType);
    $("#b_services_show").text(servicesText || "No extras selected");
    $("#b_amount").text(amount);

    $("#booking-modal-title").text("Book: " + window.currentPackageTitle);
    $("#bookingModal").modal("show");
});




$("#btn-enquiry").on("click", function () {

    $("#e_package_id").val(window.currentPackageId);

    // reset
    $("#e_start_date").val("");
    $("#e_end_date").val("");
    $("#e_date").val("");

    $("#e_riders").val(1);

    $("#enquiry-modal-title").text("Enquiry for: " + window.currentPackageTitle);
    $("#enquiryModal").modal("show");
});






// SUBMIT BOOKING
$("#bookingSubmitBtn").on("click", function (e) {
    e.preventDefault();
    const toast = new ToastMagic();

    let cleanAmount = Number(
        $("#b_amount").text().replace(/[₹, ]/g, "")
    );

    const data = {
        package_id: $("#b_package_id").val(),
        date: $("#b_date").val(),   // make sure it's YYYY-MM-DD
        user_name: $("#b_name").val(),
        user_phone: $("#b_phone").val(),
        user_email: $("#b_email").val(),
        no_of_riders: $("#b_riders").val(),
        services: JSON.parse($("#b_services").val()),
        amount: cleanAmount, // ✅ FIXED INTEGER
        payment_status: "pending",
        message: $("#b_message").val(),
        package_type: $("#b_pack_type_show").text().trim()
    };

    fetch(`${APP_URL}/api/bookings`, {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json"
        },
        body: JSON.stringify(data)
    })
    .then(res => res.json())
    .then(result => {
        console.log(result);
        toast.success("Success!", "Booking Successful!");
        $("#bookingModal").modal("hide");
    });
});

// Submit Enquiery
$(document).on("click", "#enquirySubmitBtn", function (e) {
    e.preventDefault();
    const toast = new ToastMagic();

    let start = $("#e_start_date").val();
    let end   = $("#e_end_date").val();

    if (!start || !end) {
        toast.error("Error!", "Please select both start and end date.");
        return;
    }

    // combine into one
    const fullDate = `${start} → ${end}`;
    $("#e_date").val(fullDate);

    const data = {
        package_id: $("#e_package_id").val(),
        date: fullDate,   // HERE ✔️✔️
        user_name: $("#e_name").val(),
        user_phone: $("#e_phone").val(),
        user_email: $("#e_email").val(),
        no_of_riders: $("#e_riders").val(),
        message: $("#e_message").val()
    };

    fetch(`${APP_URL}/api/enquiries`, {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },

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
