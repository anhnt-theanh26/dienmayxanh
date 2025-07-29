<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Log::info('CheckAdminMiddleware start');
        if (!auth()->check()) {
            return redirect()->route('admin.login')->with('error', 'Bạn cần đăng nhập để truy cập trang quản trị!');
        }
        // Log::info('CheckAdminMiddleware end');
        return $next($request);
    }
}
