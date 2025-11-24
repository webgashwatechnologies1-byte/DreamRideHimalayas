<section class="counter-to relative">
    <div class="mask-left"></div>
    <div class="mask-right"></div>

    <div class="tf-container">
        <div class="row justify-content-center">

            @foreach($content['cards'] ?? [] as $card)
            <div class="col-sm-6 col-lg-3 mb-4">
                <div class="tf-counter center">

                    <div class="icon mb-25">
                        <img src="/{{ $card['image'] }}" 
                             style="height:60px; width:auto; object-fit:contain;" />
                    </div>

                

                <div class="number-counter" data-to="{{ $card['title'] }}" data-speed="2000">
                        {{ $card['title'] }}
                    </div>

                    <span class="line"></span>

                    <p class="title-counter text-white">
                        {!! nl2br(e($card['subtitle'] ?? '')) !!}
                    </p>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
</div>
