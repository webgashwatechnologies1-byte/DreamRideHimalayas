@php $wid = "widget-" . $section->id; @endphp
<div id="{{ $wid }}">
<link rel="stylesheet" href="/app/css/app.css">
<link rel="stylesheet" href="/app/css/map.min.css">
<link rel="stylesheet" href="/app/css/jquery.fancybox.min.css">

<section class="about-us-h4">
    <div class="tf-container">
        <div class="row">

            <!-- LEFT IMAGES -->
            <div class="col-md-6">
                <div class="image-about-h4-wrap relative">

                    <div class="image-about-item relative about-wrap-left">
                        <img style="height:350px;" src="/{{ $content['imageback'] ?? 'assets/placeholder.jpg' }}">
                        <span class="quote">{{ $content['sidebar'] ?? '' }}</span>
                    </div>

                    <div class="image-about-item relative about-wrap-right">
                        <img src="/{{ $content['imagefront'] ?? 'assets/placeholder.jpg' }}">
                    </div>

                    <div class="box-year center">
                        <span class="number">{{ $content['head'] ?? '' }}</span>
                        <p>{{ $content['body'] ?? '' }}</p>
                    </div>

                </div>
            </div>

            <!-- RIGHT CONTENT -->
            <div class="col-md-6 inner-content-about">

                <div class="mb-30">
                    <span class="sub-title-heading">{{ $content['subtitle'] ?? 'subtitle' }}</span>
                    <h2 class="title-heading">{{ $content['title'] ?? 'title' }}</h2>
                    <p class="des">{{ $content['description'] ?? 'description' }}</p>
                </div>

                <!-- CARDS -->
                <div class="row">
                    @foreach($content['cards'] ?? [] as $card)
                        <div class="col-md-6 mb-3">
                            <div class="icon-box-style6">
                                <div class="icon">
                                    <i class="{{ $card['icon'] }}"></i>
                                </div>
                                <div class="content">
                                    <h6 class="title-icon">{{ $card['title'] ?? "Empty Title" }}</h6>
                                    <p class="des-icon">{{ $card['description'] ?? "Empty Description" }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Button -->
                <div class="flex-three btn-wrap-about">
                    <a href="{{ $content['btnurl'] ?? '#' }}" class="btn-main">
                        <p class="btn-main-text">{{ $content['btn'] ?? 'Explore' }}</p>
                        <p class="iconer"><i class="icon-arrow-right"></i></p>
                    </a>
                </div>

            </div>

        </div>
    </div>
</section>
</div>
<script>
(function(wrapId){
    const root = document.getElementById(wrapId);
    if (!root) return;

    // You can add widget-specific JS here if required.
    // It's fully isolated.

    console.log("Loaded About Widget:", wrapId);

})("{{ $wid }}");
</script>
