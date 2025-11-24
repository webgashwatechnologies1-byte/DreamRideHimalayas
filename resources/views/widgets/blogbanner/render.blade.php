@php
    use App\Models\Blog;

    $mainBlogId = $content['main']['blogid'] ?? null;
    $blogIds = $content['blogs'] ?? [];

    $mainBlog = $mainBlogId ? Blog::find($mainBlogId) : null;
    $blogs = Blog::whereIn('id', $blogIds)->get()->keyBy('id');
    $wid = "widget-" . $section->id; 

@endphp


<style>
    /* Fix the card height */
#{{ $wid }} .blog-style3 {
    display: flex;
    flex-direction: row;
}

/* Fix the image container height */
#{{ $wid }}  .blog-style3 .blog-image img {
    width: 100%;
    height: 180px !important;
    object-fit: cover;
    border-radius: 8px;
}

/* Clamp the title to 2 lines */
#{{ $wid }}  .blog-style3 .entry-title a {
    display: -webkit-box;
    -webkit-line-clamp: 2;     
    overflow: hidden;
    text-overflow: ellipsis;
    min-height: 48px; /* ensures equal height in all cards */
}

/* Keep meta items fixed */
#{{ $wid }}  .blog-style3 .meta-list {
    margin-bottom: 8px;
}

/* Fix read more alignment */
#{{ $wid }}  .blog-style3 .btn-read-more {
    margin-top: auto;
}
.admin-preview .wow {
        visibility: visible !important;
        animation: none !important;
    }
</style>

<div class="admin-preview">

<section class="section-blog pd-main relative">
    <div class="bg-blog-h4 bg-1"></div>
    <div class="tf-container">

        <div class="row">
            <div class="col-lg-12 mb-40">
                <div class="center m0-auto w-text-heading">
                    <span class="sub-title-heading text-main font-yes fs-28-46">
                        {{ $content['subtitle'] ?? '' }}
                    </span>
                    <h2 class="title-heading">
                        {{ $content['title'] ?? '' }}
                    </h2>
                </div>
            </div>
        </div>

        <div class="row">

            {{-- MAIN BLOG --}}
            @if($mainBlog)
            <div class="col-lg-6">
                <div class="tf-widget-blog blog-style2">
                    <a href="/pages/blog-details/{{ $mainBlog->id }}" class="blog-image">
                        <img src="/{{ $mainBlog->thumbnail }}" alt="{{ $mainBlog->title }}">
                    </a>
                    <div class="blog-content">
                        <ul class="meta-list flex-three">
                            <li><i class="icon-profile-user-1"></i><span>{{ $mainBlog->author['name'] ?? 'Admin' }}</span></li>
                        </ul>
                        <h3 class="entry-title">
                            <a href="/pages/blog-details/{{ $mainBlog->id }}">{{ $mainBlog->title }}</a>
                        </h3>
                        <a href="/pages/blog-details/{{ $mainBlog->id }}" class="btn-read-more">Read More <i class="icon-Vector-4"></i></a>
                    </div>
                </div>
            </div>
            @endif

            {{-- ADDITIONAL BLOGS --}}
            <div class="col-lg-6">
                @foreach($blogIds as $id)
                    @php $b = $blogs[$id] ?? null; @endphp
                    @if(!$b) @continue @endif

                    <div class="tf-widget-blog flex-three blog-style3 wow fadeInUp animated">
                        <a href="/pages/blog-details/{{ $b->id }}" class="blog-image">
                            <img src="/{{ $b->thumbnail }}" alt="{{ $b->title }}">
                        </a>
                        <div class="blog-content">
                            <ul class="meta-list flex-three">
                                <li><i class="icon-profile-user-1"></i><span>{{ $b->author['name'] ?? 'Admin' }}</span></li>
                            </ul>
                            <h3 class="entry-title">
                                <a href="/pages/blog-details/{{ $b->id }}">{{ $b->title }}</a>
                            </h3>
                            <a href="/blog/{{ $b->id }}" class="btn-read-more">Read More <i class="icon-Vector-4"></i></a>
                        </div>
                    </div>

                @endforeach
            </div>

        </div>
    </div>
</section>

</div>