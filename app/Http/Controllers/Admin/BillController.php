<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BillController extends Controller
{
    public function index()
    {
        $bills = Bill::orderBy('id', 'desc')->get();
        return view('admin.page.bill.index', compact('bills'));
    }

    // yêu cầu hủy hàng
    public function requestCancellation()
    {
        $bills = Bill::
            orderBy('id', 'desc')
            ->where('status', '!=', 'Cancelled')
            ->where('status_cancel', 'requested')
            ->where('status_cancel', 'requested')
            ->get();
        return view('admin.page.bill.requestCancellation', compact('bills'));
    }

    // chấp nhận hủy
    public function acceptCancel(string $id)
    {
        try {
            $bill = Bill::where('id', $id)->first();
            if (!$bill) {
                Alert::error('Thất bại!', 'Không tìm thấy đơn hàng!');
                return redirect()->back()->with('error', 'Không tìm thấy đơn hàng!');
            }
            $bill->update([
                'status' => 'Cancelled',
                'status_cancel' => 'accepted',
            ]);
            Alert::success('Thành công', 'Đã chấp nhận hủy đơn hàng!');
            return redirect()->back()->with('success', 'Đã chấp nhận hủy đơn hàng!');
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra:', $th->getMessage());
            return redirect()->back()->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
    }

    // không chấp nhận
    public function rejectedCancel(string $id)
    {
        try {
            $bill = Bill::where('id', $id)->first();
            if (!$bill) {
                Alert::error('Thất bại!', 'Không tìm thấy đơn hàng!');
                return redirect()->back()->with('error', 'Không tìm thấy đơn hàng!');
            }
            $bill->update([
                'status_cancel' => 'rejected',
            ]);
            Alert::warning('Không chấp nhận', 'Không chấp nhận hủy đơn hàng!');
            return redirect()->back()->with('warning', 'Không chấp nhận hủy đơn hàng!');
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra:', $th->getMessage());
            return redirect()->back()->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
    }

    public function pending()
    {
        $bills = Bill::orderBy('id', 'desc')
            ->where('status', 'Pending')
            ->where('payment_method', 'offline')
            ->where('status_cancel', '!=', 'requested')
            ->get();
        return view('admin.page.bill.pending', compact('bills'));
    }

    public function waitingpayment()
    {
        $bills = Bill::where('payment_status', 'Payment Failed')
            ->where('expiry_time', '>=', now())
            ->get();
        return view('admin.page.bill.waitingpayment', compact('bills'));
    }

    public function confirmed()
    {
        $bills = Bill::orderBy('id', 'desc')
            ->where('status', 'Confirmed')
            ->where('status_cancel', '!=', 'requested')
            ->get();
        return view('admin.page.bill.confirmed', compact('bills'));
    }

    public function preparing()
    {
        $bills = Bill::orderBy('id', 'desc')
            ->where('status', 'Preparing')
            ->where('status_cancel', '!=', 'requested')
            ->get();
        return view('admin.page.bill.preparing', compact('bills'));
    }

    public function shipping()
    {
        $bills = Bill::orderBy('id', 'desc')->where('status', 'Shipping')->get();
        return view('admin.page.bill.shipping', compact('bills'));
    }

    public function refund()
    {
        $bills = Bill::orderBy('id', 'desc')->where('status', 'Refund')->get();
        return view('admin.page.bill.refund', compact('bills'));
    }

    public function delivered()
    {
        $bills = Bill::orderBy('id', 'desc')->where('status', 'Delivered')->get();
        return view('admin.page.bill.delivered', compact('bills'));
    }

    public function cancelled()
    {
        $bills = Bill::orderBy('id', 'desc')->where('status', 'Cancelled')->get();
        return view('admin.page.bill.cancelled', compact('bills'));
    }

    public function status(Request $request)
    {
        try {
            $id = $request['id'];
            $status = $request['status'];
            $statusArr = ['Pending', 'Confirmed', 'Preparing', 'Shipping'];
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
            Alert::error('Có lỗi xảy ra', 'Không chuyển đổi trạng thái đơn hàng!');
            return redirect()->back()->with('error', 'Không chuyển đổi trạng thái đơn hàng!');
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra:', $th->getMessage());
            return redirect()->route('admin.product.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
    }

}
