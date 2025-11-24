<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Admin Sidebar</title>

    <!-- FontAwesome CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        /* Sidebar Scroll */
        .sidebar-dashboard .db-menu {
            height: calc(100vh - 120px);
            overflow-y: auto;
            padding-right: 5px;
        }

        .sidebar-dashboard .db-menu::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar-dashboard .db-menu::-webkit-scrollbar-thumb {
            background: #c8c8c8;
            border-radius: 10px;
        }

        /* Settings Overlay */
        .settings-overlay {
            position: absolute;
            left: 230px;
            top: 0;
            width: 180px;
            background: #fff;
            border-radius: 8px;
            padding: 10px 0;
            box-shadow: 0px 4px 14px rgba(0, 0, 0, 0.15);
            display: none;
            z-index: 99999;
        }

        .settings-overlay ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .settings-overlay li {
            padding: 10px 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .settings-overlay li i {
            width: 18px;
        }

        .settings-overlay li:hover {
            background: #f2f2f2;
        }

        .settings-overlay li a {
            text-decoration: none;
            color: #333;
            font-size: 14px;
            display: block;
        }
    </style>
</head>

<body>

    <div class="sidebar-dashboard">
        <div class="db-logo">
            <a href="index.html">
                <img src="/assets/images/dreamridelogo.webp" alt="Logo">
                <span>DreamRide</span>
            </a>
        </div>

        <div class="db-menu">
            <ul>

                <li class="active">
                    <a href="/admin/dashboard">
                        <i class="fa-solid fa-gauge"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="active">
                    <a href="/admin/blog">
                        <i class="fa-solid fa-blog"></i>
                        <span>Blogs</span>
                    </a>
                </li>

                <li class="active">
                    <a href="/admin/gallery">
                        <i class="fa-solid fa-images"></i>
                        <span>Gallery</span>
                    </a>
                </li>

                <li>
                    <a href="/admin/forms/booking">
                        <i class="fa-solid fa-calendar-check"></i>
                        <span>Booking</span>
                    </a>
                </li>

                <li>
                    <a href="/admin/forms/enquiries">
                        <i class="fa-regular fa-envelope"></i>
                        <span>Enquiry</span>
                    </a>
                </li>

                {{-- <li>
                    <a href="/admin/category">
                        <i class="fa-solid fa-layer-group"></i>
                        <span>Category</span>
                    </a>
                </li> --}}

                <li>
                    <a href="/admin/tours">
                        <i class="fa-solid fa-route"></i>
                        <span>Tours</span>
                    </a>
                </li>

                <li>
                    <a href="/admin/type">
                        <i class="fa-solid fa-list"></i>
                        <span>Type</span>
                    </a>
                </li>

                <li>
                    <a href="/admin/places">
                        <i class="fa-solid fa-map-pin"></i>
                        <span>Places</span>
                    </a>
                </li>

                <li>
                    <a href="/admin/services">
                        <i class="fa-solid fa-briefcase"></i>
                        <span>Services</span>
                    </a>
                </li>

                <li>
                    <a href="/admin/package">
                        <i class="fa-solid fa-box-open"></i>
                        <span>Package</span>
                    </a>
                </li>

                <li id="pages-menu">
                    <a href="/admin/pages">
                        <i class="fa-regular fa-file-lines"></i>
                        <span>Pages</span>
                    </a>
                </li>

                <li id="settings-menu">
                    <a>
                        <i class="fa-solid fa-gear"></i>
                        <span>Settings</span>
                    </a>
                </li>

                {{-- <li>
                    <a href="/admin/login">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <span>Logout</span>
                    </a>
                </li> --}}

            </ul>
        </div>

        <!-- Settings Dropdown -->
        <div id="settings-overlay" class="settings-overlay">
            <ul>
                <li>
                    <i class="fa-solid fa-bars"></i>
                    <a href="/admin/manage-header">Manage Header</a>
                </li>
                <li>
                    <i class="fa-regular fa-window-maximize"></i>
                    <a href="/admin/manage-footer">Manage Footer</a>
                </li>
            </ul>
        </div>

    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {

            const settings = document.getElementById('settings-menu');
            const panel = document.getElementById('settings-overlay');

            settings.addEventListener("mouseenter", () => {
                const rect = settings.getBoundingClientRect();
                panel.style.top = rect.top + "px";
                panel.style.display = "block";
            });

            settings.addEventListener("mouseleave", () => {
                setTimeout(() => {
                    if (!panel.matches(":hover")) {
                        panel.style.display = "none";
                    }
                }, 150);
            });

            panel.addEventListener("mouseleave", () => {
                panel.style.display = "none";
            });

        });
    </script>

</body>

</html>
