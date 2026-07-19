<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class GuestSessionMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (session()->has('user_id')) {
            return redirect()->route('Dashboard');
        }

        return $next($request);
    }
}