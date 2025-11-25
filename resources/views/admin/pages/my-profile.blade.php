<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>
    <meta charset="utf-8">
    <title>Dream Ride - Travel & Tour Booking HTML Template</title>

    <meta name="author" content="themesflat.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="/app/css/app.css">

    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="/assets/images/dreamridelogo.webp">
    <link rel="apple-touch-icon-precomposed" href="/assets/images/dreamridelogo.webp">

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
                 @include('admin.components.header')
             
                <!-- End Main Header -->
                <main id="main">
                    <section class="profile-dashboard">

                        <form action="/" class="edit-profile">
                            <div class="inner-header mb-40">
                                <h3 class="title">My Profile</h3>
                                <p class="des">There are many variations of passages of Lorem Ipsum</p>
                            </div>
                            <div class="upload-image-dashboard flex mb-80">
                                <span class="title-avata">Avatar:</span>
                                <div class="upload-image-wrap">
                                    <div class="avata relative">
                                        <img id="frame" src="/assets/images/page/update-profile.jpg" alt="image">
                                        <div class="icon-delete">
                                            <i class="icon-delete-1"></i>
                                        </div>
                                    </div>
                                    <span class="upload">Upload a new Avatar</span>
                                    <div class="upload-file">
                                        <input type="file">
                                    </div>
                                    <p>Png, Jpg, Svg dimenson (300* 350) max file not more then size 4 mb</p>
                                </div>
                            </div>
                            <div class="infomation-dashboard mb-70">
                                <h4 class="title">User Information</h4>
                                <div class="widget-dash-board">
                                    <div class="grid-input-2">
                                        <div class="input-wrap">
                                            <label>First name</label>
                                            <input type="text" placeholder="Mehedii">
                                        </div>
                                        <div class="input-wrap">
                                            <label>Last Name</label>
                                            <input type="text" placeholder="Hassan">
                                        </div>
                                        <div class="input-wrap">
                                            <label>Phone</label>
                                            <input type="tel" placeholder="+8801739495504">
                                        </div>
                                        <div class="input-wrap">
                                            <label>Email address*</label>
                                            <input type="email" placeholder="Useronly21@gmail.com">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="infomation-dashboard mb-70">
                                <h4 class="title">password Change Request</h4>
                                <div class="widget-dash-board">

                                    <div class="grid-input-2">
                                        <div class="input-wrap">
                                            <label>New Password</label>
                                            <input type="password" placeholder="Mehedii">
                                        </div>
                                        <div class="input-wrap">
                                            <label>Re-type New Password</label>
                                            <input type="password" placeholder="Hassan">
                                        </div>
                                    </div>
                                    <p class="mt-20">*Note: you can change your password up to 10 times in a year</p>
                                </div>
                            </div>
                            <div class="infomation-dashboard mb-70">
                                <h4 class="title">Social Profile Link</h4>
                                <div class="widget-dash-board">
                                    <div class="grid-input-3">
                                        <div class="input-wrap">
                                            <label><i class="icon-Vector-211"></i>Facebook</label>
                                            <input type="url" placeholder="Www.facebook.com/username">
                                        </div>
                                        <div class="input-wrap">
                                            <label><i class="icon-Group-131"></i>Instagram</label>
                                            <input type="url" placeholder="Www.instagram.com/user">
                                        </div>
                                        <div class="input-wrap">
                                            <label><i class="icon-twitter-sign-1"></i>Twitter</label>
                                            <input type="url" placeholder="Www.Twitter.com/user">
                                        </div>
                                        <div class="input-wrap">
                                            <label><i class="icon-Group-141"></i>Dribble</label>
                                            <input type="url" placeholder="Www.dribble.com/user">
                                        </div>
                                        <div class="input-wrap">
                                            <label><i class="icon-linkedin-1"></i>Linkedin</label>
                                            <input type="url" placeholder="Www.linkedin.com/user">
                                        </div>
                                        <div class="input-wrap">
                                            <label><i class="icon-Layer-2-1"></i>Skype</label>
                                            <input type="url" placeholder="@skype.me/12244hassan">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="otp-dashboard">
                                <div class="checkbox-otp mb-60">
                                    <input id="check-otp" type="checkbox" name="check" value="check">
                                    <label for="check-otp">I agree to Terms & Conditions, Refund Policy and Privacy
                                        Policy of Fabrilife.</label>
                                </div>
                                <h4 class="title">Verify is it you?</h4>
                                <span class="send-otp">Sent OTP to this number</span>
                                <div class="input-wrap mb-45">
                                    <input type="tel" placeholder="01723983923">
                                </div>
                                <div class="flex-three">
                                    <div class="button-wrap">
                                        <button type="submit" class="save"><i class="icon-Vector-221"></i>Save
                                            changes</button>
                                        <button type="reset" class="reset"><i class="icon-reply-all"></i>Reset
                                            All</button>
                                    </div>
                                </div>
                            </div>
                        </form>
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
    <script src="/app/js/swiper-bundle.min.js"></script>
    <script src="/app/js/swiper.js"></script>
    <script src="/app/js/plugin.js"></script>
    <script src="/app/js/shortcodes.js"></script>
    <script src="/app/js/auth-validator.js"></script>
    <script src="/app/js/admin-auth-guard.js"></script>
        <script src="/app/js/main.js"></script>

</body>

</html>

