<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>
  <meta charset="utf-8">
  <title>Contact Us Messages | Admin Dashboard</title>
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

       @include('admin.components.header')
        <!-- MAIN -->
        <main id="main">
         
                <section class="profile-dashboard">

                    <!-- PAGE HEADER -->
                    <div class="inner-header mb-40 d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="title">Contact Messages</h3>
                            <p class="des">View, read and manage contact form submissions.</p>
                        </div>
                    </div>

                    <!-- SEARCH + TABLE -->
                    <div class="widget-dash-board">

                        <!-- SEARCH BAR -->
                        <div class="d-flex justify-content-between mr-2 align-items-center mb-4">
                            <div class="search-wrap w-75">
                                <input type="text" class="search-contact" placeholder="Search by Name, Email or Message...">
                                <i class="icon-search"></i>
                            </div>
                        </div>

                        <!-- CONTACT TABLE -->
                        <div class="my-4">

                            <div id="contactTableWrapper" class="d-none d-md-block">
                                <div class="table-responsive shadow-sm rounded">
                                    <table class="table vehicle-table table-hover align-middle mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">Name</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Message</th>
                                                <th scope="col">Received</th>
                                                <th scope="col" class="text-end">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="contactTableBody">
                                            <!-- Auto Inject -->
                                        </tbody>
                                    </table>

                                    <div id="contactPaginationContainer"></div>
                                </div>
                            </div>

                            <!-- MOBILE CARDS -->
                            <div id="contactCardWrapper" class="d-block d-md-none">
                                <div id="contactCardList" class="row g-3"></div>
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
    <script src="/app/js/admin-auth-guard.js"></script>
  {!! ToastMagic::scripts() !!}

 
<script>
const APP_URL = "{{ config('app.url') }}";
let contactPage = 1;
let contactSearch = "";
const toastMagic = new ToastMagic();

// LOAD CONTACTS
async function loadContacts(page = 1, search = "") {
    const tableBody = document.getElementById('contactTableBody');
    const paginationContainer = document.getElementById('contactPaginationContainer');

    tableBody.innerHTML = `<tr><td colspan="5" class="text-center py-4">Loading...</td></tr>`;
    paginationContainer.innerHTML = "";

    try {
        const res = await fetch(`${APP_URL}/api/contacts?page=${page}&search=${encodeURIComponent(search)}`);
        const data = await res.json();
        renderContacts(data.data);
        renderContactPagination(data);
    } catch (e) {
        tableBody.innerHTML = `<tr><td colspan="5" class="text-danger text-center py-4">Failed to load contacts.</td></tr>`;
    }
}


// RENDER CONTACT ROWS
function renderContacts(items = []) {
    const body = document.getElementById('contactTableBody');
    body.innerHTML = "";

    if (!items.length) {
        body.innerHTML = `<tr><td colspan="5" class="text-center text-muted py-4">No messages found.</td></tr>`;
        return;
    }

    items.forEach(msg => {
        const trimmedMessage = trimWords(msg.message, 10);
        const isNew = msg.is_new == 1 ? "fw-bold text-dark" : "";

        const tr = document.createElement("tr");
        tr.innerHTML = `
            <td class="${isNew}">${escapeHtml(msg.name)}</td>
            <td>${escapeHtml(msg.email)}</td>
            <td>${escapeHtml(trimmedMessage)}</td>
            <td>${formatDate(msg.created_at)}</td>

            <td class="text-end">
                <div class="d-inline-flex gap-2">
                    <button class="btn btn-light btn-sm border btn-view-contact" data-id="${msg.id}">
                        <i class="bi bi-eye"></i> View
                    </button>

                    <button class="btn btn-outline-danger btn-sm btn-delete-contact" data-id="${msg.id}">
                        <i class="bi bi-trash"></i> Delete
                    </button>
                </div>
            </td>
        `;

        body.appendChild(tr);
    });

    bindContactActions();
}


// BIND BUTTONS
function bindContactActions() {

    // VIEW
    document.querySelectorAll(".btn-view-contact").forEach(btn => {
        btn.addEventListener("click", async () => {
            const id = btn.dataset.id;
            const res = await fetch(`${APP_URL}/api/contacts/${id}`);
            const msg = await res.json();

            Swal.fire({
                title: `${msg.name}<br><small>${msg.email}</small>`,
                html: `<p class="mt-3">${escapeHtml(msg.message)}</p>`,
                icon: "info",
            });

            loadContacts(contactPage, contactSearch); // refresh after view (mark as read)
        });
    });

    // DELETE
    document.querySelectorAll(".btn-delete-contact").forEach(btn => {
        btn.addEventListener("click", async () => {
            const id = btn.dataset.id;

            Swal.fire({
                title: "Are you sure?",
                text: "This message will be deleted permanently.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Delete",
            }).then(async (result) => {
                if (result.isConfirmed) {
                    await fetch(`${APP_URL}/api/contacts/${id}`, { method: "DELETE" });

                    toastMagic.success("Deleted!", "Message deleted successfully.");
                    loadContacts();
                }
            });
        });
    });

}


// PAGINATION
function renderContactPagination(data) {
    const container = document.getElementById("contactPaginationContainer");
    if (data.last_page <= 1) {
        container.innerHTML = "";
        return;
    }

    let html = `<ul class="pagination justify-content-center my-4">`;

    html += `
        <li class="page-item ${data.current_page === 1 ? "disabled" : ""}">
            <a class="page-link" href="#" data-page="${data.current_page - 1}">Previous</a>
        </li>
    `;

    for (let i = 1; i <= data.last_page; i++) {
        html += `
            <li class="page-item ${data.current_page === i ? "active" : ""}">
                <a class="page-link" href="#" data-page="${i}">${i}</a>
            </li>
        `;
    }

    html += `
        <li class="page-item ${data.current_page === data.last_page ? "disabled" : ""}">
            <a class="page-link" href="#" data-page="${data.current_page + 1}">Next</a>
        </li>
    `;
    html += `</ul>`;

    container.innerHTML = html;

    container.querySelectorAll("a").forEach(a => {
        a.addEventListener("click", e => {
            e.preventDefault();
            const page = parseInt(a.dataset.page);
            if (page >= 1 && page <= data.last_page) {
                contactPage = page;
                loadContacts(page, contactSearch);
            }
        });
    });
}


// HELPER FUNCTIONS
function trimWords(str, limit) {
    if (!str) return "";
    const words = str.split(" ");
    return words.length > limit
        ? words.slice(0, limit).join(" ") + "..."
        : str;
}

function escapeHtml(str) {
    return String(str).replace(/[&<>"]/g, function (c) {
        return ({
            "&": "&amp;",
            "<": "&lt;",
            ">": "&gt;",
            '"': "&quot;"
        })[c];
    });
}

function formatDate(dt) {
    return new Date(dt).toLocaleString("en-IN");
}


// SEARCH
document.addEventListener("DOMContentLoaded", () => {
    const searchInput = document.querySelector(".search-contact");

    searchInput?.addEventListener("input", e => {
        contactSearch = e.target.value.trim();
        loadContacts(1, contactSearch);
    });

    loadContacts();
});

</script>

</body>
</html>
