<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\BillItem;
use App\Models\Order;
use App\Models\ProductVariant;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{

    public function index()
    {
        if (!Auth::check()) {
            Alert::error('Đăng nhập', 'Vui lòng đăng nhập tài khoản!');
            return redirect()->route('login.form');
        }
        $bills = Bill::where('id', Auth::user()->id)->get();
        return view('client.page.bill.index', compact('bills'));
    }

    public function create(Request $request)
    {
        do {
            $code = Str::random(16);
        } while (Bill::where('code', $code)->exists());
        $variants = [];
        $errors = [];
        foreach (Cart::content() as $item) {
            $variant = ProductVariant::where('id', $item->id)->first();
            if ($variant) {
                if ($variant->stock_quantity >= $item->qty) {
                    array_push($variants, $item);
                } else {
                    $errors[] = 'Sản phẩm ' . $variant->name . ' chỉ còn ' . $variant->stock_quantity;
                }
            } else {
                $errors[] = 'Không tìm thấy sản phẩm với ID ' . $item->id;
            }
        }
        if (!empty($errors)) {
            return redirect()->back()->with('js_errors', $errors);
        }
        $dataOrderOffline = [
            'user_id' => Auth::user()->id,
            'code' => $code,
            'discount' => $request['discount'],
            'total_amount' => $request['total-price'],
            'shipping_address' => $request['address'],
            'phone' => $request['phone'],
            'recipient_name' => $request['name'],
            'order_date' => Carbon::now(),
            'note' => $request['other-request'],
            'payment_method' => 'offline',
            'status' => 1,
            'payment_status' => 'Unpaid',
            'refund' => false,
            'refund_amount' => $request['total-price'],
            'refund_reason' => null,
            'refund_time' => null,
            'refund_status' => null,
        ];
        $bill = Bill::create($dataOrderOffline);
        $dataOrderItem = [];
        foreach ($variants as $item) {
            $dataOrderItem[] = [
                'bill_id' => $bill->id,
                'name' => $item->name,
                'variant' => $item->options->variant,
                'quantity' => $item->qty,
                'price' => $item->price,
                'total_price' => $item->qty * $item->price,
            ];
        }
        foreach ($dataOrderItem as $value) {
            BillItem::create($value);
        }
        Cart::destroy();
        Alert::success('Đặt hàng thành công', 'Đã đặt hàng thành công');
        return redirect()->route('index');
        // $dataOrderOnline = [
        //     'user_id' => Auth::user()->id,
        //     'code' => $code,
        //     'discount' => $request['discount'],
        //     'total_amount' => $request['total-price'],
        //     'shipping_address' => $request['address'],
        //     'phone' => $request['phone'],
        //     'recipient_name' => $request['name'],
        //     'order_date' => Carbon::now(),
        //     'transaction_time' => null,
        //     'expiry_time' => Carbon::now(),
        //     'note' => $request['other-request'],
        //     'payment_method' => $request['payment'],
        //     'status' => 1,
        //     'payment_status' => 'Unpaid',
        //     'refund' => false,
        //     'refund_amount' => '',
        //     'refund_reason' => '',
        //     'refund_transaction_id' => '',
        //     'refund_time' => '',
        //     'refund_status' => '',
        // ];

        return $dataOrderOffline;
    }
}
