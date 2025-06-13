<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
            $startOfWeek = Carbon::now()->startOfWeek(Carbon::MONDAY);
            $endOfWeek = Carbon::now()->endOfWeek(Carbon::SUNDAY);
            $billsThisWeek = Bill::whereBetween('created_at', [$startOfWeek, $endOfWeek])
                ->whereNotIn('status', ['Cancelled', 'Returned', 'Refunded', 'Failed'])
                ->get()
                ->groupBy(function ($bill) {
                    return $bill->created_at->format('Y-m-d');
                });
            $startOfLastWeek = Carbon::now()->subWeek()->startOfWeek(Carbon::MONDAY);
            $endOfLastWeek = Carbon::now()->subWeek()->endOfWeek(Carbon::SUNDAY);
            $billsLastWeek = Bill::whereBetween('created_at', [$startOfLastWeek, $endOfLastWeek])
                ->whereNotIn('status', ['Cancelled', 'Returned', 'Refunded', 'Failed'])
                ->get()
                ->groupBy(function ($bill) {
                    return $bill->created_at->format('Y-m-d');
                });
            $daysOfThisWeek = collect();
            for ($date = $startOfWeek->copy(); $date->lte($endOfWeek); $date->addDay()) {
                $formattedDate = $date->format('Y-m-d');
                $daysOfThisWeek->put($formattedDate, $billsThisWeek->get($formattedDate, collect()));
            }
            $orders = Bill::orderByDesc('id')->paginate(7);
            $users = User::get();
            $products = Product::count();
            $popularProducts = Product::orderByDesc('sold')->paginate(6);
            return view("admin.page.dashboard.index", compact('billsThisMonth', 'billsLastMonth', 'billsThisWeek', 'billsLastWeek', 'daysOfThisWeek', 'orders', 'users', 'products', 'popularProducts'));
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
