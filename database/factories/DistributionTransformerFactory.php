<?php

namespace Database\Factories;

use App\Models\DistributionTransformer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DistributionTransformer>
 */
class DistributionTransformerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = DistributionTransformer::class;
     
    public function definition(): array
    {
        return [
            'store_id' => \App\Models\Store::factory(),
            'name' => $this->faker->word,
            'lng' => $this->faker->longitude,
            'lat' => $this->faker->latitude,
            'installation_date' => $this->faker->date,
            'capacity' => $this->faker->numberBetween(100, 1000),
            'status' => $this->faker->word,
            'rating' => $this->faker->numberBetween(1, 5),
            'maker' => $this->faker->word,
            'feeder_pillar_type' => $this->faker->word,
        ];  
    }
}
