@php
    use App\Models\Tours;
    use App\Models\Packages;
    use Illuminate\Support\Str;
    $wid = "widget-" . $section->id; 

    $cards = $content['cards'] ?? [];
@endphp

<section class="widget-adventure">
    <div class="tf-container">

        <div class="row">
            <div class="col-lg-12">
                <div class="mb-40 mt-20">
                    <span class="sub-title-heading text-main mb-15">{{ $content['subtitle'] ?? '' }}</span>
                    <h2 class="title-heading">{{ $content['title'] ?? '' }}</h2>
                </div>
            </div>
        </div>

        <div class="row">
        <div class="col-lg-12">
        <div class="adventure-content">

        <!-- TAB HEADERS -->
        <nav class="mb-40 adventure-scroll">
            <div class="nav nav-justified nav-tabs-adventure">

                @foreach($cards as $i => $card)
                <li class="nav-link flex-three {{ $i==0?'active':'' }}"
                    data-bs-toggle="tab"
                    data-bs-target="#adv-{{ $i }}">
                    <i class="icon-adventure-1"></i>
                    <span>{{ $card['title'] }}</span>
                </li>
                @endforeach

            </div>
        </nav>

        <!-- TAB CONTENT -->
        <div class="tab-content">

            @foreach($cards as $i => $card)
                @php
                    $tourIds = $card['tours'] ?? [];
                @endphp

                <div class="tab-pane fade {{ $i==0?'show active':'' }}"
                     id="adv-{{ $i }}">
                    <div class="row">

                        @foreach($tourIds as $tourId)

                            @php
                                $tour = Tours::find($tourId);
                                if (!$tour) continue;

                                $packageQuery = Packages::where('tour_id', $tour->id);
                                $packageCount = $packageQuery->count();
                                $minPrice = $packageQuery->min('pricing') ?? 0;

                                $img = $tour->image ? "/".$tour->image : "/assets/images/tour/hiking1.jpg";

                                $slug = Str::slug($tour->name, "-");
                                $url = "/pages/tours/{$tour->id}/{$slug}";
                            @endphp

                            <div class="col-6 col-sm-6 col-lg-3">
                                <div class="tf-adventure flex-three mb-43">

                                    <a href="{{ $url }}" class="adventure-image">
                                        <img src="{{ $img }}" alt="">
                                    </a>

                                    <div class="adventure-image">
                                        <span class="tour-ad">({{ $packageCount }} Tours)</span>
                                        <h6 class="title-ad">
                                            <a href="{{ $url }}">{{ $tour->name }}</a>
                                        </h6>

                                        <p class="price-ad text-main">₹{{ $minPrice }}</p>
                                    </div>

                                </div>
                            </div>

                        @endforeach

                    </div>
                </div>

            @endforeach

        </div>

        </div>
        </div>
        </div>

    </div>
</section>
