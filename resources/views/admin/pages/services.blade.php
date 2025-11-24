<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>
  <meta charset="utf-8">
  <title>Services | Admin Dashboard</title>
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
                                            <input type="search" placeholder="Search tours">
                                        </form>

                                    </div>

                                    <div class="nav-outer flex align-center">
                                        <!-- Main Menu -->
                                        <nav class="main-menu show navbar-expand-md">
                                            <div class="navbar-collapse collapse clearfix"
                                                id="navbarSupportedContent">
                                                <ul class="navigation clearfix">
                                                    <li class="dropdown2">
                                                        <a href="#">Home</a>
                                                        <ul>
                                                            <li><a href="index.html">Home Page 01</a></li>
                                                            <li><a href="home2.html">Home Page 02</a></li>
                                                            <li><a href="home3.html">Home Page 03</a></li>
                                                            <li><a href="home4.html">Home Page 04</a></li>
                                                            <li><a href="home5.html">Home Page 05</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="dropdown2">
                                                        <a href="#">Tour</a>
                                                        <ul>
                                                            <li><a href="archieve-tour.html">Archieve tour</a>

                                                            </li>
                                                            <li><a href="tour-package-v2.html">Tour left
                                                                    sidebar</a>

                                                            </li>
                                                            <li><a href="tour-package-v4.html">Tour package </a>

                                                            </li>
                                                            <li><a href="tour-single.html">Tour Single </a>

                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="dropdown2"><a href="#">Destination</a>
                                                        <ul>
                                                            <li><a href="tour-destination-v1.html">Destination
                                                                    V1</a></li>
                                                            <li><a href="tour-destination-v2.html">Destination
                                                                    V2</a></li>
                                                            <li><a href="tour-destination-v3.html">Destination
                                                                    V3</a></li>
                                                            <li><a href="single-destination.html">Destination
                                                                    Single</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="dropdown2 "><a href="#">Blog</a>
                                                        <ul>
                                                            <li><a href="blog.html">Blog</a></li>
                                                            <li><a href="blog-details.html">Blog Detail</a></li>
                                                        </ul>
                                                    </li>

                                                    <li class="dropdown2"><a href="#">Pages</a>
                                                        <ul>
                                                            <li><a href="about-us.html">About Us</a></li>
                                                            <li><a href="team.html">Team member</a></li>
                                                            <li><a href="gallery.html">Gallery</a></li>
                                                            <li><a href="terms-condition.html">Terms &
                                                                    Condition</a></li>
                                                            <li><a href="help-center.html">Help center</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="dropdown2 current"><a href="#">Dashboard</a>
                                                        <ul>
                                                            <li><a href="dashboard.html">Dashboard </a></li>
                                                            <li><a href="my-booking.html">My booking</a></li>
                                                            <li><a href="my-listing.html">My Listing</a></li>
                                                            <li class="current"><a href="add-tour.html">Add
                                                                    Tour</a></li>
                                                            <li><a href="my-favorite.html">My Favorites</a></li>
                                                            <li><a href="my-profile.html">My profile</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="contact-us.html">Contact</a></li>
                                                </ul>
                                            </div>
                                        </nav>
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
                <h3 class="title">Services</h3>
                <p class="des">Manage your listed services and make updates easily.</p>
              </div>
              <button class="btn-main-small">
                <a href="{{ route('admin.services.create') }}">+ Add Service</a>
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
    const APP_URL = "{{ config('app.url') }}";
    let currentPage = 1;
    let currentSearch = "";
    const toastMagic = new ToastMagic();

    // =========================
    // 🔹 LOAD SERVICES
    // =========================
    async function loadServices(page = 1, search = "") {
      const tableBody = document.getElementById('serviceTableBody');
      const paginationContainer = document.getElementById('servicePaginationContainer');

      tableBody.innerHTML = `<tr><td colspan="5" class="text-center py-5">Loading...</td></tr>`;
      paginationContainer.innerHTML = "";

      try {
        const response = await fetch(`${APP_URL}/api/service?page=${page}&search=${encodeURIComponent(search)}`);
        const data = await response.json();
        renderServices(data.data);
        renderServicePagination(data);
      } catch (error) {
        console.error('Error fetching services:', error);
        tableBody.innerHTML = `<tr><td colspan="5" class="text-center text-danger py-4">Failed to load services.</td></tr>`;
      }
    }

    // =========================
    // 🔹 RENDER SERVICES
    // =========================
    function renderServices(services = []) {
      const body = document.getElementById('serviceTableBody');
      body.innerHTML = '';

      if (!services.length) {
        body.innerHTML = `<tr><td colspan="5" class="text-center py-4 text-muted">No services found.</td></tr>`;
        return;
      }

      services.forEach(service => {
        const imageUrl = service.image 
            ? `${APP_URL}/${service.image.replace(/^\/+/, '')}` 
            : `${APP_URL}/default-service.jpg`;

        const tr = document.createElement('tr');
        tr.innerHTML = `
          <td><img src="${imageUrl}" alt="${escapeHtml(service.name)}" class="img-fluid rounded" style="width:80px;height:60px;object-fit:cover;"></td>
          <td class="fw-medium text-dark">${escapeHtml(service.name)}</td>
          <td>₹${escapeHtml(service.price)}</td>
          <td class="text-truncate" style="max-width:250px;">${escapeHtml(service.description || '—')}</td>
          <td class="text-end">
            <div class="d-inline-flex gap-2">
              <button class="btn btn-light btn-sm border btn-view-service" data-id="${service.id}">
                <i class="bi bi-eye me-1"></i> View
              </button>
              <button class="btn btn-outline-primary btn-sm btn-edit-service" data-id="${service.id}">
                <i class="bi bi-pencil me-1"></i> Edit
              </button>
              <button class="btn btn-outline-danger btn-sm btn-delete-service" data-id="${service.id}">
                <i class="bi bi-trash me-1"></i> Delete
              </button>
            </div>
          </td>
        `;
        body.appendChild(tr);
      });

      // Bind buttons
      bindServiceActions();
    }

    // =========================
    // 🔹 BUTTON HANDLERS
    // =========================
    function bindServiceActions() {
      document.querySelectorAll('.btn-edit-service').forEach(btn => {
        btn.addEventListener('click', () => {
          const id = btn.dataset.id;
          window.location.href = `${APP_URL}/admin/service/edit/${id}`;
        });
      });

      document.querySelectorAll('.btn-view-service').forEach(btn => {
        btn.addEventListener('click', async () => {
          const id = btn.dataset.id;
          const res = await fetch(`${APP_URL}/api/service/${id}`);
          const data = await res.json();
          Swal.fire({
            title: data.name,
            html: `<p><strong>Price:</strong> ₹${data.price}</p><p>${escapeHtml(data.description || 'No description')}</p>`,
            imageUrl: data.image ? `${APP_URL}/${data.image.replace(/^\/+/, '')}` : `${APP_URL}/default-service.jpg`,
            imageWidth: 300,
            imageHeight: 200,
          });
        });
      });

      document.querySelectorAll('.btn-delete-service').forEach(btn => {
        btn.addEventListener('click', async () => {
          const id = btn.dataset.id;
          Swal.fire({
            title: 'Are you sure?',
            text: 'This will delete the service permanently.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!'
          }).then(async (result) => {
            if (result.isConfirmed) {
              await fetch(`${APP_URL}/api/service/${id}`, { method: 'DELETE' });
              toastMagic.success('Deleted!', 'Service deleted successfully.');
              loadServices();
            }
          });
        });
      });
    }

    // =========================
    // 🔹 PAGINATION
    // =========================
    function renderServicePagination(data) {
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
          if (page >= 1 && page <= data.last_page) loadServices(page, currentSearch);
        });
      });
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

    // =========================
    // 🔹 SEARCH HANDLER
    // =========================
    document.addEventListener('DOMContentLoaded', () => {
      const searchInput = document.querySelector('.search-service');
      if (searchInput) {
        searchInput.addEventListener('input', e => {
          currentSearch = e.target.value.trim();
          loadServices(1, currentSearch);
        });
      }
      loadServices();
    });
  </script>

  {!! ToastMagic::scripts() !!}
</body>
</html>
