<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>
    <meta charset="utf-8">
    <title>Dream Ride - Travel & Tour Booking HTML Template</title>

    <meta name="author" content="themesflat.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="/app/css/app.css">
    <link rel="stylesheet" href="/app/css/map.min.css">
    <link rel="stylesheet" href="/app/css/jquery.fancybox.min.css">

    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="/assets/images/dreamridelogo.webp">
    <link rel="apple-touch-icon-precomposed" href="/assets/images/dreamridelogo.webp">

</head>

<body class="body header-fixed ">

    <div class="preload preload-container">
                  @include("components.loader")
    </div>

    <!-- /preload -->

    <div id="wrapper">
        <div id="pagee" class="clearfix">

            <!-- Main Header -->
            @include("cms.layout.header")
            <!-- End Main Header -->
            <main id="main">

                <section class="breadcumb-section">
                    <div class="tf-container">
                        <div class="row">
                            <div class="col-lg-12 center z-index1">
                                <h1 class="title">Gallery</h1>
                                <ul class="breadcumb-list flex-five">
                                    <li><a href="index.html">Home</a></li>
                                    <li><span>Gallery</span></li>
                                </ul>
                                <img class="bcrumb-ab" src="/assets/images/page/mask-bcrumb.png" alt="">
                            </div>
                        </div>

                    </div>
                </section>

                <section class="gallery-page pd-main">
                    <div class="tf-container">
                        <div class="row">
                            <div class="col-lg-12">
                               <div class="grid-gallery" id="galleryGrid"></div>
                                <div id="paginationButtons" class="flex-center mt-40"></div>


                            </div>
                        </div>

                    </div>
                </section>

              


                <section class="mb--93 bg-1">
                    <div class="tf-container">
                        <div class="callt-to-action flex-two z-index3 relative">
                            <div class="callt-to-action-content flex-three">
                                <div class="image">
                                    <img src="/assets/images/page/ready.png" alt="Image">
                                </div>
                                <div class="content">
                                    <h2 class="title-call">Ready to adventure and enjoy natural</h2>
                                    <p class="des">Lorem ipsum dolor sit amet, consectetur notted adipisicin</p>
                                </div>
                            </div>
                            <img src="/assets/images/page/vector4.png" alt="" class="shape-ab">
                            <div class="callt-to-action-button">
                                <a href="#" class="get-call">Let,s get started</a>
                            </div>
                        </div>
                    </div>

                </section>

            </main>

            @include("cms.layout.footer")
            

            <!-- Bottom -->
        </div>
        <!-- /#page -->
    </div>

    <!-- Modal Popup Bid -->

    <a id="scroll-top" class="button-go"></a>

    <!-- Modal search-->
    <div class="modal search-mobie fade" id="exampleModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body">
                    <form action="/" class="search-form-mobie">
                        <div class="search">
                            <i class="icon-circle2017"></i>
                            <input type="search" placeholder="Search Travel" class="search-input" autocomplete="off">
                            <button type="button">Search</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    

    <!-- Javascript -->
    <script src="/app/js/jquery.min.js"></script>
    <script src="/app/js/jquery.nice-select.min.js"></script>
    <script src="/app/js/bootstrap.min.js"></script>
    <script src="/app/js/swiper-bundle.min.js"></script>
    <script src="/app/js/swiper.js"></script>
    <script src="/app/js/plugin.js"></script>
    <script src="/app/js/jquery.fancybox.js"></script>
    <script src="/app/js/map.min.js"></script>
    <script src="/app/js/map.js"></script>
    <script src="/app/js/shortcodes.js"></script>
    <script src="/app/js/main.js"></script>
<script>

let currentPage = 1;
    const APP_URL = "{{ config('app.url') }}";

// Load Images
async function loadGallery(page = 1) {
    const res = await fetch(`${APP_URL}/api/gallery?page=${page}`);
    const data = await res.json();

    if (data.status) {
        renderGallery(data.data);
        renderPagination(data.page, data.totalPages);
    }
}

// Render Same Theme Structure
function renderGallery(items) {
    const container = document.getElementById("galleryGrid");
    container.innerHTML = "";

    items.forEach((img, index) => {

        // dynamic class name (item-1, item-2, ...)
        const className = `item-${(index % 6) + 1}`;
        
        container.innerHTML += `
            <div class="${className}">
                <div class="tf-gallery">
                    <img src="${APP_URL}/${img.url}" alt="">
                    <a href="${APP_URL}/${img.url}" class="btn-gallery flex-five" data-fancybox="gallery">
                        <i class="icon-Group-14"></i>
                    </a>
                    <div class="gallery-content">
                        <h4 class="gallery-title text-white mb-10">${img.title ?? ''}</h4>
                        <p class="sub-title">${img.subtitle ?? ''}</p>
                    </div>
                </div>
            </div>
        `;
    });
}

// Pagination Buttons
function renderPagination(current, total) {
    const div = document.getElementById("paginationButtons");
    div.innerHTML = "";

    if (total <= 1) return;

    let html = `<div class="flex-five gap-10">`;

    if (current > 1) {
        html += `<button class="btn btn-primary" onclick="loadGallery(${current - 1})">Prev</button>`;
    }

    html += `<span class="mx-3">Page ${current} of ${total}</span>`;

    if (current < total) {
        html += `<button class="btn btn-primary" onclick="loadGallery(${current + 1})">Next</button>`;
    }

    html += `</div>`;

    div.innerHTML = html;
}

// Start
loadGallery();
</script>

</body>

</html>
