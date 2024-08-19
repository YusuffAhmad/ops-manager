<?php

namespace Database\Factories;

use App\Models\Store;
use App\Models\StoreLevel;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Store>
 */
class StoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Store::class;

    public function definition()
    {
        // Retrieve existing store levels except "headquarters"
        $storeLevels = StoreLevel::where('name', '!=', 'headquarters')->get();

        // Pick a random store level from the existing ones
        $storeLevel = $storeLevels->random();

        return [
            'uid' => $this->faker->uuid,
            'name' => $this->faker->company,
            'super_id' => $this->getSuperIdForStoreLevel($storeLevel->name),
            'storelevel_id' => $storeLevel->id,
            'storelevel_name' => $storeLevel->name,
            'status' => $this->faker->boolean,
            'address' => $this->faker->address,
            'State' => $this->faker->state,
            'city' => $this->faker->city,
            'LGA' => $this->faker->word,
        ];
    }

    private function getSuperIdForStoreLevel($storeLevelName)
    {
        switch ($storeLevelName) {
            case 'headquarters':
                return 0;
            case 'region':
                return 1;
            case 'service_center':
                return 2;
            case 'business_hub':
                return 3;
            default:
                return null;
        }
    }
}
