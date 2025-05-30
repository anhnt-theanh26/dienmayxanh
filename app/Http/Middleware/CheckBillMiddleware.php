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
                if ($bill->status == 'Shipping') {
                    $after3day = \Carbon\Carbon::parse($bill->updated_at)->addDays(3);
                    if (now() > $after3day) {
                        $bill->update([
                            'status' => 'Cancelled',
                            'reason_cancel' => 'Người dùng không nhận hàng!',
                        ]);
                    }
                }
            }
        }
        return $next($request);
    }
}
