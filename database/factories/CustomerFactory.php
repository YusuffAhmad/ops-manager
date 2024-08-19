<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Customer::class;

    public function definition(): array
    {
        return [
            'uid' => $this->faker->uuid,
            'account_number' => $this->faker->unique()->randomNumber(),
            'meter_number' => $this->faker->unique()->randomNumber(),
            'customer_type' => $this->faker->randomElement(['md', 'nmd']),
            'account_type' => $this->faker->randomElement(['prepaid', 'postpaid']),
            'first_name' => $this->faker->firstName,
            'middle_name' => $this->faker->optional()->lastName,
            'last_name' => $this->faker->lastName,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'address' => $this->faker->address,
            'city' => $this->faker->city,
            'state' => $this->faker->state,
            'lga' => $this->faker->word,
            'lng' => $this->faker->longitude,
            'lat' => $this->faker->latitude,
            'dt_id' => \App\Models\DistributionTransformer::factory(),
            'tariff_id' => \App\Models\Tariff::factory(),
        ];
    }
}
