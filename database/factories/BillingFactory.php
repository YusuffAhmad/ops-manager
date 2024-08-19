<?php

namespace Database\Factories;

use App\Models\Billing;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Billing>
 */

class BillingFactory extends Factory
{
    protected $model = Billing::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $customers = Customer::all();

        return [
            'customer_id' => $customers->random()->id,
            'bill_date' => $this->faker->date(),
            'due_date' => $this->faker->date(),
            'consumption' => $this->faker->numberBetween(100, 1000),
            'arrears' => $this->faker->randomFloat(2, 0, 1000),
            'vat' => $this->faker->randomFloat(2, 0, 100),
            'current_charge' => $this->faker->randomFloat(2, 0, 1000),
            'total_charge' => $this->faker->randomFloat(2, 0, 2000),
            'total_due' => $this->faker->randomFloat(2, 0, 2000),
        ];
    }
}
