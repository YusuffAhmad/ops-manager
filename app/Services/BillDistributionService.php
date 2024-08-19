<?php

namespace App\Services;

use Illuminate\Support\Str;
use App\Models\BillDistribution;
use Illuminate\Support\Facades\Auth;
use App\Contracts\IBillDistributionService;
use App\Http\Requests\API\BillDistributions\StoreRequest;

class BillDistributionService implements IBillDistributionService
{
    

    public function distribute(StoreRequest $request): BillDistribution
    {
        // Retrieve validated data from the request
        $validatedData = $request->validated();

        $user = Auth::user();
        
        // Create a new Tariff instance with the validated data
        $tariff = BillDistribution::create([
            'user_id' => $user->id,
            'customer_id' => $validatedData['customer_id'], 
            'bill_amount' => $validatedData['bill_amount'],
            'lat' => $validatedData['lat'],
            'lng' => $validatedData['lng'],
            'distribution_date' => now()->toDateString(), 
            'status' => 'completed', 
        ]);

        // Return the created Tariff instance
        return $tariff;
    }
}
