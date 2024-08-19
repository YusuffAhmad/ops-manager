<?php

namespace App\Services;

use App\Models\MeterReading;
use Illuminate\Support\Str;
// use App\Contracts\IMeterReadingService;
use App\Http\Requests\API\MeterReading\StoreRequest;
use App\Http\Requests\API\MeterReading\UpdateRequest;

class MeterReadingService //implements IMeterReadingService
{
    public function create(StoreRequest $request): MeterReading
    {
        // Retrieve validated data from the request
        $validatedData = $request->validated();

        // Create a new MeterReading instance with the validated data
        $MeterReading = MeterReading::create([
            'uid' => Str::uuid(),
            'MeterReading_class' => $validatedData['MeterReading_class'],
            'band' => $validatedData['band'],
            'hours_of_supply' => $validatedData['hours_of_supply'],
            'MeterReading_rate' => $validatedData['MeterReading_rate'],
            'MeterReading_category' => $validatedData['MeterReading_category'],
            'name' => $validatedData['name'],
        ]);

        // Return the created MeterReading instance
        return $MeterReading;
    }

    public function update(MeterReading $MeterReading, UpdateRequest $request): MeterReading
    {
        // Retrieve validated data from the request
        $validatedData = $request->validated();

        // Update the MeterReading instance with the validated data
        $MeterReading->update($validatedData);

        // Return the updated MeterReading instance
        return $MeterReading;
    }


    public function delete(MeterReading $user): void
    {
        $user->delete();
    }
}
