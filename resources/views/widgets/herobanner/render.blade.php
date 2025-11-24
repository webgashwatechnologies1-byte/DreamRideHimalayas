@php $wid = "widget-" . $section->id; @endphp

<section class="relative overflow-hidden">
    <div class="slider-home2-image">
        <div class="row">
            <div class="col-lg-12">
                <div class="slider-home2">
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            
                            @foreach($content['images'] ?? [] as $img)
                                <div class="swiper-slide">
                                    <img src="/{{ $img['url'] }}"
                                         class="image-slider-home2 relative" alt="Hero Image">
                                </div>
                            @endforeach

                        </div>

                        <div class="swiper-button-next next-slider2"></div>
                        <div class="swiper-button-prev prev-slider2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="slider-home2-content">
        <div class="tf-container">
            <div class="row">
                <div class="col-lg-12 center relative z-index3">

                    <span class="sub-title text-main fs-28-46">
                        {{ $content['subtitle'] ?? '' }}
                    </span>

                    <h1 class="banner-text title-slide text-white mb-45">
                        {{ $content['title1'] ?? '' }}

                        <span class="animationtext clip text-main font-yes text-main">
                            <span class="cd-words-wrapper">

                                @foreach($content['titles'] ?? [] as $i => $t)
                                    <span class="item-text {{ $i == 0 ? 'is-visible' : 'is-hidden' }}">
                                        {{ $t }}
                                    </span>
                                @endforeach

                            </span>
                        </span>

                        <br>{{ $content['title2'] ?? '' }}
                    </h1>

                    @include('widgets.herobanner.searchform') 

                    <div class="tour-list wow fadeInUp animated">
                        <ul class="flex-five">
                            @foreach(($content['checks'] ?? []) as $c)
                                <li>
                                    <i class="{{ $c['icon'] }}"></i>
                                    <span>{{ $c['text'] }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
