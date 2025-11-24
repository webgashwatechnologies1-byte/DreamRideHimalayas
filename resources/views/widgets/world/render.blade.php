<link rel="stylesheet" href="/app/css/app.css">
<link rel="stylesheet" href="/app/css/map.min.css">
<link rel="stylesheet" href="/app/css/jquery.fancybox.min.css">

<section class="widget-service-h5 relative pd-main">
    <div class="tf-container">

        <!-- Heading -->
          <div class="col-lg-12">
                <div class="mb-30 center">
                    <span class="sub-title-heading text-main fs-28-46">
                        {{ $content['subtitle'] ?? '' }}
                    </span>
                    <h2 class="title-heading">{{ $content['title'] ?? '' }}</h2>
                </div>
            </div>
        <!-- Cards -->
        <div class="row">

            @foreach($content['cards'] ?? [] as $card)
            <div class="col-sm-6 col-lg-3">
                <div class="tf-icon-box icon-box-style1 relative">

                    <!-- ICON: replaced SVG with dynamic <i> -->
                    <div class="icon">
                        <i class="{{ $card['icon'] ?? '' }}"></i>
                    </div>

                    <div class="content">
                        <h4 class="title-icon">
                            <a href="{{ $card['btnurl'] ?? '#' }}">
                                {{ $card['title'] ?? '' }}
                            </a>
                        </h4>

                        <p class="des-icon">
                            {{ $card['subtitle'] ?? '' }}
                        </p>

                        <a href="{{ $card['btnurl'] ?? '#' }}" class="icons-link">
                            {{ $card['btntitle'] ?? 'Learn More' }}
                            <i class="icon-Path-77287-1"></i>
                        </a>
                    </div>

                </div>
            </div>
            @endforeach

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
