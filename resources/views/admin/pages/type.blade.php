<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>
    <meta charset="utf-8">
    <title>Dream Ride - Travel & Tour Booking HTML Template</title>

    <meta name="author" content="themesflat.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="/app/css/app.css">
    <link rel="stylesheet" href="/app/css/map.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="/assets/images/dreamridelogo.webp">
    <link rel="apple-touch-icon-precomposed" href="/assets/images/dreamridelogo.webp">
   
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

            @include('admin.components.sidebar')
            

            <div class="has-dashboard">
                <!-- Main Header -->
                      @include('admin.components.header')

                <!-- End Main Header -->
                <main id="main">
                    <section class="profile-dashboard">

                        <!-- PAGE HEADER -->
                        <div class="inner-header mb-40 d-flex justify-content-between align-items-center">
                            <div>
                                <h3 class="title">Type</h3>
                                <p class="des">Manage your listed type of tour and make changes easily</p>
                            </div>
                        </div>
                    
                        <!-- SEARCH + TABLE -->
                        <div class="widget-dash-board">
                            <!-- SEARCH BAR -->
                            <div class="d-flex  justify-content-between mr-2 align-items-center mb-4">
                                <div class="search-wrap  w-75">
                                    <input type="text" class="search-input" placeholder="Search Type...">
                                    <i class="icon-search"></i>
                                </div>
                                <button class="btn-main-small">
                                    <a href="{{ route('admin.type.create') }}">+ Add Type</a>
                                </button>
                                
                            </div>
                    
                            <!-- VEHICLE TABLE -->
                           <div class=" my-4">

  <!-- TABLE: visible on md and up -->
  <div id="vehicleTableWrapper" class="d-none d-md-block">
    <div class="table-responsive shadow-sm rounded">
      <table class="table vehicle-table table-hover align-middle mb-0">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Color</th>
            <th scope="col" class="text-end">Action</th>
          </tr>
        </thead>
        <tbody id="vehicleTableBody">
          <!-- JS will inject rows here -->
        </tbody>
      </table>
      <div id="paginationContainer"></div>
<div id="vehicleCardList" class="row d-md-none"></div>


    </div>
  </div>

  <!-- CARDS: visible on small screens only -->
  <div id="vehicleCardWrapper" class="d-block d-md-none">
    <div id="vehicleCardList" class="row g-3">
      <!-- JS will inject cards here -->
    </div>
  </div>
</div>
                            
                        </div>
                    
                    </section>
                    
                </main>

                  @include('admin.components.footer')


                <!-- Bottom -->
            </div>

        </div>
        <!-- /#page -->
    </div>

    <!-- Modal Popup Bid -->

    <a id="scroll-top" class="button-go"></a>

   

    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasRightLabel">Offcanvas right</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            
        </div>
    </div>

    <!-- Javascript -->
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
    <script src="/app/js/admin-auth-guard.js"></script>
    <script src="/app/js/main.js"></script>
  {!! ToastMagic::scripts() !!}
    
    <script>
        const APP_URL = "{{ config('app.url') }}"; // Example: http://localhost:8000
        let currentPage = 1;
        let currentSearch = "";
        
        // =========================
        // 🔹 LOAD TYPES
        // =========================
        async function loadTypes(page = 1, search = "") {
          const tableBody = document.getElementById('vehicleTableBody');
          const cardList = document.getElementById('vehicleCardList');
          const paginationContainer = document.getElementById('paginationContainer');
        
          // Show loader while fetching
          tableBody.innerHTML = `
            <tr>
              <td colspan="3" class="text-center py-5">
                <div class="spinner-border text-warning" role="status"></div>
                <div class="mt-2 text-muted">Loading types...</div>
              </td>
            </tr>
          `;
          cardList.innerHTML = "";
          if (paginationContainer) paginationContainer.innerHTML = "";
        
          try {
            const response = await fetch(`${APP_URL}/api/type?page=${page}&search=${encodeURIComponent(search)}`);
            const data = await response.json();
        
            renderTypes(data.data);
            renderPagination(data);
          } catch (error) {
            console.error('Error fetching types:', error);
            tableBody.innerHTML = `
              <tr>
                <td colspan="3" class="text-center text-danger py-4">
                  Failed to load types.
                </td>
              </tr>
            `;
          }
        }
        
        // =========================
        // 🔹 RENDER TYPES
        // =========================
        function renderTypes(types = []) {
          const tableBody = document.getElementById('vehicleTableBody');
          const cardList = document.getElementById('vehicleCardList');
        
          tableBody.innerHTML = '';
          cardList.innerHTML = '';
        
          if (!types.length) {
            tableBody.innerHTML = `
              <tr>
                <td colspan="3" class="text-center py-4 text-muted">No types found.</td>
              </tr>
            `;
            cardList.innerHTML = `<div class="col-12 text-center text-muted">No types found.</div>`;
            return;
          }
        
          types.forEach(type => {
            const tr = document.createElement('tr');
            tr.innerHTML = `
              <td class="fw-semibold fs-5">${escapeHtml(type.name)}</td>
              <td class="fs-5"><span class="badge" style="background:${type.color || '#777'}">${type.color || '—'}</span></td>
              <td class="text-end fs-5">
                <div class="d-inline-flex gap-2">
                  <button type="button" class="btn btn-light btn-sm border btn-edit fs-6" data-id="${type.id}">
                    <i class="bi bi-pencil me-1"></i> Edit
                  </button>
                  <button type="button" class="btn btn-danger btn-sm btn-delete fs-6" data-id="${type.id}">
                    <i class="bi bi-trash me-1"></i> Delete
                  </button>
                </div>
              </td>
            `;
            tableBody.appendChild(tr);
        
            // MOBILE CARD
            const col = document.createElement('div');
            col.className = 'col-12';
            col.innerHTML = `
              <div class="card shadow-sm">
                <div class="card-body py-3">
                  <h6 class="fw-semibold text-dark mb-1">${escapeHtml(type.name)}</h6>
                  <p class="mb-2 small text-muted"><strong>Color:</strong> <span class="badge" style="background:${type.color || '#777'}">${type.color || '—'}</span></p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="d-inline-flex gap-2">
                      <button type="button" class="btn btn-light btn-sm border btn-edit" data-id="${type.id}">
                        <i class="fa-regular fa-pen-to-square"></i> Edit
                      </button>
                      <button type="button" class="btn btn-outline-danger btn-sm btn-delete fw-semibold" data-id="${type.id}">
                        <i class="fa-solid fa-trash"></i> Delete
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            `;
            cardList.appendChild(col);
          });
        
          // Attach Edit & Delete event handlers
          document.querySelectorAll('.btn-edit').forEach(btn => {
            btn.addEventListener('click', () => {
              const id = btn.dataset.id;
              window.location.href = `${APP_URL}/admin/type/edit/${id}`;
            });
          });
        
          document.querySelectorAll('.btn-delete').forEach(btn => {
            btn.addEventListener('click', async () => {
              const id = btn.dataset.id;
              Swal.fire({
                title: 'Are you sure?',
                text: "This will permanently delete the type.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
              }).then(async (result) => {
                if (result.isConfirmed) {
                  try {
                    const resp = await fetch(`${APP_URL}/api/type/${id}`, {
                      method: 'DELETE',
                      headers: { 'Content-Type': 'application/json' }
                    });
                    if (!resp.ok) throw new Error('Delete failed');
                    toastMagic.success("Deleted!", "Type deleted successfully.");
                    loadTypes(currentPage, currentSearch);
                  } catch (err) {
                    toastMagic.error("Error!", "Failed to delete type.");
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
          const paginationContainer = document.getElementById('paginationContainer');
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
                loadTypes(currentPage, currentSearch);
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
          const searchInput = document.querySelector('.search-input');
          if (searchInput) {
            searchInput.addEventListener('input', e => {
              currentSearch = e.target.value.trim();
              currentPage = 1;
              loadTypes(currentPage, currentSearch);
            });
          }
        
          loadTypes(); // initial load
        });
        </script>        
      
    
</body>

</html>
