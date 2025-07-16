<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        Log::info('Login attempt', [
            'input' => $request->only('username', 'password'),
        ]);

        $credentials = $request->only('username', 'password');

        // Cek apakah user ada di database
        $user = User::where('username', $credentials['username'])->first();
        if (!$user) {
            Log::warning('Login gagal: user tidak ditemukan', ['username' => $credentials['username']]);
            return back()->withErrors(['login' => 'Username atau password salah']);
        }

        Log::info('User ditemukan', ['user' => $user->toArray()]);

        if (Auth::attempt($credentials)) {
            Log::info('Login berhasil', ['user_id' => Auth::id()]);
            Auth::user()->update(['last_login_at' => now()]);
            return redirect()->intended('/admin/dashboard');
        } else {
            Log::warning('Login gagal: password salah', ['username' => $credentials['username']]);
        }

        return back()->withErrors(['login' => 'Username atau password salah']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}