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


            // image
            [ // danh sách, chi tiết
                'name' => 'index image',
                'display_name' => 'Read',
                'group_name' => 'Image',
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
        $adminUser = User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('123'),
            ]
        );
        // Gán Role "admin" cho User "admin"
        $adminUser->assignRole($adminRole);
        echo "Seeder đã tạo user admin, role, và các quyền.\n";
    }
}
