<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\IsActiveUrl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckIsActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $url = '/oprec/choose-campus';
        $isActive = DB::table('is_active_urls')->where('url', $url)->value('is_active');

        if ($isActive === null || $isActive == 0) {
            return redirect('/oprec/closed')->with('error', 'Pendaftaran untuk kampus ini telah ditutup.');
        }

        return $next($request);
    }
}