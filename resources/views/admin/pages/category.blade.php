<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>
  <meta charset="utf-8">
  <title>Category | Admin Dashboard</title>
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
            <div id="header">

                <div class="header-dashboard">
                    <div class="tf-container full">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="inner-container flex justify-space align-center">
                                    <!-- Logo Box -->
                                    <div class="header-search flex-three">
                                        <div class="icon-bars">
                                            <i class="icon-Vector3"></i>
                                        </div>
                                        <form action="/" class="search-dashboard">
                                            <i class="icon-Vector5"></i>
                                            <input type="search" placeholder="Search Categories">
                                        </form>

                                    </div>

                                    <div class="nav-outer flex align-center">
                                        <!-- Main Menu -->
                                       
                                        <!-- Main Menu End-->
                                    </div>
                                    <div class="header-account flex align-center">
                                        <div class="dropdown notification">
                                            <a class="icon-notification" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="icon-notification-1"></i>
                                            </a>
                                            <ul class="dropdown-menu">
                                              <li>
                                                <div class="message-item  flex-three">
                                                    <div class="image">
                                                        <i class="icon-26"></i>
                                                    </div>
                                                    <div>
                                                        <div class="body-title">Discount available</div>
                                                        <div class="text-tiny">Morbi sapien massa, ultricies at rhoncus at, ullamcorper nec diam</div>
                                                    </div>
                                                </div>
                                              </li>
                                              <li>
                                                <div class="message-item  flex-three">
                                                    <div class="image">
                                                        <i class="icon-26"></i>
                                                    </div>
                                                    <div>
                                                        <div class="body-title">Discount available</div>
                                                        <div class="text-tiny">Morbi sapien massa, ultricies at rhoncus at, ullamcorper nec diam</div>
                                                    </div>
                                                </div>
                                              </li>
                                              <li>
                                                <div class="message-item  flex-three">
                                                    <div class="image">
                                                        <i class="icon-26"></i>
                                                    </div>
                                                    <div>
                                                        <div class="body-title">Discount available</div>
                                                        <div class="text-tiny">Morbi sapien massa, ultricies at rhoncus at, ullamcorper nec diam</div>
                                                    </div>
                                                </div>
                                              </li>
                                              
                                            </ul>
                                        </div> 
                                        <div class="dropdown account">
                                            <a type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <img src=".//assets/images/page/avata.jpg" alt="image">
                                            </a>
                                            <ul class="dropdown-menu">
                                              <li><a  href="#">Account</a></li>
                                              <li><a  href="#">Setting</a></li>
                                              <li><a  href="#">Support</a></li>
                                              <li><a  href="login.html">Logout</a></li>
                                            </ul>
                                        </div> 
                                        <div class="mobile-nav-toggler mobile-button">
                                            <i class="icon-bar"></i>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
                <h3 class="title">Category</h3>
                <p class="des">Manage your listed categories and make updates easily.</p>
              </div>
              <button class="btn-main-small">
                <a href="{{ route('admin.category.create') }}">+ Add Category</a>
              </button>
            </div>

            <!-- SEARCH + TABLE -->
            <div class="widget-dash-board">
              <!-- SEARCH BAR -->
              <div class="d-flex justify-content-between mr-2 align-items-center mb-4">
                <div class="search-wrap w-75">
                  <input type="text" class="search-service" placeholder="Search services by Name.">
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
                  <div id="serviceCardListMobile" class="row g-3"></div>
                </div>
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

  <script>
    const APP_URL = "{{ config('app.url') }}"; // Example: http://localhost:8000
    let currentPage = 1;
    let currentSearch = "";
    
    // =========================
    // 🔹 LOAD Category
    // =========================
    async function loadCategory(page = 1, search = "") {
      const tableBody = document.getElementById('serviceTableBody');
      const paginationContainer = document.getElementById('servicePaginationContainer');
    
      // Show loader
      tableBody.innerHTML = `
        <tr>
          <td colspan="3" class="text-center py-5">
            <div class="spinner-border text-warning" role="status"></div>
            <div class="mt-2 text-muted">Loading categories...</div>
          </td>
        </tr>
      `;
      if (paginationContainer) paginationContainer.innerHTML = "";
    
      try {
        const response = await fetch(`${APP_URL}/api/categories?page=${page}&search=${encodeURIComponent(search)}`);
        const data = await response.json();
        renderCategories(data.data);
        renderPagination(data);
      } catch (error) {
        console.error('Error fetching categories:', error);
        tableBody.innerHTML = `
          <tr>
            <td colspan="3" class="text-center text-danger py-4">
              Failed to load categories.
            </td>
          </tr>
        `;
      }
    }
    
    // =========================
    // 🔹 RENDER Categories
    // =========================
    function renderCategories(categories = []) {
      const tableBody = document.getElementById('serviceTableBody');
      tableBody.innerHTML = '';
    
      if (!categories.length) {
        tableBody.innerHTML = `
          <tr>
            <td colspan="3" class="text-center py-4 text-muted">No categories found.</td>
          </tr>
        `;
        return;
      }
    
      categories.forEach(cat => {
        const imgUrl = cat.image
          ? `${APP_URL}/${cat.image.replace(/^\/+/, '')}`
          : `${APP_URL}/default-service.jpg`;
    
        const tr = document.createElement('tr');
        tr.innerHTML = `
          <td><img src="${imgUrl}" alt="${escapeHtml(cat.name)}" class="img-fluid rounded" style="width:80px;height:60px;object-fit:cover;"></td>
          <td class="fw-semibold fs-5">${escapeHtml(cat.name)}</td>
          <td class="text-end fs-5">
            <div class="d-inline-flex gap-2">
              <button type="button" class="btn btn-light btn-sm border btn-edit" data-id="${cat.id}">
                <i class="bi bi-pencil me-1"></i> Edit
              </button>
              <button type="button" class="btn btn-danger btn-sm btn-delete" data-id="${cat.id}">
                <i class="bi bi-trash me-1"></i> Delete
              </button>
            </div>
          </td>
        `;
        tableBody.appendChild(tr);
      });
    
      // Attach Edit & Delete event handlers
      document.querySelectorAll('.btn-edit').forEach(btn => {
        btn.addEventListener('click', () => {
          const id = btn.dataset.id;
          window.location.href = `${APP_URL}/admin/category/edit/${id}`;
        });
      });
    
      document.querySelectorAll('.btn-delete').forEach(btn => {
        btn.addEventListener('click', async () => {
          const id = btn.dataset.id;
          Swal.fire({
            title: 'Are you sure?',
            text: "This will permanently delete the Category.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then(async (result) => {
            if (result.isConfirmed) {
              try {
                const resp = await fetch(`${APP_URL}/api/categories/${id}`, {
                  method: 'DELETE',
                  headers: { 'Content-Type': 'application/json' }
                });
                if (!resp.ok) throw new Error('Delete failed');
                toastMagic.success("Deleted!", "Category deleted successfully.");
                loadCategory(currentPage, currentSearch);
              } catch (err) {
                toastMagic.error("Error!", "Failed to delete Category.");
              }
            }
          });
        });
      });
    }
    
    // =========================
    // 🔹 PAGINATION
    // =========================
    function renderPagination(data) {
      const paginationContainer = document.getElementById('servicePaginationContainer');
      if (!paginationContainer) return;
      paginationContainer.innerHTML = '';
    
      if (data.last_page <= 1) return;
    
      const pagination = document.createElement('ul');
      pagination.className = 'pagination justify-content-center my-4';
    
      pagination.innerHTML += `
        <li class="page-item ${data.current_page === 1 ? 'disabled' : ''}">
          <a class="page-link" href="#" data-page="${data.current_page - 1}">Previous</a>
        </li>
      `;
    
      for (let i = 1; i <= data.last_page; i++) {
        pagination.innerHTML += `
          <li class="page-item ${data.current_page === i ? 'active' : ''}">
            <a class="page-link" href="#" data-page="${i}">${i}</a>
          </li>
        `;
      }
    
      pagination.innerHTML += `
        <li class="page-item ${data.current_page === data.last_page ? 'disabled' : ''}">
          <a class="page-link" href="#" data-page="${data.current_page + 1}">Next</a>
        </li>
      `;
    
      paginationContainer.appendChild(pagination);
    
      pagination.querySelectorAll('a.page-link').forEach(link => {
        link.addEventListener('click', e => {
          e.preventDefault();
          const page = parseInt(link.dataset.page);
          if (page >= 1 && page <= data.last_page) {
            currentPage = page;
            loadCategory(currentPage, currentSearch);
          }
        });
      });
    }
    
    // =========================
    // 🔹 HELPERS
    // =========================
    function escapeHtml(str) {
      if (!str && str !== 0) return '';
      return String(str)
        .replaceAll('&', '&amp;')
        .replaceAll('<', '&lt;')
        .replaceAll('>', '&gt;')
        .replaceAll('"', '&quot;')
        .replaceAll("'", '&#39;');
    }
    
    // =========================
    // 🔹 SEARCH EVENT
    // =========================
    document.addEventListener('DOMContentLoaded', () => {
      const searchInput = document.querySelector('.search-service');
      if (searchInput) {
        searchInput.addEventListener('input', e => {
          currentSearch = e.target.value.trim();
          currentPage = 1;
          loadCategory(currentPage, currentSearch);
        });
      }
    
      loadCategory(); // initial load
    });
    </script>
    
    
  

  {!! ToastMagic::scripts() !!}
</body>
</html>
