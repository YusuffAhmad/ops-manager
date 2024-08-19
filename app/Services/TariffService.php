<?php

namespace App\Services;

use App\Models\Tariff;
use Illuminate\Support\Str;
use App\Contracts\ITariffService;
use App\Http\Requests\API\Tariffs\StoreRequest;
use App\Http\Requests\API\Tariffs\UpdateRequest;

class TariffService implements ITariffService
{
    public function create(StoreRequest $request): Tariff
    {
        // Retrieve validated data from the request
        $validatedData = $request->validated();

        // Create a new Tariff instance with the validated data
        $tariff = Tariff::create([
            'uid' => Str::uuid(),
            'tariff_class' => $validatedData['tariff_class'],
            'band' => $validatedData['band'],
            'hours_of_supply' => $validatedData['hours_of_supply'],
            'tariff_rate' => $validatedData['tariff_rate'],
            'tariff_category' => $validatedData['tariff_category'],
            'name' => $validatedData['name'],
        ]);

        // Return the created Tariff instance
        return $tariff;
    }

    public function update(Tariff $tariff, UpdateRequest $request): Tariff
    {
        // Retrieve validated data from the request
        $validatedData = $request->validated();

        // Update the Tariff instance with the validated data
        $tariff->update($validatedData);

        // Return the updated Tariff instance
        return $tariff;
    }


    public function delete(Tariff $user): void
    {
        $user->delete();
    }
}
