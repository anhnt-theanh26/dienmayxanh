<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            // dashboard
            [ // 'manage dashboard',
                'name' => 'manage dashboard',
                'display_name' => 'Quản lý bảng điều khiển',
            ],
            [ // 'index dashboard',
                'name' => 'index dashboard',
                'display_name' => 'Xem bảng điều khiển',
            ],



            // category-parent
            'manage parent', // category parent
            'index category parent', // danh sách
            'create category parent', // show tạo
            'store category parent', // tạo mới
            'show category parent', // chi tiết
            'edit category parent', // show sửa
            'update category parent', // sửa
            'delete category parent', // xóa mềm
            'destroy category parent', // xóa cứng
            'restore category parent', // khôi phục
            'deleted category parent', // danh sách xóa mềm

            // category
            'manage category', // category
            'index category', // danh sách
            'create category', // show tạo
            'store category', // tạo mới
            'show category', // chi tiết
            'edit category', // show sửa
            'update category', // sửa
            'delete category', // xóa mềm
            'destroy category', // xóa cứng
            'restore category', // khôi phục
            'deleted category', // danh sách xóa mềm

            // post
            'manage post', // post
            'index post', // danh sách
            'create post', // show tạo
            'store post', // tạo mới
            'show post', // chi tiết
            'edit post', // show sửa
            'update post', // sửa
            'delete post', // xóa mềm
            'destroy post', // xóa cứng
            'restore post', // khôi phục
            'deleted post', // danh sách xóa mềm

            // attribute
            'manage attribute', // attribute
            'index attribute', // danh sách
            'create attribute', // show tạo
            'store attribute', // tạo mới
            'show attribute', // chi tiết
            'edit attribute', // show sửa
            'update attribute', // sửa
            'delete attribute', // xóa mềm
            'destroy attribute', // xóa cứng
            'restore attribute', // khôi phục
            'deleted attribute', // danh sách xóa mềm

            // product
            'manage product', // product
            'index product', // danh sách
            'create product', // show tạo
            'store product', // tạo mới
            'show product', // chi tiết
            'edit product', // show sửa
            'update product', // sửa
            'delete product', // xóa mềm
            'destroy product', // xóa cứng
            'restore product', // khôi phục
            'deleted product', // danh sách xóa mềm

            // image
            'manage image', // image
            'index image', // danh sách

            // user
            'manage user', // user
            'index user', // danh sách
            'create user', // show tạo
            'store user', // tạo mới
            'show user', // chi tiết
            'edit user', // show sửa
            'update user', // sửa
            'delete user', // xóa mềm
            'destroy user', // xóa cứng
            'restore user', // khôi phục
            'deleted user', // danh sách xóa mềm
        ];
        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => 'web',
            ]);
        }
        $adminRole = Role::firstOrCreate([
            'name' => 'admin',
            'guard_name' => 'web',
        ]);
        $adminRole->syncPermissions(Permission::all());
        $adminUser = User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('123'),
            ]
        );
        $adminUser->assignRole($adminRole);
        echo "Seeder đã tạo user admin, role, và các quyền.\n";
    }
}
