<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function register(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email'=> $request->email,
            'password'=> Hash::make($request->password)
        ]);

        $token = JWTAuth::fromUser($user);

        return response()->json([
            'user' => $user,
            'token' => $token
        ]);
    }

    public function login(Request $request) {
        $credentials = $request->only('email', 'password');

        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }
        $user = auth()->user();
        return response()->json(['token' => $token,'user' => $user]);
    }
    public function forget(Request $request) {
        $credentials = $request->only('email');

        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

        return response()->json(['token' => $token]);
    }
    public function check(Request $request)
    {
        $token = $request->bearerToken();
        $email = $request->header('User-Email');

        if (!$token || !$email) {
            return response()->json([
                'status' => 'invalid',
                'message' => 'Missing token or email'
            ], 401);
        }

        $user = User::where('email', $email)->first();
        if (!$user) {
            return response()->json([
                'status' => 'invalid',
                'message' => 'User not found'
            ], 401);
        }

        try {
            $payload = JWTAuth::setToken($token)->getPayload();
            $userIdFromToken = $payload->get('sub');

            if ($user->id != $userIdFromToken) {
                return response()->json([
                    'status' => 'invalid',
                    'message' => 'Token does not belong to user'
                ], 401);
            }

            return response()->json(['status' => 'valid']);

        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json([
                'status' => 'invalid',
                'message' => 'Token expired'
            ], 401);
        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json([
                'status' => 'invalid',
                'message' => 'Token invalid'
            ], 401);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'invalid',
                'message' => 'Token error'
            ], 401);
        }
    }
}
