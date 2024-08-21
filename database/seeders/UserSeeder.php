<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                // 'prefix' => 'Mr',
                // 'fname' => 'Demo',
                'name' => 'Admin',
                'email' => 'admin@email.com',
                'password' => Hash::make('12345678'),
                'status' => 'active'
            ],
            [
                // 'prefix' => 'Mr',
                // 'fname' => 'Demo',
                'name' => 'Superadmin',
                'email' => 'superadmin@email.com',
                'password' => Hash::make('12345678'),
                'status' => 'active',
                // 'admin_per' => 'yes'
            ],
            [
                // 'prefix' => 'Mr',
                // 'fname' => 'Demo',
                'name' => 'User',
                'email' => 'user@email.com',
                'password' => Hash::make('12345678'),
                'status' => 'active'
            ],
        ];

        $roles = ['Admin', 'Superadmin', 'User'];
        // Create users and assign roles
        foreach ($users as $index => $userData) {
            // Create user
            $user = User::create($userData);

            // Assign role to user based on index
            $roleName = $roles[$index];
            $role = Role::where('name', $roleName)->first();
            $user->syncRoles($role);
        }

        // Assign all permissions to the Superadmin user
        $superadmin = User::where('email', 'superadmin@email.com')->first();
        $permissions = Permission::all();
        $superadmin->syncPermissions($permissions);

        // Assign all permissions to the Superadmin user
        $superadmin = User::where('email', 'admin@email.com')->first();
        $permissions = Permission::all();
        $superadmin->syncPermissions($permissions);
    }
}
