<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>
    <meta charset="utf-8">
    <title>Dream Ride - Travel & Tour Booking </title>

    <meta name="author" content="themesflat.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="/app/css/app.css">
    <link rel="stylesheet" href="/app/css/map.min.css">
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"> --}}

    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="/assets/images/dreamridelogo.webp">
    <link rel="apple-touch-icon-precomposed" href="/assets/images/dreamridelogo.webp">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .swal-container-custom{
            padding: 50px !important;
        }
.custom-row-wrap {
    margin-bottom: 12px;
    text-align: left;
    padding: 20px
}

.custom-label {
    font-weight: 600;
    font-size: 14px;
    margin-bottom: 5px;
    display: block;
}

.custom-select {
    width: 100%;
    padding: 10px 12px;
    border-radius: 6px;
    border: 1px solid #ccc;
    font-size: 14px;
    outline: none;
    transition: 0.2s;
    background-color: #fff;
}

.custom-select:focus {
    border-color: #007bff;
    box-shadow: 0 0 3px rgba(0, 123, 255, 0.3);
}

.swal2-popup {
    width: 100% !important;
    max-width: 100% !important;
    height: 100vh !important;
    margin: 0 !important;
    border-radius: 0 !important;
    padding: 40px !important;
}

.swal2-container {
    padding: 0 !important;
}

.service-card {
    border: 1px solid #ddd;
    border-radius: 10px;
    padding: 12px;
    cursor: pointer;
    margin-bottom: 10px;
    transition: 0.2s;
}
.service-card.active {
    border-color: #007bff;
    background: #eef5ff;
}
.service-card img {
    width: 60px;
    height: 60px;
    object-fit: cover;
    border-radius: 6px;
}
</style>

</head>

<body class="body header-fixed">

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
                <!-- End Main Header -->
                <main id="main">
                    <section class="profile-dashboard">
                        <div class="inner-header mb-40">
                            <h3 class="title">Bookings</h3>
                        </div>
                        <div class="my-booking-wrap ">
                            <div class="d-flex justify-content-between mb-3">
                    <input type="text" id="searchBox" class="form-control" placeholder="Search booking..." style="width:250px">
                    
                    <button id="addBookingBtn" class="btn btn-primary">
                        + Add Booking
                    </button>
                </div>
                            <ul class="booking-table-title flex-three">
                                <li>
                                    <p>Description</p>
                                </li>
                                <li>
                                    <p>Status</p>
                                </li>
                                <li>
                                    <p>Date</p>
                                </li>
                                <li>
                                    <p>Riders</p>
                                </li>
                                 <li>
                                    <p>Amount</p>
                                </li>
                                 <li>
                                    <p>Payment Status</p>
                                </li>
                                <li>
                                    <p>Services</p>
                                </li>
                                <li>
                                    <p>Action</p>
                                </li>
                            </ul>
                            <ul class="booking-table-content mb-60" id="enquiryList"></ul>

                            <div class="row">
                                <div class="col-md-12 ">
                                 <ul class="tf-pagination flex-five" id="pagination"></ul>


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

    <!-- Modal search-->
    <div class="modal search-mobie fade" id="exampleModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body">
                    <form action="/" class="search-form-mobie"> 
                        @csrf
                        <div class="search">
                            <i class="icon-circle2017"></i>
                            <input type="search" placeholder="Search Travel" class="search-input" autocomplete="off">
                            <button type="button">Search</button>
                        </div>
                    </form>

                </div>
            </div>
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
    <script src="/app/js/admin-auth-guard.js"></script>

    <script src="/app/js/auth-validator.js"></script>   <script src="/app/js/main.js"></script>
<script>
let packages = [];
let services = [];

$(document).ready(function () {

    loadPackages();
    loadServices();
    loadBookings(1);

    $("#searchBox").on("keyup", function () {
        loadBookings(1);
    });

    $("#addBookingBtn").on("click", function () {
        openAddBookingPopup();
    });
});

// ---------------------------
// LOAD PACKAGES
// ---------------------------
function loadPackages() {
    fetch('/api/packages/get-packages')
        .then(r => r.json())
        .then(res => {
            packages = res.data;
        });
}

// ---------------------------
// LOAD SERVICES
// ---------------------------
function loadServices() {
    fetch('/api/get-service')
        .then(r => r.json())
        .then(res => {
            services = res.data;
        });
}

// ---------------------------
// LOAD BOOKINGS
// ---------------------------
function loadBookings(page = 1) {
    let search = $("#searchBox").val() || "";

    fetch(`/api/bookings?page=${page}&search=${search}`)
        .then(res => res.json())
        .then(response => {

            const list = $("#enquiryList");
            list.html("");

            if (response.data.length === 0) {
                list.html(`
                    <li class="text-center py-4">
                        <h5 class="text-muted">No bookings found</h5>
                    </li>
                `);
                return;
            }

            response.data.forEach(row => {
                let servicesList = row.services?.length
                    ? row.services.map(s => `${s.name} (₹${s.price})`).join(", ")
                    : "No services";

               
                list.append(`
                    <li class="flex-three">

                        <div class="booking-list flex-three">
                            <div class="content">
                                <p class="id">ID: #${row.id}</p>
                                <h6 class="title-booking">Package: ${row.package_id}</h6>
                                <p class="price">Name: ${row.user_name} | Phone: ${row.user_phone}</p>
                            </div>
                        </div>

                        <div class="booking-list-table">
                            <p class="status">${row.payment_status}</p>
                        </div>

                        <div class="booking-list-table">
                            <p class="date-gues">${row.date}</p>
                        </div>

                        <div class="booking-list-table">
                            <p class="date-gues">${row.no_of_riders} Riders</p>
                        </div>

                        <div class="booking-list-table">
                            <p class="date-gues">₹${row.amount}</p>
                        </div>

                        <div class="booking-list-table">
                            <p class="date-gues">${row.payment_status}</p>
                        </div>

                        <div class="booking-list-table">
                            <p class="date-gues">${servicesList}</p>
                        </div>

                        <div class="flex-five action-wrap">
                            <a href="/admin/forms/bookings/${row.id}" class="action flex-five">
                                <i class="icon-Vector-51"></i>
                            </a>
                            <div class="action flex-five" onclick="deleteBooking(${row.id})">
                                <i class="icon-Vector-17"></i>
                            </div>
                        </div>

                    </li>
                `);
            });

            renderPagination(response.current_page, response.last_page);
        });
}

// ---------------------------
// PAGINATION
// ---------------------------
function renderPagination(current, last) {
    const pagination = $("#pagination");
    pagination.html("");

    if (current > 1) {
        pagination.append(`<li><a class="pages-link" href="#" data-page="${current - 1}">
                <i class="icon-29"></i></a>
        </li>`);
    }

    for (let i = 1; i <= last; i++) {
        pagination.append(`
            <li class="pages-item ${current === i ? 'active' : ''}">
                <a class="pages-link" href="#" data-page="${i}">${i}</a>
            </li>
        `);
    }

    if (current < last) {
        pagination.append(`<li><a class="pages-link" href="#" data-page="${current + 1}">
                <i class="icon--1"></i></a>
        </li>`);
    }

    $("#pagination a").on("click", function (e) {
        e.preventDefault();
        loadBookings($(this).data("page"));
    });
}

// ---------------------------
// ADD BOOKING POPUP
// ---------------------------
function openAddBookingPopup() {

    let packageOptions = packages.map(p =>
        `<option value="${p.id}">${p.title}</option>`
    ).join("");

    let servicesHtml = services.map(s => `
        <div class="service-card" data-id="${s.id}" data-name="${s.name}" data-price="${s.price}">
            <div class="d-flex align-items-center">
                <img src="/${s.image}" />
                <div class="ms-3">
                    <h6>${s.name}</h6>
                    <p>₹${s.price}</p>
                </div>
            </div>
        </div>
    `).join("");

    Swal.fire({
        title: "Add Booking",
        width: "900px",
        html: `
        <div class="swal-container-custom"> 
             <div class="custom-row-wrap">
                <label class="custom-label">Select Package First*</label>
                 <select required id="package_id" class="swal2-input">${packageOptions}</select>
            </div>
            <input required type="date" id="date" class="swal2-input">
            <input required type="text" id="user_name" class="swal2-input" placeholder="Name">
            <input required type="text" id="user_phone" class="swal2-input" placeholder="Phone">
            <input required type="email" id="user_email" class="swal2-input" placeholder="Email">
            <input required type="number" id="no_of_riders" class="swal2-input" placeholder="Riders">
            <input required type="number" id="amount" class="swal2-input" placeholder="Amount">
            <div class="custom-row-wrap">
                <label class="custom-label">Payment Status</label>
                <select id="payment_status" class="custom-select">
                    <option value="pending">Pending</option>
                    <option value="completed">Completed</option>
                    <option value="failed">Failed</option>
                </select>
            </div>



            <h5>Select Services:</h5>
            <div id="serviceList">${servicesHtml}</div>

            <textarea required id="message" class="swal2-textarea" placeholder="Message"></textarea>
        </div>`,
        didOpen: () => {
            $(".service-card").on("click", function () {
                $(this).toggleClass("active");
            });
        },
        confirmButtonText: "Save Booking",
        showCancelButton: true,
        preConfirm: () => {
            let selectedServices = [];

            $(".service-card.active").each(function () {
                selectedServices.push({
                    id: $(this).data("id"),
                    name: $(this).data("name"),
                    price: $(this).data("price")
                });
            });

           return {
                package_id: $("#package_id").val(),
                date: $("#date").val(),
                user_name: $("#user_name").val(),
                user_phone: $("#user_phone").val(),
                user_email: $("#user_email").val(),
                no_of_riders: $("#no_of_riders").val(),
                amount: $("#amount").val(),
                payment_status: $("#payment_status").val(),
                message: $("#message").val(),

                services: selectedServices

            };

        }
    }).then(result => {
        if (!result.isConfirmed) return;

      fetch('/api/bookings', {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json"
            },
            body: JSON.stringify(result.value)
        })
        .then(async (r) => {
            let res = await r.json();

            // ❌ If API returned validation errors
            if (!r.ok) {
                let msg = "";

                if (res.errors) {
                    Object.values(res.errors).forEach(errArr => {
                        msg += "• " + errArr[0] + "<br>";
                    });
                } else {
                    msg = res.message || "Something went wrong";
                }

                Swal.fire({
                    icon: "error",
                    title: "Validation Error",
                    html: msg
                });

                return; // ⛔ stop here — do NOT show success
            }

            // ✅ Success
            Swal.fire("Booking Added!", "", "success");
            loadBookings(1);
        });

    });
}

// ---------------------------
// DELETE BOOKING
// ---------------------------
function deleteBooking(id) {
    Swal.fire({
        title: "Delete Booking?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Delete"
    }).then(res => {
        if (res.isConfirmed) {
            fetch(`/api/bookings/${id}`, { method: "DELETE" })
                .then(() => {
                    Swal.fire("Deleted!", "", "success");
                    loadBookings(1);
                });
        }
    });
}
</script>


</body>

</html>

