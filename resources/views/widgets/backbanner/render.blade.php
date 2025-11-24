@php
    $path = request()->path();
    $segments = explode('/', $path);

    $breadcrumb = [];
    $wid = "widget-" . $section->id; 

    foreach ($segments as $seg) {

        if (!$seg) continue;

        // skip admin routes fully
        if ($seg === "admin") continue;

        // skip numeric segments – IDs
        if (preg_match('/\d/', $seg)) continue;

        // skip non alphabetic
        if (!preg_match('/^[a-zA-Z\-]+$/', $seg)) continue;

        // convert slug → "Title Case"
        $breadcrumb[] = ucwords(str_replace('-', ' ', $seg));
    }
@endphp

<section class="breadcumb-section" 
         style="background:url('/{{ $content['image'] ?? '' }}') center/cover no-repeat;">
    <div class="tf-container">
        <div class="row">
            <div class="col-lg-12 center z-index1">
                
                <h1 class="title">{{ $content['title'] ?? "Page Title" }}</h1>

                <ul class="breadcumb-list flex-five">

                        {{-- HOME (always) --}}
                        <li>
                            <a href="/" style="color:#f6c200; font-weight:600;">Home</a>
                        </li>

                        @foreach($breadcrumb as $index => $item)
                            <li style="display:flex; align-items:center; gap:6px;">

                                {{-- Chevron Icon --}}
                                <i class="fa fa-chevron-right" style="font-size:12px; color:#fff;"></i>

                                {{-- Last item = plain text --}}
                                @if($loop->last)
                                    <span style="color:#fff;">{{ $item }}</span>
                                @else
                                    <a href="#" style="color:#f6c200; font-weight:600;">{{ $item }}</a>
                                @endif

                            </li>
                        @endforeach

                    </ul>

                <img class="bcrumb-ab" src="/assets/images/page/mask-bcrumb.png" alt="">
            </div>
        </div>
    </div>
</section>
