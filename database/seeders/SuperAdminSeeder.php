<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => Role::SUPER_ADMIN]);
        User::create([
            'role_id' => $role->id,
            'document' => '123456',
            'first_name' => 'Nicolas',
            'last_name' => 'Montiel',
            'email' => 'nicolasmontielf@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
        Role::create(['name' => 'Admin']);
    }
}
