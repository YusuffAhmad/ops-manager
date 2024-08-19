<?php

namespace Database\Factories;

use App\Models\StoreLevel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StoreLevel>
 */
class StoreLevelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = StoreLevel::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement(['headquarters', 'region', 'service_center', 'business_hub']),
            'uid' => $this->faker->uuid(),
            'is_active' => true,
        ];
    }
}
