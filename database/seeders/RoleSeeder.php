<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define roles
        $roles = ['Admin', 'Superadmin', 'User'];

        // Create roles
        foreach ($roles as $roleName) {
            Role::create(['name' => $roleName]);
        }
    }
}
