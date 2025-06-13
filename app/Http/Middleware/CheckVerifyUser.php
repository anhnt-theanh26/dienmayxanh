<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class CheckVerifyUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Log::info('CheckVerifyUser start');
        $usersToDelete = [];
        $users = User::get();
        foreach ($users as $user) {
            $afterMonth = \Carbon\Carbon::parse($user->updated_at)->addMonths(1);
            if ($user->email_verified_at == null && now()->greaterThan($afterMonth)) {
                $usersToDelete[] = $user->id;
            }
        }
        if (!empty($usersToDelete)) {
            User::whereIn('id', $usersToDelete)->forceDelete();
        }
        // Log::info('CheckVerifyUser end');
        return $next($request);
    }
}
