<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    //
    public function index()
    {
        // $users = User::orderBy('id', 'desc')->get();
        $users = User::get();
        $roles = Role::orderBy('id', 'desc')->get();
        return view("admin.page.permission.index", compact("users", "roles"));
    }

    public function store(Request $request)
    {
    }

    public function update(string $id, Request $request)
    {
        return $request->all();
    }

    public function destroy(string $id)
    {
    }

    public static function getRole(string $id)
    {
        $role = DB::table('roles')
            ->select('roles.id', 'roles.name')
            ->join('model_has_roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->where('model_has_roles.model_id', '=', "$id")->first();
        if (!$role) {
            return null;
        }
        return $role;
    }
}
