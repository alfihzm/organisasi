<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class EnsureParticipant
{
    public function handle(Request $request, Closure $next)
    {
        Log::info('EnsureParticipant Middleware is running.');
        Log::info('Current Route:', ['route' => $request->route()->getName()]);
        Log::info('User Authenticated:', ['auth' => Auth::guard('participant')->check()]);

        if (Auth::guard('participant')->check()) {
            return $next($request);
        }

        return redirect()->route('peserta.login');
    }
}
