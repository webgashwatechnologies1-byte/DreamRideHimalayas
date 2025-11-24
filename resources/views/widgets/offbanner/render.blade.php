@php
$left     = $content['left'] ?? [];
$rightIDs = $content['right'] ?? [];

use App\Models\Packages;

$packages = Packages::whereIn('id', $rightIDs)->get();
// $wid = "widget-" . $section->id; 

@endphp

<style>
    
 .countdown-box {
    display: flex;
    gap: 28px;
    justify-content: flex-start;
    align-items: center;
}

  .time-item {
    text-align: center;
}

/* Main Countdown Circles */
  .time-circle {
    width: 55px;
    height: 55px;
    background: #fff;
    border-radius: 50%;
    font-weight: 700;
    font-size: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #000;
    margin-bottom: 10px;
    border: 4px solid #ffc107; /* Yellow Border */
}

  .label {
    font-size: 14px;
    font-weight: 600;
    color: #444;
    letter-spacing: 1px;
}

/* RESPONSIVE */
@media (max-width: 992px) {
      .countdown-box {
        justify-content: center;
    }
     .time-circle {
        width: 60px;
        height: 60px;
        font-size: 16px;
    }
}

@media (max-width: 768px) {
     .countdown-box {
        gap: 15px;
    }
     .time-circle {
        width: 45px;
        height: 45px;
        font-size: 14px;
    }
     .label {
        font-size: 10px;
    }
}
  .admin-preview .wow {
        visibility: visible !important;
        animation: none !important;
    }
</style>

  
 
<div class="admin-preview">
        <section class="offer-package pd-main bg-1 relative">
            <img src="/assets/images/page/feature.jpg" alt="image" class="feature-ofer">

            <div class="tf-container">
                <div class="row align-center z-index3 relative">

                    <!-- ================= LEFT SIDE ================= -->
                    <div class="col-lg-5">
                        <div class="content">

                            <div class="mb-50">
                                <span class="sub-title-heading text-main mb-15">{{ $left['subtitle'] ?? '' }}</span>
                                <h2 class="title-heading mb-32">
                                    {{ $left['title'] ?? '' }}
                                </h2>
                                <p class="des-heading">{{ $left['description'] ?? '' }}</p>
                            </div>

                            <div class="inner-content flex-three">
                                <div class="offer">
                                    <span class="number">
                                        {{ $left['off']['value'] ?? '' }}
                                        <span>{{ $left['off']['text'] ?? '' }}</span>
                                    </span>
                                </div>

                                <p class="font-italic">
                                    {{ $left['off']['description'] ?? '' }}
                                </p>
                            </div>

                            <div class="count-dow-wrap flex-three mb-50">
                                <div class="title-counters">
                                    <span>{{ $left['footer']['text'] ?? '' }}</span>
                                
                                </div>

                                <div class="count-down relative">
                                        <div class="featured-countdown countdown-box flex-three"
                                            data-end="{{ $left['footer']['validTillDate'] ?? '' }}">

                                            <div class="time-item">
                                                <div class="time-circle days">00</div>
                                                <span class="label">DAYS</span>
                                            </div>

                                            <div class="time-item">
                                                <div class="time-circle hours">00</div>
                                                <span class="label">HOURS</span>
                                            </div>

                                            <div class="time-item">
                                                <div class="time-circle minutes">00</div>
                                                <span class="label">MINUTES</span>
                                            </div>

                                            <div class="time-item">
                                                <div class="time-circle seconds">00</div>
                                                <span class="label">SECONDS</span>
                                            </div>

                                        </div>
                                    </div>

                            </div>

                            <div class="btn-wap">
                                <a href="{{ $left['button']['url'] ?? '#' }}" class="btn-main">
                                    <p class="btn-main-text">{{ $left['button']['text'] ?? 'Explore' }}</p>
                                    <p class="iconer"><i class="icon-arrow-right"></i></p>
                                </a>
                            </div>

                        </div>
                    </div>

                    <!-- ================= RIGHT SIDE PACKAGES ================= -->
                    <div class="col-lg-7">
                        <div class="relative on-week-swipper-wrap">

                            <div class="swiper offer-package-swipper overflow-hidden relative">
                                <div class="swiper-wrapper">

                                    @foreach($packages as $pkg)
                                        @php
                                            $info      = $pkg->information;
                                            $img       = $info['images'][0]['url'] ?? '/placeholder.jpg';
                                            $location  = $info['whattoexpect']['startingpoint'] ?? 'Unknown';
                                        @endphp

                                        <div class="swiper-slide">
                                            <div class="tour-listing">

                                                <a href="/package/{{ $pkg->id }}" class="tour-listing-image">
                                                    <div class="badge-top flex-two">
                                                        <span class="feature">Featured</span>
                                                    </div>
                                                    <img src="/{{ $img }}" alt="{{ $info['title'] ?? '' }}">
                                                </a>

                                                <div class="tour-listing-content">
                                                    <span class="tag-listing">Bestseller</span>
                                                    <span class="map"><i class="icon-Vector4"></i>{{ $location }}</span>

                                                    <h3 class="title-tour-list">
                                                        <a href="/package/{{ $pkg->id }}">
                                                            {{ $info['title'] ?? '' }}
                                                        </a>
                                                    </h3>

                                                    <div class="review">
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                        <span>(1 Review)</span>
                                                    </div>

                                                    <div class="icon-box flex-three">
                                                        <div class="icons flex-three">
                                                            <i class="icon-time-left"></i>
                                                            <span>{{ $info['duration'] ?? '5 days' }}</span>
                                                        </div>
                                                        <div class="icons flex-three">
                                                            <span>{{ $info['maxPeople'] ?? '12' }} Person</span>
                                                        </div>
                                                    </div>

                                                    <div class="flex-two">
                                                        <div class="price-box flex-three">
                                                            <p>From <span class="price-sale">₹Price On Request</span></p>
                                                        </div>
                                                        <div class="icon-bookmark">
                                                            <i class="icon-Vector-151"></i>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>

                                    @endforeach

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section>
</div>
<script>
function widgetId(){


    const cd = document.querySelector(".featured-countdown");
    if (!cd) return;

    const endDate = cd.getAttribute("data-end");
    if (!endDate) return;

    const end = new Date(endDate).getTime();

    const daysEl = cd.querySelector(".days");
    const hoursEl = cd.querySelector(".hours");
    const minutesEl = cd.querySelector(".minutes");
    const secondsEl = cd.querySelector(".seconds");

    function update() {
        let now = Date.now();
        let diff = end - now;

        if (diff <= 0) {
            daysEl.textContent = "00";
            hoursEl.textContent = "00";
            minutesEl.textContent = "00";
            secondsEl.textContent = "00";
            return;
        }

        daysEl.textContent    = String(Math.floor(diff / 86400000)).padStart(2, "0");
        hoursEl.textContent   = String(Math.floor((diff % 86400000) / 3600000)).padStart(2, "0");
        minutesEl.textContent = String(Math.floor((diff % 3600000) / 60000)).padStart(2, "0");
        secondsEl.textContent = String(Math.floor((diff % 60000) / 1000)).padStart(2, "0");
    }

    update();
    setInterval(update, 1000);

};

widgetId();
</script>
