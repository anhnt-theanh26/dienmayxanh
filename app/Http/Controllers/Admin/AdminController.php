<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Bill;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::user()->can('index dashboard')) {
            $billsThisMonth = Bill::whereMonth('created_at', Carbon::now()->month)
                ->whereYear('created_at', Carbon::now()->year)
                ->whereNotIn('status', ['Cancelled', 'Returned', 'Refunded', 'Failed'])
                ->get();
            $billsLastMonth = Bill::whereMonth('created_at', Carbon::now()->subMonth()->month)
                ->whereYear('created_at', Carbon::now()->subMonth()->year)
                ->whereNotIn('status', ['Cancelled', 'Returned', 'Refunded', 'Failed'])
                ->get();
            $users = User::get();
            $products = Product::get();
            return view("admin.page.dashboard.index", compact('billsThisMonth', 'billsLastMonth', 'users', 'products'));
        } else {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            Alert::error('Không có quyền truy cập');
            return redirect()->route('index');
        }
    }

    public static function formatCurrencyVN($number)
    {
        if ($number >= 1000000000) {
            return round($number / 1000000000, 1) . 't'; // tỷ
        } elseif ($number >= 1000000) {
            return round($number / 1000000, 1) . 'tr'; // triệu
        } elseif ($number >= 1000) {
            return round($number / 1000, 1) . 'k'; // nghìn
        }

        return (string) $number;
    }
}
