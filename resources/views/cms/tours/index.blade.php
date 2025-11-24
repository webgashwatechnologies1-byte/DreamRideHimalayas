<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>
    <meta charset="utf-8">
    <title>Leh Ladakh Bike Tour - 6N/7D Premium</title>

    <meta name="author" content="themesflat.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="/app/css/app.css">
    <link rel="stylesheet" href="/app/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="/assets/images/dreamridelogo.webp">
    <link rel="apple-touch-icon-precomposed" href="/assets/images/dreamridelogo.webp">

</head>
<style>
    /* recent styling */
    /* form */
    summary::marker {
        color: white;
    }
/* PRICE SLIDER DESIGN FIX */
#slider-range2 {
    height: 4px !important;
    background: #e6e6e6 !important;
    border-radius: 10px;
    border: none !important;
    margin: 10px 5px 20px 5px;
    position: relative;
}

/* active range */
#slider-range2 .ui-slider-range {
    background: #ffbf00 !important;
    border-radius: 10px;
}

/* slider handles (dots) */
#slider-range2 .ui-slider-handle {
    width: 16px !important;
    height: 16px !important;
    border-radius: 50% !important;
    background: #ffbf00 !important;
    border: 2px solid white !important;
    top: -6px !important;
    cursor: pointer;
    transition: 0.2s;
    box-shadow: 0px 4px 10px rgba(255,191,0,0.3);
}

#slider-range2 .ui-slider-handle:hover {
    transform: scale(1.1);
}

/* price range text */
.number-range span {
    background: #f4f4f4;
    border-radius: 4px;
    padding: 2px 8px;
    font-size: 13px;
    font-weight: 600;
    color: #333;
    display: inline-block;
    min-width: 70px;
    text-align: center;
}

    details {
        color: #fbad17;
    }

    /* package paragraph */
    .para-title-tour {
        font-size: 14px;
        font-style: italic;
    }

    /* archieve tour */
    .archieve-content,
    .archieve-conten-2 {
        align-content: center;
    }

    /* get-call button */
    .get-call {
        transition: transform 2s;
    }

    .get-call:hover {
        transform: translateY(-10px);
    }

    /* package */
    .col-package {
        align-content: center;
    }

    /* itinerary */
    .h2-itinerary {
        font-family: "Plus Jakarta Sans", sans-serif;
        font-size: 30px;
    }

    .itinerary {
        max-width: 750px;
        margin: 0 auto;
        border-radius: 10px;
        box-shadow: 0 4px 25px rgba(255, 140, 0, 0.15);
        overflow: hidden;
        margin-top: 30px;
    }

    .itinerary-header {
        background: linear-gradient(135deg, #ff6a00, #ffcc00);
        color: #111;
        text-align: center;
        padding: 5px 15px;
    }

    .itinerary-header h1 {
        margin: 0;
        font-size: 1.5rem;
        font-weight: 700;
    }

    .itinerary-header p {
        margin: 5px 0 0;
        font-size: 0.9rem;
        color: #222;
    }

    .day {
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        transition: 0.3s ease;
        transition: transform 5px;
        border-top: 1px solid #d1d1d1;
        padding: 12px 10px;
    }

    .day:hover {
        transform: translateY(1.5px);
    }

    .day-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        cursor: pointer;
        color: #ff9a00;
    }

    .day-header:hover {
        background: rgba(255, 140, 0, 0.08);
    }

    .day-header h3 {
        margin: 0;
        font-size: 0.95rem;
        line-height: 1.2;
    }

    .day-header .icons {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 3px 15px;
    }

    .day-header i {
        color: #ff9a00;
        font-size: 1.1rem;
        transition: transform 0.3s ease;
    }

    .day.active .day-header i.fa-chevron-down {
        transform: rotate(180deg);
    }

    .day-content {
        display: none;
        padding: 0 20px 12px 20px;
        color: #727272;
        font-size: 0.88rem;
        line-height: 1.5;
    }

    .day-content span {
        display: block;
        margin-bottom: 6px;
        color: #ff6a00;
        font-size: 0.85rem;
    }

    .day.active .day-content {
        display: block;
    }

    .pin-location {
        width: 100%;
        max-width: 20px;
        height: auto;
    }

    i.fa-solid.fa-chevron-down {
        margin-right: 10px;
    }

    @media (max-width: 600px) {
        body {
            padding: 15px;
        }

        .itinerary-header h1 {
            font-size: 1.2rem;
        }

        .day-header h3 {
            font-size: 0.9rem;
        }
    }

    @media screen and (max-width: 992px) {
        .day-header .icons {
            padding: 4px 7px;
        }

        .day-para {
            padding-left: 9px !important;
        }
    }
</style>

<body class="body header-fixed ">
    <!-- /preload -->

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
                                <img src="/assets/images/logo2.png" alt=""></a></div>
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

                <section class="breadcumb-section"
                    style="background-image: url('./assets/images/gallery/leh-premium-banner.jpg'); background-position-y: -531px;">
                    <div class="tf-container">
                        <div class="row">
                            <div class="col-lg-12 center z-index1">
                                <h1 class="title">Leh Ladakh Bike Tour - 6N/7D Premium</h1>
                                <ul class="breadcumb-list flex-five">
                                    <li><a href="index.php">Home</a></li>
                                    <li><span>Tour Package</span></li>
                                </ul>
                                <img class="bcrumb-ab" src="/assets/images/page/mask-bcrumb.png" alt="">
                            </div>
                        </div>
                    </div>
                </section>

                <!-- section archieve tour -->
                <section class="archieve-tour" style="padding-top: 70px; padding-bottom: 70px;">
                    <div class="tf-container">
                        <div class="row">
                            <div class="col-lg-4 archieve-content">
                                <form action="/" class="sider-bar-tour-package">
                                    <div class="widget-filter mb-40">
                                        <h6 class="title-tour">Search by Filter</h6>
                                        <div class="group-select-wrap">
                                            <fieldset class="group-select relative mb-22 filter-destination">
                                                <i class="icon-Vector-8"></i>
                                                <div class="search-bar-group relative">
                                                    <label>Destination</label>
                                                    <div class="nice-select" tabindex="0">
                                                        <span class="current">Manali – Srinagar Route</span>
                                                        <ul class="list">
                                                            <li data-value="" class="option selected focus">Manali</li>
                                                            <li data-value="leh" class="option">Leh</li>
                                                            <li data-value="hanle" class="option">Hanle</li>
                                                            <li data-value="umlingla" class="option">Umling La</li>
                                                            <li data-value="srinagar" class="option">Srinagar</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            {{-- <fieldset class="group-select relative mb-22">
                                                <i class="icon-Vector-22"></i>
                                                <div class="search-bar-group relative">
                                                    <label>Bike Type</label>
                                                    <div class="nice-select" tabindex="0">
                                                        <span class="current">Choose Bike</span>
                                                        <ul class="list">
                                                            <li data-value="" class="option selected focus">Choose Bike
                                                            </li>
                                                            <li data-value="royal-enfield" class="option">Royal Enfield
                                                                350/500</li>
                                                            <li data-value="himalayan" class="option">Himalayan</li>
                                                            <li data-value="adv390" class="option">KTM ADV 390</li>
                                                            <li data-value="scrambler" class="option">Scrambler</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </fieldset> --}}

                                            <fieldset class="group-select filter-duration relative mb-22">
                                                <i class="icon-Group-111"></i>
                                                <div class="search-bar-group relative">
                                                    <label>Trip Duration</label>
                                                    <div class="nice-select" tabindex="0">
                                                        <span class="current">Select Duration</span>
                                                        <ul class="list">
                                                            <li data-value="" class="option selected focus">Select
                                                                Duration</li>
                                                            <li data-value="7days" class="option">7 Days</li>
                                                            <li data-value="9days" class="option">9 Days</li>
                                                            <li data-value="11days" class="option">11 Days</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <fieldset class="group-select filter-riders relative mb-22">
                                                <i class="icon-user"></i>
                                                <div class="search-bar-group relative">
                                                    <label>Riders</label>
                                                    <div class="nice-select" tabindex="0">
                                                        <span class="current">Number of Riders</span>
                                                        <ul class="list">
                                                            <li data-value="" class="option selected focus">Select
                                                                Riders</li>
                                                            <li data-value="solo" class="option">Solo Rider</li>
                                                            <li data-value="duo" class="option">2 Riders</li>
                                                            <li data-value="group5" class="option">Group of 5+</li>
                                                            <li data-value="group10" class="option">Group of 10+</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <fieldset class="group-select relative mb-40">
                                                <h6 class="title-tour">Filter By Price</h6>
                                                <div class="widget widget-price">
                                                    <div id="slider-range2"></div>
                                                    <div class="slider-labels">
                                                        <div>
                                                            <input type="hidden" name="min-value2" value="">
                                                            <input type="hidden" name="max-value2" value="">
                                                        </div>
                                                        <div class="caption flex-three">
                                                            <p class="price-range">Price Range:</p>
                                                            <div class="number-range">
                                                                <span id="slider-range-value01"></span>
                                                                <span id="slider-range-value02"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <style>
                                                .div-flex {
                                                    display: flex;
                                                }
                                            </style>
                                            {{-- for month and difficulty level --}}
                                            {{-- <div class="div-flex">
                                                <!-- select month -->
                                                <div class="col-md-6" style="margin-right: 2px;">
                                                    <fieldset class="group-select relative input-npd mb-22">
                                                        <div class="search-bar-group relative">
                                                            <label>Season</label>
                                                            <div class="nice-select" tabindex="0">
                                                                <span class="current">Select Month</span>
                                                                <ul class="list">
                                                                    <li data-value="" class="option selected focus">
                                                                        Select Month</li>
                                                                    <li data-value="may" class="option">May</li>
                                                                    <li data-value="june" class="option">June</li>
                                                                    <li data-value="july" class="option">July</li>
                                                                    <li data-value="august" class="option">August</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>


                                                <!-- difficulty level -->
                                                <div class="col-md-6" style="margin-left: 2px;">
                                                    <fieldset class="group-select relative input-npd">
                                                        <div class="search-bar-group relative">
                                                            <label>Difficulty</label>
                                                            <div class="nice-select" tabindex="0">
                                                                <span class="current">Select Level</span>
                                                                <ul class="list">
                                                                    <li data-value="" class="option selected focus">
                                                                        Select Level</li>
                                                                    <li data-value="easy" class="option">Easy</li>
                                                                    <li data-value="moderate" class="option">Moderate
                                                                    </li>
                                                                    <li data-value="challenging" class="option">
                                                                        Challenging</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>

                                            </div> --}}

                                        </div>
                                    </div>

                                    {{-- <div class="widget-filter mb-40">
                                        <summary>
                                            <h6 class="title-tour" style="margin-top: 20px; margin-bottom: 10px;">Bike
                                                Features</h6>
                                        </summary>
                                        <details>
                                            <div class="group-check-box-wrap">
                                                <div class="checkbox">
                                                    <input id="check1" type="checkbox" name="check" value="check">
                                                    <label for="check1">Dual Disc Brakes</label>
                                                </div>
                                                <div class="checkbox">
                                                    <input id="check2" type="checkbox" name="check" value="check">
                                                    <label for="check2">ABS Equipped</label>
                                                </div>
                                                <div class="checkbox">
                                                    <input id="check3" type="checkbox" name="check" value="check">
                                                    <label for="check3">Luggage Carrier</label>
                                                </div>
                                                <div class="checkbox">
                                                    <input id="check4" type="checkbox" name="check" value="check">
                                                    <label for="check4">Backup Vehicle</label>
                                                </div>
                                            </div>
                                        </details>

                                        <summary>
                                            <h6 class="title-tour" style="margin-top: 20px; margin-bottom: 10px;">Trip
                                                Inclusions</h6>
                                        </summary>
                                        <details>
                                            <div class="group-check-box-wrap">
                                                <div class="checkbox">
                                                    <input id="check5" type="checkbox" name="check" value="check">
                                                    <label for="check5">Accommodation</label>
                                                </div>
                                                <div class="checkbox">
                                                    <input id="check6" type="checkbox" name="check" value="check">
                                                    <label for="check6">Meals Included</label>
                                                </div>
                                                <div class="checkbox">
                                                    <input id="check7" type="checkbox" name="check" value="check">
                                                    <label for="check7">Support Team</label>
                                                </div>
                                                <div class="checkbox">
                                                    <input id="check8" type="checkbox" name="check" value="check">
                                                    <label for="check8">Medical Assistance</label>
                                                </div>
                                            </div>
                                        </details>
                                    </div> --}}

                                    <!-- <div class="widget-filter mb-40">
                                        
                                    </div> -->

                                    <div class="widget-filter-content">
                                        <div class="z-index3 relative">
                                            <span class="text-main">Dream Ride Himalaya</span>
                                            <h4 class="title text-white" id="tour-title">Leh Ladakh Bike Tour - 6N/7D Premium
                                            </h4>
                                            <p class="text-main">Experience the highest motorable road on Earth!</p>
                                            <a href="#" class="booking-now">Book Now <i class="icon-Vector2"></i></a>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="col-lg-8  ">
                                <div class="col-lg-12">
                                    <form action="/" class="tf-my-listing mb-37">
                                        <div class="row align-center">
                                            <div class="col-sm-5">
                                                <p class="showing"></p>
                                            </div>
                                            <div class="col-sm-7 group-bar-wrap flex-six">
                                                <div class="listing-all-wrap">
                                                    <div class="flex-three">
                                                        <div class="toolbar-list">
                                                            <div class="form-group">
                                                                <a class="btn-display-listing-grid active">
                                                                    <i class="icon-list"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div id="loader" class="my-4" style="display:none;">
                                    @include('components.loader')
                                </div>

                                <div class="col-lg-12">
                                    <div class="listing-list-car" id="packages-list"></div>

                                </div>
                             <div id="pagination" class="my-4"></div>

                            </div>
                        </div>
                    </div>
                </section>
                <!-- Widget archieve tour -->

                <section class="mb--70" style="margin-bottom: -70px;">
                    <div class="tf-container">
                        <div class="callt-to-action flex-two" style="border-radius: 79px;">
                            <div class="callt-to-action-content flex-three">
                                <div class="image">
                                    <img src="/assets/images/page/ready.png" alt="Image">
                                </div>
                                <div class="content">
                                    <h2 class="title-call">Ready to adventure and enjoy natural</h2>
                                    <p class="des">Get ready to embark on thrilling adventures while exploring and
                                        enjoying the beauty of
                                        nature.

                                    </p>
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
    <script src="/app/js/swiper-bundle.min.js"></script>
    <script src="/app/js/swiper.js"></script>
    <script src="/app/js/plugin.js"></script>
    <script src="/app/js/jquery.fancybox.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
    <script src="/app/js/shortcodes.js"></script>
    <script src="/app/js/main.js"></script>
  <script>

// -----------------------------------------------------
// GET TOUR ID FROM URL
// -----------------------------------------------------
const segments = window.location.pathname.split('/');
const tourId = segments[3];
fetch(`/api/tours/${tourId}`) 
.then(res => res.json()) 
.then(data => { document.querySelector('.title').innerHTML = data.name;
    document.title = data.name;
 });
// -----------------------------------------------------
// STATE
// -----------------------------------------------------
let currentPage = 1;
let filterParams = ""; // (for future filter support)
// STATE

// Use URLSearchParams to hold filters reliably
const currentFilters = new URLSearchParams();


// -----------------------------------------------------
// FIX IMAGE URL
// -----------------------------------------------------
function fixImageUrl(url) {
    if (!url) return '/assets/no-image.jpg';

    url = url.replace(/^\/+/, ''); // remove leading slashes
    return '/' + url;
}


// -----------------------------------------------------
// LOAD TOUR TITLE
// -----------------------------------------------------
fetch(`/api/tours/${tourId}`)
    .then(res => res.json())
    .then(data => {
        document.getElementById('tour-title').innerHTML = data.name;
    });


// -----------------------------------------------------
// LOAD PACKAGES (MAIN FUNCTION)
// -----------------------------------------------------
function loadPackages(page = 1) {
    currentPage = page;
    const loader = document.getElementById('loader');
    const container = document.getElementById('packages-list');

    loader.style.display = "flex";
    loader.style.justifyContent = "center";
    loader.style.marginTop = "20px";

    container.innerHTML = "";

    // Build URL with URL and URLSearchParams to avoid malformed queries
    const base = `/api/packages/by-tour/${tourId}`;
    const url = new URL(base, window.location.origin); // relative -> absolute
    url.searchParams.set('page', page);

    // append current filters
    currentFilters.forEach((val, key) => {
        url.searchParams.set(key, val);
    });

    fetch(url.toString())
        .then(res => res.json())
        .then(response => {
            const showing = document.querySelector('.showing');
            if (showing) {
                const from = response.from || 0;
                const to = response.to || 0;
                const total = response.total || 0;
                showing.innerHTML = `Showing <span class="text-main">${to}</span> of ${total} Adventures`;
                showing.style.display = "block";
            }
            loader.style.display = "none";
            renderPackages(response.data || []);
            renderPagination(response.current_page || 1, response.last_page || 1);
        })
        .catch(err => {
            console.error("loadPackages error", err);
            loader.style.display = "none";
        });
}



// -----------------------------------------------------
// RENDER PACKAGES
// -----------------------------------------------------
function renderPackages(packages) {

    const container = document.getElementById('packages-list');
    container.innerHTML = '';

    packages.forEach(pkg => {

        const info = pkg.information || {};

        // MAIN IMAGE
        const images = info.images || [];
        const mainImage = images.find(i => i.is_main) || images[0] || {};
        const imgUrl = fixImageUrl(mainImage.url);

        // TYPE (already populated from backend)
        const typeName = pkg.type?.name || "";
        const typeColor = pkg.type?.color || "";

        // DAYS / NIGHTS
        const days = pkg.days;
        const nights = pkg.nights;

        // DESCRIPTION
        const desc = info.description || "";
        const shortDesc = desc.length > 100 ? desc.substring(0, 100) + "..." : desc;

        // RIDERS
        const riders = info.noofriders || "";

        // COUNTS
        const imageCount = pkg.image_count || 0;
        const videoCount = pkg.video_count || 0;

        // RENDER CARD
        container.innerHTML += `
            <div class="tour-listing mt-3 box-sd">
                <div class="row">

                    <!-- LEFT IMAGE -->
                    <div class="col-md-4 col-package">
                        <div class="pack-image">
                            <a href="/packages/${pkg.id}" class="tour-listing-image">
                                <div class="badge-top flex-two">

                                    ${typeName ? `
                                        <span class="feature" style="background:${typeColor}">
                                            ${typeName}
                                        </span>` : ''}

                                    <div class="badge-media flex-five">
                                        ${imageCount > 0 ? `
                                            <span class="media"><i class="icon-Group-1000002909"></i>${imageCount}</span>
                                        ` : ''}

                                        ${videoCount > 0 ? `
                                            <span class="media"><i class="icon-Group-1000002910"></i>${videoCount}</span>
                                        ` : ''}
                                    </div>
                                </div>

                                <img src="${imgUrl}"
                                     alt="${info.title || ''}"
                                     style="width:100%; height:267px; object-fit:cover; margin-left:12px;">
                            </a>
                        </div>
                    </div>

                    <!-- RIGHT CONTENT -->
                    <div class="col-md-8 col-package">
                        <div class="pac-content">
                            <div class="tour-listing-content">

                                <span class="map"><i class="icon-Vector4"></i>${info.subtitle || ''}</span>

                                <h3 class="title-tour-list">
                                    <a href="/packages/${pkg.id}">${info.title || ''}</a>
                                </h3>

                                <p class="para-title-tour">${shortDesc}</p>

                                <div class="icon-box flex-three">

                                    <div class="icons flex-three">
                                        <i class="icon-time-left"></i>
                                        <span>${nights} Nights / ${days} Days</span>
                                    </div>

                                    <div class="icons flex-three">
                                         <svg width="21" height="16" viewBox="0 0 21 16"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M4.34766 4.79761C4.34766 2.94013 5.85346 1.43433 7.71094 1.43433C9.56841 1.43433 11.0742 2.94013 11.0742 4.79761C11.0742 6.65508 9.56841 8.16089 7.71094 8.16089C5.85346 8.16089 4.34766 6.65508 4.34766 4.79761Z"
                                                                            stroke="currentColor" stroke-width="1.7"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                        <path
                                                                            d="M9.5977 15.1797H2.46098C1.34827 15.1797 0.558268 14.0954 0.898984 13.0362C1.80408 10.222 4.57804 8.18566 7.69301 8.18566C9.17897 8.18566 10.5566 8.64906 11.6895 9.43922"
                                                                            stroke="currentColor" stroke-width="1.7"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                        <path d="M17.1035 15.1797V9.02734"
                                                                            stroke="currentColor" stroke-width="1.7"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                        <path d="M20.1797 12.1035H14.0273"
                                                                            stroke="currentColor" stroke-width="1.7"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                    </svg>
                                       <span>${riders} Riders</span>
                                    </div>

                                </div>

                                <div class="flex-two">
                                    <div class="price-box flex-three">
                                        <p>From <span class="price-sale" style="color:#ffbf00">₹${pkg.pricing}</span></p>
                                    </div>
                                    <div class="icon-bookmark"><i class="icon-Vector-151"></i></div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        `;
    });
}


// -----------------------------------------------------
// RENDER PAGINATION
// -----------------------------------------------------
function renderPagination(current, last) {

    let html = '<ul class="tf-pagination flex-five">';

    // PREV BUTTON
    if (current > 1) {
        html += `
            <li>
                <a class="pages-link" onclick="loadPackages(${current - 1})">
                    <i class="icon-29"></i>
                </a>
            </li>`;
    }

    // PAGE NUMBERS
    for (let i = 1; i <= last; i++) {
        html += `
            <li class="${i === current ? 'pages-item active' : ''}">
                <a class="pages-link" onclick="loadPackages(${i})">${i}</a>
            </li>`;
    }

    // NEXT BUTTON
    if (current < last) {
        html += `
            <li>
                <a class="pages-link" onclick="loadPackages(${current + 1})">
                    <i class="icon--1"></i>
                </a>
            </li>`;
    }

    html += "</ul>";

    document.getElementById("pagination").innerHTML = html;
}


// -----------------------------------------------------
// INITIAL LOAD
// -----------------------------------------------------
loadPackages();
loadFilters();


function normalizeFilter(key, value) {
    if (!value && value !== 0) return ""; // empty

    if (key === "riders") {
        // because your populateSelect adds raw numbers (e.g. "52"), just pass number
        // if UI ever uses words, convert here. Right now we assume numeric strings.
        const n = parseInt(value);
        return isNaN(n) ? "" : String(n);
    }

    if (key === "duration") {
        // input might be "7" or "7days" — keep only digits
        const n = parseInt(String(value).replace(/\D/g, ''));
        return isNaN(n) ? "" : String(n);
    }

    // price keys should be passed as plain numbers
    if (key === "min_price" || key === "max_price") {
        const n = parseInt(value);
        return isNaN(n) ? "" : String(n);
    }

    // destination or others: trim
    return String(value).trim();
}

function populateSelect(selector, items) {
    const select = document.querySelector(selector + " .list");
    const current = document.querySelector(selector + " .current");

    if (!select) return;

    select.innerHTML = `
        <li data-value="" class="option selected focus">Select</li>
    `;

    items.forEach(item => {
        select.innerHTML += `
            <li class="option" data-value="${item}">${item}</li>
        `;
    });

    // RESET DEFAULT TEXT
    if (current) current.innerHTML = "Select";

    // Refresh Nice Select
    setTimeout(() => {
        $('.nice-select').niceSelect('update');
    }, 50);
}

function initPriceSlider(min, max) {
    // guard: if slider element missing, skip
    if (!$("#slider-range2").length) return;

    // ensure jQuery UI slider is available
    setTimeout(() => {
        // Destroy existing slider if any to avoid duplicates
        if ($("#slider-range2").hasClass("ui-slider")) {
            $("#slider-range2").slider("destroy");
        }

        $("#slider-range2").slider({
            range: true,
            min: Number(min) || 0,
            max: Number(max) || 0,
            values: [Number(min) || 0, Number(max) || 0],
            slide: function (event, ui) {
                $("#slider-range-value01").text("₹" + ui.values[0]);
                $("#slider-range-value02").text("₹" + ui.values[1]);

                // update hidden inputs if you need them
                $('input[name="min-value2"]').val(ui.values[0]);
                $('input[name="max-value2"]').val(ui.values[1]);
            },
            change: function (event, ui) {
                // When user finishes sliding, set filters and reload
                currentFilters.set("min_price", String(ui.values[0]));
                currentFilters.set("max_price", String(ui.values[1]));

                console.log("PRICE FILTER ->", ui.values[0], ui.values[1], currentFilters.toString());

                loadPackages(1);
            }
        });

        // init display
        const vals = $("#slider-range2").slider("values");
        $("#slider-range-value01").text("₹" + (vals[0] || min));
        $("#slider-range-value02").text("₹" + (vals[1] || max));
    }, 150);
}


function loadFilters() {
    fetch(`/api/packages/filters/${tourId}`)
        .then(res => res.json())
        .then(data => {

            populateSelect(".filter-destination", data.destinations);
            populateSelect(".filter-duration", data.durations);
            populateSelect(".filter-riders", data.riders);
           

            // price slider
            initPriceSlider(data.price_range.min, data.price_range.max);
             setTimeout(() => {
                initFilterEvents();
            }, 300);
        });
}

function initFilterEvents() {

    // DESTINATION (delegated)
    $(document).on("click", ".filter-destination .nice-select .option", function () {
        const value = $(this).data("value");
        applyFilter("destination", value);
    });

    // DURATION (delegated)
    $(document).on("click", ".filter-duration .nice-select .option", function () {
        const value = $(this).data("value");
        applyFilter("duration", value);
    });

    // RIDERS (delegated)
    $(document).on("click", ".filter-riders .nice-select .option", function () {
        const value = $(this).data("value");
        applyFilter("riders", value);
    });
}




function applyFilter(key, value) {

    const normalized = normalizeFilter(key, value);

    if (!normalized && normalized !== "0") {
        currentFilters.delete(key);
    } else {
        currentFilters.set(key, normalized);
    }

    console.log("CURRENT FILTERS ->", currentFilters.toString());

    // reload page 1 with updated filters
    loadPackages(1);
}



</script>

</body>

</html>
