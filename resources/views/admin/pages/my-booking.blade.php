<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>
    <meta charset="utf-8">
    <title>Dream Ride - Travel & Tour Booking HTML Template</title>

    <meta name="author" content="themesflat.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="/app/css/app.css">
    <link rel="stylesheet" href="/app/css/map.min.css">

    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="/assets/images/dreamridelogo.webp">
    <link rel="apple-touch-icon-precomposed" href="/assets/images/dreamridelogo.webp">

</head>

<body class="body header-fixed">

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

            @include('admin.components.sidebar')
         

            <div class="has-dashboard">
                <!-- Main Header -->
       @include('admin.components.header')
               
                <!-- End Main Header -->
                <main id="main">
                    <section class="profile-dashboard">
                        <div class="inner-header mb-40">
                            <h3 class="title">My Booking</h3>
                            <p class="des">There are many variations of passages of Lorem Ipsum</p>
                        </div>
                        <div class="my-booking-wrap ">
                            <ul class="booking-table-title flex-three">
                                <li>
                                    <p>Description</p>
                                </li>
                                <li>
                                    <p>Status</p>
                                </li>
                                <li>
                                    <p>Start Date</p>
                                </li>
                                <li>
                                    <p>End Date</p>
                                </li>
                                <li>
                                    <p>Guests</p>
                                </li>
                                <li>
                                    <p>Action</p>
                                </li>
                            </ul>
                            <ul class="booking-table-content mb-60">
                                <li class="flex-three">
                                    <div class="booking-list flex-three">
                                        <div class="image">
                                            <img src="/assets/images/travel-list/11.jpg" alt="image">
                                        </div>
                                        <div class="content">
                                            <p class="id">ID: #4435</p>
                                            <h6 class="title-booking"><a href="#">Chevrolet Suburban 2023</a></h6>
                                            <p class="price">$27,000</p>
                                        </div>
                                    </div>
                                    <div class="booking-list-table">
                                        <p class="status">Approved</p>
                                    </div>
                                    <div class="booking-list-table">
                                        <p class="date-gues">11 Apr 2023</p>
                                    </div>
                                    <div class="booking-list-table">
                                        <p class="date-gues">11 Apr 2023</p>
                                    </div>
                                    <div class="booking-list-table">
                                        <p class="date-gues">03 People</p>
                                    </div>
                                    <div class="flex-five action-wrap">
                                        <div class="action flex-five">
                                            <i class="icon-Vector-16"></i>
                                        </div>
                                        <div class="action flex-five">
                                            <i class="icon-Vector-17"></i>
                                        </div>
                                    </div>
                                </li>
                                <li class="flex-three">
                                    <div class="booking-list flex-three">
                                        <div class="image">
                                            <img src="/assets/images/travel-list/31.jpg" alt="image">
                                        </div>
                                        <div class="content">
                                            <p class="id">ID: #4435</p>
                                            <h6 class="title-booking"><a href="#">Chevrolet Suburban 2023</a></h6>
                                            <p class="price">$27,000</p>
                                        </div>
                                    </div>
                                    <div class="booking-list-table">
                                        <p class="status">Approved</p>
                                    </div>
                                    <div class="booking-list-table">
                                        <p class="date-gues">11 Apr 2023</p>
                                    </div>
                                    <div class="booking-list-table">
                                        <p class="date-gues">11 Apr 2023</p>
                                    </div>
                                    <div class="booking-list-table">
                                        <p class="date-gues">03 People</p>
                                    </div>
                                    <div class="flex-five action-wrap">
                                        <div class="action flex-five">
                                            <i class="icon-Vector-16"></i>
                                        </div>
                                        <div class="action flex-five">
                                            <i class="icon-Vector-17"></i>
                                        </div>
                                    </div>
                                </li>
                                <li class="flex-three">
                                    <div class="booking-list flex-three">
                                        <div class="image">
                                            <img src="/assets/images/travel-list/29.jpg" alt="image">
                                        </div>
                                        <div class="content">
                                            <p class="id">ID: #4435</p>
                                            <h6 class="title-booking"><a href="#">Chevrolet Suburban 2023</a></h6>
                                            <p class="price">$27,000</p>
                                        </div>
                                    </div>
                                    <div class="booking-list-table">
                                        <p class="status">Approved</p>
                                    </div>
                                    <div class="booking-list-table">
                                        <p class="date-gues">11 Apr 2023</p>
                                    </div>
                                    <div class="booking-list-table">
                                        <p class="date-gues">11 Apr 2023</p>
                                    </div>
                                    <div class="booking-list-table">
                                        <p class="date-gues">03 People</p>
                                    </div>
                                    <div class="flex-five action-wrap">
                                        <div class="action flex-five">
                                            <i class="icon-Vector-16"></i>
                                        </div>
                                        <div class="action flex-five">
                                            <i class="icon-Vector-17"></i>
                                        </div>
                                    </div>
                                </li>
                                <li class="flex-three">
                                    <div class="booking-list flex-three">
                                        <div class="image">
                                            <img src="/assets/images/travel-list/list3.jpg" alt="image">
                                        </div>
                                        <div class="content">
                                            <p class="id">ID: #4435</p>
                                            <h6 class="title-booking"><a href="#">Chevrolet Suburban 2023</a></h6>
                                            <p class="price">$27,000</p>
                                        </div>
                                    </div>
                                    <div class="booking-list-table">
                                        <p class="status">Approved</p>
                                    </div>
                                    <div class="booking-list-table">
                                        <p class="date-gues">11 Apr 2023</p>
                                    </div>
                                    <div class="booking-list-table">
                                        <p class="date-gues">11 Apr 2023</p>
                                    </div>
                                    <div class="booking-list-table">
                                        <p class="date-gues">03 People</p>
                                    </div>
                                    <div class="flex-five action-wrap">
                                        <div class="action flex-five">
                                            <i class="icon-Vector-16"></i>
                                        </div>
                                        <div class="action flex-five">
                                            <i class="icon-Vector-17"></i>
                                        </div>
                                    </div>
                                </li>
                                <li class="flex-three">
                                    <div class="booking-list flex-three">
                                        <div class="image">
                                            <img src="/assets/images/travel-list/list4.jpg" alt="image">
                                        </div>
                                        <div class="content">
                                            <p class="id">ID: #4435</p>
                                            <h6 class="title-booking"><a href="#">Chevrolet Suburban 2023</a></h6>
                                            <p class="price">$27,000</p>
                                        </div>
                                    </div>
                                    <div class="booking-list-table">
                                        <p class="status">Approved</p>
                                    </div>
                                    <div class="booking-list-table">
                                        <p class="date-gues">11 Apr 2023</p>
                                    </div>
                                    <div class="booking-list-table">
                                        <p class="date-gues">11 Apr 2023</p>
                                    </div>
                                    <div class="booking-list-table">
                                        <p class="date-gues">03 People</p>
                                    </div>
                                    <div class="flex-five action-wrap">
                                        <div class="action flex-five">
                                            <i class="icon-Vector-16"></i>
                                        </div>
                                        <div class="action flex-five">
                                            <i class="icon-Vector-17"></i>
                                        </div>
                                    </div>
                                </li>

                            </ul>
                            <div class="row">
                                <div class="col-md-12 ">
                                    <ul class="tf-pagination flex-five">
                                        <li>
                                            <a class="pages-link" href="#"> <i class="icon-29"></i></a>
                                        </li>
                                        <li>
                                            <a class="pages-link" href="#">1</a>
                                        </li>
                                        <li class="pages-item active" aria-current="page">
                                            <a class="pages-link" href="#">2</a>
                                        </li>
                                        <li><a class="pages-link" href="#">3</a></li>
                                        <li>
                                            <a class="pages-link" href="#"><i class=" icon--1"></i></a>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </div>
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
    <script src="/app/js/tinymce/tinymce.min.js"></script>
    <script src="/app/js/tinymce/tinymce-custom.js"></script>
    <script src="/app/js/swiper-bundle.min.js"></script>
    <script src="/app/js/swiper.js"></script>
    <script src="/app/js/plugin.js"></script>
    <script src="/app/js/map.min.js"></script>
    <script src="/app/js/map.js"></script>
    <script src="/app/js/shortcodes.js"></script>
    <script src="/app/js/auth-validator.js"></script>
    <script src="/app/js/admin-auth-guard.js"></script>
    
    <script src="/app/js/main.js"></script>

</body>

</html>

