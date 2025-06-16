<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index()
    {
        if (Auth::user()->can('index user')) {
            $users = User::orderBy('id', 'desc')->paginate(10);
            return view('admin.page.user.index', compact('users'));
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }


    public function create()
    {
        if (Auth::user()->can('create user')) {
            return view('admin.page.user.create');
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }


    public function store(Request $request)
    {
        if (Auth::user()->can('create user')) {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:3',
                'phone' => 'nullable|numeric|min:10|unique:users,phone',
                'address' => 'nullable|string',
                'birthday' => 'nullable|date',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            try {
                $data = [
                    'name' => $request['name'],
                    'email' => $request['email'],
                    'password' => Hash::make($request['password']),
                    'phone' => $request['phone'],
                    'address' => $request['address'],
                    'birthday' => $request['birthday'],
                    'email_verified_at' => Carbon::now(),
                ];
                if ($request->hasFile('image')) {
                    $imagePath = 'storage/' . $request->file('image')->store('avatar', 'public');
                    $data['image'] = $imagePath;
                }
                User::create($data);
                Alert::success('Thanh cong', 'Them moi user thanh cong');
                return redirect()->route('admin.user.index')->with('success', 'Thêm mới user thành công');
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
        if (Auth::user()->can('edit user')) {
            $user = User::where('id', $id)->first();
            if (!$user) {
                Alert::error('Khong tim thay user:');
                return redirect()->back()->with('error', 'Khong tim thay user');
            }
            return view('admin.page.user.edit', compact('user'));
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }


    public function update(Request $request, string $id)
    {
        if (Auth::user()->can('edit user')) {
            $user = User::where('id', $id)->first();
            if (!$user) {
                Alert::error('Khong tim thay user:');
                return redirect()->back()->with('error', 'Khong tim thay user');
            }
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . $user->id,
                'phone' => 'nullable|numeric|min:10|unique:users,phone,' . $user->id,
                'address' => 'nullable|string|max:255',
                'birthday' => 'nullable|date',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            try {
                $data = [
                    'name' => $validated['name'],
                    'email' => $validated['email'],
                    'phone' => $validated['phone'],
                    'address' => $validated['address'],
                    'birthday' => $validated['birthday'],
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
                Alert::success('Thanh cong', 'Chinh sua user thanh cong');
                return redirect()->back()->with('success', 'Chinh sua user thành công');
            } catch (\Throwable $th) {
                Alert::error('Có lỗi xảy ra:', $th->getMessage());
                return redirect()->back()->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
            }
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }

    public function password(Request $request, string $id)
    {
        if (Auth::user()->can('edit user')) {
            try {
                $user = User::where('id', $id)->first();
                if (!$user) {
                    Alert::error('Khong tim thay user:');
                    return redirect()->back()->with('error', 'Khong tim thay user');
                }
                $validated = $request->validate([
                    'old_password' => 'required|string|max:255',
                    'new_password' => 'required|string|min:3|max:255',
                    'confirm_password' => 'required|same:new_password',
                ]);
                if (!Hash::check($request->old_password, $user->password)) {
                    Alert::error('Mật khẩu cũ không đúng!!!!');
                    return redirect()->back()->with('password_is_incorrect', 'Mat khau cu khong dung!!');
                }
                if (Hash::check($request->new_password, $user->password)) {
                    Alert::error('Mật khẩu mới không được giống mật khẩu cũ!!!!');
                    return redirect()->back()->with('oldpassword_like_newpassword', 'Mat khau mới không được giống mật khẩu cũ!!');
                }
                $data = [
                    'password' => Hash::make($validated['new_password']),
                ];
                $user->update($data);
                Alert::success('Thanh cong', 'Cap nhap mat khau user thanh cong');
                return redirect()->back()->with('success', 'Cap nhap mat khau user thanh cong');
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
        if (Auth::user()->can('delete user')) {
            try {
                $user = User::onlyTrashed()->where('id', $id)->first();
                if (!$user) {
                    Alert::error('Khong thay user', 'user khong ton tai');
                    return redirect()->back()->with('error', 'Khong tim thay user!');
                }
                if ($user->image != null && file_exists(public_path($user->image))) {
                    unlink(public_path($user->image));
                }
                $user->forceDelete();
                Alert::success('Thanh cong', 'Xoa vinh vien user thanh cong');
                return redirect()->back()->with('success', 'Xoa user thanh cong!');
            } catch (\Throwable $th) {
                Alert::error('Có lỗi xảy ra:', $th->getMessage());
                return redirect()->back()->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
            }
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }

    public function delete(string $id)
    {
        if (Auth::user()->can('delete user')) {
            try {
                $user = User::where('id', $id)->first();
                if (!$user) {
                    Alert::error('Có lỗi xảy ra', 'Khong tim thay user');
                    return redirect()->back()->with('error', 'Khong tim thay user!');
                }
                $user->delete();
                Alert::success('Thanh cong', 'Xoa user thanh cong');
                return redirect()->back()->with('success', 'Xoa user thanh cong!');
            } catch (\Throwable $th) {
                Alert::error('Có lỗi xảy ra:', $th->getMessage());
                return redirect()->back()->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
            }
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }

    public function deleted()
    {
        if (Auth::user()->can('index user')) {
            $users = User::onlyTrashed()->orderBy('id', 'desc')->paginate(10);
            return view('admin.page.user.restore', compact('users'));
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }

    public function restore(string $id)
    {
        if (Auth::user()->can('delete user')) {
            try {
                $user = User::withTrashed()->where("id", $id)->first();
                if (!$user) {
                    Alert::error('Có lỗi xảy ra', 'Khong tim thay user');
                    return redirect()->back()->with('error', 'Khong tim thay user!');
                }
                $user->restore();
                Alert::success('Thanh cong', 'Khoi phuc user thanh cong');
                return redirect()->back()->with('success', 'Khoi phuc user thanh cong!');
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
        if (Auth::user()->can('index user')) {
            $status = $request->status;
            if ($status == 'index') {
                $results = User::where('name', 'LIKE', '%' . $keyword . '%')->orWhere('email', 'LIKE', '%' . $keyword . '%')->orderBy('id', 'desc')->paginate(10);
                if ($keyword == ' ') {
                    $results = User::orderBy('id', 'desc')->paginate(10);
                }
            }
            if ($status == 'delete') {
                $results = User::onlyTrashed()->where('name', 'LIKE', '%' . $keyword . '%')->orWhere('email', 'LIKE', '%' . $keyword . '%')->orderBy('id', 'desc')->paginate(10);
                if ($keyword == ' ') {
                    $results = User::onlyTrashed()->orderBy('id', 'desc')->paginate(10);
                }
            }
            return view('admin.page.user.search', compact('results', 'status'));
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }
}
