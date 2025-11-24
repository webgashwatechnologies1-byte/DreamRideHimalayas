<style>
    .admin-preview .wow {
        visibility: visible !important;
        animation: none !important;
    }

</style>
<div>
<section class="instagram-post pd-main ">
    <div class="tf-container">
        <div class="row relative z-index3">
            <div class="col-lg-12">
                <div class="center mb-40">
                    <span class="sub-title-heading text-second fs-28-46 font-yes">
                        {{ $content['subtitle'] ?? 'no subtitle' }}
                    </span>

                    <h2 class="title-heading">
                        {{ $content['title'] ?? 'no title' }}
                    </h2>
                </div>
            </div>
        </div>

        <div class="row relative z-index3">
            <div class="col-lg-12">
                <div class="instagram-post-grid">

                    @foreach($content['cards'] ?? [] as $card)
                        <a href="#" class="tf-instagram relative overflow-hidden">

                            @if(!empty($card['image']))
                                <img src="/{{ $card['image'] }}" alt="Instagram Image">
                            @endif

                            @if(!empty($card['icon']))
                                <div class="mask-absolute">
                                    <i class="{{ $card['icon'] }}"></i>
                                </div>
                            @endif

                            <div class="mask-bg">
                                <svg width="100%" height="100%" viewBox="0 0 280 202">
                                    <path d="...same path SVG…" fill="#05130B" fill-opacity="0.82"/>
                                </svg>
                            </div>

                        </a>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>

</div> 
