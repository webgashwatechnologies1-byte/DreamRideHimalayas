<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Enquiry Details</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="/app/css/app.css">
    <link rel="stylesheet" href="/app/css/map.min.css">

    <style>
        .booking-box {
            background: #fff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        }

        .yellow-title {
            color: #f9b208; /* theme yellow */
            font-weight: 700;
            font-size: 22px;
        }

        .detail-label {
            font-weight: 600;
            color: #888;
            margin-bottom: 4px;
        }

        .detail-value {
            font-size: 15px;
            font-weight: 600;
            color: #333;
        }

        /* Right panel for message */
        .message-box {
            background: #fff7dd;
            border-left: 4px solid #ffcc33;
            padding: 20px;
            border-radius: 12px;
            height: 400px;
            overflow-y: auto;
        }
       
    </style>
<style>
.nav-tabs .nav-link {
    font-weight: 600;
    color: #555;
    padding: 10px 18px;
    cursor: pointer;
}
.nav-tabs .nav-link.active {
    border-bottom: 3px solid #f9b208;
    color: #f9b208 !important;
}
.section-label {
    font-weight: 600;
    color: #888;
}
.section-value {
    font-weight: 600;
    color: #333;
    margin-bottom: 10px;
}
.package-images-grid {
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
}
.package-images-grid img {
    width: 180px;
    height: 120px;
    border-radius: 10px;
    object-fit: cover;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}
.badge-yellow {
    background: #ffe08a;
    padding: 6px 12px;
    border-radius: 8px;
    margin-right: 6px;
    margin-bottom: 6px;
    display: inline-block;
}
</style>

    <link rel="shortcut icon" href="/assets/images/dreamridelogo.webp">
</head>

<body class="body header-fixed">

    <!-- Preloader -->
    <div class="preload preload-container">
        <svg class="pl" width="240" height="240" viewBox="0 0 240 240">
            <circle class="pl__ring pl__ring--a" cx="120" cy="120" r="105"></circle>
            <circle class="pl__ring pl__ring--b" cx="120" cy="120" r="35"></circle>
            <circle class="pl__ring pl__ring--c" cx="85" cy="120" r="70"></circle>
            <circle class="pl__ring pl__ring--d" cx="155" cy="120" r="70"></circle>
        </svg>
    </div>

    <div id="wrapper">
        <div id="pagee" class="clearfix">

            @include('admin.components.sidebar')

            <div class="has-dashboard">

                @include('admin.components.header')

                <main id="main">

                    <section class="profile-dashboard">
                        <div class="inner-header mb-40 flex-three" style="justify-content: space-between;">
                            <div>
                                <h3 class="title yellow-title">Enquiry Details</h3>
                                <p class="des">Full information about this Enquiry</p>
                            </div>

                            <a href="/admin/forms/booking" class="btn btn-warning" style="font-weight:600;">
                                ← Back to Enquiries
                            </a>
                        </div>

                        <div class="row">
                            
                            <!-- LEFT SIDE: DETAILS -->
                            <div class="col-md-8">
                                <div class="booking-box">
                                    <div id="bookingDetails"><p>Loading Enquiries data...</p></div>
                                </div>
                            </div>

                             <div class="col-md-4">
                                <h5 class="yellow-title mb-10">Customer Message</h5>
                                <div class="message-box" id="messageBox">
                                    <p class="text-muted" id="CustomermessageBox"></p>
                                </div>
                            </div>

                        </div>
<div class="col-md-12 mt-40">
    <h3 class="yellow-title mb-20">Package Details</h3>

    <!-- TABS -->
    <ul class="nav nav-tabs" id="packageTabs" style="margin-bottom:20px;">
        <li class="nav-item">
            <a class="nav-link active" data-tab="info">Information</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-tab="tour">Tour Plan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-tab="gallery">Shot Gallery</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-tab="include">Included & Amenities</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-tab="highlight">Highlights</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-tab="location">Location Share</a>
        </li>
    </ul>

    <div id="packageContent" class="booking-box">
        <p>Loading package...</p>
    </div>
</div>


                    </section>

                </main>

                <footer class="footer footer-dashboard">
                    <div class="tf-container full">
                        <p class="text-white">Made with ❤️ by Themesflat.</p>
                    </div>
                </footer>

            </div>

        </div>
    </div>

    <script src="/app/js/jquery.min.js"></script>
    <script src="/app/js/jquery.nice-select.min.js"></script>
    <script src="/app/js/bootstrap.min.js"></script>
    <script src="/app/js/bootstrap-select.min.js"></script>
    <script src="/app/js/tinymce/tinymce.min.js"></script>
    <script src="/app/js/tinymce/tinymce-custom.js"></script>
    <script src="/app/js/swiper-bundle.min.js"></script>
    <script src="/app/js/swiper.js"></script>
    <script src="/app/js/plugin.js"></script>
    <script src="/app/js/map.min.js"></script>
    <script src="/app/js/map.js"></script>
    <script src="/app/js/countto.js"></script>
    <script src="/app/js/apexcharts.js"></script>
    <script src="/app/js/line-chart.js"></script>
    <script src="/app/js/shortcodes.js"></script>
    <script src="/app/js/auth-validator.js"></script>`r`n    <script src="/app/js/main.js"></script>

<script>
$(document).ready(function () {

    const enquiryId = "{{ $id }}";

    fetch(`/api/enquiries/${enquiryId}`)
        .then(res => res.json())
        .then(data => {
            renderBooking(data);
            renderMessage(data);
        })
        .catch(() => {
            $("#bookingDetails").html(`<p class="text-danger">Failed to load Enquireies</p>`);
        });

    function renderBooking(b) {

        let servicesHtml = b.services?.length
            ? b.services.map(s => `<li>${s.name} - ₹${s.price}</li>`).join("")
            : `<li>No extra services</li>`;

        let date = b.date ? new Date(b.date).toLocaleDateString() : "N/A";

        $("#bookingDetails").html(`
            <h4 class="mb-20 yellow-title">Enquiry ID: #${b.id}</h4>

            <div class="row">

                <div class="col-md-6 mb-20">
                    <p class="detail-label">Package ID</p>
                    <p class="detail-value">${b.package_id}</p>
                </div>

                <div class="col-md-6 mb-20">
                    <p class="detail-label">Date</p>
                    <p class="detail-value">${date}</p>
                </div>

                <div class="col-md-6 mb-20">
                    <p class="detail-label">Name</p>
                    <p class="detail-value">${b.user_name}</p>
                </div>

                <div class="col-md-6 mb-20">
                    <p class="detail-label">Phone</p>
                    <p class="detail-value">${b.user_phone}</p>
                </div>

                <div class="col-md-6 mb-20">
                    <p class="detail-label">Email</p>
                    <p class="detail-value">${b.user_email}</p>
                </div>

                <div class="col-md-6 mb-20">
                    <p class="detail-label">Riders</p>
                    <p class="detail-value">${b.no_of_riders}</p>
                </div>

                <div class="col-md-6 mb-20">
                    <p class="detail-label">Amount</p>
                    <p class="detail-value">₹${b.amount}</p>
                </div>

                <div class="col-md-6 mb-20">
                    <p class="detail-label">Payment Status</p>
                    <p class="detail-value">${b.payment_status}</p>
                </div>

                <div class="col-md-12 mb-20">
                    <p class="detail-label">Services</p>
                    <ul>${servicesHtml}</ul>
                </div>

            </div>
        `);
    }

   

});

 function renderMessage(b) {
        document.getElementById("CustomermessageBox").innerHTML = b.message  || "dsada";
    }
</script>
<script>
$(document).ready(function () {

    const enquiryId = "{{ $id }}";
    let packageData = null;

    /* LOAD BOOKING */
    fetch(`/api/enquiries/${enquiryId}`)
        .then(res => res.json())
        .then(b => {
            renderBooking(b);
            loadPackage(b.package_id);
        });

    /* LOAD PACKAGE */
    function loadPackage(id) {
        fetch(`/api/package/${id}`)
            .then(res => res.json())
            .then(pkg => {
                packageData = pkg;
                renderInformationTab();   // default tab
            });
    }

    /* -----------------------
       TAB CLICK HANDLER
    ----------------------- */
    $("#packageTabs .nav-link").click(function () {
        $("#packageTabs .nav-link").removeClass("active");
        $(this).addClass("active");

        let tab = $(this).data("tab");

        if (tab === "info") renderInformationTab();
        if (tab === "tour") renderTourTab();
        if (tab === "gallery") renderGalleryTab();
        if (tab === "include") renderIncludedTab();
        if (tab === "highlight") renderHighlightTab();
        if (tab === "location") renderLocationTab();
    });

    /* -----------------------
       RENDER TAB CONTENT
    ----------------------- */

    function renderInformationTab() {
        const i = packageData.information;

        let images = i.images.map(img => `
            <img src="/${img.url}">
        `).join("");

        $("#packageContent").html(`
            <h4 class="yellow-title mb-20">${i.title}</h4>

            <div class="package-images-grid mb-20">${images}</div>

            <p class="section-label">Subtitle</p>
            <p class="section-value">${i.subtitle}</p>

            <p class="section-label">Description</p>
            <p class="section-value">${i.description}</p>

            <p class="section-label">No. of Riders</p>
            <p class="section-value">${i.noofriders}</p>

            <p class="section-label">Pricing</p>
            <p class="section-value">₹${packageData.pricing}</p>
        `);
    }

    function renderTourTab() {
        const tour = packageData.tour;

        if (!tour.length) {
            $("#packageContent").html("<p>No tour plan provided.</p>");
            return;
        }

        let html = tour.map(t => `
            <div class="mb-20">
                <p class="section-label">${t.icon} ${t.period}</p>
                <p class="section-value">${t.location} - ${t.locationSubtitle}</p>
                <p>${t.locationDescription}</p>
            </div>
        `).join("");

        $("#packageContent").html(html);
    }

    function renderGalleryTab() {
        const gallery = packageData.information.shot_gallery;

        let html = gallery.map(g => `
            <img src="/${g.url}">
        `).join("");

        $("#packageContent").html(`<div class="package-images-grid">${html}</div>`);
    }

    function renderIncludedTab() {
        let included = packageData.included_details.map(i => `
            <span class="badge-yellow">${i.name}</span>
        `).join("");

        let amenities = packageData.amenities_details.map(a => `
            <span class="badge-yellow">${a.name}</span>
        `).join("");

        $("#packageContent").html(`
            <h5 class="yellow-title mb-10">Included</h5>
            ${included}

            <h5 class="yellow-title mt-20 mb-10">Amenities</h5>
            ${amenities}
        `);
    }

    function renderHighlightTab() {
        let list = packageData.information.highlight.map(h => `
            <li>${h}</li>
        `).join("");

        $("#packageContent").html(`
            <ul>${list}</ul>
        `);
    }

    function renderLocationTab() {
        const l = packageData.locationshare;

        $("#packageContent").html(`
            <h5 class="yellow-title mb-10">Location Share</h5>
            <p>${l.description}</p>

            <p class="section-label mt-10">Highlights</p>
            <ul>
                ${l.highlight.map(h => `<li>${h}</li>`).join("")}
            </ul>
        `);
    }

    /* -----------------------
         BOOKING DETAILS
    ----------------------- */
    function renderBooking(b) {
        let services = b.services?.length
            ? b.services.map(s => `<li>${s.name} - ₹${s.price}</li>`).join("")
            : `<li>No extras</li>`;

        let date = b.date ? new Date(b.date).toLocaleDateString() : "N/A";

        $("#bookingDetails").html(`
            <h4 class="yellow-title mb-20">Enquiery ID: #${b.id}</h4>

            <div class="row">

                <div class="col-md-4 mb-20">
                    <p class="section-label">Package ID</p>
                    <p class="section-value">${b.package_id}</p>
                </div>

                <div class="col-md-4 mb-20">
                    <p class="section-label">Date</p>
                    <p class="section-value">${date}</p>
                </div>

                <div class="col-md-4 mb-20">
                    <p class="section-label">Riders</p>
                    <p class="section-value">${b.no_of_riders}</p>
                </div>

                <div class="col-md-4 mb-20">
                    <p class="section-label">Name</p>
                    <p class="section-value">${b.user_name}</p>
                </div>

                <div class="col-md-4 mb-20">
                    <p class="section-label">Phone</p>
                    <p class="section-value">${b.user_phone}</p>
                </div>

                <div class="col-md-4 mb-20">
                    <p class="section-label">Email</p>
                    <p class="section-value">${b.user_email}</p>
                </div>

              
            

               
                <div class="col-md-12 mb-20">
                    <p class="section-label">Services</p>
                    <ul>${services}</ul>
                </div>

            </div>
        `);
    }

});
</script>


</body>
</html>
