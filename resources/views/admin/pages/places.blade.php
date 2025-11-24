<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>
  <meta charset="utf-8">
  <title>Places | Admin Dashboard</title>
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

<body class="body header-fixed">

  <div class="preload preload-container">
    <svg class="pl" width="240" height="240" viewBox="0 0 240 240">
      <circle class="pl__ring pl__ring--a" cx="120" cy="120" r="105" fill="none" stroke="#000" stroke-width="20"></circle>
      <circle class="pl__ring pl__ring--b" cx="120" cy="120" r="35" fill="none" stroke="#000" stroke-width="20"></circle>
      <circle class="pl__ring pl__ring--c" cx="85" cy="120" r="70" fill="none" stroke="#000" stroke-width="20"></circle>
      <circle class="pl__ring pl__ring--d" cx="155" cy="120" r="70" fill="none" stroke="#000" stroke-width="20"></circle>
    </svg>
  </div>

  <div id="wrapper">
    <div id="pagee" class="clearfix">

      @include('admin.components.sidebar')

      <div class="has-dashboard">

        @include('admin.components.header')

        <!-- MAIN -->
        <main id="main">
          <section class="profile-dashboard">

            <!-- PAGE HEADER -->
            <div class="inner-header mb-40 d-flex justify-content-between align-items-center">
              <div>
                <h3 class="title">Places</h3>
                <p class="des">Manage your listed places easily.</p>
              </div>
              <button id="addPlaceBtn" class="btn-main-small">+ Add Place</button>
            </div>

            <!-- SEARCH + TABLE -->
            <div class="widget-dash-board">
              <!-- SEARCH BAR -->
              <div class="d-flex justify-content-between mr-2 align-items-center mb-4">
                <div class="search-wrap w-75">
                  <input type="text" class="search-place" placeholder="Search place by name...">
                  <i class="icon-search"></i>
                </div>
              </div>

              <!-- PLACES TABLE -->
              <div class="my-4">
                <div id="placeTableWrapper">
                  <div class="table-responsive shadow-sm rounded">
                    <table class="table vehicle-table table-hover align-middle mb-0">
                      <thead>
                        <tr>
                          <th scope="col" style="width:80px;">#ID</th>
                          <th scope="col">Place Name</th>
                          <th scope="col" class="text-end">Action</th>
                        </tr>
                      </thead>
                      <tbody id="placeTableBody">
                        <tr><td colspan="3" class="text-center py-5">Loading...</td></tr>
                      </tbody>
                    </table>
                  </div>
                  <div id="paginationContainer" class="mt-4"></div>
                </div>
              </div>
            </div>

          </section>
        </main>

        <footer class="footer footer-dashboard">
          <div class="tf-container full">
            <div class="row">
              <div class="col-lg-6">
                <p class="text-white">Made with ❤️ by Gashwa Technologies.</p>
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
    const APP_URL = "{{ config('app.url') }}".replace(/\/+$/, ''); // trim trailing slash
    $(document).ready(function () {
        const toastMagic = new ToastMagic();

    });
    let currentPage = 1;
    let currentSearch = "";
  
    async function loadPlaces(page = 1, search = "") {
      const body = document.getElementById('placeTableBody');
      const paginationContainer = document.getElementById('paginationContainer');
  
      body.innerHTML = `<tr><td colspan="3" class="text-center py-5">Loading...</td></tr>`;
      if (paginationContainer) paginationContainer.innerHTML = "";
  
      try {
        const url = `${APP_URL}/api/place?page=${page}&search=${encodeURIComponent(search)}`;
        console.log('Fetching:', url);
        const resp = await fetch(url, { headers: { 'Accept': 'application/json' } });
        console.log('Response status:', resp.status, resp.statusText);
  
        // Try parse JSON
        const data = await resp.json();
        console.log('Response JSON:', data);
  
        // Accept either paginated object or plain array
        let placesArray = [];
        let pagination = null;
  
        if (Array.isArray(data)) {
          placesArray = data;
          pagination = { current_page: 1, last_page: 1 };
        } else if (data && Array.isArray(data.data)) {
          placesArray = data.data;
          pagination = {
            current_page: data.current_page ?? 1,
            last_page: data.last_page ?? 1,
          };
        } else {
          // Unexpected shape — show helpful error in UI and console
          console.error('Unexpected API response shape for /api/place:', data);
          body.innerHTML = `<tr><td colspan="3" class="text-center text-danger">Unexpected API response. Check console (F12).</td></tr>`;
          return;
        }
  
        renderPlaces(placesArray);
        renderPagination({ current_page: pagination.current_page, last_page: pagination.last_page });
      } catch (err) {
        console.error('Error in loadPlaces:', err);
        body.innerHTML = `<tr><td colspan="3" class="text-center text-danger">Failed to load places (see console)</td></tr>`;
      }
    }
  
    function renderPlaces(places = []) {
      const body = document.getElementById('placeTableBody');
      body.innerHTML = '';
  
      if (!places.length) {
        body.innerHTML = `<tr><td colspan="3" class="text-center py-4 text-muted">No places found.</td></tr>`;
        return;
      }
  
      places.forEach(place => {
        const tr = document.createElement('tr');
        tr.innerHTML = `
          <td>${place.id}</td>
          <td class="fw-semibold text-dark">${escapeHtml(place.name)}</td>
          <td class="text-end">
            <div class="d-inline-flex gap-2">
              <button class="btn btn-sm btn-outline-primary btn-edit" data-id="${place.id}" data-name="${escapeHtml(place.name)}">Edit</button>
              <button class="btn btn-sm btn-outline-danger btn-delete" data-id="${place.id}">Delete</button>
            </div>
          </td>
        `;
        body.appendChild(tr);
      });
  
      bindPlaceActions();
    }
  
    function bindPlaceActions() {
      document.querySelectorAll('.btn-edit').forEach(btn => {
        btn.removeEventListener('click', editClickHandler); // safe remove (if existed)
        btn.addEventListener('click', editClickHandler);
      });
  
      document.querySelectorAll('.btn-delete').forEach(btn => {
        btn.removeEventListener('click', deleteClickHandler);
        btn.addEventListener('click', deleteClickHandler);
      });
    }
  
    async function editClickHandler(e) {
      const btn = e.currentTarget;
      const id = btn.dataset.id;
      const name = btn.dataset.name || '';
  
      const result = await Swal.fire({
        title: 'Edit Place',
        input: 'text',
        inputValue: name,
        showCancelButton: true,
        confirmButtonText: 'Update',
        preConfirm: (value) => {
          if (!value || !value.trim()) {
            Swal.showValidationMessage('Place name is required');
          }
          return value.trim();
        }
      });
  
      if (result.isConfirmed) {
        try {
          const res = await fetch(`${APP_URL}/api/place/${id}`, {
            method: 'PUT',
            headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
            body: JSON.stringify({ name: result.value })
          });
          if (!res.ok) throw new Error('Update failed');
          toastMagic.success('Updated', 'Place updated successfully!');
          setTimeout(() => loadPlaces(currentPage, currentSearch), 400);

        } catch (err) {
          console.error(err);
          toastMagic.error('Error', 'Failed to update place');
        }
      }
    }
  
    async function deleteClickHandler(e) {
      const id = e.currentTarget.dataset.id;
      const confirmed = await Swal.fire({
        title: 'Are you sure?',
        text: 'This place will be deleted permanently.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!'
      });
  
      if (confirmed.isConfirmed) {
        try {
          const res = await fetch(`${APP_URL}/api/place/${id}`, { method: 'DELETE' });
          if (!res.ok) throw new Error('Delete failed');
          toastMagic.success('Deleted', 'Place deleted');
          setTimeout(() => loadPlaces(currentPage, currentSearch), 400);

        } catch (err) {
          console.error(err);
          toastMagic.error('Error', 'Failed to delete place');
        }
      }
    }
  
    function renderPagination(data) {
      const container = document.getElementById('paginationContainer');
      if (!container) return;
      container.innerHTML = '';
      if (!data || data.last_page <= 1) return;
  
      let html = `<ul class="pagination justify-content-center my-4">`;
      html += `<li class="page-item ${data.current_page === 1 ? 'disabled' : ''}">
        <a class="page-link" href="#" data-page="${data.current_page - 1}">Previous</a></li>`;
      for (let i = 1; i <= data.last_page; i++) {
        html += `<li class="page-item ${data.current_page === i ? 'active' : ''}">
          <a class="page-link" href="#" data-page="${i}">${i}</a></li>`;
      }
      html += `<li class="page-item ${data.current_page === data.last_page ? 'disabled' : ''}">
        <a class="page-link" href="#" data-page="${data.current_page + 1}">Next</a></li></ul>`;
  
      container.innerHTML = html;
  
      container.querySelectorAll('a.page-link').forEach(link => {
        link.addEventListener('click', (e) => {
          e.preventDefault();
          const page = parseInt(link.dataset.page);
          if (page >= 1) {
            currentPage = page;
            setTimeout(() => loadPlaces(currentPage, currentSearch), 400);

          }
        });
      });
    }
  
    document.addEventListener('DOMContentLoaded', () => {
      const searchInput = document.querySelector('.search-place');
      if (searchInput) {
        searchInput.addEventListener('input', (e) => {
          currentSearch = e.target.value.trim();
          currentPage = 1;
        loadPlaces(currentPage, currentSearch);

        });
      }
  
      // Add Place (Swal modal)
      const addBtn = document.getElementById('addPlaceBtn');
      if (addBtn) {
        addBtn.addEventListener('click', async () => {
          const { value: name } = await Swal.fire({
            title: 'Add New Place',
            input: 'text',
            inputPlaceholder: 'Enter place name',
            showCancelButton: true,
            preConfirm: (val) => {
              if (!val || !val.trim()) Swal.showValidationMessage('Place name is required');
              return val && val.trim();
            }
          });
  
          if (name) {
            try {
              const res = await fetch(`${APP_URL}/api/place`, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ name })
              });
              if (!res.ok) throw new Error('Add failed');
              toastMagic.success('Added', 'Place added successfully!');
              loadPlaces(currentPage,currentSearch);
            } catch (err) {
              console.error(err);
              toastMagic.error('Error', 'Failed to add place');
            }
          }
        });
      }
  
      loadPlaces(currentPage,currentSearch);

    });
  
    function escapeHtml(str) {
      if (!str) return '';
      return String(str).replaceAll('&', '&amp;')
                        .replaceAll('<', '&lt;')
                        .replaceAll('>', '&gt;')
                        .replaceAll('"', '&quot;')
                        .replaceAll("'", '&#39;');
    }
  </script>
  

  {!! ToastMagic::scripts() !!}
</body>
</html>
