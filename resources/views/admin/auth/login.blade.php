<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>
    <meta charset="utf-8">
    <title>Dream Ride - Travel & Tour Booking HTML Template</title>

    <meta name="author" content="themesflat.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="/app/css/app.css">
    <link rel="stylesheet" href="/app/css/jquery.fancybox.min.css">

    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="/assets/images/dreamridelogo.webp">
    <link rel="apple-touch-icon-precomposed" href="/assets/images/dreamridelogo.webp">

</head>

<body class="body header-fixed ">

    

    <!-- /preload -->

    <div id="wrapper">
        <div id="pagee" class="clearfix">

           
           
            <main id="main">

               

                <section class="login">
                    <div class="tf-container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-md-8 col-sm-12">
                                <div class="login-wrap flex">
                                    <div class="content">
                                        <div class="inner-header-login">
                                            <div class="text-center mb-20">
                                                <a href="/" class="d-inline-block">
                                                    <img src="/assets/images/dreamridelogo.webp" alt="Logo" style="max-height:64px;width:auto;">
                                                </a>
                                            </div>
                                            <h3 class="title text-center">Login</h3>
                                        </div>
                                        <div id="login-message" style="display:none;margin:12px 0;" class="alert"></div>
                                        <form action="javascript:void(0)" id="login" class="login-user" onsubmit="return handleLogin(event)">
                                            @csrf
                                            <div class="row justify-content-center">
                                                <div class="col-12">
                                                    <div class="input-wrap">
                                                        <div class="flex-two">
                                                            <label for="email">Email</label>
                                                        </div>
                                                        <input id="email" name="email" type="email" placeholder="Enter your email" required>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="input-wrap">
                                                        <div class="flex-two">
                                                            <label for="password">Your password</label>
                                                            <a href="#" class="mb-15">Forgot Password?</a>
                                                        </div>
                                                        <input id="password" name="password" type="password" placeholder="Enter your password" required>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-12 mb-30">
                                                    <button type="submit" id="login-submit" class="btn-submit" style="width:100%;">Sign in</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <script>
                  const apiLoginUrl = @json(url('/api/login'));
                  async function handleLogin(event) {
    event.preventDefault();

    const messageBox = document.getElementById('login-message');
    const submitBtn = document.getElementById('login-submit');

    function showMessage(text, isError) {
        if (!messageBox) return;
        messageBox.textContent = text || '';
        messageBox.style.display = text ? 'block' : 'none';
        messageBox.className = 'alert ' + (isError ? 'alert-danger' : 'alert-success');
    }

    const email = document.getElementById('email').value.trim();
    const password = document.getElementById('password').value;

    if (!email || !password) {
        showMessage('Please enter email and password.', true);
        return false;
    }

    if (submitBtn) submitBtn.disabled = true;
    showMessage('Signing in...', false);

    const csrfToken = document.querySelector('input[name="_token"]').value;

    try {
        const res = await fetch(apiLoginUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({ email, password })
        });

        const data = await res.json().catch(() => ({}));

        if (res.ok) {
            const token = data.token;
            const user = data.user;

            // Store token in localStorage
            if (token) {
                localStorage.setItem('authToken', token);
            }

            // Store user data in localStorage
            if (user) {
                const userData = {
                    name: user.name,
                    email: user.email
                };
                localStorage.setItem('user', JSON.stringify(userData));
            }
            showMessage('Login successful. Redirecting...', false);
            
            // Clear any redirect flags
            sessionStorage.removeItem('authRedirecting');
            
            // Use replace to prevent back button issues
            
            setTimeout(() => {
                window.location.replace('/admin/dashboard');
            }, 500);
        } else {
            const err = data.message || data.error || 'Invalid credentials.';
            showMessage(err, true);
        }
    } catch {
        showMessage('Unable to connect. Please try again.', true);
    } finally {
        if (submitBtn) submitBtn.disabled = false;
    }

    return false; // Prevent default form submission
}
                    </script>
                    

            </main>

           
        </div>
    </div>

  

    <!-- Javascript -->
    <script src="/app/js/jquery.min.js"></script>
    <script src="/app/js/jquery.nice-select.min.js"></script>
    <script src="/app/js/bootstrap.min.js"></script>
    <script src="/app/js/swiper-bundle.min.js"></script>
    <script src="/app/js/swiper.js"></script>
    <script src="/app/js/plugin.js"></script>
    <script src="/app/js/jquery.fancybox.js"></script>
    <script src="/app/js/shortcodes.js"></script>
    <script src="/app/js/main.js"></script>
    
    <!-- Global script to send token from localStorage in requests -->
    <script>
    // Clear redirect flag when on login page
    sessionStorage.removeItem('authRedirecting');
    
    // Check if user is already logged in on login page - redirect to dashboard
    (async function() {
        const token = localStorage.getItem('authToken');
        const userStr = localStorage.getItem('user');
        
        if (token && userStr) {
            try {
                const user = JSON.parse(userStr);
                const res = await fetch(@json(url('/api/auth-token')), {
                    method: 'GET',
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        'User-Email': user.email,
                        'Accept': 'application/json'
                    }
                });
                
                if (res.ok) {
                    const data = await res.json();
                    if (data.status === 'valid') {
                        // Already logged in, redirect to dashboard immediately
                        window.location.replace('/admin/dashboard');
                        return;
                    }
                }
                // Token invalid, clear storage silently
                localStorage.removeItem('authToken');
                localStorage.removeItem('user');
            } catch(e) {
                // Error checking token, clear storage silently
                localStorage.removeItem('authToken');
                localStorage.removeItem('user');
            }
        }
    })();
    
    (function() {
        // Intercept fetch requests
        const originalFetch = window.fetch;
        window.fetch = function(...args) {
            const token = localStorage.getItem('authToken');
            const userStr = localStorage.getItem('user');
            let userEmail = null;
            
            if (userStr) {
                try {
                    const user = JSON.parse(userStr);
                    userEmail = user.email;
                } catch(e) {}
            }
            
            if (args[1]) {
                args[1].headers = args[1].headers || {};
                if (token) {
                    args[1].headers['Authorization'] = 'Bearer ' + token;
                }
                if (userEmail) {
                    args[1].headers['X-User-Email'] = userEmail;
                }
            } else {
                args[1] = {
                    headers: {}
                };
                if (token) {
                    args[1].headers['Authorization'] = 'Bearer ' + token;
                }
                if (userEmail) {
                    args[1].headers['X-User-Email'] = userEmail;
                }
            }
            
            return originalFetch.apply(this, args);
        };
        
        // Intercept XMLHttpRequest
        const originalOpen = XMLHttpRequest.prototype.open;
        const originalSend = XMLHttpRequest.prototype.send;
        
        XMLHttpRequest.prototype.open = function(method, url, ...rest) {
            this._url = url;
            return originalOpen.apply(this, [method, url, ...rest]);
        };
        
        XMLHttpRequest.prototype.send = function(...args) {
            const token = localStorage.getItem('authToken');
            const userStr = localStorage.getItem('user');
            let userEmail = null;
            
            if (userStr) {
                try {
                    const user = JSON.parse(userStr);
                    userEmail = user.email;
                } catch(e) {}
            }
            
            if (token) {
                this.setRequestHeader('Authorization', 'Bearer ' + token);
            }
            if (userEmail) {
                this.setRequestHeader('X-User-Email', userEmail);
            }
            
            return originalSend.apply(this, args);
        };
    })();
    </script>

</body>

</html>

