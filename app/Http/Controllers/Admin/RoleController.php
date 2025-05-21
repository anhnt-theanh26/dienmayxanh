<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    //
    public function index()
    {
        $roles = Role::withCount('users', 'permissions')->get();
        $permissions = Permission::all();
        $groupedPermissions = $permissions->groupBy('group_name');
        return view("admin.page.role.index", compact("roles", "permissions", "groupedPermissions"));
    }

    public function store(Request $request)
    {
        $dataRole = $request->validate([
            'roleName' => 'required|string|max:255|unique:roles,name',
            'permission_id' => 'required|array',
            'permission_id.*' => 'exists:permissions,id',
        ]);
        try {
            $role = Role::create([
                'name' => $dataRole['roleName'],
                'guard_name' => 'web',
            ]);
            $roleHasPermission = $request->permission_id;
            $roleHasPermissionInt = array_map('intval', $roleHasPermission);
            $role->syncPermissions($roleHasPermissionInt);
            Alert::success('Thanh cong', 'Them moi role thanh cong');
            return redirect()->route('admin.role.index');
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra:', $th->getMessage());
            return redirect()->route('admin.role.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
    }

    public function update(string $id, Request $request)
    {
        $role = Role::findOrFail($id);
        if (!$role) {
            Alert::error('That bai', 'Khong tim thay role');
            return redirect()->route('admin.role.index');
        }
        $dataRole = $request->validate([
            'modalRoleName' => 'required|string|max:255|unique:roles,name,' . $id,
            'permissions' => 'required|array',
            'permissions.*' => 'exists:permissions,id',
        ]);
        try {
            $roleHasPermissionInt = array_map('intval', $dataRole['permissions']);
            $role->syncPermissions($roleHasPermissionInt);
            Alert::success('Thanh cong', 'Cap nhap role thanh cong');
            return redirect()->route('admin.role.index');
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra:', $th->getMessage());
            return redirect()->route('admin.role.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
    }

    public function destroy(string $id)
    {
        try {
            $role = Role::findOrFail($id);
            if ($role) {
                $role->delete();
                Alert::success('Thanh cong', 'Xoa role thanh cong');
                return redirect()->route('admin.role.index');
            }
            Alert::error('That bai', 'Khong tim thay role');
            return redirect()->route('admin.role.index');
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra:', $th->getMessage());
            return redirect()->route('admin.role.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
    }

    public static function getRoleHasPermissions(string $id)
    {
        $results = DB::table('role_has_permissions')->where('role_id', $id)->get('permission_id');
        return $results;
    }

}
