<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\Role;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::firstOrCreate(['name' => 'Admin']);

        // Permissions
        $categoriesPermissions = ['blog_category.create', 'blog_category.update', 'blog_category.delete'];
        $tagsPermissions = ['blog_tag.create', 'blog_tag.delete'];
        $postsPermissions = ['blog_post.create', 'blog_post.update', 'blog_post.update.own', 'blog_post.delete.own', 'blog_post.delete'];
        $rolePermissions = ['role.create', 'role.update', 'role.delete', 'role.list'];
        $userPermissions = ['user.create', 'user.update', 'user.delete', 'user.list'];

        $permissions = array_merge($categoriesPermissions, $tagsPermissions, $postsPermissions, $rolePermissions, $userPermissions);

        $permissionsIds = [];
        foreach ($permissions as $permission) {
            $auxPermission = Permission::firstOrCreate(['name' => $permission]);
            $permissionsIds[] = $auxPermission->id;
        }
        $adminRole->permissions()->sync($permissionsIds);
    }
}
