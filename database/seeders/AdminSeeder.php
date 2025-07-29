<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
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
            [ // 'index dashboard',
                'name' => 'index dashboard',
                'display_name' => 'Read',
                'group_name' => 'Dashboard',
            ],


            // category-parent
            [ // danh sách, chi tiết
                'name' => 'index category parent',
                'display_name' => 'Read',
                'group_name' => 'Category Parent',
            ],
            [ // thêm
                'name' => 'create category parent',
                'display_name' => 'Create',
                'group_name' => 'Category Parent',
            ],
            [ // sửa
                'name' => 'edit category parent',
                'display_name' => 'Edit',
                'group_name' => 'Category Parent',
            ],
            [ // xóa, khôi phục, xóa vĩnh viễn
                'name' => 'delete category parent',
                'display_name' => 'Delete',
                'group_name' => 'Category Parent',
            ],


            // category
            [ // danh sách, chi tiết
                'name' => 'index category',
                'display_name' => 'Read',
                'group_name' => 'Category',
            ],
            [ // thêm
                'name' => 'create category',
                'display_name' => 'Create',
                'group_name' => 'Category',
            ],
            [ // sửa
                'name' => 'edit category',
                'display_name' => 'Edit',
                'group_name' => 'Category',
            ],
            [ // xóa, khôi phục, xóa vĩnh viễn
                'name' => 'delete category',
                'display_name' => 'Delete',
                'group_name' => 'Category',
            ],


            // post
            [ // danh sách, chi tiết
                'name' => 'index post',
                'display_name' => 'Read',
                'group_name' => 'Post',
            ],
            [ // thêm
                'name' => 'create post',
                'display_name' => 'Create',
                'group_name' => 'Post',
            ],
            [ // sửa
                'name' => 'edit post',
                'display_name' => 'Edit',
                'group_name' => 'Post',
            ],
            [ // xóa, khôi phục, xóa vĩnh viễn
                'name' => 'delete post',
                'display_name' => 'Delete',
                'group_name' => 'Post',
            ],


            // attribute
            [ // danh sách, chi tiết
                'name' => 'index attribute',
                'display_name' => 'Read',
                'group_name' => 'Attribute',
            ],
            [ // thêm
                'name' => 'create attribute',
                'display_name' => 'Create',
                'group_name' => 'Attribute',
            ],
            [ // sửa
                'name' => 'edit attribute',
                'display_name' => 'Edit',
                'group_name' => 'Attribute',
            ],
            [ // xóa, khôi phục, xóa vĩnh viễn
                'name' => 'delete attribute',
                'display_name' => 'Delete',
                'group_name' => 'Attribute',
            ],


            // product
            [ // danh sách, chi tiết
                'name' => 'index product',
                'display_name' => 'Read',
                'group_name' => 'Product',
            ],
            [ // thêm
                'name' => 'create product',
                'display_name' => 'Create',
                'group_name' => 'Product',
            ],
            [ // sửa
                'name' => 'edit product',
                'display_name' => 'Edit',
                'group_name' => 'Product',
            ],
            [ // xóa, khôi phục, xóa vĩnh viễn
                'name' => 'delete product',
                'display_name' => 'Delete',
                'group_name' => 'Product',
            ],


            // user
            [ // danh sách, chi tiết
                'name' => 'index user',
                'display_name' => 'Read',
                'group_name' => 'User',
            ],
            [ // thêm
                'name' => 'create user',
                'display_name' => 'Create',
                'group_name' => 'User',
            ],
            [ // sửa
                'name' => 'edit user',
                'display_name' => 'Edit',
                'group_name' => 'User',
            ],
            [ // xóa, khôi phục, xóa vĩnh viễn
                'name' => 'delete user',
                'display_name' => 'Delete',
                'group_name' => 'User',
            ],


            // image
            [ // danh sách, chi tiết
                'name' => 'index image',
                'display_name' => 'Read',
                'group_name' => 'Image',
            ],


            // voucher
            [ // danh sách, chi tiết
                'name' => 'index voucher',
                'display_name' => 'Read',
                'group_name' => 'Voucher',
            ],
            [ // thêm
                'name' => 'create voucher',
                'display_name' => 'Create',
                'group_name' => 'Voucher',
            ],
            [ // sửa
                'name' => 'edit voucher',
                'display_name' => 'Edit',
                'group_name' => 'Voucher',
            ],
            [ // xóa, khôi phục, xóa vĩnh viễn
                'name' => 'delete voucher',
                'display_name' => 'Delete',
                'group_name' => 'Voucher',
            ],


            // bill
            [ // danh sách, chi tiết
                'name' => 'index bill',
                'display_name' => 'Read',
                'group_name' => 'Bill',
            ],
            [ // sửa
                'name' => 'edit bill',
                'display_name' => 'Edit',
                'group_name' => 'Bill',
            ],


            // role permission
            // user
            [ // danh sách, chi tiết
                'name' => 'index role permission',
                'display_name' => 'Read',
                'group_name' => 'Role Permission',
            ],
            [ // thêm
                'name' => 'create role permission',
                'display_name' => 'Create',
                'group_name' => 'Role Permission',
            ],
            [ // sửa
                'name' => 'edit role permission',
                'display_name' => 'Edit',
                'group_name' => 'Role Permission',
            ],
            [ // xóa, khôi phục, xóa vĩnh viễn
                'name' => 'delete role permission',
                'display_name' => 'Delete',
                'group_name' => 'Role Permission',
            ],


            // authentication log 
            [ // danh sách, chi tiết
                'name' => 'index authentication',
                'display_name' => 'Read',
                'group_name' => 'Authentication',
            ],


            // location menu
            [ // danh sách, chi tiết
                'name' => 'index location menu',
                'display_name' => 'Read',
                'group_name' => 'Location Menu',
            ],
            [ // thêm
                'name' => 'create location menu',
                'display_name' => 'Create',
                'group_name' => 'Location Menu',
            ],
            [ // sửa
                'name' => 'edit location menu',
                'display_name' => 'Edit',
                'group_name' => 'Location Menu',
            ],
            [ // xóa, khôi phục, xóa vĩnh viễn
                'name' => 'delete location menu',
                'display_name' => 'Delete',
                'group_name' => 'Location Menu',
            ],


            // location product
            [ // danh sách, chi tiết
                'name' => 'index location product',
                'display_name' => 'Read',
                'group_name' => 'Location Product',
            ],
            [ // thêm
                'name' => 'create location product',
                'display_name' => 'Create',
                'group_name' => 'Location Product',
            ],
            [ // sửa
                'name' => 'edit location product',
                'display_name' => 'Edit',
                'group_name' => 'Location Product',
            ],
            [ // xóa, khôi phục, xóa vĩnh viễn
                'name' => 'delete location product',
                'display_name' => 'Delete',
                'group_name' => 'Location Product',
            ],


            // location banner
            [ // danh sách, chi tiết
                'name' => 'index location banner',
                'display_name' => 'Read',
                'group_name' => 'Location Banner',
            ],
            [ // thêm
                'name' => 'create location banner',
                'display_name' => 'Create',
                'group_name' => 'Location Banner',
            ],
            [ // sửa
                'name' => 'edit location banner',
                'display_name' => 'Edit',
                'group_name' => 'Location Banner',
            ],
            [ // xóa, khôi phục, xóa vĩnh viễn
                'name' => 'delete location banner',
                'display_name' => 'Delete',
                'group_name' => 'Location Banner',
            ],


            // setting
            [ // danh sách, chi tiết
                'name' => 'index setting',
                'display_name' => 'Read',
                'group_name' => 'Setting',
            ],
            [ // thêm
                'name' => 'create setting',
                'display_name' => 'Create',
                'group_name' => 'Setting',
            ],
            [ // sửa
                'name' => 'edit setting',
                'display_name' => 'Edit',
                'group_name' => 'Setting',
            ],
            [ // xóa, khôi phục, xóa vĩnh viễn
                'name' => 'delete setting',
                'display_name' => 'Delete',
                'group_name' => 'Setting',
            ],
        ];
        // Tạo các Permission nếu chưa tồn tại
        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission['name'],
                'display_name' => $permission['display_name'],
                'group_name' => $permission['group_name'],
                'guard_name' => 'web',
            ]);
        }
        // Tạo Role "admin" 
        $adminRole = Role::firstOrCreate([
            'name' => 'admin',
            'guard_name' => 'web',
        ]);
        // Gán Permissions
        $adminRole->syncPermissions(Permission::all());
        // Tạo hoặc Lấy User "admin"
        $adminUser = User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('123'),
                'email_verified_at' => Carbon::now(),
            ]
        );
        // Gán Role "admin" cho User "admin"
        $adminUser->assignRole($adminRole);
        echo "Seeder đã tạo user admin, role, và các quyền.\n";
        echo "Tài khoản: admin@gmail.com \n";
        echo "Mật khẩu: 123 \n";
    }
}
