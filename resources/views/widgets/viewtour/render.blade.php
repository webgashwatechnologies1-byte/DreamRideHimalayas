@php
    use App\Models\Tours;
    use App\Models\Packages;
    use Illuminate\Support\Str;

    $ids = $content['tours'] ?? [];

    // normalize to int array
    $ids = collect($ids)
        ->map(fn($id) => intval($id))
        ->filter()
        ->values()
        ->toArray();

    if (!count($ids)) {
        return; // nothing to show
    }

    // load tours in one query
    $tours = Tours::whereIn('id', $ids)->get()->keyBy('id');
@endphp
<style>
    .admin-preview .wow {
        visibility: visible !important;
        animation: none !important;
    }
</style>
<div class="admin-preview">

<section class="widget-destination">
    <div class="tf-container">

        {{-- Heading --}}
        <div class="row">
            <div class="col-lg-12">
                <div class="center m0-auto w-text-heading mb-40">
                    <span class="sub-title-heading text-main mb-15">
                        {{ $content['subtitle'] ?? '' }}
                    </span>

                    <h2 class="title-heading">
                        {{ $content['title'] ?? '' }}
                    </h2>
                </div>
            </div>
        </div>

        {{-- Tours --}}
        <div class="grid-three-destination">
            @foreach($ids as $i => $tourId)

                @php
                    $tour = $tours[$tourId] ?? null;
                    if (!$tour) continue;

                    // count packages of the tour
                    $packageCount = Packages::where('tour_id', $tour->id)->count();

                    // tour image
                    $img = $tour->image ? '/' . $tour->image : '/assets/images/default.jpg';

                    // slug URL
                    $slug = Str::slug($tour->name);
                    $url  = "/pages/tours/{$tour->id}/{$slug}";

                    $delay = "0." . ($i+1) . "s";
                @endphp
                <div class="tf-widget-destination wow fadeInUp" data-wow-delay="{{ $delay }}">
                    <a href="{{ $url }}" class="destination-imgae">
                        <span class="tour">{{ $packageCount }} packages</span>
                        <img src="{{ $img }}" alt="{{ $tour->name }}">
                    </a>

                    <div class="destination-content">
                        <span class="nation">{{ $tour->name }}</span>

                        <div class="flex-two btn-destination">
                            <h6 class="title">
                                <a href="{{ $url }}">
                                    {{ $content['button']['text'] ?? 'View All' }}
                                </a>
                            </h6>

                            <a href="{{ $url }}" class="flex-five btn-view">
                                <i class="icon-Vector-32"></i>
                            </a>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>

    </div>
</section>
</div>
    <!-- Javascript -->
    <script src="/app/js/jquery.min.js"></script>
    <script src="/app/js/jquery.nice-select.min.js"></script>
    <script src="/app/js/bootstrap.min.js"></script>
    <script src="/app/js/swiper-bundle.min.js"></script>
    <script src="/app/js/swiper.js"></script>
    <script src="/app/js/plugin.js"></script>
    <script src="/app/js/count-down.js"></script>
    <script src="/app/js/countto.js"></script>
    <script src="/app/js/jquery.fancybox.js"></script>
    <script src="/app/js/jquery.magnific-popup.min.js"></script>
    <script src="/app/js/price-ranger.js"></script>
    <script src="/app/js/textanimation.js"></script>
    <script src="/app/js/wow.min.js"></script>
    <script src="/app/js/shortcodes.js"></script>
    <script src="/app/js/main.js"></script>