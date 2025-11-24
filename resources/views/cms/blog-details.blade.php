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
        <!-- Dynamic SEO -->
        <meta id="seo-title" name="title" content="">
        <meta id="seo-desc" name="description" content="">

        <!-- Open Graph (OG) Tags -->
        <meta property="og:title" id="og-title" content="">
        <meta property="og:description" id="og-desc" content="">
        <meta property="og:image" id="og-image" content="">
        <meta property="og:url" id="og-url" content="">
        <meta property="og:type" content="article">
  {!! ToastMagic::styles() !!}

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
                                <h1 class="title">Blog Details</h1>
                                <ul class="breadcumb-list flex-five">
                                    <li><a href="#">Home</a></li>
                                    <li><span>Blog Details</span></li>
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
                               <article class="side-blog side-blog-single" id="blog-area"></article>

                                <div class="side-blog-single-content">
                                   
                                   
                                  
                                    <div class="flex-two share-blog">
                                       <div class="tag-blog flex-three">
                                        <span>Tags:</span>
                                        <ul class="tag" id="detail-tags"></ul>
                                    </div>

                                     <div class="social-blog flex-three">
                                                        <span>Share:</span>
                                                        <ul class="social" id="social-share"></ul>
                                                    </div>

                                    </div>
                                </div>
                               <div id="comments-section"></div>

                                <div id="comment-form-section"></div>

                            </div>
                            <div class="col-lg-4 col-12">
                                <div class="side-bar-right">
                                    <div class="sidebar-widget">
                                        <div class="profile-widget center" id="author-sidebar"></div>

                                    </div>
                                  
                                    <div class="sidebar-widget">
                                        <h4 class="block-heading">Recent</h4>
                                       <div class="recent-post-list" id="recent-posts"></div>

                                    </div>
                                   
                                    <div class="sidebar-widget">
                                        <h4 class="block-heading">Tags</h4>
                                        <ul class="tag">
                                            <li>
                                                <a href="#">Tourist</a>
                                            </li>
                                            <li>
                                                <a href="#">Traveling</a>
                                            </li>
                                            <li>
                                                <a href="#">Cave</a>
                                            </li>
                                            <li>
                                                <a href="#">Sky Dive</a>
                                            </li>
                                            <li>
                                                <a href="#">Hill Climb</a>
                                            </li>
                                            <li>
                                                <a href="#">Oppos</a>
                                            </li>
                                            <li>
                                                <a href="#" class="active">Landing</a>
                                            </li>
                                            <li>
                                                <a href="#">Oppos</a>
                                            </li>
                                        </ul>

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
  {!! ToastMagic::scripts() !!}

     <script>
const currentURL = window.location.href;
const urlParts = window.location.pathname.split('/');
const blogId = urlParts[urlParts.length - 1];

let currentBlog = null;

// Fetch Blog
fetch(`/api/blogs/${blogId}`)
    .then(res => res.json())
    .then(blog => {
        currentBlog = blog;

        fillBlog(blog);
        fillSidebarAuthor(blog.author);
        fillTags(blog.tags);                // under main content
        fillSidebarTags(blog.tags);         // right sidebar
        fillShare(blog);
        fillSEO(blog);
        fillComments(blog.comments);
        setupCommentForm(blogId);
        fetchRelated(blog.tags);
    });


// =========================
//  BLOG MAIN CONTENT
// =========================
function fillBlog(blog) {
    document.getElementById("blog-area").innerHTML = `
        <div class="image">
            <img src="/${blog.thumbnail}" alt="${blog.title}">
        </div>

        <div class="top-detail-info">
            <ul class="flex-three">
                <li><i class="icon-4"></i> ${new Date(blog.created_at).toDateString()}</li>
                <li><i class="icon-24"></i> ${blog.reading_time}</li>
            </ul>
        </div>

        <h2 class="entry-title">${blog.title}</h2>

        <div class="blog-content-area">${blog.content}</div>
    `;
}


// =========================
//  SIDEBAR AUTHOR
// =========================
function fillSidebarAuthor(author) {
    document.getElementById("author-sidebar").innerHTML = `
        <img src="/${author.image}" class="avata" />
        <div class="name">${author.name}</div>
        <span class="job">${author.passion}</span>
        <p class="des">${author.description}</p>
    `;
}


// =========================
//  TAGS (below blog)
// =========================
function fillTags(tags) {
    const box = document.getElementById("detail-tags");
    box.innerHTML = "";

    tags.forEach(tag => {
        box.innerHTML += `<li><a href="/pages/blog">${tag}</a></li>`;
    });
}


// =========================
//  SIDEBAR TAGS (replace dummy)
// =========================
function fillSidebarTags(tags) {
    const sidebarTagBox = document.querySelector(".sidebar-widget ul.tag");
    sidebarTagBox.innerHTML = "";

    tags.forEach(tag => {
        sidebarTagBox.innerHTML += `<li><a href="/pages/blog">${tag}</a></li>`;
    });
}

                 const toast = new ToastMagic();

// =========================
//  SOCIAL SHARE + COPY LINK
// =========================
function fillShare(blog) {
    const shareBox = document.getElementById("social-share");
    const encodedURL = encodeURIComponent(currentURL);
    const encodedTitle = encodeURIComponent(blog.title);

    shareBox.innerHTML = `
        <li><a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=${encodedURL}&title=${encodedTitle}"><i class="icon-icon"></i></a></li>
        <li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=${encodedURL}"><i class="icon-icon-2"></i></a></li>
        <li><a target="_blank" href="https://www.instagram.com/?url=${encodedURL}"><i class="icon-instagram-1"></i></a></li>
        <li><a target="_blank" href="https://twitter.com/intent/tweet?text=${encodedTitle}&url=${encodedURL}"><i class="icon-x"></i></a></li>
        <li>
            <a href="#" onclick="copyURL()">
                <i class="icon-25"></i> <!-- use any icon -->
            </a>
        </li>
    `;
}

// Copy URL Function
function copyURL() {
    navigator.clipboard.writeText(currentURL);
    toast.success("Success","Link copied successfully!");
}


// =========================
//  SEO + OPEN GRAPH
// =========================
function fillSEO(blog) {
    document.getElementById("seo-title").content = blog.meta_description?.title || blog.title;
    document.getElementById("seo-desc").content = blog.meta_description?.description || "";

    document.getElementById("og-title").content = blog.meta_description?.title || blog.title;
    document.getElementById("og-desc").content = blog.meta_description?.description || "";
    document.getElementById("og-image").content = "/" + blog.thumbnail;
    document.getElementById("og-url").content = currentURL;

    document.title = blog.title + " | Dream Ride Himalayas";
}


// =========================
//  COMMENTS SECTION (KEEP DESIGN)
// =========================
function fillComments(comments) {
    const box = document.getElementById("comments-section");

    if (!comments || comments.length === 0) {
box.innerHTML = `
    <div style="
        padding:25px; 
        text-align:center;
        margin-top:30px;
        border-radius:14px;
        background:#f8f9fc;
        border:1px solid #e5e7eb;
    " class="mb-5">
        <h3 class="title mb-10" style="font-size:22px; font-weight:600;">
            No Comments Yet
        </h3>
        <p style="color:#555; font-size:15px; margin-bottom:0;">
            Be the first one to share your thoughts!
        </p>
    </div>
`;
  return;
    }

    let html = `<h3 class="title mb-32">(${comments.length}) Comments</h3>`;

    comments.forEach((c, index) => {

        // Random color avatar
        const colors = ["#FF6B6B", "#5A8DEE", "#39C0ED", "#6F42C1", "#20C997", "#FFC107"];
        const bg = colors[index % colors.length];
        const letter = c.name.charAt(0).toUpperCase();

        // word slicing
        const words = c.message.trim().split(/\s+/);
        const shortText = words.slice(0, 50).join(" ");
        const isLong = words.length > 50;

        html += `
            <div class="comment-blog flex mb-40">

                <!-- Avatar -->
                <div class="avata"
                     style="
                        width:55px;
                        height:55px;
                        border-radius:50%;
                        background:${bg};
                        display:flex;
                        align-items:center;
                        justify-content:center;
                        color:white;
                        font-size:22px;
                        font-weight:bold;
                     ">
                    ${letter}
                </div>

                <!-- Comment Content -->
                <div class="content" style="margin-left:15px; flex:1;">
                    <div class="flex-one" style="margin-bottom:8px;">
                        <div class="info">
                            <h6 class="name" style="font-size:18px; margin-bottom:3px;">${c.name}</h6>
                            <p class="date" style="font-size:13px; color:#777;">
                                ${new Date(c.date).toDateString()}
                            </p>
                        </div>
                    </div>

                    <!-- Short or full comment -->
                    <div class="des" id="comment-text-${index}" style="line-height:1.7;">
                        ${isLong ? shortText + "..." : c.message}
                    </div>

                    <!-- Read More Button -->
                    ${isLong ? `
                        <button 
                            class="button-link" 
                            style="margin-top:8px; font-size:14px;"
                            onclick="expandComment(${index}, \`${c.message.replace(/`/g, "\\`")}\`)">
                            Read More
                        </button>
                    ` : ""}
                </div>

            </div>
        `;
    });

    box.innerHTML = html;
}


// Expand full comment text
function expandComment(id, fullText) {
    document.getElementById("comment-text-" + id).innerHTML = fullText;
}



// =========================
//  COMMENT FORM (KEEP DESIGN + Add margins)
// =========================
function setupCommentForm(blogId) {
    document.getElementById("comment-form-section").innerHTML = `
        <h3 class="title mb-32">Write your comment</h3>
        <form id="commentForm">
        
            <div class="group-gap">
                <input type="text" name="name" class="input-cmt mt-20" placeholder="Enter your name*" required>
                <input type="email" name="email" class="input-cmt mt-20" placeholder="Enter your email*" required>
            </div>

            <div class="group-gap">
                <input type="tel" name="phone" class="input-cmt mt-20" placeholder="Enter your number (Optional)">
            </div>

            <textarea name="message" cols="30" rows="8" class="input-cmt mt-20" placeholder="Enter your Message*" required></textarea>

            <input type="submit" value="Send Message" class="mt-20">
        </form>
    `;

    document.getElementById("commentForm").addEventListener("submit", function(e) {
        e.preventDefault();

        const formData = new FormData(this);
        formData.append("blog_id", blogId);

        fetch("/api/blogs/add-comment", { method: "POST", body: formData })
            .then(res => res.json())
            .then(res => {
                toast.success("Success","Comment submitted successfully!");
                fillComments(res.comments);
                document.getElementById("commentForm").reset();
            });
    });
}


// =========================
//  RELATED POSTS (Recent)
// =========================
// =========================
//  RELATED POSTS (Recent)
// =========================
function fetchRelated(tags) {
    if (!tags.length) {
        return loadFallbackRecent();
    }

    fetch(`/api/blogs?tag=${tags[0]}`)
        .then(res => res.json())
        .then(res => {

            // Tag returned empty → load fallback
            if (!res.data || res.data.length === 0) {
                return loadFallbackRecent();
            }

            renderRecent(res.data);
        })
        .catch(() => loadFallbackRecent());
}


// If no tag posts found → load any blogs
function loadFallbackRecent() {
    fetch(`/api/blogs`)
        .then(res => res.json())
        .then(res => {
            renderRecent(res.data);
        });
}


// Render 3 recent items
function renderRecent(list) {
    const box = document.getElementById("recent-posts");
    box.innerHTML = "";

    const filtered = list.filter(b => b.id != blogId); // skip current blog

    if (filtered.length === 0) {
        box.innerHTML = `<p>No recent posts found</p>`;
        return;
    }

    filtered.slice(0, 3).forEach(blog => {
        box.innerHTML += `
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

</script>

</body>

</html>
