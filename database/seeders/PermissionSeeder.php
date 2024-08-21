<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permission = [
            [
                'module_id' => '1',
                'name' => 'user view',
                'guard_name' => 'web'
            ],
            [
                'module_id' => '1',
                'name' => 'user create',
                'guard_name' => 'web'
            ],
            [
                'module_id' => '1',
                'name' => 'user update',
                'guard_name' => 'web'
            ],
            [
                'module_id' => '1',
                'name' => 'user delete',
                'guard_name' => 'web'
            ],
            [
                'module_id' => '2',
                'name' => 'permission view',
                'guard_name' => 'web'
            ],
            [
                'module_id' => '2',
                'name' => 'permission create',
                'guard_name' => 'web'
            ],
            [
                'module_id' => '2',
                'name' => 'permission update',
                'guard_name' => 'web'
            ],
            [
                'module_id' => '2',
                'name' => 'permission delete',
                'guard_name' => 'web'
            ],
            [
                'module_id' => '3',
                'name' => 'role view',
                'guard_name' => 'web'
            ],
            [
                'module_id' => '3',
                'name' => 'role create',
                'guard_name' => 'web'
            ],
            [
                'module_id' => '3',
                'name' => 'role update',
                'guard_name' => 'web'
            ],
            [
                'module_id' => '3',
                'name' => 'role delete',
                'guard_name' => 'web'
            ],

        ];

        // Store Permission in DB
        foreach ($permission as $item) {
            Permission::create($item);
        }
    }
}
