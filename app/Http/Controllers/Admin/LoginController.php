<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    //
    public function showlogin(Request $request)
    {
        return view("admin.page.logandre.login");
    }

    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|string',
            ]);
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                Alert::success('Đăng nhập thành công:', 'Xin chào: ' . $request->email);
                return redirect()->route('admin.dashboard');
            } else {
                Alert::error("Invalid email or password");
                return redirect()->back()->with("error", "Invalid email or password");
            }

        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra:', $th->getMessage());
            return redirect()->back()->with("error", 'Có lỗi xảy ra:' . $th->getMessage());
        }
    }

    public function showregister(Request $request)
    {
        return view("admin.page.logandre.register");
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
}
