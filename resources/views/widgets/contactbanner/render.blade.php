@php
    $title    = $content['title'] ?? 'Explore the world';
    $subtitle = $content['subtitle'] ?? 'Ready to travel';
    $message  = $content['contactmessage'] ?? '';
    $yt       = $content['yturl'] ?? '#';
    $image    = !empty($content['image']) ? '/storage/'.$content['image'] : '/assets/images/travel-list/image23.jpg';
    $wid = "widget-" . $section->id; 

@endphp
<style>
    #{{ $wid }}  .admin-preview .wow {
        visibility: visible !important;
        animation: none !important;
        margin-bottom: 20px;
    }
</style>

<div class="admin-preview">

<section class="widget-banner-contact relative">
    <div class="tf-container">
        <div class="row z-index3 relative">
         <div class="col-lg-7 content-banner-contact d-flex flex-column justify-content-center">

                <div class="mb-32">
                    <span class="sub-title-heading text-main mb-15 font-yes fs-28-46 wow fadeInUp">
                        {{ $title }}
                    </span>

                    <h2 class="title-heading text-white wow fadeInUp">
                        {{ $subtitle }}
                    </h2>
                </div>

                <div class="flex-three">

                    {{-- YouTube video play button --}}
                    <div class="video-wrap wow fadeInUp">
                        <a href="{{ $yt }}"
                           class="widget-icon-video flex-five widget-videos">
                            <i class="icon-Polygon-4"></i>
                        </a>
                    </div>

                    {{-- Contact Message --}}
                    <address class="wow fadeInUp">
                        {{ $message }}
                    </address>
                </div>

                <img src="/assets/images/page/vector2.png" alt="image" class="mask-icon-banner">
            </div>

            {{-- Right Side Image --}}
            <div class="col-lg-5">
                <div class="image-banner-contact">
                    <img src="{{ $image }}" alt="Banner">
                </div>
            </div>
        </div>
    </div>
</section>

</div>