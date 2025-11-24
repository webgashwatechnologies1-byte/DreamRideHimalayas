@php
use App\Models\Packages;

$ids = $content['packages'] ?? [];

$ids = collect($content['packages'] ?? [])
        ->map(fn($p) => is_array($p) ? ($p['id'] ?? null) : $p)
        ->filter()
        ->values()
        ->toArray();

$packages = Packages::whereIn('id', $ids)->get();

@endphp

<link rel="stylesheet" href="/app/css/app.css">
    <link rel="stylesheet" href="/app/css/map.min.css">
    <link rel="stylesheet" href="/app/css/jquery.fancybox.min.css">
<section class="top-this-week-about-us">
    <div class="tf-container">
        <div class="row">

            <div class="col-lg-12">
                <div class="mb-30 center">
                    <span class="sub-title-heading text-main fs-28-46">
                        {{ $content['subtitle'] ?? '' }}
                    </span>
                    <h2 class="title-heading">{{ $content['title'] ?? '' }}</h2>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="swiper populer-activities overflow-hidden">
                    <div class="swiper-wrapper">

                        @foreach($packages as $pkg)
                        @php
                            $info = $pkg->information;
                            $img = $info['images'][0]['url'] ?? '/placeholder.jpg';
                            $location = $info['whattoexpect']['startingpoint'] ?? 'Unknown';
                        @endphp

                        <div class="swiper-slide">
                            <div class="tour-listing box-sd">

                                <a href="/package/{{ $pkg->id }}" class="tour-listing-image">
                                    <img src="/{{ $img }}" alt="{{ $info['title'] ?? '' }}">
                                </a>

                                <div class="tour-listing-content">
                                    <span class="map">
                                        <i class="icon-Vector4"></i> {{ $location }}
                                    </span>

                                    <h3 class="title-tour-list">
                                        <a href="/package/{{ $pkg->id }}">
                                            {{ $info['title'] ?? '' }}
                                        </a>
                                    </h3>

                                    <div class="review">
                                        @for($i=0; $i<5; $i++)
                                            <i class="icon-Star"></i>
                                        @endfor
                                        <span>({{ count($pkg->reviews ?? []) }} Reviews)</span>
                                    </div>

                                    <div class="icon-box flex-three">
                                        <div class="icons flex-three">
                                            <i class="icon-time-left"></i>
                                            <span>{{ $pkg->days }} days</span>
                                        </div>
                                        <div class="icons flex-three">
                                            <span>{{ $pkg->nights }} nights</span>
                                        </div>
                                    </div>

                                    <div class="flex-two">
                                        <div class="price-box flex-three">
                                            <p>
                                                From <span class="price-sale">
                                                    {{ $pkg->pricing ? '₹'.$pkg->pricing : 'Price On Request' }}
                                                </span>
                                            </p>
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
</section>

   <script src="/app/js/jquery.min.js"></script>
    <script src="/app/js/jquery.nice-select.min.js"></script>
    <script src="/app/js/bootstrap.min.js"></script>
    <script src="/app/js/jquery.magnific-popup.min.js"></script>
    <script src="/app/js/countto.js"></script>
    <script src="/app/js/swiper-bundle.min.js"></script>
    <script src="/app/js/swiper.js"></script>
    <script src="/app/js/plugin.js"></script>
    <script src="/app/js/jquery.fancybox.js"></script>
    <script src="/app/js/map.min.js"></script>
    <script src="/app/js/map.js"></script>
    <script src="/app/js/shortcodes.js"></script>
    <script src="/app/js/main.js"></script>