<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BillDistribution;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BillDistributionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BillDistribution::factory(5)->create();
    }
}
