<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
            'role' => 'nullable|string|in:admin'
        ]);

        $remember = $request->has('remember') && $request->remember;

        if (!\Illuminate\Support\Facades\Auth::attempt(['email' => $fields['email'], 'password' => $fields['password']], $remember)) {
            return response()->json([
                'message' => 'Bad credentials'
            ], 401);
        }

        $request->session()->regenerate();
        $user = \Illuminate\Support\Facades\Auth::user();

        // Admin only for now as per requirements
        if ($user->role !== 'admin') {
             \Illuminate\Support\Facades\Auth::logout();
             return response()->json([
                'message' => 'Access denied. Admin only.'
            ], 403);
        }

        return response()->json([
            'user' => $user,
            'role' => $user->role
        ], 200);
    }

    public function logout(Request $request)
    {
        \Illuminate\Support\Facades\Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return response()->json([
            'message' => 'Logged out'
        ]);
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|confirmed|min:8',
        ]);

        $user = auth()->user();

        if (!\Illuminate\Support\Facades\Hash::check($request->current_password, $user->password)) {
            return response()->json(['message' => 'Current password does not match'], 400);
        }

        $user->update([
            'password' => bcrypt($request->new_password)
        ]);

        return response()->json(['message' => 'Password changed successfully']);
    }
}
