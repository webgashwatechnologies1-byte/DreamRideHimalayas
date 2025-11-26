
    <link rel="stylesheet" href="/app/css/app.css">
    <link rel="stylesheet" type="text/css" href="/app/css/magnific-popup.css">
    <link rel="stylesheet" type="text/css" href="/app/css/jquery.fancybox.min.css">
    <link rel="stylesheet" type="text/css" href="/app/css/textanimation.css">

      {!! ToastMagic::styles() !!}

<div class="search-form-widget-slider relative wow fadeInUp animated">
                                    <div  id="search-form-slider">
                                            <div class="flex wd-search">
                                                <fieldset class="form-group filter-destination flex">
                                                    <i class="icon-18"></i>
                                                    <div class="search-bar-group">
                                                        <label>Destination</label>
                                                        <div class="nice-select" tabindex="0">
                                                            <span class="current">Spiti</span>
                                                            <ul class="list">
                                                                <li data-value class="option selected">Spiti
                                                                </li>
                                                                <li data-value="hanoi" class="option">Leh
                                                                </li>
                                                                <li data-value="tolyo" class="option">Bike Trips
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <fieldset class="form-group filter-type flex">
                                                    <i class="icon-hiking-1-1 "></i>
                                                    <div class="search-bar-group">
                                                        <label>Type</label>
                                                        <div class="nice-select" tabindex="0">
                                                            <span class="current">Booking Type</span>
                                                            <ul class="list">
                                                                <li data-value class="option selected">Booking Type</li>
                                                                <li data-value="booking" class="option">Booking Type
                                                                </li>
                                                                <li data-value="booking" class="option">Booking Type
                                                                </li>
                                                                <li data-value="booking" class="option">Booking Type
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <fieldset class="form-group filter-duration flex">
                                                    <i class=" icon-time-left "></i>
                                                    <div class="search-bar-group">
                                                        <label>Duration</label>
                                                        <div class="nice-select" tabindex="0">
                                                            <span class="current">2-4 days tour</span>
                                                            <ul class="list">
                                                                <li data-value class="option selected">2-4 days tour
                                                                </li>
                                                                <li data-value="booking" class="option">3-6 days tour
                                                                </li>
                                                                <li data-value="booking" class="option">4-8 days tour
                                                                </li>
                                                                <li data-value="booking" class="option">5-10 days tour
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <fieldset class="form-group filter-riders flex">
                                                    <i class="icon-user"></i>
                                                    <div class="search-bar-group">
                                                        <label>Riders</label>
                                                         <div class="nice-select" tabindex="0">
                                                            <span class="current">2-4 days tour</span>
                                                            <ul class="list">
                                                                <li data-value class="option selected">2-4 days tour
                                                                </li>
                                                                <li data-value="booking" class="option">3-6 days tour
                                                                </li>
                                                                <li data-value="booking" class="option">4-8 days tour
                                                                </li>
                                                                <li data-value="booking" class="option">5-10 days tour
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <div class="form-group flex-two">
                                                    <!-- <div class="icon-icon-filter">
                                                        <i class="icon-14"></i>
                                                    </div> -->
                                                    <button type="button" class="btn-search" id="searchBtn"><i
                                                            class="icon-Vector5"></i>Search</button>
                                                </div>
                                            </div>
                                            <!-- <div class="wd-search-form">
                                                <div class="input-group-grid">
                                                    <fieldset class="group-select relative ">
                                                        <label>Filter By Price</label>
                                                        <div class="widget widget-price ">
                                                            <div id="slider-range"></div>
                                                            <div class="slider-labels">
                                                                <div>
                                                                    <input type="hidden" name="min-value" value="">
                                                                    <input type="hidden" name="max-value" value="">
                                                                </div>
                                                                <div class="caption flex-three">
                                                                    <p class="price-range">Price: </p>
                                                                    <div class="number-range">
                                                                        <span id="slider-range-value1"></span>
                                                                        <span id="slider-range-value2"></span>
                                                                    </div>
                                                                </div>
    
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                    <fieldset class="group-select relative input-npd ">
                                                        <div class="search-bar-group relative">
                                                            <label>0</label>
                                                            <div class="nice-select" tabindex="0">
                                                                <span class="current">English</span>
                                                                <ul class="list">
                                                                    <li data-value="" class="option selected focus">Language</li>
                                                                    <li data-value="language1" class="option">Japan</li>
                                                                    <li data-value="language2" class="option">Vietnames</li>
                                                                    <li data-value="language3" class="option">Korea</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                    <fieldset class="group-select relative input-npd ">
                                                        <div class="search-bar-group relative">
                                                            <label>Any</label>
                                                            <div class="nice-select" tabindex="0">
                                                                <span class="current">Month</span>
                                                                <ul class="list">
                                                                    <li data-value="" class="option selected focus">Month</li>
                                                                    <li data-value="month1" class="option">1 Month</li>
                                                                    <li data-value="month2" class="option">2 Month</li>
                                                                    <li data-value="month3" class="option">3 Month</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                    <fieldset class="group-select relative input-npd">
                                                        <div class="search-bar-group relative">
                                                            <label>Any</label>
                                                            <div class="nice-select" tabindex="0">
                                                                <span class="current">Duration</span>
                                                                <ul class="list">
                                                                    <li data-value="" class="option selected focus">Duration</li>
                                                                    <li data-value="duration1" class="option">10-15 day</li>
                                                                    <li data-value="duration2" class="option">15-30 day</li>
                                                                    <li data-value="duration3" class="option">20-30 day</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                    <div class="group-check-box-wrap">
                                                        <div class="checkbox">
                                                            <input id="check4" type="checkbox" name="check" value="check">
                                                            <label for="check4">Accepts Credit Cards</label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <input id="check5" type="checkbox" name="check" value="check">
                                                            <label for="check5">Car Parking</label>
                                                        </div>
                                                    </div>
                                                    <div class="group-check-box-wrap">
                                                        <div class="checkbox">
                                                            <input id="check6" type="checkbox" name="check" value="check">
                                                            <label for="check6">Free Coupons</label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <input id="check7" type="checkbox" name="check" value="check">
                                                            <label for="check7">Laundry Service</label>
                                                        </div>
                                                    </div>
                                                    <div class="group-check-box-wrap">
                                                        <div class="checkbox">
                                                            <input id="check8" type="checkbox" name="check" value="check">
                                                            <label for="check8">Outdoor Seating</label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <input id="check9" type="checkbox" name="check" value="check">
                                                            <label for="check9">Reservations</label>
                                                        </div>
                                                    </div>
                                                    <div class="group-check-box-wrap">
                                                        <div class="checkbox">
                                                            <input id="check10" type="checkbox" name="check" value="check">
                                                            <label for="check10">Restaurant</label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <input id="check11" type="checkbox" name="check" value="check">
                                                            <label for="check11">Smoking Allowed</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>

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

                                     {!! ToastMagic::scripts() !!}


    <!-- JavaScript  for search in hero section --> 
            <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            // Show popup after page loads
                            const popup = document.getElementById('popupForm');
                            popup.style.display = 'flex';

                            // Close popup when clicking 'x'
                            document.getElementById('closePopup').addEventListener('click', function() {
                                popup.style.display = 'none';
                            });

                            // Optional: Close popup when clicking outside the content
                            window.addEventListener('click', function(e) {
                                if (e.target === popup) {
                                    popup.style.display = 'none';
                                }
                            });

                         
                        });
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
                            if (current) current.innerHTML = "";

                            // Refresh Nice Select
                            setTimeout(() => {
                                $('.nice-select').niceSelect('update');
                            }, 50);
                        }
                        loadFilters();
                        function loadFilters() {
                            fetch(`/api/packages/main-filters`)
                                .then(res => res.json())
                                .then(data => {

                                    populateSelect(".filter-destination", data.destinations);
                                    populateSelect(".filter-duration", data.durations);
                                    populateSelect(".filter-riders", data.riders);
                                    populateSelect(".filter-type", data.types);
                                

                                    // price slider
                                    initPriceSlider(data.price_range.min, data.price_range.max);
                                    setTimeout(() => {
                                        initFilterEvents();
                                    }, 300);
                                });
                        }

                        // Example IDs: #destination, #riders, #duration, #price

                        document.querySelector('#searchBtn').addEventListener('click', () => {

                            // Read selected values from .current span
                            const dest   = document.querySelector('.filter-destination .nice-select .current')?.textContent.trim();
                            const type   = document.querySelector('.filter-type .nice-select .current')?.textContent.trim();
                            const dur    = document.querySelector('.filter-duration .nice-select .current')?.textContent.trim();
                            const riders = document.querySelector('.filter-riders .nice-select .current')?.textContent.trim();
                            const params = new URLSearchParams();
                            if (dest)   params.set("destination", dest);
                            if (type)   params.set("type", type);
                            if (dur)    params.set("duration", dur);
                            if (riders) params.set("riders", riders);

                            window.location.href = `/all-packages?${params.toString()}`;
                        });


            </script>