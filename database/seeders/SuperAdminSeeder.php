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
        $role = Role::firstOrCreate(['name' => Role::SUPER_ADMIN]);
        User::firstOrCreate(
            [ 'email' => 'nicolasmontielf@gmail.com', ],
            [
                'role_id' => $role->id,
                'document' => '123456',
                'first_name' => 'Nicolas',
                'last_name' => 'Montiel',
                'password' => Hash::make('12345678'),
            ]
        );
    }
}
