<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>
    <meta charset="utf-8">
    <title>Dream Ride - Travel & Tour Booking HTML Template</title>

    <meta name="author" content="themesflat.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="/app/css/app.css">
    <link rel="stylesheet" href="/app/css/jquery.fancybox.min.css">

    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="/assets/images/dreamridelogo.webp">
    <link rel="apple-touch-icon-precomposed" href="/assets/images/dreamridelogo.webp">

</head>

<body class="body header-fixed ">

    <div class="preload preload-container">
        <svg class="pl" width="240" height="240" viewBox="0 0 240 240">
            <circle class="pl__ring pl__ring--a" cx="120" cy="120" r="105" fill="none" stroke="#000" stroke-width="20" stroke-dasharray="0 660" stroke-dashoffset="-330" stroke-linecap="round"></circle>
            <circle class="pl__ring pl__ring--b" cx="120" cy="120" r="35" fill="none" stroke="#000" stroke-width="20" stroke-dasharray="0 220" stroke-dashoffset="-110" stroke-linecap="round"></circle>
            <circle class="pl__ring pl__ring--c" cx="85" cy="120" r="70" fill="none" stroke="#000" stroke-width="20" stroke-dasharray="0 440" stroke-linecap="round"></circle>
            <circle class="pl__ring pl__ring--d" cx="155" cy="120" r="70" fill="none" stroke="#000" stroke-width="20" stroke-dasharray="0 440" stroke-linecap="round"></circle>
        </svg>
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
                                <h1 class="title">Blog Page</h1>
                                <ul class="breadcumb-list flex-five">
                                    <li><a href="index.html">Home</a></li>
                                    <li><span>Blog Page</span></li>
                                </ul>
                                <img class="bcrumb-ab" src="/assets/images/page/mask-bcrumb.png" alt="">
                            </div>
                        </div>

                    </div>
                </section>

                <section class="our-blog pd-main">
                    <div class="tf-container">
                        <div class="row">
                            <div class="col-lg-8 col-12">
                                <div id="blog-list"></div>

                        <!-- Pagination -->
                        <ul class="tf-pagination flex-five mt-20" id="pagination"></ul>


                            
                            </div>
                            <div class="col-lg-4 col-12">
                               <div class="side-bar-right">
                                        <!-- RANDOM AUTHOR -->
                                        <div class="sidebar-widget" id="random-author"></div>

                                        <!-- SEARCH -->
                                        <div class="sidebar-widget">
                                            <h4 class="block-heading">Search here</h4>
                                            <form id="search-bar-widget" onsubmit="return false;">
                                                <input type="text" id="search-input" placeholder="Search here..." />
                                                <button type="button" id="search-btn"><i class="icon-search-2"></i></button>
                                            </form>
                                        </div>

                                        <!-- RECENT POSTS -->
                                        <div class="sidebar-widget">
                                            <h4 class="block-heading">Recent</h4>
                                            <div class="recent-post-list" id="recent-posts"></div>
                                        </div>

                                        <!-- RANDOM TAGS -->
                                        <div class="sidebar-widget">
                                            <h4 class="block-heading">Tags</h4>
                                            <ul class="tag" id="random-tags"></ul>
                                        </div>

                                    </div>

                            </div>
                        </div>
                    </div>
                </section>

                <section class="mb--93">
                    <div class="tf-container">
                        <div class="callt-to-action flex-two">
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

    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight">
        <div class="offcanvas-header">
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="logo-canvas">
                <img src="/assets/images/logo.png" alt="image">
            </div>
            <p class="des">The world’s first and largest digital market
                for crypto collectibles and non-fungible
            </p>
            <ul class="canvas-info">
                <li class="flex-three">
                    <i class="icon-noun-mail-5780740-1"></i>
                    <p>Info@webmail.com</p>
                </li>
                <li class="flex-three">
                    <i class="icon-Group-9"></i>
                    <p>684 555-0102 490</p>
                </li>
                <li class="flex-three">
                    <i class="icon-Layer-19"></i>
                    <p>6391 Elgin St. Celina, NYC 10299</p>
                </li>
            </ul>
            <ul class="social flex-three">
                <li>
                    <a href="#">
                        <i class="icon-icon-2"></i>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="icon-x"></i>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="icon-8"></i>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="icon-6"></i>
                    </a>
                </li>
            </ul>

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
    <script src="/app/js/shortcodes.js"></script>
    <script src="/app/js/main.js"></script>
<script>
let currentPage = 1;
let searchText = "";
let selectedTag = "";

// FETCH BLOGS
function fetchBlogs(page = 1) {
    currentPage = page;

    let url = `/api/blogs?page=${page}`;

    if (searchText) url += `&search=${searchText}`;
    if (selectedTag) url += `&tag=${selectedTag}`;

    fetch(url)
        .then(res => res.json())
        .then(res => renderBlogs(res));
}

fetchBlogs();

// RENDER BLOG LIST
function renderBlogs(res) {
    const list = document.getElementById("blog-list");
    list.innerHTML = "";

    if (!res.data.length) {
        list.innerHTML = `<h3>No blogs found</h3>`;
        return;
    }

    res.data.forEach(blog => {
        list.innerHTML += `
            <article class="side-blog mb-56px">
                <div class="blog-image">
                    <a class="post-thumbnail" href="/pages/blog-details/${blog.id}">
                        <img src="/${blog.thumbnail}" alt="${blog.title}">
                    </a>
                </div>
                <div class="blog-content">
                    <div class="top-detail-info">
                        <ul class="flex-three">
                            <li><i class="icon-user"></i>${blog.author.name}</li>
                            <li><i class="icon-24"></i>${blog.reading_time}</li>
                        </ul>
                    </div>
                    <h3 class="entry-title">
                        <a href="/pages/blog-details/${blog.id}">${blog.title}</a>
                    </h3>
                    <p class="description">${blog.content.replace(/(<([^>]+)>)/gi, "").slice(0, 150)}...</p>
                    <div class="button-main">
                        <a href="/pages/blog-details/${blog.id}" class="button-link">Read More<i class="icon-Arrow-11"></i></a>
                    </div>
                </div>
            </article>
        `;
    });

    renderPagination(res);
    renderRandomAuthor(res.data);
    renderRecent(res.data);
    renderRandomTags(res.data);
}

// PAGINATION
function renderPagination(res) {
    const pag = document.getElementById("pagination");
    pag.innerHTML = "";

    if (res.prev_page_url) {
        pag.innerHTML += `<li><a onclick="fetchBlogs(${currentPage - 1})" class="pages-link">&laquo;</a></li>`;
    }

    for (let i = 1; i <= res.last_page; i++) {
        pag.innerHTML += `
            <li class="${i === res.current_page ? 'active' : ''}">
                <a onclick="fetchBlogs(${i})" class="pages-link">${i}</a>
            </li>
        `;
    }

    if (res.next_page_url) {
        pag.innerHTML += `<li><a onclick="fetchBlogs(${currentPage + 1})" class="pages-link">&raquo;</a></li>`;
    }
}

// RANDOM AUTHOR
function renderRandomAuthor(blogs) {
    const author = blogs[Math.floor(Math.random() * blogs.length)].author;

    document.getElementById("random-author").innerHTML = `
        <div class="profile-widget center">
            <img src="/${author.image}" class="avata">
            <div class="name">${author.name}</div>
            <span class="job">${author.passion}</span>
            <p class="des">${author.description}</p>
        </div>
    `;
}

// RECENT POSTS
function renderRecent(blogs) {
    const recent = document.getElementById("recent-posts");
    recent.innerHTML = "";

    blogs.slice(0, 3).forEach(blog => {
        recent.innerHTML += `
            <div class="list-recent flex-three">
                <a href="/pages/blog-details/${blog.id}" class="recent-image">
                    <img src="/${blog.thumbnail}">
                </a>
                <div class="recent-info">
                    <h4 class="title"><a href="/pages/blog-details/${blog.id}">${blog.title}</a></h4>
                </div>
            </div>
        `;
    });
}

// RANDOM TAGS
function renderRandomTags(blogs) {
    const tagBox = document.getElementById("random-tags");
    tagBox.innerHTML = "";

    let allTags = [];

    blogs.forEach(b => allTags = allTags.concat(b.tags));

    let unique = [...new Set(allTags)];
    unique.sort(() => 0.5 - Math.random());
    unique = unique.slice(0, 10);

    unique.forEach(tag => {
        tagBox.innerHTML += `
            <li><a href="#" onclick="filterTag('${tag}')">${tag}</a></li>
        `;
    });
}

// TAG FILTER
function filterTag(tag) {
    selectedTag = tag;
    searchText = "";
    document.getElementById("search-input").value = "";
    fetchBlogs(1);
}

// SEARCH
document.getElementById("search-btn").addEventListener("click", () => {
    searchText = document.getElementById("search-input").value.trim();
    selectedTag = "";
    fetchBlogs(1);
});
</script>

</body>

</html>
