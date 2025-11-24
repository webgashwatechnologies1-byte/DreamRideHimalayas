<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>
    <meta charset="utf-8">
    <title>Dream Ride - Travel & Tour Booking HTML Template</title>

    <meta name="author" content="themesflat.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="/app/css/app.css">
    <link rel="stylesheet" href="/app/css/map.min.css">

    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="/assets/images/dreamridelogo.webp">
    <link rel="apple-touch-icon-precomposed" href="/assets/images/dreamridelogo.webp">
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
                            <h3 class="title">Enquiries</h3>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                        <input type="text" id="searchBox" class="form-control" placeholder="Search by name, phone or email" style="width:250px">
                        
                        <button id="addEnquiryBtn" class="btn btn-primary">
                            + Add Enquiry
                        </button>
                    </div>

                        <div class="my-booking-wrap ">
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

                <footer class="footer footer-dashboard">
                    <div class="tf-container full">
                        <div class="row">
                            <div class="col-lg-6">
                                <p class="text-white">Made with ❤️ by  Gashwa Technologies.</p>
                            </div>
                            <div class="col-lg-6">
                                <ul class="menu-footer flex-six">
                                    <li>
                                        <a href="#">Privacy & Policy</a>
                                    </li>
                                    <li>
                                        <a href="#">Licensing</a>
                                    </li>
                                    <li>
                                        <a href="#">Instruction</a>
                                    </li>
                                </ul>

                            </div>
                        </div>

                    </div>
                </footer>

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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="/app/js/auth-validator.js"></script>`r`n    <script src="/app/js/main.js"></script>
    <script>
let packages = [];

// 1️⃣ Load Packages First
fetch('/api/packages/get-packages')
    .then(r => r.json())
    .then(res => {
        packages = res.data;
    });

// 2️⃣ Load Enquiries with Search
$(document).ready(function () {

    loadEnquiries(1);

    $("#searchBox").on("keyup", function () {
        loadEnquiries(1);
    });

    $("#addEnquiryBtn").on("click", function () {
        openAddEnquiryPopup();
    });

});

function loadEnquiries(page = 1) {
    let query = $("#searchBox").val() || "";

    fetch(`/api/enquiries?page=${page}&search=${query}`)
        .then(res => res.json())
        .then(response => {
            const list = $("#enquiryList");
            list.html("");

            // 0️⃣ No enquiries message
            if (response.data.length === 0) {
                list.html(`
                    <li class="text-center py-4">
                        <h5 class="text-muted">No enquiries found</h5>
                    </li>
                `);
                return;
            }

            response.data.forEach(row => {
                let date = row.date ? new Date(row.date).toLocaleDateString() : "N/A";

                list.append(`
                    <li class="flex-three">

                        <div class="booking-list flex-three">
                            <div class="content">
                                <p class="id">ID: #${row.id}</p>
                                <h6 class="title-booking">Package ID: ${row.package_id}</h6>
                                <p class="price">Name: ${row.user_name} | Phone: ${row.user_phone}</p>
                            </div>
                        </div>

                        <div class="booking-list-table">
                            <p class="status">${row.payment_status ?? "pending"}</p>
                        </div>

                        <div class="booking-list-table">
                            <p class="date-gues">${date}</p>
                        </div>

                        <div class="booking-list-table">
                            <p class="date-gues">${row.no_of_riders} Riders</p>
                        </div>

                        <div class="flex-five action-wrap">
                            <a href="/admin/forms/enquiries/${row.id}" class="action flex-five">
                                <i class="icon-Vector-16"></i>
                            </a>
                            <div class="action flex-five" onclick="deleteEnquiry(${row.id})">
                                <i class="icon-Vector-17"></i>
                            </div>
                        </div>

                    </li>
                `);
            });

            renderPagination(response.current_page, response.last_page);
        });
}

// 3️⃣ Pagination
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
        let p = $(this).data("page");
        loadEnquiries(p);
    });
}

// 4️⃣ Add Enquiry Popup
function openAddEnquiryPopup() {

    let packageOptions = packages.map(p =>
        `<option value="${p.id}">${p.title}</option>`
    ).join("");

    Swal.fire({
        title: "Add Enquiry",
        html: `
         <div class="swal-container-custom"> 
                <div class="custom-row-wrap">
                        <label class="custom-label">Select Package First*</label>
                        <select required id="package_id" class="swal2-input">${packageOptions}</select>
                    </div>
        <input type="date" id="date" class="swal2-input">

        <input type="text" id="user_name" class="swal2-input" placeholder="Customer Name">

        <input type="text" id="user_phone" class="swal2-input" placeholder="Phone">

        <input type="email" id="user_email" class="swal2-input" placeholder="Email">

        <input type="number" id="no_of_riders" class="swal2-input" placeholder="Riders">

            <textarea id="message" class="swal2-textarea" placeholder="Message"></textarea>
        </div>`,
        confirmButtonText: "Save Enquiry",
        showCancelButton: true,
        focusConfirm: false,
        preConfirm: () => {

            return {
                package_id: $("#package_id").val(),
                date: $("#date").val(),
                user_name: $("#user_name").val(),
                user_phone: $("#user_phone").val(),
                user_email: $("#user_email").val(),
                no_of_riders: $("#no_of_riders").val(),
                message: $("#message").val()
            };
        }
    }).then(result => {

        if (!result.isConfirmed) return;

        let formData = result.value;

        fetch(`/api/enquiries`, {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(formData)
        })
            .then(res => res.json())
            .then(() => {
                Swal.fire({
                    title: "Enquiry Added!",
                    icon: "success",
                    timer: 1500,
                    showConfirmButton: false
                });

                loadEnquiries(1); // reload list without page reload
            });
    });
}

// 5️⃣ Delete Enquiry
function deleteEnquiry(id) {
    Swal.fire({
        title: "Are you sure?",
        text: "This enquiry will be deleted permanently!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#e74c3c",
        cancelButtonColor: "#6c757d",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {

        if (result.isConfirmed) {

            fetch(`/api/enquiries/${id}`, { method: "DELETE" })
                .then(r => r.json())
                .then(() => {
                    Swal.fire({
                        title: "Deleted!",
                        icon: "success",
                        timer: 1000,
                        showConfirmButton: false
                    });

                    loadEnquiries(1);
                });
        }
    });
}
</script>

</body>

</html>

