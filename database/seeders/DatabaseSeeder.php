<?php
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\AdminSeeder;
use Database\Seeders\StoreSeeder;
use Database\Seeders\TariffSeeder;
use Database\Seeders\BillingSeeder;
use Database\Seeders\CustomerSeeder;
use Database\Seeders\PermissionSeeder;
use Database\Seeders\StoreLevelSeeder;
use Database\Seeders\BillDistributionSeeder;
use Database\Seeders\DistributionTransformerSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            PermissionSeeder::class,
            StoreLevelSeeder::class,
            StoreSeeder::class,
            AdminSeeder::class,
            TariffSeeder::class,
            DistributionTransformerSeeder::class,
            CustomerSeeder::class,
            BillingSeeder::class,
            BillDistributionSeeder::class,
        ]);
    }
}
