<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OpenRecruitment;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class C_auth extends Controller
{
    public function login()
    {
        return view('open_recruitment.peserta.V_login_peserta');
    }

    public function storeLogin(Request $request)
    {
        $credentials = $request->validate(
            [
                'NIM'  => ['required', 'size:8'],
                'password' => ['required', 'min:11', 'max:13']
            ],
            [
                'NIM.required' => 'Masukkan NIM dengan benar',
                'NIM.size' => 'Masukkan NIM dengan 8 karakter',
                'password.required' => 'Masukkan password dengan benar',
                'password.min' => 'Masukkan password minimal 11 karakter',
                'password.max' => 'Masukkan password maksimal 13 karakter',
            ]
        );

        $credentials = $request->only('NIM', 'password');
        Log::info('Login attempt', $credentials);

        $participant = OpenRecruitment::where('NIM', $credentials['NIM'])->first();

        if ($participant && $participant->whatsapp === $credentials['password']) {
            Log::info('Login successful for NIM: ' . $credentials['NIM']);
            Auth::guard('participant')->login($participant);
            return redirect()->route('peserta.dashboard');
        }

        Log::warning('Login failed for NIM: ' . $credentials['NIM']);
        return back()->withErrors([
            'login' => 'Data yang kamu masukkan salah',
        ]);
    }


    public function logout()
    {
        Auth::guard('participant')->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('peserta.login');
    }
}