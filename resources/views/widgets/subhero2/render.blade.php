@php
$left = $content['left'] ?? [];
$right = $content['right'] ?? [];
@endphp

<section class="about-us pb-150">
    <div class="tf-container">

        <div class="row pt-115">
            <!-- LEFT SIDE -->
            <div class="col-lg-6">
                <div class="travel-video relative">
                    @if(!empty($left['image']))
                        <img class="aboutsec" src="/{{ $left['image'] }}" alt="image">
                    @endif

                    @if(!empty($left['ytvideourl']))
                        <div class="video-wrap">
                            <a href="{{ $left['ytvideourl'] }}"
                               class="widget-icon-video widget-videos flex-five z-index3">
                                <i class="icon-Polygon-4"></i>
                            </a>
                        </div>
                    @endif

                    @if(!empty($left['text']))
                        <p class="mt-3 text-white">{{ $left['text'] }}</p>
                    @endif
                </div>
            </div>

            <!-- RIGHT SIDE -->
            <div class="col-lg-6">
                <div class="inner-content-about">

                    <span class="sub-title-heading text-main mb-15">
                        {{ $right['subtitle'] ?? '' }}
                    </span>

                    <h2 class="title-heading mb-18">
                        {!! $right['title'] ?? '' !!}
                    </h2>

                    <p class="des-heading">
                        {{ $right['description'] ?? '' }}
                    </p>

                    <!-- CARDS -->
                    <div class="row mt-27">
                        @foreach(($right['cards'] ?? []) as $card)
                            <div class="col-sm-6">
                                <div class="icon-box-style3">
                                    <div class="icon flex-three">
                                        <i class="{{ $card['icon'] }}"></i>
                                    </div>

                                    <h6 class="title mb-10">
                                        <a href="#">{{ $card['heading'] }}</a>
                                    </h6>

                                    <p class="des">{{ $card['text'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- BUTTON -->
                    @if(!empty($right['btntext']))
                        <div class="flex-three btn-wrap-about mb-30">
                            <a href="{{ $right['btnurl'] }}" class="btn-main">
                                <p class="btn-main-text">{{ $right['btntext'] }}</p>
                                <p class="iconer">
                                    <i class="icon-arrow-right"></i>
                                </p>
                            </a>
                        </div>
                    @endif

                    <!-- FOOTER TEXT -->
                    @if(!empty($right['footertext']))
                        <div class="map-check flex-three">
                            <div class="icon">
                                <i class="icon-check"></i>
                            </div>
                            <span class="text-main">{{ $right['footertext'] }}</span>
                        </div>
                    @endif

                </div>
            </div>

        </div>
    </div>
</section>
