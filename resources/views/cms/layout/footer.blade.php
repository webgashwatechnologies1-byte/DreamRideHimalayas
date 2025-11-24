@php
    $footer = \App\Models\FooterSetting::single();
@endphp

@push('styles')
<style>
    /* your styles */
</style>
@endpush

<footer class="footer footer-style1">
    <div class="tf-container">
        <div class="footer-main">

            {{-- ABOUT --}}
            <div class="footer-logo">
                <div class="logo-footer">
                    <img src="/{{ $footer->about['logo'] }}" alt="footer logo">
                </div>

                <p class="des-footer">
                    {{ $footer->about['description'] }}
                </p>

                <ul class="footer-info">
                    @foreach($footer->about['contacts'] as $c)
                        <li class="flex-three">
                            @if($c['type'] === 'email')
                                <i class="icon-noun-mail-5780740-1"></i>
                            @elseif($c['type'] === 'phone')
                                <i class="icon-Group-9"></i>
                            @endif
                            <p>{{ $c['value'] }}</p>
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- SERVICES --}}
            <div class="footer-service">
                <h5 class="title">Services Req</h5>
                <ul class="footer-menu">
                    @foreach($footer->services as $srv)
                        <li><a href="{{ $srv['url'] }}">{{ $srv['label'] }}</a></li>
                    @endforeach
                </ul>
            </div>

            {{-- GALLERY --}}
            <div class="footer-gallery">
                <h5 class="title">Gallery</h5>
                <div class="gallery-img">
                    @foreach($footer->gallery as $img)
                        <a href="/{{ $img }}" data-fancybox="gallery">
                            <img src="/{{ $img }}" alt="image gallery">
                        </a>
                    @endforeach
                </div>
            </div>

            {{-- NEWSLETTER --}}
            <div class="footer-newsletter">
                <h5 class="title">Newsletter</h5>

                @if($footer->newsletter['show'])
                    <form action="/" id="footer-form">
                        <div class="input-wrap flex-three">
                            <input type="email" placeholder="{{ $footer->newsletter['placeholder'] }}">
                            <button type="submit"><i class="icon-paper-plane"></i></button>
                        </div>
                        <div class="check-form flex-three">
                            <i class="icon-Vector-121"></i>
                            <p>I agree to all your terms and policies</p>
                        </div>
                    </form>
                @endif

                <ul class="social-ft flex-three">
                    @foreach($footer->newsletter['social_icons'] as $s)
                        <li>
                            <a href="{{ $s['url'] }}">
                                <i class="{{ $s['icon'] }}"></i>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>

        {{-- BOTTOM --}}
        <div class="row footer-bottom">
            <div class="col-md-6">
                <p class="copy-right">{!! $footer->bottom['copyright'] !!}</p>
            </div>

            <div class="col-md-6">
                <ul class="social flex-six">
                    @foreach($footer->bottom['social_icons'] as $icon)
                        <li>
                            <a href="{{ $icon['url'] }}">
                                <i class="{{ $icon['icon'] }}"></i>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>
</footer>
