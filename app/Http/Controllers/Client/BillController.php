<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\BillItem;
use App\Models\ProductVariant;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class BillController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            Alert::error('Đăng nhập', 'Vui lòng đăng nhập tài khoản!');
            return redirect()->route('login.form');
        }
        $bills = Bill::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        return view('client.page.bill.right', compact('bills'));
    }

    public function cancel(Request $request, string $id)
    {
        $bill = Bill::where('id', $id)->first();
        if (!$bill) {
            Alert::error('Không tìm thấy', 'Không tìm thấy hóa đơn của bạn!');
            return redirect()->back();
        }
        $request->validate([
            'reason' => 'required|max:255',
        ]);
        try {
            $bill->reason_cancel = $request->reason;
            $bill->save();
            Alert::success('Thành công', 'Đã gửi yêu cầu hủy đơn hàng!');
            return redirect()->back();
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra:', $th->getMessage());
            return redirect()->back()->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
    }
    public function create(Request $request)
    {
        try {
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
            $dataOrder = [
                'user_id' => Auth::user()->id,
                'code' => $code,
                'discount' => $request['discount'],
                'total_amount' => $request['total-price'],
                'shipping_address' => $request['address'],
                'phone' => $request['phone'],
                'recipient_name' => $request['name'],
                'order_date' => Carbon::now(),
                'note' => $request['note'],
                'payment_method' => $request['payment'],
                'status' => 'Pending',
                'payment_status' => 'Unpaid',
                'refund' => false,
                'refund_amount' => $request['total-price'],
            ];
            $bill = Bill::create($dataOrder);
            $dataOrderItem = [];
            foreach ($variants as $item) {
                $dataOrderItem[] = [
                    'bill_id' => $bill->id,
                    'product_id' => $item->options->product->id,
                    'name' => $item->name,
                    'image' => $item->options->image,
                    'variant' => $item->options->variant,
                    'quantity' => $item->qty,
                    'price' => $item->price,
                    'total_price' => $item->qty * $item->price,
                ];
            }
            foreach ($dataOrderItem as $value) {
                BillItem::create($value);
            }
            DB::commit();
            Cart::destroy();
            if ($request->payment == 'offline') {
                Alert::success('Đặt hàng thành công', 'Đã đặt hàng thành công');
                return redirect()->route('bill.index');
            }
            if ($request->payment == 'online') {
                return redirect()->route('order.vnpay_payment', ['id' => $bill->id]);
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('Có lỗi xảy ra:', $th->getMessage());
            return redirect()->back()->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
    }
}
