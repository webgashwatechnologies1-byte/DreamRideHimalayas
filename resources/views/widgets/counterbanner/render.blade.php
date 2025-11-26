@php
    $bannerImg = $content['image'] ?? null;
    $cards = $content['cards'] ?? [];
    $wid = "widget-" . $section->id; 

@endphp
<style>
#{{ $wid }} .widget-counter .tf-counter {
    position: relative;
    z-index: 99 !important;
}

#{{ $wid }} .widget-counter .row.mb--20em {
    position: relative;
    z-index: 99 !important;
}

#{{ $wid }} .widget-counter .cta-wrap {
    position: relative;
    z-index: 99 !important;
}

#{{ $wid }} .widget-counter img.counter-top,
#{{ $wid }} .widget-counter img.counter-bottom {
    z-index: 1 !important;
}

#{{ $wid }} .widget-counter {
    position: relative;
    z-index: 5;
}
 #{{ $wid }} .admin-preview .wow {
        visibility: visible !important;
        animation: none !important;
    }
</style>
<div class="admin-preview">

<section class="widget-counter relative " style="margin-bottom: 20px">
    <img src="/assets/images/page/couter-top.png" alt="image" class="counter-top">
    <img src="/assets/images/page/counter-bottom.png" alt="image" class="counter-bottom">

    <div class="tf-container">

        <div class="row mb-50">
            <div class="col-lg-9 flex-three cta-wrap">
                <div class="image fadeInLeft wow">
                    <img style="width: 100px" src="/storage/{{ $bannerImg }}" alt="Image">
                </div>

                <div class="content">
                    <h2 class="title-call text-white mb-18 fadeInUp wow">
                        {{ $content['title'] ?? '' }}
                    </h2>

                    <p class="des text-white fadeInUp wow">
                        {{ $content['description'] ?? '' }}
                    </p>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="callt-to-action-button text-end fadeInRight wow">
                    <a href="{{ $content['button']['btnurl'] ?? '#' }}" class="get-call">
                        {{ $content['button']['btntext'] ?? 'Click Here' }}
                    </a>
                </div>
            </div>
        </div>

        <div class="row mb--20em relative z-index3">
            @foreach($cards as $i => $c)
            <div class="col-6 col-lg-3 wow fadeInUp animated" data-wow-delay="0.{{ $i+1 }}s">
                <div class="tf-counter center tf-countto">

                    <div class="icon " style="margin-bottom: 150px">
                        <img src="/storage/{{ $c['image'] }}" width="90px">
                    </div>

                    <div class="number-counter" data-to="{{ $c['number'] }}" data-speed="2000">
                        {{ $c['number'] }}
                    </div>

                    <span class="line"></span>

                    <p class="title-counter">{!! nl2br(e($c['title'])) !!}</p>

                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>

</div>