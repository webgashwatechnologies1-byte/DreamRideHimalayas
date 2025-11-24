/**
 * Token Validation Script for Admin Pages
 * Validates token on page load and automatically logs out if expired
 */
(function() {
    'use strict';
    
    // Don't run on login page
    const currentPath = window.location.pathname;
    if (currentPath === '/admin/login' || currentPath.includes('/admin/login')) {
        return;
    }
    
    // Prevent multiple redirects - check if we're already redirecting
    if (sessionStorage.getItem('authRedirecting') === 'true') {
        return;
    }
    
    // Get API URL from window config or use default
    const authTokenUrl = window.authTokenUrl || '/api/auth-token';
    
    // Function to clear all auth data and redirect
    function clearAuthData() {
        // Set flag to prevent multiple redirects
        sessionStorage.setItem('authRedirecting', 'true');
        
        // Clear storage
        localStorage.removeItem('authToken');
        localStorage.removeItem('user');
        
        // Only redirect if we're on an admin page
        if (currentPath.startsWith('/admin/') && currentPath !== '/admin/login') {
            // Use replace instead of href to prevent back button issues
            window.location.replace('/admin/login');
        }
    }
    
    // Function to validate token - only runs once
    let isValidating = false;
    async function validateToken() {
        // Prevent multiple simultaneous validations
        if (isValidating) {
            return;
        }
        
        isValidating = true;
        
        const token = localStorage.getItem('authToken');
        const userStr = localStorage.getItem('user');
        
        // If no token/user, only redirect if we're on an admin page
        if (!token || !userStr) {
            if (currentPath.startsWith('/admin/') && currentPath !== '/admin/login') {
                isValidating = false;
                clearAuthData();
                return false;
            }
            isValidating = false;
            return false;
        }
        
        try {
            const user = JSON.parse(userStr);
            const response = await fetch(authTokenUrl, {
                method: 'GET',
                headers: {
                    'Authorization': 'Bearer ' + token,
                    'User-Email': user.email,
                    'Accept': 'application/json'
                }
            });
            
            const data = await response.json().catch(() => ({}));
            
            if (!response.ok || data.status !== 'valid') {
                // Token expired or invalid
                isValidating = false;
                clearAuthData();
                return false;
            }
            
            // Token is valid, clear redirect flag
            sessionStorage.removeItem('authRedirecting');
            isValidating = false;
            return true;
        } catch (error) {
            // Network error - don't redirect on network errors
            console.error('Token validation error:', error);
            isValidating = false;
            // Don't redirect on network errors to prevent loops
            return false;
        }
    }
    
    // Only validate if we're on an admin page (not login) AND we have a token
    // Don't validate on initial page load - let middleware handle it
    // Only validate periodically or on user interaction to check for expiration
    if (currentPath.startsWith('/admin/') && currentPath !== '/admin/login') {
        const token = localStorage.getItem('authToken');
        const userStr = localStorage.getItem('user');
        
        // Only run validation if token exists (middleware handles no-token case)
        if (token && userStr) {
            // Wait a bit before validating to ensure page is loaded
            // This prevents conflicts with middleware redirects
            setTimeout(() => {
                // Only validate if page is still loaded (not redirecting)
                if (!sessionStorage.getItem('authRedirecting')) {
                    if (document.readyState === 'loading') {
                        document.addEventListener('DOMContentLoaded', validateToken);
                    } else {
                        validateToken();
                    }
                }
            }, 500);
        }
    }
    
    // Intercept fetch requests to add token
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
