<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
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
        $user = User::create([
            'document' => '123456',
            'first_name' => 'Nicolas',
            'last_name' => 'Montiel',
            'email' => 'nicolasmontielf@gmail.com',
            'password' => Hash::make('12345678'),
        ]);

        Role::create(['name' => 'super-admin']);

        $user->assignRole('super-admin');
    }
}
