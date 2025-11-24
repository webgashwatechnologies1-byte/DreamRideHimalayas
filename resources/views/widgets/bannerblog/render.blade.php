@php
    $img = $content['image'] ?? '/placeholder.jpg';
    $title = $content['title'] ?? '';
    $subtitle = $content['subtitle'] ?? '';
    $btn = $content['button']['btntext'] ?? 'Click Here';
    $btnurl = $content['button']['btnurl'] ?? '#';
    $wid = "widget-" . $section->id; 

@endphp

<section class="mb-93 mt-20">
    <div class="tf-container">
        <div class="callt-to-action flex-two">
            <div class="callt-to-action-content flex-three">
                <div class="image">
                    <img src="/storage/{{ $img }}" alt="Image">
                </div>

                <div class="content">
                    <h2 class="title-call">{{ $title }}</h2>
                    <p class="des">{{ $subtitle }}</p>
                </div>
            </div>

            <img src="/assets/images/page/vector4.png" alt="" class="shape-ab">

            <div class="callt-to-action-button">
                <a href="{{ $btnurl }}" class="get-call">{{ $btn }}</a>
            </div>
        </div>
    </div>
</section>
