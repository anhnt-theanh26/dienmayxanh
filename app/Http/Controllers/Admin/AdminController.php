<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Bill;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::user()->can('index dashboard')) {
            $bills = Bill::whereMonth('created_at', now()->month)
                ->whereYear('created_at', now()->year)
                ->where('status', '!=', 'Cancelled')
                ->where('status', '!=', 'Returned')
                ->where('status', '!=', 'Refunded')
                ->where('status', '!=', 'Failed')
                ->get();
            $users = User::get();
            $products = Product::get();
            return view("admin.page.dashboard.index", compact('bills', 'users', 'products'));
        } else {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            Alert::error('Không có quyền truy cập');
            return redirect()->route('index');
        }
    }
}
