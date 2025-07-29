<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function index()
    {
        if (Auth::user()->can('index role permission')) {
            $users = User::orderBy('id', 'desc')->paginate(10);
            $roles = Role::orderBy('id', 'desc')->get();
            return view("admin.page.permission.index", compact("users", "roles"));
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }

    public function update(string $id, Request $request)
    {
        if (Auth::user()->can('edit role permission')) {
            try {
                $user = User::where("id", $id)->first();
                if (!$user) {
                    Alert::error('Có lỗi xảy ra:', 'Khong tìm thay user co id:' . $id);
                    return redirect()->route('admin.permission.index');
                }
                $roleuser = DB::table('model_has_roles')
                    ->where('model_id', '=', $id)
                    ->first();
                if ($request->role_id == 'user') {
                    DB::table('model_has_roles')
                        ->where('model_id', '=', $id)
                        ->delete();
                } else {
                    if (!$roleuser) {
                        DB::table('model_has_roles')->insert([
                            'role_id' => $request->role_id,
                            'model_type' => 'App\Models\User',
                            'model_id' => $id,
                        ]);
                    }
                    DB::table('model_has_roles')
                        ->where('model_id', '=', $id)
                        ->update(['role_id' => $request->role_id]);
                }
                Alert::success('Thanh cong', "Cập nhập quyền cho user $user->name thành công");
                return redirect()->route('admin.permission.index');
            } catch (\Throwable $th) {
                Alert::error('Có lỗi xảy ra:', $th->getMessage());
                return redirect()->route('admin.permission.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
            }
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }

    public static function getRole(string $id)
    {
        try {
            $role = DB::table('roles')
                ->select('roles.id', 'roles.name')
                ->join('model_has_roles', 'model_has_roles.role_id', '=', 'roles.id')
                ->where('model_has_roles.model_id', '=', "$id")->first();
            if (!$role) {
                return null;
            }
            return $role;
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra:', $th->getMessage());
            return redirect()->route('admin.permission.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
    }

    public function search(Request $request, string $keyword)
    {
        if (Auth::user()->can('index role permission')) {
            $status = $request->status;
            if ($status == 'index') {
                $results = User::where('name', 'LIKE', '%' . $keyword . '%')->orWhere('email', 'LIKE', '%' . $keyword . '%')->orderBy('id', 'desc')->paginate(10);
                if ($keyword == ' ') {
                    $results = User::orderBy('id', 'desc')->paginate(10);
                }
            }
            $roles = Role::orderBy('id', 'desc')->get();
            return view('admin.page.permission.search', compact('results', 'status', 'roles'));
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }
}
