<?php

namespace App\Http\Middleware;

use App\Models\Bill;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckBillMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $bills = Bill::get();
        if ($bills) {
            foreach ($bills as $bill) {
                if ($bill->payment_status == 'Payment Failed' && $bill->expiry_time <= now()) {
                    $bill->update([
                        'status' => 'Cancelled',
                        'reason_cancel' => 'Hết thời gian thanh toán online!',
                    ]);
                }
            }
        }
        return $next($request);
    }
}
