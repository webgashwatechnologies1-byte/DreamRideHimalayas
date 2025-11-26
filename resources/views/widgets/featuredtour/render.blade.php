@php
use App\Models\Packages;
use App\Models\Tours;

$title = $content['title'] ?? 'Featured Tours';
$subtitle = $content['subtitle'] ?? '';
$cards = $content['cards'] ?? [];

@endphp
<style>
    .admin-preview .wow {
        visibility: visible !important;
        animation: none !important;
    }
    .btn-main {
    background-color: #FFCC00 !important;  /* Your yellow theme */
    color: #000 !important;
    border: none !important;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 12px 24px;
    border-radius: 6px;
    text-decoration: none !important;
}

.btn-main p {
    margin: 0;
}

.btn-main:hover {
    background-color: #ffcc00 !important;  /* darker yellow */
    color: #000 !important;
}

</style>
<div class="admin-preview">

<section class="tour-package py-5">
    <div class="tf-container flex-column align-items-center justify-content-center d-flex">

        <div class=" flex-column align-items-center justify-content-center d-flex w-text-heading">
            @if($subtitle)
                <span class="sub-title-heading text-main mb-15">{{ $subtitle }}</span>
            @endif

            @if($title)
                <h2 class="title-heading center mb-40">{{ $title }}</h2>
            @endif
        </div>

        <div class="tab-tour-list">
            <ul class="nav justify-content-center tab-list mb-37" id="myTab" role="tablist">

                @foreach($cards as $i => $card)
                    @php
                        $tour = Tours::find($card['tour']);
                        if (!$tour) continue;
                    @endphp

                    <li class="nav-item" role="presentation">
                        <button class="nav-link {{ $i==0?'active':'' }}"
                                data-bs-toggle="tab"
                                data-bs-target="#tab-{{ $i }}">
                            {{ $tour->name }}
                        </button>
                    </li>
                @endforeach

            </ul>

            <div class="tab-content">

                @foreach($cards as $i => $card)
                    @php
                        $tour = Tours::find($card['tour']);
                        if (!$tour) continue;

                        $packages = Packages::whereIn('id', $card['packages'])->get();
                    @endphp

                    <div class="tab-pane fade {{ $i==0?'show active':'' }}" id="tab-{{ $i }}">
                        <div class="row">

                            @foreach($packages as $pkg)
                                @php
                                    $info = $pkg->information;
                                    $img = $info['images'][0]['url'] ?? 'placeholder.jpg';
                                    $location = $info['whattoexpect']['startingpoint'] ?? '';
                                    $duration = $info['duration'] ?? '';
                                @endphp

                                <div class="col-sm-6 col-lg-3">
                                    <div class="tour-listing wow fadeInUp">

                                        <a href="/packages/{{ $pkg->id }}" class="tour-listing-image">
                                            <img src="/{{ $img }}" alt="">
                                        </a>

                                        <div class="tour-listing-content">
                                            <span class="map">
                                                <i class="icon-Vector4"></i>
                                                {{ $location }}
                                            </span>

                                            <h3 class="title-tour-list">
                                                <a href="/packages/{{ $pkg->id }}">
                                                    {{ $info['title'] ?? '' }}
                                                </a>
                                            </h3>

                                            <div class="icon-box flex-three">
                                                <div class="icons flex-three">
                                                    <i class="icon-time-left"></i>
                                                    <span>{{ $duration }}</span>
                                                </div>
                                                <div class="icons flex-three">
                                                    <span>12 Person</span>
                                                </div>
                                            </div>

                                            <div class="flex-two">
                                                <div class="price-box flex-three">
                                                    <p>From <span class="price-sale">₹Price on Request</span></p>
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

                        <div class="row">
                            <div class="col-lg-12 center mt-44">
                                <a href="/all-packages" class="btn-main">
                                    <p class="btn-main-small">View all tour</p>
                                    <p class="iconer"><i class="icon-13"></i></p>
                                </a>
                            </div>
                        </div>

                    </div>
                @endforeach

            </div>
        </div>

    </div>
</section>

</div>