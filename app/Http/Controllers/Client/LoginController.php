<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Mail\SendEmail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function index()
    {
        return view('client.page.login.login');
    }

    public function login(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'password' => 'required',
            ]);
            $credentials = $request->only('name', 'password');
            $remember = $request->has('remember') ? true : false;
            $loginSuccess =
                Auth::attempt([
                    'email' => $credentials['name'],
                    'password' => $credentials['password']
                ], $remember) ||
                Auth::attempt([
                    'phone' => $credentials['name'],
                    'password' => $credentials['password']
                ], $remember);
            if ($loginSuccess) {
                // $infor = [
                //     'title' => 'Thong bao Dang nhap',
                //     'email' => $request->name,
                //     'content' => "Tai khoan co name: $request->name vua dang nhap vao he thong cua ban!",
                //     'time' => "Thoi gian: " . Carbon::now() . "!",
                // ];
                // // send mail
                // Mail::to('anhntph43180@fpt.edu.vn')->send(new SendEmail($infor));
                Alert::success('Đăng nhập thành công:', 'Xin chào: ' . Auth::user()->name);
                return redirect()->route('index');
            } else {
                Alert::error("Đăng nhập thất bại", "Email/SĐT hoặc mật khẩu không đúng");
                return redirect()->back()->withInput()->with("error", "Sai thông tin đăng nhập");
            }
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra:', $th->getMessage());
            return redirect()->back()->with("error", 'Có lỗi xảy ra:' . $th->getMessage());
        }
    }

    public function create()
    {
        return view('client.page.login.register');
    }

    public function register(Request $request)
    {
        return $request;
    }
}
