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
                                       

                                    </div>

                                    <div class="nav-outer flex align-center">
                                        <!-- Main Menu -->
                                        <nav class="main-menu show navbar-expand-md">
                                            <div class="navbar-collapse collapse clearfix"
                                                id="navbarSupportedContent">
                                                
                                            </div>
                                        </nav>
                                        <!-- Main Menu End-->
                                    </div>
                                    <div class="header-account flex align-center">
                                        
                                        <div class="dropdown account">
                                            <a type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <img src="/assets/images/page/avata.jpg" alt="image">
                                            </a>
                                            <ul class="dropdown-menu">
                                           
                                              <li><a href="#" onclick="handleLogout(event)">Logout</a></li>
                                            </ul>
                                        </div> 
                                       

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

</header>

<script>
function handleLogout(event) {
    event.preventDefault();

    // Clear authentication tokens
    localStorage.removeItem('authToken');
    localStorage.removeItem('user');
    sessionStorage.removeItem('authRedirecting');

    // Redirect to login page
    window.location.replace('/admin/login');
}
</script>
