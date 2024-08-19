<?php

namespace App\Services;

use Illuminate\Support\Str;
use App\Models\DistributionTransformer;
use App\Contracts\IDistributionTransformerService;
use App\Http\Requests\API\DistributionTransformers\StoreRequest;
use App\Http\Requests\API\DistributionTransformers\UpdateRequest;

class DistributionTransformerService implements IDistributionTransformerService
{   
    public function create(StoreRequest $request): DistributionTransformer
    {
        // Retrieve validated data from the request
        $validatedData = $request->validated();
    
        // Create a new DistributionTransformer instance with the validated data
        $distributionTransformer = DistributionTransformer::create([
            'store_id' => $validatedData['store_id'],
            'name' => $validatedData['name'],
            'lng' => $validatedData['lng'],
            'lat' => $validatedData['lat'],
            'installation_date' => $validatedData['installation_date'],
            'capacity' => $validatedData['capacity'],
            'status' => $validatedData['status'],
            'rating' => $validatedData['rating'],
            'maker' => $validatedData['maker'],
            'feeder_pillar_type' => $validatedData['feeder_pillar_type'],
        ]);
    
        // Return the created DistributionTransformer instance
        return $distributionTransformer;
    }    

    public function update(DistributionTransformer $tariff, UpdateRequest $request): DistributionTransformer
    {
        // Retrieve validated data from the request
        $validatedData = $request->validated();

        // Update the Tariff instance with the validated data
        $tariff->update($validatedData);

        // Return the updated Tariff instance
        return $tariff;
    }


    public function delete(DistributionTransformer $user): void
    {
        $user->delete();
    }
}
