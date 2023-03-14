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
        $categoriesPermissions = ['categories.create', 'categories.update', 'categories.delete'];
        $tagsPermissions = ['tags.create', 'tags.delete'];
        $postsPermissions = ['posts.create', 'posts.update', 'posts.update.own', 'posts.delete.own', 'posts.delete'];
        $rolePermissions = ['roles.create', 'roles.update', 'roles.delete', 'roles.list'];
        $userPermissions = ['users.create', 'users.update', 'users.delete', 'users.list'];

        $permissions = array_merge($categoriesPermissions, $tagsPermissions, $postsPermissions, $rolePermissions, $userPermissions);

        $permissionsIds = [];
        foreach ($permissions as $permission) {
            $auxPermission = Permission::firstOrCreate(['name' => $permission]);
            $permissionsIds[] = $auxPermission->id;
        }
        $adminRole->permissions()->sync($permissionsIds);
    }
}
