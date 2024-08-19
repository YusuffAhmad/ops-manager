<?php

namespace Database\Seeders;

use App\Models\Store;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stores = [
            [
                'uid' => Str::uuid(),
                'name' => 'Corporate',
                'super_id' => 0,
                'storelevel_id' => 1,
                'storelevel_name' => 'Head Office',
                'status' => true,
                'address' => 'Head Office Address',
                'State' => 'Lagos',
                'city' => 'Ikeja',
                'LGA' => 'Ikeja',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        //     [
        //         'uid' => Str::uuid(),
        //         'name' => 'Ibadan',
        //         'super_id' => 1,
        //         'storelevel_id' => 2,
        //         'storelevel_name' => 'Regional Office',
        //         'status' => true,
        //         'address' => 'Ibadan Address',
        //         'State' => 'Oyo',
        //         'city' => 'Ibadan',
        //         'LGA' => 'Ibadan',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'uid' => Str::uuid(),
        //         'name' => 'Ogun',
        //         'super_id' => 1,
        //         'storelevel_id' => 2,
        //         'storelevel_name' => 'Regional Office',
        //         'status' => true,
        //         'address' => 'Ogun Address',
        //         'State' => 'Ogun',
        //         'city' => 'Ogun',
        //         'LGA' => 'Ogun',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'uid' => Str::uuid(),
        //         'name' => 'Osun',
        //         'super_id' => 1,
        //         'storelevel_id' => 2,
        //         'storelevel_name' => 'Regional Office',
        //         'status' => true,
        //         'address' => 'Osun Address',
        //         'State' => 'Osun',
        //         'city' => 'Osun',
        //         'LGA' => 'Osun',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'uid' => Str::uuid(),
        //         'name' => 'Oyo',
        //         'super_id' => 1,
        //         'storelevel_id' => 2,
        //         'storelevel_name' => 'Regional Office',
        //         'status' => true,
        //         'address' => 'Oyo Address',
        //         'State' => 'Oyo',
        //         'city' => 'Oyo',
        //         'LGA' => 'Oyo',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'uid' => Str::uuid(),
        //         'name' => 'Kwara',
        //         'super_id' => 1,
        //         'storelevel_id' => 2,
        //         'storelevel_name' => 'Regional Office',
        //         'status' => true,
        //         'address' => 'Kwara Address',
        //         'State' => 'Kwara',
        //         'city' => 'Kwara',
        //         'LGA' => 'Kwara',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     // Continue adding entries for all other use cases...
        ];

        DB::table('stores')->insert($stores);
        Store::factory(50)->create();
    }
}
