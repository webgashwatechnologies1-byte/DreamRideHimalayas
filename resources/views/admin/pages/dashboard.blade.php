<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>
    <meta charset="utf-8">
    <title>Dream Ride - Travel & Tour Booking HTML Template</title>

    <meta name="author" content="themesflat.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="/app/css/app.css">
    <link rel="stylesheet" href="/app/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="/app/css/map.min.css">

    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="/assets/images/dreamridelogo.webp">
    <link rel="apple-touch-icon-precomposed" href="/assets/images/dreamridelogo.webp">
<style>
.dashboard-card ul {
    list-style: none;
    padding: 0;
    margin: 0;
}
.dashboard-card ul li {
    padding: 10px 0;
    border-bottom: 1px solid #eee;
}
.dashboard-card ul li:last-child {
    border-bottom: none;
}
.dashboard-card span.date {
    font-size: 12px;
    color: #999;
}
</style>

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

    <!-- /preload -->

    <div id="wrapper">

        <div id="pagee" class="clearfix">

            {{-- SideBard Dashboard --}}
            @include('admin.components.sidebar')
            <div class="has-dashboard">
                <!-- Main Header -->
            @include('admin.components.header')
                
                <!-- End Main Header -->
                <main id="main">
                    <section class="profile-dashboard">
                        <div class="inner-header mb-40">
                            <h3 class="title">Dashboard</h3>
                        </div>
                       <div class="counter-grid-dashboard mb-70">

    <!-- Total Bookings -->
    <div class="counter-dashboard flex-three">
        <div class="icon flex-five">
            <i class="icon-earnings-1"></i>
        </div>
        <div class="content">
            <span>Total Bookings</span>
            <div class="number-counter" id="countBookings">0</div>
        </div>
    </div>

    <!-- Total Enquiries -->
    <div class="counter-dashboard flex-three">
        <div class="icon flex-five">
            <i class="icon-feedback"></i>
        </div>
        <div class="content">
            <span>Total Enquiries</span>
            <div class="number-counter" id="countEnquiries">0</div>
        </div>
    </div>

    <!-- Total Packages -->
    <div class="counter-dashboard flex-three">
        <div class="icon flex-five">
            <i class="icon-Group-1000003085"></i>
        </div>
        <div class="content">
            <span>Total Packages</span>
            <div class="number-counter" id="countPackages">0</div>
        </div>
    </div>

    <!-- Total Pages -->
    <div class="counter-dashboard flex-three">
        <div class="icon flex-five">
            <i class="icon-heart-1"></i>
        </div>
        <div class="content">
            <span>Total Pages</span>
            <div class="number-counter" id="countPages">0</div>
        </div>
    </div>

</div>

                        <div class="row mb-40">

    <!-- Latest Bookings -->
    <div class="col-xl-6">
        <div class="tfcl-card dashboard-card">
            <h4 class="title mb-20">Latest Bookings</h4>
            <ul id="latestBookings"></ul>
        </div>
    </div>

    <!-- Latest Enquiries -->
    <div class="col-xl-6">
        <div class="tfcl-card dashboard-card">
            <h4 class="title mb-20">Latest Enquiries</h4>
            <ul id="latestEnquiries"></ul>
        </div>
    </div>

</div>

<div class="row mb-40">

    <!-- Latest Packages -->
    <div class="col-xl-6">
        <div class="tfcl-card dashboard-card">
            <h4 class="title mb-20">Latest Packages</h4>
            <ul id="latestPackages"></ul>
        </div>
    </div>

    <!-- Latest Pages -->
    <div class="col-xl-6">
        <div class="tfcl-card dashboard-card">
            <h4 class="title mb-20">Latest Pages</h4>
            <ul id="latestPages"></ul>
        </div>
    </div>

</div>

                        {{-- <div class="row">
                            <div class="col-xxl-8 col-xl-12">
                                <div class="page-insight">
                                    <!-- chart -->
                                    <div class="wg-box">
                                        <div class="flex-two">
                                            <h5>Total page view</h5>
                                            <div class="group-select">
                                                <div class="nice-select" tabindex="0">
                                                    <span class="current">This Week</span>
                                                    <ul class="list">
                                                        <li data-value class="option selected">This Week</li>
                                                        <li data-value="Last day" class="option">Last Day</li>
                                                        <li data-value="Last Week" class="option">Last Week</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="line-chart-1"></div>
                                    </div>
                                    <!-- /chart -->
                                </div>
                            </div>
                            <div class="col-xxl-4 col-xl-12">
                                <div class="tfcl-card dashboard-message mb-25">
                                    <h4 class="title mb-30">What,s New?</h4>
                                    <ul class="message">
                                        <li class="flex-three">
                                            <div class="icon">
                                                <i class="icon-Group4"></i>
                                            </div>
                                            <p>Congratulation Your <span class="text-main">23</span> Listing has been
                                                approved Today</p>
                                        </li>
                                        <li class="flex-three">
                                            <div class="icon">
                                                <i class="icon-Vector-131"></i>
                                            </div>
                                            <p>Someone is saved your listing</p>
                                        </li>
                                        <li class="flex-three">
                                            <div class="icon">
                                                <div class="icon-Vector-141"></div>
                                            </div>
                                            <p>You have unread <span class="text-main">21</span> Message</p>
                                        </li>
                                        <li class="flex-three">
                                            <div class="icon">
                                                <i class="icon-Vector-131"></i>
                                            </div>
                                            <p>Congratulation Your <span class="text-main">22</span> Listing has
                                                been</p>
                                        </li>
                                        <li class="flex-three">
                                            <div class="icon">
                                                <i class="icon-Vector-131"></i>
                                            </div>
                                            <p>Mehedii Added Favorites Your listing “Mercedez Benz 2.3”</p>
                                        </li>
                                        <li class="flex-three">
                                            <div class="icon">
                                                <i class="icon-Vector-141"></i>
                                            </div>
                                            <p>You have unread <span class="text-main">21</span> Message</p>
                                        </li>
                                        <li class="flex-three">
                                            <div class="icon">
                                                <i class="icon-Vector-131"></i>
                                            </div>
                                            <p>Congratulation Your <span class="text-main">22</span> Listing has been
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tfcl-card dashboard-reviews">
                                    <h4 class="title mb-30">Recent Reviews</h4>
                                    <ul>
                                        <li class="comment-by-user flex-three">
                                            <div class="group-author">
                                                <img src="/assets/images/avata/avt-review.jpg" alt="image">
                                            </div>
                                            <div class="content">
                                                <div class="group-name flex-one">
                                                    <div class="review-name">Rohan De Spond</div>
                                                    <div class="rating-wrap">
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                    </div>
                                                </div>
                                                <p>Lorem ipsum dolor sit amet, con covered many vulputate ves
                                                </p>
                                            </div>
                                        </li>
                                        <li class="comment-by-user flex-three">
                                            <div class="group-author">
                                                <img src="/assets/images/avata/avt-review2.jpg" alt="image">
                                            </div>
                                            <div class="content">
                                                <div class="group-name flex-one">
                                                    <div class="review-name">Mehedii. Has</div>
                                                    <div class="rating-wrap">
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                    </div>
                                                </div>
                                                <p>Lorem ipsum dolor sit amet, con covered many vulputate ves
                                                </p>
                                            </div>
                                        </li>
                                        <li class="comment-by-user flex-three">
                                            <div class="group-author">
                                                <img src="/assets/images/avata/avt-review.jpg" alt="image">
                                            </div>
                                            <div class="content">
                                                <div class="group-name flex-one">
                                                    <div class="review-name">Rohan De Spond</div>
                                                    <div class="rating-wrap">
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                    </div>
                                                </div>
                                                <p>Lorem ipsum dolor sit amet, con covered many vulputate ves
                                                </p>
                                            </div>
                                        </li>
                                        <li class="comment-by-user flex-three">
                                            <div class="group-author">
                                                <img src="/assets/images/avata/avt-review3.jpg" alt="image">
                                            </div>
                                            <div class="content">
                                                <div class="group-name flex-one">
                                                    <div class="review-name">Mehedii. Has</div>
                                                    <div class="rating-wrap">
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                    </div>
                                                </div>
                                                <p>Lorem ipsum dolor sit amet, con covered many vulputate ves
                                                </p>
                                            </div>
                                        </li>

                                    </ul>

                                </div>

                            </div>
                        </div> --}}

                    </section>

                </main>

       @include('admin.components.footer')
               

                <!-- Bottom -->
            </div>

        </div>
        <!-- /#page -->
    </div>

    <!-- Modal Popup Bid -->

    <a id="scroll-top" class="button-go"></a>

    <!-- Modal search-->
    <div class="modal search-mobie fade" id="exampleModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body">
                    <form action="/" class="search-form-mobie">
                        <div class="search">
                            <i class="icon-circle2017"></i>
                            <input type="search" placeholder="Search Travel" class="search-input" autocomplete="off">
                            <button type="button">Search</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>


    <!-- Javascript -->
    <script src="/app/js/jquery.min.js"></script>
    <script src="/app/js/jquery.nice-select.min.js"></script>
    <script src="/app/js/bootstrap.min.js"></script>
    <script src="/app/js/bootstrap-select.min.js"></script>
    <script src="/app/js/tinymce/tinymce.min.js"></script>
    <script src="/app/js/tinymce/tinymce-custom.js"></script>
    <script src="/app/js/swiper-bundle.min.js"></script>
    <script src="/app/js/swiper.js"></script>
    <script src="/app/js/plugin.js"></script>
    <script src="/app/js/map.min.js"></script>
    <script src="/app/js/map.js"></script>
    <script src="/app/js/countto.js"></script>
    <script src="/app/js/apexcharts.js"></script>
    <script src="/app/js/line-chart.js"></script>
    <script src="/app/js/shortcodes.js"></script>
    <script src="/app/js/auth-validator.js"></script>
    <script src="/app/js/admin-auth-guard.js"></script>

    <script src="/app/js/main.js"></script>
<script>
$(document).ready(function () {

    loadLatestBookings();
    loadLatestEnquiries();
    loadLatestPackages();
    loadLatestPages();
    loadCounters();

    function loadCounters() {

        // Total Bookings
        fetch('/api/bookings')
            .then(res => res.json())
            .then(res => {
                $("#countBookings").text(res.total ?? res.data.length);
            });

        // Total Enquiries
        fetch('/api/enquiries')
            .then(res => res.json())
            .then(res => {
                $("#countEnquiries").text(res.total ?? res.data.length);
            });

        // Total Packages
        fetch('/api/packages/get-packages')
            .then(res => res.json())
            .then(res => {
                $("#countPackages").text(res.data.length);
            });

        // Total Pages
        fetch('/api/admin/pages/latest')
            .then(res => res.json())
            .then(res => {
                $("#countPages").text(res.pages.length);
            });
    }

    // ----------------------------
    // LATEST BOOKINGS
    // ----------------------------
    function loadLatestBookings() {
        fetch('/api/bookings')
            .then(res => res.json())
            .then(res => {
                let list = $("#latestBookings");
                list.html("");

                if (!res.data.length) {
                    list.html(`<li>No bookings found</li>`);
                    return;
                }

                res.data.slice(0, 5).forEach(b => {
                    let date = b.date ? new Date(b.date).toLocaleDateString() : "N/A";

                    list.append(`
                        <li>
                            <strong>${b.user_name ?? 'No Name'}</strong> — ₹${b.amount ?? '0'}<br>
                            <span class="date">${date}</span>
                        </li>
                    `);
                });
            })
            .catch(() => $("#latestBookings").html(`<li>Error loading bookings</li>`));
    }

    // ----------------------------
    // LATEST ENQUIRIES
    // ----------------------------
    function loadLatestEnquiries() {
        fetch('/api/enquiries')
            .then(res => res.json())
            .then(res => {
                let list = $("#latestEnquiries");
                list.html("");

                if (!res.data.length) {
                    list.html(`<li>No enquiries found</li>`);
                    return;
                }

                res.data.slice(0, 5).forEach(e => {
                    let date = e.date ? new Date(e.date).toLocaleDateString() : "N/A";

                    list.append(`
                        <li>
                            <strong>${e.user_name ?? 'No Name'}</strong> — ${e.user_phone ?? 'N/A'}<br>
                            <span class="date">${date}</span>
                        </li>
                    `);
                });
            })
            .catch(() => $("#latestEnquiries").html(`<li>Error loading enquiries</li>`));
    }

    // ----------------------------
    // LATEST PACKAGES
    // ----------------------------
    function loadLatestPackages() {
        fetch('/api/packages/get-packages')
            .then(res => res.json())
            .then(res => {
                let list = $("#latestPackages");
                list.html("");

                if (!res.data.length) {
                    list.html(`<li>No packages found</li>`);
                    return;
                }

                res.data.slice(0, 5).forEach(p => {
                    let date = new Date(p.date ?? p.created_at).toLocaleDateString();

                    list.append(`
                        <li>
                            <strong>${p.title}</strong><br>
                            <span class="date">${date}</span>
                        </li>
                    `);
                });
            })
            .catch(() => $("#latestPackages").html(`<li>Error loading packages</li>`));
    }

    // ----------------------------
    // LATEST CMS PAGES
    // ----------------------------
    function loadLatestPages() {
        fetch('/api/admin/pages/latest')
            .then(res => res.json())
            .then(res => {
                let list = $("#latestPages");
                list.html("");

                if (!res.pages.length) {
                    list.html(`<li>No pages found</li>`);
                    return;
                }

                res.pages.slice(0, 5).forEach(pg => {
                    let date = new Date(pg.created_at).toLocaleDateString();

                    list.append(`
                        <li>
                            <strong>${pg.title}</strong><br>
                            <span class="date">${date}</span>
                        </li>
                    `);
                });
            })
            .catch(() => $("#latestPages").html(`<li>Error loading pages</li>`));
    }

});
</script>


</body>

</html>

