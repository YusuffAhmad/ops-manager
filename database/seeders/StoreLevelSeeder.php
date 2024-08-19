<?php

namespace Database\Seeders;

use App\Models\StoreLevel;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StoreLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // StoreLevel::factory(4)->create();
        $stores = [
            ['name' => 'headquarters'],
            ['name' => 'region'],
            ['name' => 'service_center'],
            ['name' => 'business_hub'],
        ];
        
        
        foreach ($stores as $storeData) {
            StoreLevel::create([
                'name' => $storeData['name'],
                'uid' => Str::uuid(),
                'is_active' => true,
            ]);
        }
    }
}
