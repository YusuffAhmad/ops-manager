<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Customer;
use App\Models\BillDistribution;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BillDistribution>
 */
class BillDistributionFactory extends Factory
{
    protected $model = BillDistribution::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users = User::all();
        $customers = Customer::all();

        return [
            'user_id' => $users->random()->id,
            'customer_id' => $customers->random()->id,
            'bill_amount' => $this->faker->randomFloat(2, 10, 1000),
            'lat' => $this->faker->latitude,
            'lng' => $this->faker->longitude,
            'distribution_date' => $this->faker->date(),
            'status' => $this->faker->randomElement(['pending', 'completed', 'cancelled']),
        ];
    }
}
