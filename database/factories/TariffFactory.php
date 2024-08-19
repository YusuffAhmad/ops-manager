<?php

namespace Database\Factories;

use App\Models\Tariff;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tariff>
 */
class TariffFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Tariff::class;

    private $bands = ['A', 'B', 'C', 'D', 'E'];
    private $hoursOfSupply = [20, 16, 12, 8, 4];
    private $index = 0;

    public function definition()
    {
        $band = $this->bands[$this->index];
        $hoursOfSupply = $this->hoursOfSupply[$this->index];

        $this->index++;

        return [
            'tariff_class' => $this->faker->word,
            'band' => $band,
            'hours_of_supply' => $hoursOfSupply,
            'tariff_rate' => $this->faker->randomFloat(2, 0, 100),
            'tariff_category' => $this->faker->word,
            'name' => $this->faker->word,
        ];
    }
}
