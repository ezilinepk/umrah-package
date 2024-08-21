<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ModulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $module = [
            [
                'id' => '1',
                'uid' => (string) Str::uuid(),
                'name' => 'User'
            ],
            [
                'id' => '2',
                'uid' => (string) Str::uuid(),
                'name' => 'Permission'
            ],
            [
                'id' => '3',
                'uid' => (string) Str::uuid(),
                'name' => 'Role'
            ],
        ];

        // Store All Module in Database
        foreach ($module as $item) {
            Module::create($item);
        }
    }
}
