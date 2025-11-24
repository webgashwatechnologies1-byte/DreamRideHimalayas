<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>
    <meta charset="utf-8">
    <title>Srinagar–Manali via Hanle & Umling La</title>

    <meta name="author" content="themesflat.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="/app/css/app.css">
    <link rel="stylesheet" href="/app/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">

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

    details {
        color: #fbad17;
    }

    /* package paragraph */
    .para-title-tour {
        font-size: 14px;
        font-style: italic;
    }

    /* archieve tour */
    .archieve-content {
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
    .col-package{
        align-content: center;
    }

    /* itinerary */
    .h2-itinerary{
        font-family: "Plus Jakarta Sans", sans-serif;
        font-size: 30px;
    }
  .itinerary {
    max-width: 750px;
    margin: 0 auto;
    border-radius: 10px;
    box-shadow: 0 4px 25px rgba(255,140,0,0.15);
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
    border-bottom: 1px solid rgba(255,255,255,0.1);
    transition: 0.3s ease;
    transition: transform 5px;
    border-top: 1px solid #d1d1d1;
  }

  .day:hover{
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
    background: rgba(255,140,0,0.08);
  }

  .day-header h3 {
    margin: 0;
    font-size: 0.95rem;
  }

  .day-header .icons {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 10px 15px;
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

  .pin-location{
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
    .day-header .icons{
      padding: 4px 7px;
    }

    .day-para{
      padding-left: 9px;
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

                <section class="breadcumb-section" style="background-image: url('./assets/images/gallery/manali-srinagar-banner1.jpg'); background-position-y: -61px;">
                    <div class="tf-container">
                        <div class="row">
                            <div class="col-lg-12 center z-index1">
                                <h1 class="title">Srinagar–Manali via Hanle & Umling La</h1>
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
                                            <fieldset class="group-select relative mb-22">
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

                                            <fieldset class="group-select relative mb-22">
                                                <i class="icon-Vector-22"></i>
                                                <div class="search-bar-group relative">
                                                    <label>Bike Type</label>
                                                    <div class="nice-select" tabindex="0">
                                                        <span class="current">Choose Bike</span>
                                                        <ul class="list">
                                                            <li data-value="" class="option selected focus">Choose Bike</li>
                                                            <li data-value="royal-enfield" class="option">Royal Enfield 350/500</li>
                                                            <li data-value="himalayan" class="option">Himalayan</li>
                                                            <li data-value="adv390" class="option">KTM ADV 390</li>
                                                            <li data-value="scrambler" class="option">Scrambler</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <fieldset class="group-select relative mb-22">
                                                <i class="icon-Group-111"></i>
                                                <div class="search-bar-group relative">
                                                    <label>Trip Duration</label>
                                                    <div class="nice-select" tabindex="0">
                                                        <span class="current">Select Duration</span>
                                                        <ul class="list">
                                                            <li data-value="" class="option selected focus">Select Duration</li>
                                                            <li data-value="7days" class="option">7 Days</li>
                                                            <li data-value="9days" class="option">9 Days</li>
                                                            <li data-value="11days" class="option">11 Days</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <fieldset class="group-select relative mb-22">
                                                <i class="icon-user"></i>
                                                <div class="search-bar-group relative">
                                                    <label>Riders</label>
                                                    <div class="nice-select" tabindex="0">
                                                        <span class="current">Number of Riders</span>
                                                        <ul class="list">
                                                            <li data-value="" class="option selected focus">Select Riders</li>
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
                                            <div class="div-flex">
                                                <!-- select month -->
                                                <div class="col-md-6" style="margin-right: 2px;">
                                                    <fieldset class="group-select relative input-npd mb-22">
                                                        <div class="search-bar-group relative">
                                                            <label>Season</label>
                                                            <div class="nice-select" tabindex="0">
                                                                <span class="current">Select Month</span>
                                                                <ul class="list">
                                                                    <li data-value="" class="option selected focus">Select Month</li>
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
                                                                    <li data-value="" class="option selected focus">Select Level</li>
                                                                    <li data-value="easy" class="option">Easy</li>
                                                                    <li data-value="moderate" class="option">Moderate</li>
                                                                    <li data-value="challenging" class="option">Challenging</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                    <div class="widget-filter mb-40">
                                        <summary>
                                            <h6 class="title-tour" style="margin-top: 20px; margin-bottom: 10px;">Bike Features</h6>
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
                                            <h6 class="title-tour" style="margin-top: 20px; margin-bottom: 10px;">Trip Inclusions</h6>
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
                                    </div>

                                    <!-- <div class="widget-filter mb-40">
                                        
                                    </div> -->

                                    <div class="widget-filter-content">
                                        <div class="z-index3 relative">
                                            <span class="text-main">Dream Ride Himalaya</span>
                                            <h4 class="title text-white">Manali–Srinagar via Hanle & Umling La</h4>
                                            <p class="text-main">Experience the highest motorable road on Earth!</p>
                                            <a href="#" class="booking-now">Book Now <i class="icon-Vector2"></i></a>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="col-lg-8 listing-list-car-wrap archieve-conten-2">
                                <div class="col-lg-12">
                                    <form action="/" class="tf-my-listing mb-37">
                                    <div class="row align-center">
                                        <div class="col-sm-5">
                                            <p class="showing">Showing <span class="text-main">12</span> of 21 Adventures</p>
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
                                
                                <div class="col-lg-12">
                                    <div class="listing-list-car">
                                    <!-- package-1 -->
                                    <!-- Srinagar–Manali via Umling La -->
                                    <div class="tour-listing box-sd">
                                        <div class="row">
                                            <div class="col-md-4 col-package">
                                                <div class="pack-image">
                                                <a href="manali-to-srinagar-hanle-umling.php" class="tour-listing-image">
                                                    <div class="badge-top flex-two">
                                                        <span class="feature">Featured</span>
                                                    <div class="badge-media flex-five">
                                                        <span class="media"><i class="icon-Group-1000002909"></i>5</span>
                                                        <span class="media"><i class="icon-Group-1000002910"></i>2</span>
                                                    </div>
                                                    </div>
                                                        <img src="/assets/images/gallery/manali-bike2.jpg" alt="Manali to Srinagar via Hanle & Umling La" style="width: 100%; height: 267px; object-fit: cover; margin-left: 12px; transition: transform 1s;">
                                                </a>
                                            </div>
                                            </div>
                                            
                                            <div class="col-md-8  col-package">
                                                <div class="pac-content">
                                                                                    <div class="tour-listing-content"  style="margin: 0px;">
                                            <span class="map"><i class="icon-Vector4"></i>Srinagar → Kargil → Leh → Hanle → Umling La → Pang → Manali</span>
                                            <h3 class="title-tour-list"><a href="manali-to-srinagar-hanle-umling.php">Srinagar–Manali via Umling La</a></h3>
                                            <p class="para-title-tour">
                                                The world’s highest motorable pass. Ride through breathtaking landscapes, remote villages, and star-studded skies for a once-in-a-lifetime Himalayan journey.
                                            </p>
                                            <div class="review">
                                                <i class="icon-Star"></i><i class="icon-Star"></i><i class="icon-Star"></i><i class="icon-Star"></i><i class="icon-Star"></i>
                                                <span>(12 Reviews)</span>
                                            </div>
                                            <div class="icon-box flex-three">
                                                <div class="icons flex-three"><i class="icon-time-left"></i><span>10 Days</span></div>
                                                <div class="icons flex-three">
                                                    <svg width="21" height="16" viewBox="0 0 21 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4.34766 4.79761C4.34766 2.94013 5.85346 1.43433 7.71094 1.43433C9.56841 1.43433 11.0742 2.94013 11.0742 4.79761C11.0742 6.65508 9.56841 8.16089 7.71094 8.16089C5.85346 8.16089 4.34766 6.65508 4.34766 4.79761Z" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M9.5977 15.1797H2.46098C1.34827 15.1797 0.558268 14.0954 0.898984 13.0362C1.80408 10.222 4.57804 8.18566 7.69301 8.18566C9.17897 8.18566 10.5566 8.64906 11.6895 9.43922" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M17.1035 15.1797V9.02734" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M20.1797 12.1035H14.0273" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                    <span>15 Riders</span>
                                                </div>
                                            </div>
                                            <div class="flex-two">
                                                <div class="price-box flex-three">
                                                    <p>From <span class="price-sale">₹60,000</span></p>
                                                    <span class="price">₹70,000</span>
                                                </div>
                                                <div class="icon-bookmark"><i class="icon-Vector-151"></i></div>
                                            </div>
                                        </div>
                                        </div>
                                            </div>
                                            

                                        </div>
                                        
                                        

                                    </div>
                                </div>
                            </div>
                            <!-- 2nd column end -->

                            <!-- 3rd column -ternary -->
                            <div class="col-lg-12 col-iternary">


<div class="itinerary">
  <div class="itinerary-header">
    <h2 class="h2-itinerary"> Srinagar–Manali via Umling La Ride</h2>
    <p>12 Days / 11 Nights | Trans-Himalayan Adventure</p>
  </div>

  <!-- Day Template -->
  <div class="day">
    <div class="day-header">
      <div class="icons">
        <i class="fa-solid fa-motorcycle"></i>
        <h3>Day 1:</h3>

        <p class="day-para" style="color: black; font-weight: 500; padding-left: 20px;">
          <span style="color: #ff7b00;"><img src="/assets/images/pin.png" alt="location" class="pin-location"> Srinagar</span> <br>
          The Grand Arrival in Srinagar
        </p>
      </div>
        <i class="fa-solid fa-chevron-down"></i>
    </div>
    <div class="day-content">
      <ul class="day-details">
        <li>Arrive at Srinagar International Airport in Srinagar.</li>
        <li>Your friendly Captain will be waiting to kick off an amazing adventure. </li>
        <li>Settle in and get to know your fellow travelers over a tasty dinner.</li>
        <li>Join a fun and informative briefing session with your Captain to hear what’s in store for the trip.</li>
        <li>Enjoy a relaxing overnight stay at your hotel in Srinagar.</li>
      </ul>
    </div>
  </div>

  <div class="day">
    <div class="day-header">
      <div class="icons">
        <i class="fa-solid fa-road"></i>
        <h3>Day 2:</h3>
        <p  class="day-para" style="color: black; font-weight: 500; padding-left: 20px;">
          <span style="color: #ff7b00;"><img src="/assets/images/pin.png" alt="location" class="pin-location"> Kargil</span> <br>
          Srinagar to Kargil via Zoji La /Sonmarg
        </p>
      </div>
      <i class="fa-solid fa-chevron-down"></i>
    </div>
    <div class="day-content">
      <ul class="day-details">
        <li>After a hearty breakfast, gear up for your ride from Srinagar to Kargil.</li>
        <li>Make a quick stop at the beautiful Sonamarg. </li>
        <li>Along the way, visit the Kargil War Memorial.</li>
        <li>Wrap up the day with a relaxing evening at your hotel in Kargil and a delicious dinner.</li>
      </ul>
    </div>
  </div>

  <div class="day">
    <div class="day-header">
      <div class="icons">
        <i class="fa-solid fa-mountain"></i>
        <h3>Day 3:</h3>
        <p  class="day-para" style="color: black; font-weight: 500; padding-left: 20px;">
          <span style="color: #ff7b00;"><img src="/assets/images/pin.png" alt="location" class="pin-location"> Leh</span> <br>
           Kargil to Leh via Fotu La
        </p>
      </div>
      <i class="fa-solid fa-chevron-down"></i>
    </div>
    <div class="day-content">
      <ul class="day-details">
        <li>After breakfast, set out on a beautiful drive from Kargil to Leh, crossing the scenic Namika La and Fotu La passes.</li>
        <li>If time allows, stop by the stunning Lamayuru Monastery, one of the oldest in Ladakh. </li>
        <li>On the route, you’ll also get to see the breathtaking confluence of the Zanskar and Indus Rivers at Sangam, and visit landmarks like Magnetic Hill, Pathar Sahib Gurudwara, and the Hall of Fame Museum.</li>
        <li>End the day with a hearty dinner and a comfortable overnight stay in Leh.</li>
      </ul>
    </div>
  </div>

  <div class="day">
    <div class="day-header">
      <div class="icons">
        <i class="fa-solid fa-campground"></i>
        <h3>Day 4:</h3>
        <p  class="day-para" style="color: black; font-weight: 500; padding-left: 20px;">
          <span style="color: #ff7b00;"><img src="/assets/images/pin.png" alt="location" class="pin-location">Nubra</span> <br>
          Leh to Nubra Valley via Khardung La
        </p>
      </div>
      <i class="fa-solid fa-chevron-down"></i>
    </div>
    <div class="day-content">
      Ride over one of the world’s highest passes and camp in Hunder sand dunes.
    </div>
  </div>

  <div class="day">
    <div class="day-header">
      <div class="icons">
        <i class="fa-solid fa-water"></i>
        <h3>Day 5:</h3>
        <p  class="day-para" style="color: black; font-weight: 500; padding-left: 20px;">
          <span style="color: #ff7b00;"><img src="/assets/images/pin.png" alt="location" class="pin-location"> Pangong</span> <br>
           Nubra Valley to Pangong Tso via Shyok
        </p>
      </div>
      <i class="fa-solid fa-chevron-down"></i>
    </div>
    <div class="day-content">
      Scenic off-road ride along the Shyok River to Pangong’s blue expanse.
    </div>
  </div>

  <div class="day">
    <div class="day-header">
      <div class="icons">
        <i class="fa-solid fa-binoculars"></i>
        <h3>Day 6:</h3>
        <p  class="day-para" style="color: black; font-weight: 500; padding-left: 20px;">
          <span  style="color: #ff7b00;"><img src="/assets/images/pin.png" alt="location" class="pin-location"> Hanle</span> <br>
           Pangong Tso to Hanle via Rezang La
        </p>
      </div>
      <i class="fa-solid fa-chevron-down"></i>
    </div>
    <div class="day-content">
      Pass through Rezang La and reach the world-famous Hanle Observatory.
    </div>
  </div>

  <div class="day">
    <div class="day-header">
      <div class="icons">
        <i class="fa-solid fa-flag-checkered"></i>
        <h3>Day 7:</h3>
        <p  class="day-para" style="color: black; font-weight: 500; padding-left: 20px;">
          <span  style="color: #ff7b00;"><img src="/assets/images/pin.png" alt="location" class="pin-location"> Hanle</span> <br>
           Hanle to Umling La and back to Hanle
        </p>
      </div>
      <i class="fa-solid fa-chevron-down"></i>
    </div>
    <div class="day-content">
      Conquer Umling La — the highest motorable road on Earth (19,024 ft).
    </div>
  </div>

  <div class="day">
    <div class="day-header">
      <div class="icons">
        <i class="fa-solid fa-road"></i>
        <h3>Day 8:</h3>
        <p  class="day-para" style="color: black; font-weight: 500; padding-left: 20px;">
          <span  style="color: #ff7b00;"><img src="/assets/images/pin.png" alt="location" class="pin-location"> Tso Moriri</span> <br>
           Hanle to Tso Moriri
        </p>
      </div>
      <i class="fa-solid fa-chevron-down"></i>
    </div>
    <div class="day-content">
      Ride through remote Changthang plains to the serene Tso Moriri Lake.
    </div>
  </div>

  <div class="day">
    <div class="day-header">
      <div class="icons">
        <i class="fa-solid fa-road-barrier"></i>
        <h3>Day 9:</h3>
        <p  class="day-para" style="color: black; font-weight: 500; padding-left: 20px;">
          <span style="color: #ff7b00;"><img src="/assets/images/pin.png" alt="location" class="pin-location"> Sarchu</span> <br>
           Tso Moriri to Sarchu
        </p>
      </div>
      <i class="fa-solid fa-chevron-down"></i>
    </div>
    <div class="day-content">
      Cross Tanglang La and More Plains — a dream route for bikers.
    </div>
  </div>

  <div class="day">
    <div class="day-header">
      <div class="icons">
        <i class="fa-solid fa-tree"></i>
        <h3>Day 10:</h3>
        <p  class="day-para" style="color: black; font-weight: 500; padding-left: 20px;">
          <span style="color: #ff7b00;"><img src="/assets/images/pin.png" alt="location" class="pin-location"> Baralacha Pass</span> <br>
          Sarchu to Manali via Baralacha La
        </p>
      </div>
      <i class="fa-solid fa-chevron-down"></i>
    </div>
    <div class="day-content">
      Ride through snow-capped passes and descend into green Himachal valleys.
    </div>
  </div>

  <div class="day">
    <div class="day-header">
      <div class="icons">
        <i class="fa-solid fa-bus"></i>
        <h3>Day 11:</h3>
        <p  class="day-para" style="color: black; font-weight: 500; padding-left: 20px;">
          <span style="color: #ff7b00;"><img src="/assets/images/pin.png" alt="location" class="pin-location"> Manali</span> <br>
          Departure from Manali
        </p>
      </div>
      <i class="fa-solid fa-chevron-down"></i>
    </div>
    <div class="day-content">
      Free time in Manali for café hopping before your return journey.
    </div>
  </div>

  <div class="day">
    <div class="day-header">
      <div class="icons">
        <i class="fa-solid fa-plane-arrival"></i>
        <h3>Day 12:</h3>
        <p  class="day-para" style="color: black; font-weight: 500; padding-left: 20px;">
          <span style="color: #ff7b00;"><img src="/assets/images/pin.png" alt="location" class="pin-location"> Delhi</span> <br>
          Arrival at Delhi
        </p>
      </div>
      <i class="fa-solid fa-chevron-down"></i>
    </div>
    <div class="day-content">
      End of an epic adventure across the Himalayas.
    </div>
  </div>
</div>

<script>
  // Toggle expand/collapse for itinerary days
  const days = document.querySelectorAll('.day');

  days.forEach(day => {
    day.querySelector('.day-header').addEventListener('click', () => {
      day.classList.toggle('active');
    });
  });
</script>


                            </div>
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
                                    <p class="des">Get ready to embark on thrilling adventures while exploring and enjoying the beauty of nature.

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
