<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\BillItem;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class BillController extends Controller
{
    public function index()
    {
        if (Auth::user()->can('index bill')) {
            $bills = Bill::orderBy('id', 'desc')->get();
            return view('admin.page.bill.index', compact('bills'));
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }

    // yêu cầu hủy hàng
    public function requestCancellation()
    {
        if (Auth::user()->can('index bill')) {
            $bills = Bill::orderBy('id', 'desc')
                ->where('status', '!=', 'Cancelled')
                ->where('status_cancel', 'requested')
                ->where('status_cancel', 'requested')
                ->get();
            return view('admin.page.bill.requestCancellation', compact('bills'));
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }

    public function pending()
    {
        if (Auth::user()->can('index bill')) {
            $bills = Bill::orderBy('id', 'desc')
                ->where('status', 'Pending')
                ->where('payment_method', 'offline')
                ->where('status_cancel', '!=', 'requested')
                ->get();
            return view('admin.page.bill.pending', compact('bills'));
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }

    public function waitingpayment()
    {
        if (Auth::user()->can('index bill')) {
            $bills = Bill::where('payment_status', 'Payment Failed')
                ->where('expiry_time', '>=', now())
                ->get();
            return view('admin.page.bill.waitingpayment', compact('bills'));
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }

    public function confirmed()
    {
        if (Auth::user()->can('index bill')) {
            $bills = Bill::orderBy('id', 'desc')
                ->where('status', 'Confirmed')
                ->where('status_cancel', '!=', 'requested')
                ->get();
            return view('admin.page.bill.confirmed', compact('bills'));
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }

    public function preparing()
    {
        if (Auth::user()->can('index bill')) {
            $bills = Bill::orderBy('id', 'desc')
                ->where('status', 'Preparing')
                ->where('status_cancel', '!=', 'requested')
                ->get();
            return view('admin.page.bill.preparing', compact('bills'));
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }

    public function shipping()
    {
        if (Auth::user()->can('index bill')) {
            $bills = Bill::orderBy('id', 'desc')->where('status', 'Shipping')->get();
            return view('admin.page.bill.shipping', compact('bills'));
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }

    public function refund()
    {
        if (Auth::user()->can('index bill')) {
            $bills = Bill::orderBy('id', 'desc')->where('status', 'Cancelled')->where('refund_status', 'Pending')->get();
            return view('admin.page.bill.refund', compact('bills'));
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }

    public function delivered()
    {
        if (Auth::user()->can('index bill')) {
            $bills = Bill::orderBy('id', 'desc')->where('status', 'Delivered')->get();
            return view('admin.page.bill.delivered', compact('bills'));
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }

    public function cancelled()
    {
        if (Auth::user()->can('index bill')) {
            $bills = Bill::orderBy('id', 'desc')->where('status', 'Cancelled')->get();
            return view('admin.page.bill.cancelled', compact('bills'));
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }

    public function return()
    {
        if (Auth::user()->can('index bill')) {
            $bills = Bill::orderBy('id', 'desc')->where('status', 'Returned')->get();
            return view('admin.page.bill.return', compact('bills'));
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }

    public function status(Request $request)
    {
        if (Auth::user()->can('edit bill')) {
            try {
                $id = $request['id'];
                $status = $request['status'];
                $statusArr = ['Pending', 'Confirmed', 'Preparing', 'Shipping', 'Delivered'];
                $bill = Bill::where('id', $id)->first();
                if (!$bill) {
                    Alert::error('Không tìm thấy!', 'Đơn hàng không được tìm thấy!');
                    return redirect()->back()->with('error', 'Đơn hàng không được tìm thấy!');
                }
                if ($bill->status == 'Pending') {
                    if (in_array($status, array_slice($statusArr, 1, 3))) {
                        if ($status == 'Confirmed') {
                            $text = 'Đơn hàng đã được xác nhận!';
                        } else if ($status == 'Preparing') {
                            $text = 'Đơn hàng đã được chuẩn bị!';
                        } else if ($status == 'Shipping') {
                            $text = 'Đơn hàng đã được giao đi!';
                        } else {
                            $text = 'Trạng thái đơn hàng đã được cập nhập!';
                        }
                        $bill->status = $status;
                        $bill->save();
                        Alert::success('Thành công', $text);
                        return redirect()->back()->with('success', $text);
                    }
                }
                if ($bill->status == 'Confirmed') {
                    if (in_array($status, array_slice($statusArr, 2, 3))) {
                        if ($status == 'Preparing') {
                            $text = 'Đơn hàng đã được chuẩn bị!';
                        } else if ($status == 'Shipping') {
                            $text = 'Đơn hàng đã được giao đi!';
                        } else {
                            $text = 'Trạng thái đơn hàng đã được cập nhập!';
                        }
                        $bill->status = $status;
                        $bill->save();
                        Alert::success('Thành công', $text);
                        return redirect()->back()->with('success', $text);
                    }
                }
                if ($bill->status == 'Preparing') {
                    if (in_array($status, array_slice($statusArr, 2, 3))) {
                        if ($status == 'Shipping') {
                            $text = 'Đơn hàng đã được giao đi!';
                        } else {
                            $text = 'Trạng thái đơn hàng đã được cập nhập!';
                        }
                        $bill->status = $status;
                        $bill->save();
                        Alert::success('Thành công', $text);
                        return redirect()->back()->with('success', $text);
                    }
                }
                if ($bill->status == 'Shipping') {
                    if (in_array($status, array_slice($statusArr, 2, 3))) {
                        if ($status == 'Delivered') {
                            $text = 'GIao hàng thành công!';
                        } else {
                            $text = 'Trạng thái đơn hàng đã được cập nhập!';
                        }
                        $bill->payment_status = 'Paid';
                        $bill->status = $status;
                        $bill->save();
                        Alert::success('Thành công', $text);
                        return redirect()->back()->with('success', $text);
                    }
                }
                Alert::error('Có lỗi xảy ra', 'Không chuyển đổi trạng thái đơn hàng!');
                return redirect()->back()->with('error', 'Không chuyển đổi trạng thái đơn hàng!');
            } catch (\Throwable $th) {
                Alert::error('Có lỗi xảy ra:', $th->getMessage());
                return redirect()->route('admin.product.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
            }
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }

    // chấp nhận hủy
    public function replyCancel(Request $request)
    {
        if (Auth::user()->can('edit bill')) {
            try {
                $id = $request['id'];
                $status = $request['status'];
                $bill = Bill::where('id', $id)->first();
                if (!$bill) {
                    Alert::error('Thất bại!', 'Không tìm thấy đơn hàng!');
                    return redirect()->back()->with('error', 'Không tìm thấy đơn hàng!');
                }
                if ($bill->status_cancel == 'requested') {
                    if ($status == 'accepted') {
                        $bill->update([
                            'status' => 'Cancelled',
                            'status_cancel' => 'accepted',
                        ]);
                        $billItems = BillItem::where('bill_id', $bill->id)->get();
                        foreach ($billItems as $billItem) {
                            if ($billItem->product_id != null) {
                                $product = Product::where('id', $billItem->product_id)->first();
                                if ($product) {
                                    $product->sold -= $billItem->quantity;
                                    $product->save();
                                }
                            }
                            if ($billItem->product_variant_id != null) {
                                $product_variant = ProductVariant::where('id', $billItem->product_variant_id)->first();
                                if ($product_variant) {
                                    $product_variant->stock_quantity += $billItem->quantity;
                                    $product_variant->save();
                                }
                            }
                        }
                        Alert::success('Thành công', 'Đã chấp nhận hủy đơn hàng!');
                        return redirect()->back()->with('success', 'Đã chấp nhận hủy đơn hàng!');
                    }
                    if ($status == 'rejected') {
                        $bill->update([
                            'status_cancel' => 'rejected',
                        ]);
                        Alert::warning('Không chấp nhận', 'Không chấp nhận hủy đơn hàng!');
                        return redirect()->back()->with('error', 'Không chấp nhận hủy đơn hàng!');
                    }
                }
                if ($status != 'accepted' && $status != 'rejected') {
                    Alert::error('Có lỗi', 'Không thể chuyển đổi trạng thái hủy hàng!');
                    return redirect()->back()->with('error', 'Không thể chuyển đổi trạng thái hủy hàng!');
                }
            } catch (\Throwable $th) {
                Alert::error('Có lỗi xảy ra:', $th->getMessage());
                return redirect()->back()->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
            }
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }

    public function replyRefund(Request $request)
    {
        if (Auth::user()->can('edit bill')) {
            try {
                $id = $request['id'];
                $status = $request['status'];
                $bill = Bill::where('id', $id)->first();
                if ($bill->payment_method == 'offline') {
                    Alert::error('Có lỗi', 'Đơn hàng thanh toán nhận hàng!');
                    return redirect()->back()->with('error', 'Đơn hàng thanh toán nhận hàng!');
                }
                if ($status == 'Success') {
                    Alert::error('Có lỗi', 'Hiện tại chưa thể hoàn tiền!');
                    return redirect()->back()->with('error', 'Hiện tại chưa thể hoàn tiền!');
                }
                if ($status == 'Failed') {
                    $data = [
                        'refund_status' => 'Failed',
                    ];
                    $bill->update($data);
                    Alert::warning('Không chấp nhận', 'Không chấp nhận hoàn tiền!');
                    return redirect()->back()->with('error', 'Không chấp nhận hoàn tiền!');
                }
                Alert::error('Có lỗi', 'Không thể chuyển đổi trạng thái hoàn tiền!');
                return redirect()->back()->with('error', 'Không thể chuyển đổi trạng thái hoàn tiền!');
            } catch (\Throwable $th) {
                Alert::error('Có lỗi xảy ra:', $th->getMessage());
                return redirect()->back()->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
            }
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }


    public function show(string $id)
    {
        if (Auth::user()->can('index bill')) {
            try {
                $bill = Bill::where('id', $id)->first();
                if (!$bill) {
                    Alert::error('Thất bại!', 'Không tìm thấy đơn hàng!');
                    return redirect()->back()->with('error', 'Không tìm thấy đơn hàng!');
                }
                return view('admin.page.bill.show', compact('bill'));
            } catch (\Throwable $th) {
                Alert::error('Có lỗi xảy ra:', $th->getMessage());
                return redirect()->back()->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
            }
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }

    public function search(Request $request, string $keyword)
    {
        if (Auth::user()->can('index bill')) {
            $status = $request->status;
            
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }
}
