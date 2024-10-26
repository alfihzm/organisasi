<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class C_authentication extends Controller
{
    public function login()
    {
        return view('authentication.login');
    }
    public function storeLogin(Request $request)
    {
        $credential = $request->validate([
            'NIM'  => ['required', 'size:8'],
            'password' => ['required', 'min:8']
        ], [
            'NIM.required' => 'Masukkan NIM dengan benar',
            'NIM.size' => 'Masukkan NIM dengan 8 karakter',
            'password.required' => 'Masukkan password dengan benar',
            'password.min' => 'Masukkan password minimal 8 karakter'
        ]);

        if (Auth::attempt($credential)) {
            $request->session()->regenerate();
            return redirect()->intended('/panitia')->with('success', 'Welcome ' . auth()->user()->full_name);
        }

        return back()->withErrors([
            'loginError' => 'NIM atau password yang anda masukkan salah'
        ])->withInput();
    }
    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect(route('login'));
    }
}
