<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Mail\SendEmail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Auth\Events\Registered;
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
                if (Auth::user()->email_verified_at === null) {
                    Auth::logout();
                    Alert::error('Chưa xác minh email', 'Vui lòng xác minh email trước khi đăng nhập.');
                    return redirect()->back()->withInput()->with("error", "Tài khoản chưa xác minh email.");
                }
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
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'phone' => 'required|regex:/^[0-9]{10}$/',
                'password' => 'required|min:3',
                'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                'birthday' => 'required|date|before:today',
                'address' => 'nullable|string|max:255',
            ]);
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
                'birthday' => $request->birthday,
                'address' => $request->address,
            ];
            if ($request->hasFile('image')) {
                $path_image = $request->file('image')->store('avatar', 'public');
                $data['image'] = 'storage/' . $path_image;
            }
            $user = User::create($data);
            event(new Registered($user));
            Auth::login($user);
            Alert::success('Tạo tài khoản thành công', 'Vui lòng xác minh email');
            return redirect('/email/verify');
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra:', $th->getMessage());
            return redirect()->back()->with("error", 'Có lỗi xảy ra:' . $th->getMessage());
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Alert::success('Đăng xuất thành công:');
        return redirect()->route('index');
    }
}