<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>
  <meta charset="utf-8">
  <title>Package | Admin Dashboard</title>
  <meta name="author" content="themesflat.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- Styles -->
  <link rel="stylesheet" href="/app/css/app.css">
  <link rel="stylesheet" href="/app/css/map.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <link rel="shortcut icon" href="/assets/images/dreamridelogo.webp">
  <link rel="apple-touch-icon-precomposed" href="/assets/images/dreamridelogo.webp">
  {!! ToastMagic::styles() !!}

</head>

<body class="body header-fixed ">

  <div class="preload preload-container">
    <svg class="pl" width="240" height="240" viewBox="0 0 240 240">
      <circle class="pl__ring pl__ring--a" cx="120" cy="120" r="105" fill="none" stroke="#000" stroke-width="20"
        stroke-dasharray="0 660" stroke-dashoffset="-330" stroke-linecap="round"></circle>
      <circle class="pl__ring pl__ring--b" cx="120" cy="120" r="35" fill="none" stroke="#000" stroke-width="20"
        stroke-dasharray="0 220" stroke-dashoffset="-110" stroke-linecap="round"></circle>
      <circle class="pl__ring pl__ring--c" cx="85" cy="120" r="70" fill="none" stroke="#000" stroke-width="20"
        stroke-dasharray="0 440" stroke-linecap="round"></circle>
      <circle class="pl__ring pl__ring--d" cx="155" cy="120" r="70" fill="none" stroke="#000" stroke-width="20"
        stroke-dasharray="0 440" stroke-linecap="round"></circle>
    </svg>
  </div>

  <div id="wrapper">
    <div id="pagee" class="clearfix">

      @include('admin.components.sidebar')

      <div class="has-dashboard">

        <header class="main-header flex">
            <!-- Header Lower -->
              @include('admin.components.header')
            <!-- End Header Lower -->


            <!-- Mobile Menu  -->
            <div class="close-btn"><span class="icon flaticon-cancel-1"></span></div>
            <div class="mobile-menu">
                <div class="menu-backdrop"></div>
                <nav class="menu-box">
                    <div class="nav-logo"><a href="index.html">
                            <img src="/assets/images/logo2.png" alt=""></a></div>
                    <div class="bottom-canvas">
                        <div class="menu-outer">
                        </div>
                    </div>
                </nav>
            </div>
            <!-- End Mobile Menu -->

        </header>
        <!-- MAIN -->
        <main id="main">
          <section class="profile-dashboard">

            <!-- PAGE HEADER -->
            <div class="inner-header mb-40 d-flex justify-content-between align-items-center">
              <div>
                <h3 class="title">Packages</h3>
                <p class="des">Manage your listed packages and make updates easily.</p>
              </div>
              <button class="btn-main-small">
                <a href="{{ route('admin.package.add-package') }}">+ Add Package</a>
              </button>
            </div>

            <!-- SEARCH + TABLE -->
            <div class="widget-dash-board">
              <!-- SEARCH BAR -->
              <div class="d-flex justify-content-between mr-2 align-items-center mb-4">
                <div class="search-wrap w-75">
                  <input type="text" class="search-service" placeholder="Search services by Name, Description or Price.">
                  <i class="icon-search"></i>
                </div>
              </div>

              <!-- SERVICE TABLE -->
              <div class="my-4">

                <!-- TABLE (desktop) -->
                <div id="serviceTableWrapper" class="d-none d-md-block">
                  <div class="table-responsive shadow-sm rounded">
                    <table class="table vehicle-table table-hover align-middle mb-0">
                      <thead>
                        <tr>
                          <th scope="col">Image</th>
                          <th scope="col">Name</th>
                          <th scope="col">Price</th>
                          <th scope="col">Description</th>
                          <th scope="col" class="text-end">Action</th>
                        </tr>
                      </thead>
                      <tbody id="serviceTableBody">
                        <!-- JS will inject rows -->
                      </tbody>
                    </table>
                    <div id="servicePaginationContainer"></div>
                    <div id="serviceCardList" class="row d-md-none"></div>
                  </div>
                </div>

                <!-- MOBILE CARDS -->
                <div id="serviceCardWrapper" class="d-block d-md-none">
                  <div id="serviceCardList" class="row g-3"></div>
                </div>
              </div>
            </div>

          </section>
        </main>

               @include('admin.components.footer')

      </div>
    </div>
  </div>

  <!-- JS Files -->
  <script src="/app/js/jquery.min.js"></script>
  <script src="/app/js/jquery.nice-select.min.js"></script>
  <script src="/app/js/bootstrap.min.js"></script>
  <script src="/app/js/tinymce/tinymce.min.js"></script>
  <script src="/app/js/tinymce/tinymce-custom.js"></script>
  <script src="/app/js/swiper-bundle.min.js"></script>
  <script src="/app/js/swiper.js"></script>
  <script src="/app/js/plugin.js"></script>
  <script src="/app/js/map.min.js"></script>
  <script src="/app/js/map.js"></script>
  <script src="/app/js/shortcodes.js"></script>
  <script src="/app/js/auth-validator.js"></script>
  <script src="/app/js/main.js"></script>
  {!! ToastMagic::scripts() !!}
    <script src="/app/js/admin-auth-guard.js"></script>

 <script>
const APP_URL = "{{ config('app.url') }}";
let currentPage = 1;
let currentSearch = "";
const toastMagic = new ToastMagic();

// =========================
// 🔹 LOAD PACKAGES
// =========================
async function loadPackages(page = 1, search = "") {
  const tableBody = document.getElementById('serviceTableBody');
  const paginationContainer = document.getElementById('servicePaginationContainer');

  tableBody.innerHTML = `<tr><td colspan="5" class="text-center py-5">Loading...</td></tr>`;
  paginationContainer.innerHTML = "";

  try {
    const response = await fetch(`${APP_URL}/api/package?page=${page}&search=${encodeURIComponent(search)}`);
    const data = await response.json();
    renderPackages(data.data);
    renderPackagePagination(data);
  } catch (error) {
    console.error('Error fetching packages:', error);
    tableBody.innerHTML = `<tr><td colspan="5" class="text-center text-danger py-4">Failed to load packages.</td></tr>`;
  }
}

// =========================
// 🔹 RENDER PACKAGES
// =========================
function renderPackages(packages = []) {
  const body = document.getElementById('serviceTableBody');
  body.innerHTML = '';

  if (!packages.length) {
    body.innerHTML = `<tr><td colspan="5" class="text-center py-4 text-muted">No packages found.</td></tr>`;
    return;
  }
  console.log(packages);
  
  packages.forEach(pkg => {
    const imageUrl = pkg?.information?.images[0]?.url 
        ? `${APP_URL}/${pkg?.information?.images[0]?.url?.replace(/^\/+/, '')}` 
        : `${APP_URL}/default-package.jpg`;

    const tr = document.createElement('tr');
    tr.innerHTML = `
      <td><img src="${imageUrl}" alt="${escapeHtml(pkg.information.title)}" class="img-fluid rounded" style="width:80px;height:60px;object-fit:cover;"></td>
      <td class="fw-medium text-dark">${escapeHtml(pkg.information.title)}</td>
      <td>₹${escapeHtml(pkg.pricing)}</td>
      <td class="text-truncate" style="max-width:250px;">${escapeHtml(pkg?.information?.description.substr(0,100) || '—')}</td>
      <td class="text-end">
        <div class="d-inline-flex gap-2">
          <button class="btn btn-light btn-sm border btn-view-package" data-id="${pkg.id}">
            <i class="bi bi-eye me-1"></i> View
          </button>
          <button class="btn btn-outline-primary btn-sm btn-edit-package" data-id="${pkg.id}">
            <i class="bi bi-pencil me-1"></i> Edit
          </button>
          <button class="btn btn-outline-danger btn-sm btn-delete-package" data-id="${pkg.id}">
            <i class="bi bi-trash me-1"></i> Delete
          </button>
        </div>
      </td>
    `;
    body.appendChild(tr);
  });

  bindPackageActions();
}

// =========================
// 🔹 BUTTON HANDLERS
// =========================
function bindPackageActions() {
  // ✏️ Edit
  document.querySelectorAll('.btn-edit-package').forEach(btn => {
    btn.addEventListener('click', () => {
      const id = btn.dataset.id;
      window.location.href = `${APP_URL}/admin/package/edit/${id}`;
    });
  });

  // 👁️ View
  document.querySelectorAll('.btn-view-package').forEach(btn => {
    btn.addEventListener('click', async () => {
      const id = btn.dataset.id;
      try {
        const res = await fetch(`${APP_URL}/api/package/${id}`);
        const data = await res.json();
        const info = data.information || {};
        const image = info.images?.find(img => img.is_main)?.url || (info.images?.[0]?.url || `${APP_URL}/default-package.jpg`);

        Swal.fire({
          title: info.title || 'Package Details',
          html: `
            <p><strong>Price:</strong> ₹${escapeHtml(data.pricing || 0)}</p>
            <p>${escapeHtml(info.description || 'No description')}</p>
          `,
          imageUrl: `${APP_URL}/${image.replace(/^\/+/, '')}`,
          imageWidth: 400,
          imageHeight: 250,
          confirmButtonText: 'Close'
        });
      } catch (err) {
        Swal.fire('Error', 'Failed to load package details.', 'error');
      }
    });
  });

  // 🗑️ Delete
  document.querySelectorAll('.btn-delete-package').forEach(btn => {
    btn.addEventListener('click', async () => {
      const id = btn.dataset.id;
      Swal.fire({
        title: 'Are you sure?',
        text: 'This will delete the package permanently.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel'
      }).then(async (result) => {
        if (result.isConfirmed) {
          try {
            await fetch(`${APP_URL}/api/package/${id}`, { method: 'DELETE' });
            toastMagic.success('Deleted!', 'Package deleted successfully.');
            loadPackages(currentPage, currentSearch);
          } catch (err) {
            Swal.fire('Error', 'Failed to delete package.', 'error');
          }
        }
      });
    });
  });
}

// =========================
// 🔹 PAGINATION
// =========================
function renderPackagePagination(data) {
  const container = document.getElementById('servicePaginationContainer');
  if (data.last_page <= 1) return (container.innerHTML = "");

  let html = `<ul class="pagination justify-content-center my-4">`;
  html += `<li class="page-item ${data.current_page === 1 ? 'disabled' : ''}">
    <a class="page-link" href="#" data-page="${data.current_page - 1}">Previous</a>
  </li>`;
  for (let i = 1; i <= data.last_page; i++) {
    html += `<li class="page-item ${data.current_page === i ? 'active' : ''}">
      <a class="page-link" href="#" data-page="${i}">${i}</a>
    </li>`;
  }
  html += `<li class="page-item ${data.current_page === data.last_page ? 'disabled' : ''}">
    <a class="page-link" href="#" data-page="${data.current_page + 1}">Next</a>
  </li>`;
  html += `</ul>`;
  container.innerHTML = html;

  container.querySelectorAll('a').forEach(link => {
    link.addEventListener('click', e => {
      e.preventDefault();
      const page = parseInt(link.dataset.page);
      if (page >= 1 && page <= data.last_page) loadPackages(page, currentSearch);
    });
  });
}

// =========================
// 🔹 UTILITIES
// =========================
function escapeHtml(str) {
  if (!str) return '';
  return String(str)
    .replaceAll('&', '&amp;')
    .replaceAll('<', '&lt;')
    .replaceAll('>', '&gt;')
    .replaceAll('"', '&quot;')
    .replaceAll("'", '&#39;');
}

// =========================
// 🔹 SEARCH HANDLER
// =========================
document.addEventListener("DOMContentLoaded", function () {
  console.log("✅ DOM fully loaded. Calling loadPackages()...");
  
  // Trigger first API call
  loadPackages();

  // Handle search
  const searchInput = document.querySelector(".search-service");
  if (searchInput) {
    searchInput.addEventListener("input", e => {
      currentSearch = e.target.value.trim();
      loadPackages(1, currentSearch);
    });
  }
});

</script>


</body>
</html>
