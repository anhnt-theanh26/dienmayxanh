<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class OrderController extends Controller
{
    public function create(Request $request)
    {
        // do {
        //     $code = Str::random(16); // Sinh chuỗi ngẫu nhiên 16 ký tự
        // } while (Order::where('code', $code)->exists());
        
        $code = Str::random(16); // Sinh chuỗi ngẫu nhiên 16 ký tự
        $dataOrder = [
            // 'user_id' => Auth::user()->id, // người mua
            // 'total_amount' => $request->input('total-price'), //tổng tiền
            // // 'status' => '', // trạng thái
            // // 'payment_status' => '', // trạng thái đơn hàng
            // 'payment_method' => '', //trạng thái thanh toán
            // 'shipping_address' => '', //địa chỉ vận chuyển
            // 'shipping_phone_number' => '', // số điện thoại giao hàng

            // 

            'user_id' => Auth::user()->id,
            'code' => $code,
            'discount' => '',
            'total_amount' => $request->input('total-price'),
            'shipping_address' => '',
            'phone' => '',
            'recipient_name' => '',
            'order_date' => '',
            'node' => '',
            'payment_method' => '',
            'status' => '',
            'payment_status' => '',
            'expiry_time' => '',
            'transaction_time' => '',
        ];
        return $dataOrder;
    }
}
