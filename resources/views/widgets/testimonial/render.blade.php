<style>
    .admin-preview .wow {
        visibility: visible !important;
        animation: none !important;
    }
</style>
<div class="admin-preview">

<section class="widget-testimonial-style01">
    <div class="tf-container">
        <div class="row">

            <!-- Left Images -->
            <div class="col-md-5 relative">

                @if(!empty($content['image1']))
                <div class="image-box-tesimonial box-testimonial1 wow fadeInLeft animated" data-wow-delay="0.1s">
                    <img src="/{{ $content['image1'] }}" alt="">
                </div>
                @endif

                @if(!empty($content['image2']))
                <div class="image-box-tesimonial box-testimonial2 wow fadeInUp animated" data-wow-delay="0.3s">
                    <img src="/{{ $content['image2'] }}" alt="">
                </div>
                @endif

            </div>

            <!-- Right Slider -->
            <div class="col-md-7">
                <div class="widget-testimonial overflow-hidden">

                    <!-- Text Slider -->
                    <div class="swiper mySwiper2">
                        <div class="swiper-wrapper">

                            @foreach($content['reviews'] ?? [] as $r)
                            <div class="swiper-slide">
                                <div class="testimonial-content relative">

                                    <div class="profile mb-15">
                                        <h3 class="name">{{ $r['name'] ?? '' }}</h3>
                                    </div>

                                    <p class="tes">{{ $r['description'] ?? '' }}</p>

                                    <span class="line"></span>

                                    <div class="icon-tes flex-five">
                                        <i class="icon-Group-1000002944"></i>
                                    </div>

                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>

                    <!-- Avatar Slider -->
                    <div class="swiper testimonial-image">
                        <div class="swiper-wrapper">

                            @foreach($content['reviews'] ?? [] as $r)
                            <div class="swiper-slide avata">
                                <img src="/{{ $r['image'] ?? '' }}" alt="Image Testimonial">
                            </div>
                            @endforeach

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

</div>