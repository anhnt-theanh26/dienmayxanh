<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.page.profile.index');
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            Alert::error('Khong tim thay user:');
            return redirect()->back()->with('error', 'Khong tim thay user');
        }
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|numeric|min:10|unique:users,phone,' . $user->id,
            'address' => 'nullable|string|max:255',
            'birthday' => 'nullable|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        try {
            $data = [
                'name' => $request['name'],
                'email' => $request['email'],
                'phone' => $request['phone'],
                'address' => $request['address'],
                'birthday' => $request['birthday'],
            ];
            if ($request->hasFile('image')) {
                if ($user->image && file_exists(public_path($user->image))) {
                    unlink(public_path($user->image));
                }
                $imagePath = 'storage/' . $request->file('image')->store('avatar', 'public');
                $data['image'] = $imagePath;
                if ($imagePath != null) {
                    if ($user->image != null && file_exists(public_path($user->image))) {
                        unlink(public_path($user->image));
                    }
                }
            }
            $user->update($data);
            Alert::success('Thanh cong', 'Chinh sua tai khoan thanh cong');
            return redirect()->back()->with('success', 'Chinh sua tai khoan thành công');
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra:', $th->getMessage());
            return redirect()->back()->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
    }
    public function security()
    {
        return view('admin.page.profile.security');
    }
    public function securityUpdate(Request $request)
    {
        $request->validate([
            'currentPassword' => 'required|string|max:255',
            'newPassword' => 'required|string|min:3|max:255',
            'confirmPassword' => 'required|same:newPassword',
        ]);
        $user = Auth::user();
        if (!Hash::check($request->currentPassword, $user->password)) {
            // Alert::error('Mật khẩu cũ không đúng!!!!');
            return redirect()->back()->with('password_is_incorrect', 'Mat khau cu khong dung!!');
        }
        if (Hash::check($request->newPassword, $user->password)) {
            // Alert::error('Mật khẩu mới không được giống mật khẩu cũ!!!!');
            return redirect()->back()->with('oldpassword_like_newpassword', 'Mat khau mới không được giống mật khẩu cũ!!');
        }
        if ($request->newPassword !== $user->confirmPassword) {
            // Alert::error('Mật khẩu không trùng!!!!');
            return redirect()->back()->with('newpassword_notlike_confirmpassword', 'Mat khau mới không được giống mật khẩu cũ!!');
        }
        try {
            $data = [
                'password' => Hash::make($request['newPassword']),
            ];
            $user->update($data);
            Alert::success('Thanh cong', 'Cap nhap mat khau tai khoan thanh cong');
            return redirect()->back()->with('success', 'Cap nhap mat khau tai khoan thanh cong');
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra:', $th->getMessage());
            return redirect()->back()->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
    }

    public function delete(Request $request)
    {
        if (Auth::user()->image != null && file_exists(public_path(Auth::user()->image))) {
            unlink(public_path(Auth::user()->image));
        }
        Auth::user()->update([
            'image' => '',
        ]);
        Auth::user()->delete();
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        // Alert::success('Thanh cong', 'Tài khoản của bạn đã được xóa!!!');
        return redirect()->route('admin.login');
    }
}
