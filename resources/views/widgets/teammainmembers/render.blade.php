@php
    $reverse = $content['reverse'] ?? false;
    $yellow = "#f9b000";  // your theme yellow (change if needed)
@endphp

<section class="py-5">
    <div class="container">

        <div class="row align-items-center justify-content-center 
            {{ $reverse ? 'flex-row-reverse' : '' }}">

            <!-- IMAGE -->
            <div class="col-md-4 text-center mb-4">
                <div class="position-relative d-inline-block">

                    <img src="{{ asset('storage/' . ($content['image'] ?? 'default.png')) }}" alt=""
                         class="rounded-circle img-fluid shadow"
                         style="width:260px; height:260px; object-fit:cover; border:6px solid {{ $yellow }};">

                    <!-- SOCIAL ICONS -->
                    <ul class="list-inline mt-3 fade-icons" style="display:none;">
                        @foreach($content['links'] ?? [] as $link)
                            <li class="list-inline-item mx-2">
                                <a href="{{ $link['url'] }}"
                                   class="fs-3"
                                   style="color: {{ $yellow }};">
                                    <i class="{{ $link['iconClassName'] }}"></i>
                                </a>
                            </li>
                        @endforeach
                    </ul>

                </div>

                <!-- Hover Show Script -->
                <script>
                    document.addEventListener("DOMContentLoaded", function () {
                        const imgBox = document.querySelector('.position-relative');
                        const icons = imgBox.querySelector('.fade-icons');

                        imgBox.addEventListener("mouseenter", () => icons.style.display = "block");
                        imgBox.addEventListener("mouseleave", () => icons.style.display = "none");
                    });
                </script>
            </div>

            <!-- CONTENT -->
            <div class="col-md-8 text-center">

                <h2 class="fw-bold" style="color: {{ $yellow }};">
                    {{ $content['name'] ?? "John" }}
                </h2>

                <p class="fs-5" style="color: {{ $yellow }}; opacity: 0.85;">
                    {{ $content['position'] ?? "Founder" }}
                </p>

                <div class="mt-3" style="max-width: 650px; margin: auto;">
                    {!! $content['description'] ?? "" !!}
                </div>

            </div>

        </div>

    </div>
</section>

<style>
    /* Nice fade effect for icons */
    .fade-icons {
        opacity: 0;
        transition: opacity .3s ease-in-out;
    }
    .position-relative:hover .fade-icons {
        opacity: 1 !important;
    }
</style>
