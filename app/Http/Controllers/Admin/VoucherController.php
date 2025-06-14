<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class VoucherController extends Controller
{
    public function index()
    {
        if (Auth::user()->can('index voucher')) {
            $vouchers = Voucher::orderBy('id', 'desc')->paginate(10);
            return view('admin.page.voucher.index', compact('vouchers'));
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }


    public function create()
    {
        if (Auth::user()->can('create voucher')) {
            $products = Product::orderBy('id', 'desc')->get();
            $users = User::orderBy('id', 'desc')->get();
            return view('admin.page.voucher.create', compact('products', 'users'));
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }


    public function store(Request $request)
    {
        if (Auth::user()->can('create voucher')) {
            $request->validate([
                'promo_code' => 'required|max:255|unique:vouchers,promo_code',
                'discount_percentage' => 'required|integer|min:1|max:100',
                'time' => 'required',
                'status' => 'nullable|boolean',
                'max_discount' => 'nullable|numeric|min:0',
                'max_use' => 'nullable|integer|min:0',
                'discount_condition' => 'nullable|numeric',
                'users' => 'nullable|array',
                'users.*' => 'nullable|exists:users,id',
                'products' => 'nullable|array',
                'products.*' => 'nullable|exists:products,id',
            ]);
            try {
                $time_start_end = explode(' - ', $request->time);
                $time_start = Carbon::createFromFormat('m/d/Y h:i A', $time_start_end[0], 'Asia/Ho_Chi_Minh');
                $time_end = Carbon::createFromFormat('m/d/Y h:i A', $time_start_end[1], 'Asia/Ho_Chi_Minh');
                $data = [
                    'promo_code' => $request->promo_code,
                    'discount_percentage' => $request->discount_percentage,
                    'start_date' => $time_start,
                    'end_date' => $time_end,
                    'time' => $request->time,
                    'status' => $request->has('status') ? true : false,
                    'max_discount' => $request->max_discount,
                    'max_use' => $request->max_use,
                    'discount_condition' => $request->discount_condition ?? 0,
                    'users' => !empty($request->users) ? json_encode($request->users) : null,
                    'products' => !empty($request->products) ? json_encode($request->products) : null,
                ];
                Voucher::create($data);
                Alert::success('Thanh cong', 'Them moi voucher thanh cong');
                return redirect()->route('admin.voucher.index')->with('success', 'Thêm mới voucher thành công');
            } catch (\Throwable $th) {
                Alert::error('Có lỗi xảy ra:', $th->getMessage());
                return redirect()->back()->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
            }
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }


    public function edit(string $id)
    {
        if (Auth::user()->can('edit voucher')) {
            try {
                $voucher = Voucher::where('id', $id)->first();
                if (!$voucher) {
                    Alert::error('Có lỗi xảy ra', 'Khong tim thay voucher:');
                    return redirect()->back()->with('error', 'Khong tim thay voucher');
                }
                $products = Product::orderBy('id', 'desc')->get();
                $users = User::orderBy('id', 'desc')->get();
                return view('admin.page.voucher.edit', compact('voucher', 'products', 'users'));
            } catch (\Throwable $th) {
                Alert::error('Có lỗi xảy ra:', $th->getMessage());
                return redirect()->back()->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
            }
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }


    public function update(Request $request, string $id)
    {
        if (Auth::user()->can('edit voucher')) {
            $voucher = Voucher::where('id', $id)->first();
            if (!$voucher) {
                Alert::error('Có lỗi xảy ra', 'Khong tim thay voucher:');
                return redirect()->back()->with('error', 'Khong tim thay voucher');
            }
            $request->validate([
                'promo_code' => 'required|max:255|unique:vouchers,promo_code,' . $voucher->id,
                'discount_percentage' => 'required|integer|min:1|max:100',
                'time' => 'required',
                'status' => 'nullable|boolean',
                'max_discount' => 'nullable|numeric|min:0',
                'max_use' => 'nullable|integer|min:0',
                'discount_condition' => 'nullable|numeric',
                'users' => 'nullable|array',
                'users.*' => 'nullable|exists:users,id',
                'products' => 'nullable|array',
                'products.*' => 'nullable|exists:products,id',
            ]);
            try {
                $time_start_end = explode(' - ', $request->time);
                $time_start = Carbon::createFromFormat('m/d/Y h:i A', $time_start_end[0], 'Asia/Ho_Chi_Minh');
                $time_end = Carbon::createFromFormat('m/d/Y h:i A', $time_start_end[1], 'Asia/Ho_Chi_Minh');
                $data = [
                    'promo_code' => $request->promo_code,
                    'discount_percentage' => $request->discount_percentage,
                    'start_date' => $time_start,
                    'end_date' => $time_end,
                    'time' => $request->time,
                    'status' => $request->has('status') ? true : false,
                    'max_discount' => $request->max_discount,
                    'max_use' => $request->max_use,
                    'discount_condition' => $request->discount_condition ?? 0,
                    'users' => !empty($request->users) ? json_encode($request->users) : null,
                    'products' => !empty($request->products) ? json_encode($request->products) : null,
                ];
                $voucher->update($data);
                Alert::success('Thanh cong', 'Cập nhật thành công');
                return redirect()->back()->with('success', 'Cập nhật thành công!');
            } catch (\Throwable $th) {
                Alert::error('Có lỗi xảy ra:', $th->getMessage());
                return redirect()->back()->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
            }
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }


    public function destroy(string $id)
    {
        if (Auth::user()->can('delete voucher')) {
            try {
                $voucher = Voucher::where('id', $id)->first();
                if (!$voucher) {
                    Alert::error('Khong thay voucher', 'Voucher khong ton tai');
                    return redirect()->back()->with('error', 'Khong tim thay voucher!');
                }
                $voucher->delete();
                Alert::success('Thanh cong', 'Xoa voucher thanh cong');
                return redirect()->back()->with('success', 'Xoa voucher thanh cong!');
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
        if (Auth::user()->can('index voucher')) {
            $status = $request->status;
            if ($status == 'index') {
                $results = Voucher::where('promo_code', 'LIKE', '%' . $keyword . '%')->orderBy('id', 'desc')->paginate(10);
                if ($keyword == ' ') {
                    $results = Voucher::orderBy('id', 'desc')->paginate(10);
                }
            }
            return view('admin.page.voucher.search', compact('results', 'status'));
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }

    public static function getUser(string $id)
    {
        return User::where('id', $id)->first();
    }

    public static function getProduct(string $id)
    {
        return Product::where('id', $id)->first();
    }
}
