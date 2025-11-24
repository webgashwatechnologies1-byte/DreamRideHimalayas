<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CheckApiToken
{
    public function handle(Request $request, Closure $next)
    {
        echo "THIS API IS WORKING FINE";
        // Skip middleware for login page to prevent redirect loops
        $path = $request->path();
        if ($path === 'admin/login' || str_ends_with($path, '/admin/login')) {
            return $next($request);
        }
        
        // Get token from Authorization header (sent from localStorage)
        $authHeader = $request->header('Authorization');
        $token = null;
        echo $token;
        if ($authHeader && preg_match('/Bearer\s+(.*)$/i', $authHeader, $matches)) {
            $token = $matches[1];
        }

        // Get user email from header (sent from localStorage)
        $userEmail = $request->header('X-User-Email');

        if (!$token || !$userEmail) {
            // No token or user info
            if ($request->expectsJson() || $request->ajax()) {
                return response()->json(['error' => 'Unauthorized', 'message' => 'Please login'], 401);
            }
            return redirect('/admin/login');
        }

        try {
            // Verify token via API
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
                'User-Email' => $userEmail,
            ])->get(url('/api/auth-token'));

            $responseData = $response->json();
            
            if ($response->failed() || !isset($responseData['status']) || $responseData['status'] !== 'valid') {
                // Token invalid or expired
                if ($request->expectsJson() || $request->ajax()) {
                    return response()->json([
                        'error' => 'Unauthorized', 
                        'message' => $responseData['message'] ?? 'Token expired or invalid'
                    ], 401);
                }
                return redirect('/admin/login');
            }

            // Token is valid, allow request
            return $next($request);

        } catch (\Exception $e) {
            // API error or request failed
            if ($request->expectsJson() || $request->ajax()) {
                return response()->json(['error' => 'Unauthorized', 'message' => 'Token validation failed'], 401);
            }
            return redirect('/admin/login');
        }
    }
}
