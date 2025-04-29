<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    //
    public function index()
    {
        $roles = Role::withCount('users')->get();
        $permissions = Permission::all();
        $groupedPermissions = $permissions->groupBy('group_name');
        return view("admin.page.role.role", compact("roles", "permissions", "groupedPermissions"));
    }


    public function store(Request $request)
    {
       
        try {
            $dataRole = $request->validate([
                'roleName' => 'required|string|max:255',
                'permission_id' => 'required|array',
                'permission_id.*' => 'exists:permissions,id',
            ]);
            $role = Role::create([
                'name' => $dataRole['roleName'],
                'guard_name' => 'web',
            ]);
            $role = Role::where('id', 2)->first();
            $roleHasPermission = $request->permission_id;
            $roleHasPermissionInt = array_map('intval', $roleHasPermission);
            $role->syncPermissions([$roleHasPermissionInt]);
            Alert::success('Thanh cong', 'Them moi role thanh cong');
            return redirect()->route('admin.role.index');
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra:', $th->getMessage());
            return redirect()->route('admin.role.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
    }

    public function destroy(string $id){
        $role = Role::findOrFail($id);
        if($role){
            $role->delete();
            Alert::success('Thanh cong', 'Xoa role thanh cong');
            return redirect()->route('admin.role.index');
        }
        Alert::error('That bai', 'Khong tim thay role');
        return redirect()->route('admin.role.index');
    }
}
