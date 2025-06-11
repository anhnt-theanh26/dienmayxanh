<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckVerifyUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $users = User::get();
        foreach ($users as $user) {
            $afterMonth = \Carbon\Carbon::parse($user->updated_at)->addMonths(1);
            if ($user->email_verified_at == null && now() > $afterMonth) {
                $user->forceDelete();
            }
        }
        return $next($request);
    }
}
