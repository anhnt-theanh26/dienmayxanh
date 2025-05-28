<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function index()
    {
        $bills = Bill::orderBy('id', 'desc')->get();
        return view('admin.page.bill.index', compact('bills'));
    }

    public function pending()
    {
        $bills = Bill::orderBy('id', 'desc')->where('status', 'Pending')->where('payment_method', 'offline')->get();
        return view('admin.page.bill.pending', compact('bills'));
    }

    public function waitingpayment()
    {
        $bills = Bill::where('payment_status', 'Payment Failed')->where('expiry_time', '>=', now())->get();
        return view('admin.page.bill.waitingpayment', compact('bills'));
    }

    public function confirmed()
    {
        $bills = Bill::orderBy('id', 'desc')->where('status', 'Confirmed')->get();
        return view('admin.page.bill.confirmed', compact('bills'));
    }

    public function preparing()
    {
        $bills = Bill::orderBy('id', 'desc')->where('status', 'Preparing')->get();
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

}
