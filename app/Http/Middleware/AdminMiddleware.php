<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Method 1: Using Auth facade dengan type hinting yang jelas
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Method 2: Atau bisa juga menggunakan auth() helper
        $user = Auth::user();
        if (!$user || !$user->is_admin) {
            return redirect()->route('home')->with('error', 'Akses ditolak. Hanya admin yang bisa mengakses halaman ini.');
        }

        return $next($request);
    }
}