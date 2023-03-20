<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Permission;
use App\Models\Role;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $adminRole = Role::firstOrCreate(['name' => 'Admin']);
        $newPermissions = ['banner.create', 'banner.update', 'banner.delete', 'banner.list'];

        $permissionsIds = [];
        foreach ($newPermissions as $p) {
            $createdPermission = Permission::firstOrCreate(['name' => $p]);
            $permissionsIds[] = $createdPermission->id;
        }
        $adminRole->permissions()->syncWithoutDetaching($permissionsIds);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
