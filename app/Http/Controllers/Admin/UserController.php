<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();
        return view('admin.page.user.index', compact('users'));
        // if (Auth::user()->can('index user')){
        // }else{
        //     Alert::error('Không có quyền truy cập');
        //     return redirect()->route('admin.dashboard');
        // }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.page.user.create');
        // if (Auth::user()->can('create user')){
        // }else{
        //     Alert::error('Không có quyền truy cập');
        //     return redirect()->route('admin.dashboard');
        // }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:3',
                'phone' => 'nullable|numeric|min:10||unique:users,phone',
                'address' => 'nullable|string',
                'birthday' => 'nullable|date',
                'image' => 'nullable|url|'
            ]);
            $data = [
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'phone' => $validated['phone'],
                'address' => $validated['address'],
                'birthday' => $validated['birthday'],
                'image' => $validated['image'],
            ];
            $user = User::create($data);
            if ($user) {
                Alert::success('Thanh cong', 'Them moi user thanh cong');
                return redirect()->route('admin.user.index')->with('success', 'Thêm mới user thành công');
            }
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra:', $th->getMessage());
            return redirect()->route('admin.user.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
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
        $user = User::where('id', $id)->first();
        if (!$user) {
            Alert::error('Khong tim thay user:');
            return redirect()->route('admin.user.index')->with('error', 'Khong tim thay user');
        }
        return view('admin.page.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $user = User::where('id', $id)->first();
            if (!$user) {
                Alert::error('Khong tim thay user:');
                return redirect()->route('admin.user.index')->with('error', 'Khong tim thay user');
            }
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . $user->id,
                'phone' => 'nullable|numeric|min:10||unique:users,phone,' . $user->id,
                'address' => 'nullable|string|max:255',
                'birthday' => 'nullable|date',
                'image' => 'nullable|url|max:255'
            ]);
            $data = [
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'address' => $validated['address'],
                'birthday' => $validated['birthday'],
                'image' => $validated['image'],
            ];
            $user->update($data);
            if ($user->update($data)) {
                Alert::success('Thanh cong', 'Chinh sua user thanh cong');
                return redirect()->route('admin.user.edit', $user->id)->with('success', 'Chinh sua user thành công');
            }
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra:', $th->getMessage());
            return redirect()->route('admin.user.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
    }

    public function password(Request $request, string $id)
    {
        try {
            $user = User::where('id', $id)->first();
            if (!$user) {
                Alert::error('Khong tim thay user:');
                return redirect()->route('admin.user.index')->with('error', 'Khong tim thay user');
            }
            $validated = $request->validate([
                'old_password' => 'required|string|max:255',
                'new_password' => 'required|string|min:3|max:255',
                'confirm_password' => 'required|same:new_password',
            ]);
            if (!Hash::check($request->old_password, $user->password)) {
                Alert::error('Mật khẩu cũ không đúng!!!!');
                return redirect()->route('admin.user.edit', $user->id)->with('password_is_incorrect', 'Mat khau cu khong dung!!');
            }
            if (Hash::check($request->new_password, $user->password)) {
                Alert::error('Mật khẩu mới không được giống mật khẩu cũ!!!!');
                return redirect()->route('admin.user.edit', $user->id)->with('oldpassword_like_newpassword', 'Mat khau mới không được giống mật khẩu cũ!!');
            }
            $data = [
                'password' => Hash::make($validated['new_password']),
            ];
            $user->update($data);
            if ($user->update($data)) {
                Alert::success('Thanh cong', 'Cap nhap mat khau user thanh cong');
                return redirect()->route('admin.user.edit', $user->id)->with('success', 'Cap nhap mat khau user thanh cong');
            }
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra:', $th->getMessage());
            return redirect()->route('admin.user.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $user = User::onlyTrashed()->where('id', $id)->first();
            if (!$user) {
                Alert::error('Khong thay user', 'user khong ton tai');
                return redirect()->route('admin.user.index')->with('error', 'Khong tim thay user!');
            }
            $user->forceDelete();
            Alert::success('Thanh cong', 'Xoa vinh vien user thanh cong');
            return redirect()->route('admin.user.index')->with('success', 'Xoa user thanh cong!');
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra:', $th->getMessage());
            return redirect()->route('admin.user.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
    }

    public function delete(string $id)
    {
        try {
            $user = User::where('id', $id)->first();
            if (!$user) {
                Alert::error('Có lỗi xảy ra', 'Khong tim thay user');
                return redirect()->route('admin.user.index')->with('error', 'Khong tim thay user!');
            }
            $user->delete();
            Alert::success('Thanh cong', 'Xoa user thanh cong');
            return redirect()->route('admin.user.index')->with('success', 'Xoa user thanh cong!');
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra:', $th->getMessage());
            return redirect()->route('admin.user.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
    }

    public function deleted()
    {
        $users = User::onlyTrashed()->orderBy('id', 'desc')->get();
        return view('admin.page.user.restore', compact('users'));
    }

    public function restore(string $id)
    {
        try {
            $user = User::withTrashed()->where("id", $id)->first();
            if (!$user) {
                Alert::error('Có lỗi xảy ra', 'Khong tim thay user');
                return redirect()->route('admin.user.index')->with('error', 'Khong tim thay user!');
            }
            $user->restore();
            Alert::success('Thanh cong', 'Khoi phuc user thanh cong');
            return redirect()->route('admin.user.index')->with('success', 'Khoi phuc user thanh cong!');
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra:', $th->getMessage());
            return redirect()->route('admin.user.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
    }

    public function search(Request $request, string $keyword)
    {
        $status = $request->status;
        if ($status == 'index') {
            $results = User::where('name', 'LIKE', '%' . $keyword . '%')->orderBy('id', 'desc')->get();
            if ($keyword == ' ') {
                $results = User::orderBy('id', 'desc')->get();
            }
        }
        if ($status == 'delete') {
            $results = User::onlyTrashed()->where('name', 'LIKE', '%' . $keyword . '%')->orderBy('id', 'desc')->get();
            if ($keyword == ' ') {
                $results = User::onlyTrashed()->orderBy('id', 'desc')->get();
            }
        }
        return view('admin.page.user.search', compact('results', 'status'));
    }
}
