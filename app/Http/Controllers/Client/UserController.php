<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function saveAddress(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();
        if (!$user) {
            Alert::error('Khong tim thay user:');
            return redirect()->route('index')->with('error', 'Khong tim thay user');
        }
        if (empty($request->allDressHiding)) {
            Alert::error('Cập nhập thất bại', 'Cập nhập địa chỉ thất bại');
            return redirect()->route('index');
        }
        $user->address = $request->input('allDressHiding');
        $user->save();
        Alert::success('Cập nhập thành công', 'Cập nhập địa chỉ thành công');
        return redirect()->route('index');
    }

    public function update(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();
        if (!$user) {
            Alert::error('Khong tim thay user:');
            return redirect()->route('bill.index')->with('error', 'Khong tim thay user');
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
                $imagePath = 'storage/' . $request->file('image')->store('user', 'public');
                $data['image'] = $imagePath;
                if ($imagePath != null) {
                    if ($user->image != null && file_exists(public_path($user->image))) {
                        unlink(public_path($user->image));
                    }
                }
            }
            $user->update($data);
            Alert::success('Thanh cong', 'Cập nhập thông tin thành công');
            return redirect()->back();
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra:', $th->getMessage());
            return redirect()->back();
        }
    }

    public function password(Request $request)
    {
        try {
            $user = User::where('id', Auth::user()->id)->first();
            if (!$user) {
                Alert::error('Thất bại','không tìm thấy tài khoản!');
                return redirect()->back();
            }
            $validated = $request->validate([
                'old_password' => 'required|string|max:255',
                'new_password' => 'required|string|min:3|max:255',
                'confirm_password' => 'required|same:new_password',
            ]);
            if (!Hash::check($request->old_password, $user->password)) {
                Alert::error('Thất bại','Mật khẩu cũ không đúng!!!!');
                return redirect()->back();
            }
            if (Hash::check($request->new_password, $user->password)) {
                Alert::error('Thất bại','Mật khẩu mới không được giống mật khẩu cũ!!!!');
                return redirect()->back();
            }
            $data = [
                'password' => Hash::make($validated['new_password']),
            ];
            $user->update($data);
            if ($user->update($data)) {
                Alert::success('Thành công', 'Cập nhập mật khẩu thành công');
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra:', $th->getMessage());
            return redirect()->back();
        }
    }
}
