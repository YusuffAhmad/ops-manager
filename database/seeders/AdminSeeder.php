<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
      /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'uid' => Str::uuid(),
            'first_name' => 'Ops',
            'middle_name' => 'Manager',
            'last_name' => 'Admin',
            'email' => 'opsmanageradmin@gmail.com',
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'phone' => '+2347035059101',
            'date_of_birth' => '1990-01-01',
            'store_id' => 1,
            'store_name' => 'headquarters',
            'status' => true,
            'address' => '123 Sample St',
            'State' => 'California',
            'city' => 'Los Angeles',
            'LGA' => 'Sample LGA',
            'email_verified_at' => now(),
        ]);
        
        $user->assignRole('super_admin');
    }
}
