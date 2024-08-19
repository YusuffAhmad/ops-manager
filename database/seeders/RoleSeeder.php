<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
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
        Role::create(['uid' => Str::uuid(), 'name' => 'super_admin', 'description' => 'Super Admin role for the system']);
        Role::create(['uid' => Str::uuid(), 'name' => 'admin', 'description' => 'Admin role for the system']);
        Role::create(['uid' => Str::uuid(), 'name' => 'staff', 'description' => 'Staff role for the system']);
    }
}
