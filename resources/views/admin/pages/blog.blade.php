<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>
  <meta charset="utf-8">
  <title>Blogs | Admin Dashboard</title>
  <meta name="author" content="themesflat.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- Theme CSS -->
  <link rel="stylesheet" href="/app/css/app.css">
  <link rel="stylesheet" href="/app/css/map.min.css">

  <!-- Optional: Bootstrap & Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  {!! ToastMagic::styles() !!}

  <style>
    /* ---------------------------
       Layout & responsive cards
       --------------------------- */
    .blogs-grid {
      display: grid;
      gap: 18px;
      grid-template-columns: 1fr;
    }
    @media (min-width: 768px) {
      /* Desktop: horizontal cards — each card is a row-like flexbox */
      .blogs-grid {
        grid-template-columns: 1fr;
      }
      .blog-card {
        display: flex;
        flex-direction: row;
        gap: 16px;
        align-items: stretch;
      }
      .blog-card .thumb {
        width: 360px;
        height: auto;
        flex: 0 0 360px;
        object-fit: cover;
      }
      .blog-card .card-body {
        flex: 1 1 auto;
      }
    }
    @media (max-width: 767px) {
      /* Mobile: stacked column card */
      .blog-card { display: block; }
      .blog-card .thumb { width: 100%; height: auto; aspect-ratio: 16/9; object-fit: cover; display:block; }
    }

    .blog-card {
      background: #fff;
      border: 1px solid #eef2f6;
      border-radius: 12px;
      overflow: hidden;
      transition: transform .12s ease, box-shadow .12s ease;
      position: relative;
    }
    .blog-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 12px 30px rgba(2,6,23,0.06);
    }

    .blog-card .thumb {
      display: block;
      background: #f8fafc;
      width: 100%;
      height: 220px;
      object-fit: cover;
    }
    .blog-card .card-body {
      padding: 14px;
      display: flex;
      flex-direction: column;
      gap: 10px;
      min-height: 100%;
    }

    .blog-title { font-weight: 700; font-size: 1.05rem; color: #0f172a; }
    .blog-meta { display:flex; gap:10px; align-items:center; color:#475569; font-size:13px; }
    .blog-description { color:#374151; font-size:14px; line-height:1.45; }

    .card-actions { display:flex; gap:8px; justify-content:flex-end; margin-top:auto; }

    /* reviews icon top-right */
    .reviews-badge {
      position: absolute;
      right: 12px;
      top: 12px;
      background: rgba(255,255,255,0.9);
      border: 1px solid #eef2f6;
      padding: 6px 8px;
      border-radius: 999px;
      display:flex;
      gap:8px;
      align-items:center;
      box-shadow: 0 4px 12px rgba(2,6,23,0.04);
      font-size: 13px;
      color:#111827;
    }

    /* search UI (your style) */
    .search-wrap { position: relative; max-width: 420px; }
    .search-wrap input { padding-right: 40px; }
    .search-wrap .icon-search { position: absolute; right: 12px; top: 50%; transform: translateY(-50%); color:#9aa4b2; font-size:16px; }

    /* loader overlay */
    #globalLoader { position: fixed; inset: 0; display:flex; align-items:center; justify-content:center; background: rgba(255,255,255,0.6); z-index: 2000; visibility: hidden; opacity: 0; transition: opacity .12s ease, visibility .12s; }
    #globalLoader.show { visibility: visible; opacity: 1; }

    /* pagination small adjustment */
    .pagination { gap:6px; }
    .muted-small { font-size:13px; color:#6b7280; }

    /* small responsive fix for card body */
    .card-body .blog-description { max-width: 100%; }
  </style>
</head>

<body class="body header-fixed">

  <div id="wrapper">
    <div id="pagee" class="clearfix">

      @include('admin.components.sidebar')

      <div class="has-dashboard">

        <header class="main-header flex">
          @include('admin.components.header')
        </header>

        <main id="main">
          <section class="profile-dashboard">

            <div class="inner-header mb-24 d-flex justify-content-between align-items-center">
              <div>
                <h3 class="title">Blogs</h3>
                <p class="des">Manage your blog posts — responsive horizontal cards on desktop.</p>
              </div>

              <div class="d-flex gap-2 align-items-center">
                <div class="search-wrap me-2">
                  <input id="searchInput" class="form-control search-service" type="text" placeholder="Search title, author or tags...">
                  <i class="icon-search fa fa-search"></i>
                </div>

                <a href="{{ route('admin.blog.create') }}" class="btn-main-small btn btn-primary">
                  <i class="fa fa-plus me-1"></i> Add Blog
                </a>
              </div>
            </div>

            <div class="widget-dash-board">

              <div id="blogsGrid" class="blogs-grid mb-3" aria-live="polite"></div>

              <div id="paginationContainer" class="mt-3 d-flex justify-content-center"></div>

              <div id="emptyState" class="text-center text-muted py-4" style="display:none;">
                No blogs found.
              </div>

            </div>

          </section>
        </main>

        <footer class="footer footer-dashboard">
          <div class="tf-container full">
            <div class="row">
              <div class="col-lg-6">
                <p class="text-white">Made with ❤️ by Gashwa Technologies. </p>
              </div>
              <div class="col-lg-6">
                <ul class="menu-footer flex-six">
                  <li><a href="#">Privacy & Policy</a></li>
                  <li><a href="#">Licensing</a></li>
                  <li><a href="#">Instruction</a></li>
                </ul>
              </div>
            </div>
          </div>
        </footer>

      </div>
    </div>
  </div>

  {{-- Loader include (your components.loader or fallback below) --}}

  <div id="globalLoader" aria-hidden="true" class="@if(View::exists('components.loader')) '' @endif">
    <div class="spinner-border text-primary" role="status" style="width:3rem;height:3rem;">
        @include('components.loader')
    </div>
  </div>

  <!-- JS -->
  <script src="/app/js/jquery.min.js"></script>
  <script src="/app/js/jquery.nice-select.min.js"></script>
  <script src="/app/js/bootstrap.min.js"></script>
  <script src="/app/js/plugin.js"></script>
  <script src="/app/js/main.js"></script>
  {!! ToastMagic::scripts() !!}

  <script>
    const APP_URL = "{{ config('app.url') }}";
    const toastMagic = new ToastMagic();

    let currentPage = 1;
    let currentSearch = "";
    let lastFetchId = 0;

    function showLoader() {
      const el = document.getElementById('globalLoader');
      if (el) el.classList.add('show');
    }
    function hideLoader() {
      const el = document.getElementById('globalLoader');
      if (el) el.classList.remove('show');
    }

    function escapeHtml(str) {
      if (!str) return '';
      return String(str)
        .replaceAll('&', '&amp;')
        .replaceAll('<', '&lt;')
        .replaceAll('>', '&gt;')
        .replaceAll('"', '&quot;')
        .replaceAll("'", '&#39;');
    }

    function stripHtml(html) {
      const d = document.createElement('div'); d.innerHTML = html || ''; return d.textContent || d.innerText || '';
    }

    // -------------------------
    // Load blogs
    // -------------------------
    async function loadBlogs(page = 1, search = "") {
      currentPage = page;
      currentSearch = search || "";
      const fetchId = ++lastFetchId;

      const grid = document.getElementById('blogsGrid');
      const pagination = document.getElementById('paginationContainer');
      const emptyState = document.getElementById('emptyState');

      grid.innerHTML = '<div class="text-center py-5 w-100">Loading...</div>';
      pagination.innerHTML = '';
      emptyState.style.display = 'none';
      showLoader();

      try {
        // you asked api to return full objects — we rely on that
        const res = await fetch(`${APP_URL}/api/blogs?page=${page}&search=${encodeURIComponent(search)}`);
        if (fetchId !== lastFetchId) return; // stale guard
        if (!res.ok) throw new Error('Network response not ok');

        const json = await res.json();
        const blogs = json.data || [];

        if (!blogs.length) {
          grid.innerHTML = '';
          emptyState.style.display = 'block';
          renderPagination(json);
          return;
        }

        renderCards(blogs);
        renderPagination(json);

      } catch (err) {
        console.error('Failed to load blogs', err);
        document.getElementById('blogsGrid').innerHTML = '<div class="text-danger text-center py-4">Failed to load blogs.</div>';
      } finally {
        hideLoader();
      }
    }

    // -------------------------
    // Render cards
    // -------------------------
    function renderCards(blogs = []) {
      const grid = document.getElementById('blogsGrid');
      grid.innerHTML = '';

      blogs.forEach(blog => {
        const thumb = blog.thumbnail ? `${APP_URL}/${String(blog.thumbnail).replace(/^\/+/, '')}` : `${APP_URL}/assets/images/no-image.png`;
        const authorName = blog.author?.name || 'Unknown';
        const reading = blog.reading_time || '—';
        const descSource = blog.meta_description?.description ? blog.meta_description.description : stripHtml(blog.content || '');
        const desc = escapeHtml((descSource || '').substring(0, 140)) + (descSource && descSource.length > 140 ? '...' : '');
        
        // create element
        const el = document.createElement('article');
        el.className = 'blog-card';

        el.innerHTML = `
          <div class="reviews-badge" title="Reviews">
            <i class="fa fa-star" style="color:#f59e0b"></i>
          </div>

          <img src="${thumb}" alt="${escapeHtml(blog.title)}" class="thumb" loading="lazy">

          <div class="card-body">
            <div>
              <div class="blog-title">${escapeHtml(blog.title)}</div>
              <div class="blog-meta">
                <div class="muted-small"><i class="fa fa-user me-1"></i> ${escapeHtml(authorName)}</div>
                <div class="muted-small"><i class="fa fa-clock me-1"></i> ${escapeHtml(reading)}</div>
              </div>
            </div>

            <div class="blog-description">${desc}</div>

            <div class="card-actions">
              <button class="btn btn-light btn-sm btn-view-blog" data-id="${blog.id}" title="View"><i class="fa fa-eye"></i></button>
              <button class="btn btn-outline-primary btn-sm btn-edit-blog" data-id="${blog.id}" title="Edit"><i class="fa fa-pen"></i></button>
              <button class="btn btn-outline-danger btn-sm btn-delete-blog" data-id="${blog.id}" title="Delete"><i class="fa fa-trash"></i></button>
            </div>
          </div>
        `;

        grid.appendChild(el);
      });

      bindCardActions();
    }

    // -------------------------
    // Bind actions
    // -------------------------
    function bindCardActions() {
      // View
      document.querySelectorAll('.btn-view-blog').forEach(btn => {
        btn.onclick = async () => {
          const id = btn.dataset.id;
          showLoader();
          try {
            const res = await fetch(`${APP_URL}/api/blogs/${id}`);
            if (!res.ok) throw new Error('Failed to load');
            const blog = await res.json();
            const thumb = blog.thumbnail ? `${APP_URL}/${String(blog.thumbnail).replace(/^\/+/, '')}` : `${APP_URL}/assets/images/no-image.png`;
            const author = blog.author?.name || 'Unknown';
            const contentHtml = blog.content || '';

            Swal.fire({
              title: escapeHtml(blog.title),
              html: `
                <div style="text-align:left;">
                  <p class="muted-small"><strong>Author:</strong> ${escapeHtml(author)} &nbsp; • &nbsp; <strong>Reading:</strong> ${escapeHtml(blog.reading_time || '—')}</p>
                  <hr/>
                  <div style="max-height:420px; overflow:auto; text-align:left;">${contentHtml}</div>
                </div>
              `,
              imageUrl: thumb,
              imageWidth: 700,
              showCloseButton: true,
              showConfirmButton: false,
            });
          } catch (err) {
            Swal.fire('Error', 'Unable to fetch blog details', 'error');
          } finally {
            hideLoader();
          }
        };
      });

      // Edit
      document.querySelectorAll('.btn-edit-blog').forEach(btn => {
        btn.onclick = () => {
          const id = btn.dataset.id;
          window.location.href = `${APP_URL}/admin/blog/edit/${id}`;
        };
      });

      // Delete
      document.querySelectorAll('.btn-delete-blog').forEach(btn => {
        btn.onclick = () => {
          const id = btn.dataset.id;
          Swal.fire({
            title: 'Delete this blog?',
            text: 'This action is permanent.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Delete',
            cancelButtonText: 'Cancel'
          }).then(async (result) => {
            if (!result.isConfirmed) return;
            showLoader();
            try {
              const res = await fetch(`${APP_URL}/api/blogs/${id}`, { method: 'DELETE' });
              if (!res.ok) throw new Error('Delete failed');
              toastMagic.success('Deleted', 'Blog removed successfully');
              loadBlogs(currentPage, currentSearch);
            } catch (err) {
              Swal.fire('Error', 'Failed to delete blog', 'error');
            } finally {
              hideLoader();
            }
          });
        };
      });
    }

    // -------------------------
    // Pagination renderer
    // -------------------------
    function renderPagination(data) {
      const container = document.getElementById('paginationContainer');
      container.innerHTML = '';
      if (!data || data.last_page <= 1) return;

      const ul = document.createElement('ul');
      ul.className = 'pagination';

      const createPage = (p, label = null, active = false, disabled = false) => {
        const li = document.createElement('li');
        li.className = 'page-item' + (active ? ' active' : '') + (disabled ? ' disabled' : '');
        const a = document.createElement('a');
        a.className = 'page-link';
        a.href = '#';
        a.dataset.page = String(p);
        a.innerText = label ?? String(p);
        a.onclick = (e) => { e.preventDefault(); if (!disabled) loadBlogs(p, currentSearch); };
        li.appendChild(a);
        return li;
      };

      ul.appendChild(createPage(data.current_page - 1, 'Previous', false, data.current_page === 1));

      const total = data.last_page;
      let start = Math.max(1, data.current_page - 3);
      let end = Math.min(total, data.current_page + 3);
      if (data.current_page <= 4) end = Math.min(7, total);
      if (data.current_page > total - 4) start = Math.max(1, total - 6);

      for (let p = start; p <= end; p++) {
        ul.appendChild(createPage(p, null, data.current_page === p));
      }

      ul.appendChild(createPage(data.current_page + 1, 'Next', false, data.current_page === total));
      container.appendChild(ul);
    }

    // -------------------------
    // Search (debounced)
    // -------------------------
    function debounce(fn, wait = 300) {
      let t;
      return (...args) => { clearTimeout(t); t = setTimeout(() => fn(...args), wait); };
    }

    document.addEventListener('DOMContentLoaded', function() {
      loadBlogs();

      const searchInput = document.getElementById('searchInput');
      searchInput.addEventListener('input', debounce((e) => {
        const q = e.target.value.trim();
        currentSearch = q;
        loadBlogs(1, q);
      }, 350));
    });
  </script>
</body>

</html>
