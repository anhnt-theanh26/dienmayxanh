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
            // hóa đơn tháng này
            $billsThisMonth = Bill::whereMonth('created_at', Carbon::now()->month)
                ->whereYear('created_at', Carbon::now()->year)
                ->whereNotIn('status', ['Cancelled', 'Returned', 'Refunded', 'Failed'])
                ->get();
            // hóa đơn tháng trước
            $billsLastMonth = Bill::whereMonth('created_at', Carbon::now()->subMonth()->month)
                ->whereYear('created_at', Carbon::now()->subMonth()->year)
                ->whereNotIn('status', ['Cancelled', 'Returned', 'Refunded', 'Failed'])
                ->get();
            $startOfWeek = Carbon::now()->startOfWeek(Carbon::MONDAY);
            $endOfWeek = Carbon::now()->endOfWeek(Carbon::SUNDAY);
            // hóa đơn tuần này
            $billsThisWeek = Bill::whereBetween('created_at', [$startOfWeek, $endOfWeek])
                ->whereNotIn('status', ['Cancelled', 'Returned', 'Refunded', 'Failed'])
                ->get()
                ->groupBy(function ($bill) {
                    return $bill->created_at->format('Y-m-d');
                });
            $startOfLastWeek = Carbon::now()->subWeek()->startOfWeek(Carbon::MONDAY);
            $endOfLastWeek = Carbon::now()->subWeek()->endOfWeek(Carbon::SUNDAY);
            // hóa đơn tuần trước
            $billsLastWeek = Bill::whereBetween('created_at', [$startOfLastWeek, $endOfLastWeek])
                ->whereNotIn('status', ['Cancelled', 'Returned', 'Refunded', 'Failed'])
                ->get()
                ->groupBy(function ($bill) {
                    return $bill->created_at->format('Y-m-d');
                });
            // hóa đơn từng ngày của tuần này
            $daysOfThisWeek = collect();
            for ($date = $startOfWeek->copy(); $date->lte($endOfWeek); $date->addDay()) {
                $formattedDate = $date->format('Y-m-d');
                $daysOfThisWeek->put($formattedDate, $billsThisWeek->get($formattedDate, collect()));
            }
            // hóa đơn từng tháng của năm này
            $billsEachMonthOfYear = collect();
            $currentYear = Carbon::now()->year;
            for ($month = 1; $month <= 12; $month++) {
                $bills = Bill::whereMonth('created_at', $month)
                    ->whereYear('created_at', $currentYear)
                    ->whereNotIn('status', ['Cancelled', 'Returned', 'Refunded', 'Failed'])
                    ->get();
                $billsEachMonthOfYear->put(Carbon::create()->month($month)->format('F'), $bills);
            }

            $orders = Bill::orderByDesc('id')->paginate(7);
            $users = User::get();
            $products = Product::count();
            $popularProducts = Product::orderByDesc('sold')->paginate(6);
            return view("admin.page.dashboard.index", compact('billsThisMonth', 'billsLastMonth', 'billsThisWeek', 'billsLastWeek', 'daysOfThisWeek', 'orders', 'users', 'products', 'popularProducts', 'billsEachMonthOfYear'));
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

    public function search(Request $request, string $keyword)
    {
        $status = $request->status;
        $results = Bill::orderBy('id', 'desc')
            ->where('code', 'LIKE', '%' . $keyword . '%')
            ->paginate(10);
        if ($keyword == ' ') {
            $results = Bill::orderBy('id', 'desc')->paginate(7);
        }
        return view('admin.page.dashboard.search', compact('results'));
    }
}
