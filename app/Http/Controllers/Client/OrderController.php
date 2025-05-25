<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class OrderController extends Controller
{
    public function create(Request $request)
    {
        do {
            $code = Str::random(16);
        } while (Bill::where('code', $code)->exists());
        $dataOrder = [
            'user_id' => Auth::user()->id,
            'code' => $code,
            'discount' => $request['discount'],
            'total_amount' => $request['total-price'],
            'shipping_address' => $request['address'],
            'phone' => $request['phone'],
            'recipient_name' => $request['name'],
            'order_date' => Carbon::now(),
            'transaction_time' => '',
            'expiry_time' => Carbon::now(),
            'node' => $request['other-request'],
            'payment_method' => $request['payment'],
            'status' => 1,
            'payment_status' => '',
            'refund' => false,
        ];
        return $dataOrder;
    }
}
