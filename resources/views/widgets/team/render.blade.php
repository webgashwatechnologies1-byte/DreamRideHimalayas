<section class="team-member-page pd-main">
    <div class="tf-container">

        <div class="row mb-40">
            <div class="col-lg-12">
                <div class="center m0-auto w-text-heading">
                    <span class="sub-title-heading text-main font-yes fs-28-46">
                        {{ $section->content['subtitle'] ?? "Subtitle" }}
                    </span>

                    <h2 class="title-heading">
                        {{ $section->content['title']  ?? "Title" }}
                    </h2>
                </div>
            </div>
        </div>

        <div class="team-member-grid">

            @foreach($section->content['card'] ?? [] as $card)
                <div class="tf-widget-team">

                    <div class="team-image mb-15">
                        <img src="{{ asset('storage/'.$card['image']) }}" alt="">

                        <ul class="social-team">
                            @foreach($card['links'] as $link)
                                <li>
                                    <a href="{{ $link['url'] }}">
                                        <i class="{{ $link['iconClassName'] }}"></i>
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                    </div>

                    <div class="team-content center">
                        <p class="job">{{ $card['position'] }}</p>
                        <h4 class="name"><a href="#">{{ $card['name'] }}</a></h4>
                    </div>

                </div>
            @endforeach

        </div>

    </div>
</section>
