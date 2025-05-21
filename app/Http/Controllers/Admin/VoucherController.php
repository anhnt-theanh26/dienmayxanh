<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class VoucherController extends Controller
{
    public function index()
    {
        $vouchers = Voucher::orderBy('id', 'desc')->get();
        return view('admin.page.voucher.index', compact('vouchers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::orderBy('id', 'desc')->get();
        $users = User::orderBy('id', 'desc')->get();
        return view('admin.page.voucher.create', compact('products', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'promo_code' => 'required|max:255|unique:vouchers,promo_code',
            'discount_percentage' => 'required|integer|min:1|max:100',
            'time' => 'required',
            'status' => 'nullable|boolean',
            'max_discount' => 'nullable|numeric|min:0',
            'max_use' => 'nullable|integer|min:1',
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
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $voucher = Voucher::where('id', $id)->first();
            if (!$voucher) {
                Alert::error('Có lỗi xảy ra', 'Khong tim thay voucher:');
                return redirect()->route('admin.voucher.index')->with('error', 'Khong tim thay voucher');
            }
            $products = Product::orderBy('id', 'desc')->get();
            $users = User::orderBy('id', 'desc')->get();
            return view('admin.page.voucher.edit', compact('voucher', 'products', 'users'));
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra:', $th->getMessage());
            return redirect()->route('admin.voucher.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $voucher = Voucher::where('id', $id)->first();
        if (!$voucher) {
            Alert::error('Có lỗi xảy ra', 'Khong tim thay voucher:');
            return redirect()->route('admin.voucher.index')->with('error', 'Khong tim thay voucher');
        }
        $request->validate([
            'promo_code' => 'required|max:255|unique:vouchers,promo_code,' . $voucher->id,
            'discount_percentage' => 'required|integer|min:1|max:100',
            'time' => 'required',
            'status' => 'nullable|boolean',
            'max_discount' => 'nullable|numeric|min:0',
            'max_use' => 'nullable|integer|min:1',
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
                'discount_condition' => $request->discount_condition ?? 0,
                'users' => !empty($request->users) ? json_encode($request->users) : null,
                'products' => !empty($request->products) ? json_encode($request->products) : null,
            ];
            $voucher->update($data);
            Alert::success('Thanh cong', 'Cập nhật thành công');
            return redirect()->back()->with('success', 'Cập nhật thành công!');
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra:', $th->getMessage());
            return redirect()->route('admin.voucher.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $voucher = Voucher::where('id', $id)->first();
            if (!$voucher) {
                Alert::error('Khong thay voucher', 'Voucher khong ton tai');
                return redirect()->route('admin.voucher.index')->with('error', 'Khong tim thay voucher!');
            }
            $voucher->delete();
            Alert::success('Thanh cong', 'Xoa voucher thanh cong');
            return redirect()->route('admin.voucher.index')->with('success', 'Xoa voucher thanh cong!');
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra:', $th->getMessage());
            return redirect()->route('admin.voucher.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
    }

    public function search(Request $request, string $keyword)
    {
        $status = $request->status;
        if ($status == 'index') {
            $results = Voucher::where('promo_code', 'LIKE', '%' . $keyword . '%')->orderBy('id', 'desc')->get();
            if ($keyword == ' ') {
                $results = Voucher::orderBy('id', 'desc')->get();
            }
        }
        if ($status == 'delete') {
            $results = Voucher::onlyTrashed()->where('promo_code', 'LIKE', '%' . $keyword . '%')->orderBy('id', 'desc')->get();
            if ($keyword == ' ') {
                $results = Voucher::onlyTrashed()->orderBy('id', 'desc')->get();
            }
        }
        return view('admin.page.voucher.search', compact('results', 'status'));
    }
}
