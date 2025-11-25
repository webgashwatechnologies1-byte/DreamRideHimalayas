(function () {
    // Skip guard on login page
    if (window.location.pathname === '/admin/login') return;

    const token = localStorage.getItem('authToken');
    const userStr = localStorage.getItem('user');

    if (!token || !userStr) {
        // No token → redirect to login
        window.location.replace('/admin/login');
        return;
    }

    let userEmail = null;
    try {
        userEmail = JSON.parse(userStr).email;
    } catch (e) {}

    // Validate token with backend
    fetch('/api/auth-token', {
        method: 'GET',
        headers: {
            'Authorization': 'Bearer ' + token,
            'User-Email': userEmail,
            'Accept': 'application/json'
        }
    })
        .then(res => res.json().catch(() => ({})))
        .then(data => {
            if (!data || data.status !== 'valid') {
                // Invalid token → clear data & redirect
                localStorage.removeItem('authToken');
                localStorage.removeItem('user');
                window.location.replace('/admin/login');
            }
        })
        .catch(() => {
            // API unreachable → assume invalid
            localStorage.removeItem('authToken');
            localStorage.removeItem('user');
            window.location.replace('/admin/login');
        });
})();
