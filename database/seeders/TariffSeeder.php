<?php

namespace Database\Seeders;

use App\Models\Tariff;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TariffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tariff::factory(5)->create();
    }
}
