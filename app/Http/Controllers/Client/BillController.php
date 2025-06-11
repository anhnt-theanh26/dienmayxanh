<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\BillItem;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Review;
use App\Models\Voucher;
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
            $data = [
                'reason_cancel' => $request->reason,
                'status_cancel' => 'requested',
            ];
            if ($bill->status == 'Pending' || $bill->status == 'Confirmed' || $bill->status == 'Preparing') {
                $bill->update($data);
                Alert::success('Thành công', 'Đã gửi yêu cầu hủy đơn hàng!');
                return redirect()->back();
            } else {
                if ($bill->status == 'Shipping') {
                    $text = 'Đơn hàng đang được gửi đến bạn!';
                } else if ($bill->status == 'Delivered') {
                    $text = 'Đơn hàng đã được gửi đến bạn!';
                } else if ($bill->status == 'Cancelled') {
                    $text = 'Đơn hàng đã được hủy!';
                } else if ($bill->status == 'Returned') {
                    $text = 'Đơn hàng đã được trả lại!';
                } else if ($bill->status == 'Refunded') {
                    $text = 'Đơn hàng đã được hoàn tiền!';
                } else if ($bill->status == 'Failed') {
                    $text = 'Đơn hàng có lỗi!';
                } else {
                    $text = 'Không thể yêu cầu hủy!';
                }
                Alert::error('Yêu cầu thất bại', $text);
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra:', $th->getMessage());
            return redirect()->back()->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
    }

    public function refund(Request $request, string $id)
    {
        try {
            $bill = Bill::where('id', $id)->first();
            if (!$bill) {
                Alert::error('Không tìm thấy', 'Không tìm thấy hóa đơn của bạn!');
                return redirect()->back();
            }
            $request->validate([
                'reason' => 'required|max:255',
            ]);
            if ($bill->payment_method == 'online') {
                $data = [
                    'refund_reason' => $request->reason,
                    'refund_status' => 'Pending',
                ];
                $bill->update($data);
                Alert::success('Đã gửi yêu cầu hoàn tiền', 'Vui lòng liên hệ với nhân viên để hoàn tiền!');
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra:', $th->getMessage());
            return redirect()->back()->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
    }
    public function create(Request $request)
    {
        if (Auth::user()->email_verified_at) {
            try {
                do {
                    $code = rand(100000, 999999);
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
                if (!empty($request['id-voucher'])) {
                    $voucher = Voucher::where('id', $request['id-voucher'])->first();
                    if ($voucher->max_use < 1) {
                        Alert::error('Voucher hết lượt sử dụng', 'Voucher bạn đang dùng đã hết lượt sử dụng!');
                        return redirect()->back();
                    }
                    if (!empty($voucher->users)) {
                        $users = json_decode($voucher->users);
                        $users = array_map(function ($value) {
                            return $value == Auth::user()->id ? null : $value;
                        }, $users);
                        $voucher->users = json_encode($users);
                    }
                    $voucher->max_use -= 1;
                    $voucher->save();
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
                        'product_variant_id' => $item->id,
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
                    $variant = ProductVariant::where('id', $value['product_variant_id'])->first();
                    $product = Product::where('id', $value['product_id'])->first();
                    $variant->update([
                        'stock_quantity' => $variant->stock_quantity - $value['quantity'],
                    ]);
                    $product->update([
                        'sold' => $product->sold + $value['quantity'],
                    ]);
                }
                DB::commit();
                Cart::destroy();
                if ($request->payment == 'offline') {
                    Alert::success('Đặt hàng thành công', 'Đã đặt hàng thành công');
                    return redirect()->route('bill.index');
                }
                if ($request->payment == 'online') {
                    $bill->update([
                        'transaction_time' => Carbon::now(),
                        'expiry_time' => date('YmdHis', strtotime('+15 minutes', strtotime(date("YmdHis")))),
                        'status' => 'Pending',
                        'payment_status' => 'Payment Failed',
                    ]);
                    return redirect()->route('order.vnpay_payment', ['id' => $bill->id]);
                }
            } catch (\Throwable $th) {
                DB::rollBack();
                Alert::error('Có lỗi xảy ra:', $th->getMessage());
                return redirect()->back()->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
            }
        } else {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('index');
        }
    }

    public function continuePayment(string $id)
    {
        try {
            $bill = Bill::where('id', $id)->first();
            if (!$bill) {
                Alert::error('Không tìm thấy', 'Không tìm thấy hóa đơn của bạn!');
                return redirect()->back();
            }
            if (now() >= $bill->expiry_time) {
                Alert::error('Hết thời gian', 'Đơn hàng của bạn đã hết thời gian thanh toán!');
                return redirect()->back();
            }
            return redirect()->route('order.vnpay_payment', ['id' => $bill->id]);
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra:', $th->getMessage());
            return redirect()->back()->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
    }

    public function received(string $id)
    {
        try {
            $bill = Bill::where('id', $id)->first();
            if ($bill->status == 'Shipping') {
                if ($bill->user_id == Auth::user()->id) {
                    $bill->payment_status = 'Paid';
                    $bill->status = 'Delivered';
                    $bill->save();
                    Alert::success('Đã nhận hàng', 'Xác nhận đã nhận hàng!');
                    return redirect()->back();
                }
            } else {
                Alert::warning('Cảng báo', 'Đơn hàng không phải trạng thái đang giao!');
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra:', $th->getMessage());
            return redirect()->back()->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
    }

    public function review(Request $request)
    {
        $id = $request->id;
        $rating = $request->rating;
        $comment = $request->comment;
        $images = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('reviews', 'public');
                $images[] = url('storage/' . $path);
            }
        }
        $billItem = BillItem::where('id', $id)->first();
        if (!$billItem) {
            $delivered = Bill::where('status', 'Delivered')->orderBy('id', 'desc')->get();
            return [
                'status' => false,
                'message' => 'Không tìm thấy sản phẩm để đánh giá.',
                'html' => view('client.page.bill.review', compact('delivered'))->render(),
            ];
        }

        $status = false;
        $message = 'Đánh giá thất bại';
        if (Auth::user()->email_verified_at != null && Auth::user()->id == $billItem->bill->user_id) {
            $data = [
                'product_id' => $billItem->product_id,
                'user_id' => Auth::user()->id,
                'bill_item_id' => $billItem->id,
                'rating' => $rating,
                'comment' => $comment,
                'image' => json_encode($images),
            ];
            $billItem->review_status = true;
            $billItem->save();
            Review::create($data);
            $status = true;
            $message = 'Đánh giá thành công';
        }
        $delivered = Bill::where('status', 'Delivered')->orderBy('id', 'desc')->get();
        $result = [
            'status' => $status,
            'message' => $message,
            'html' => view('client.page.bill.review', compact('delivered'))->render(),
        ];
        return $result;
    }
}
