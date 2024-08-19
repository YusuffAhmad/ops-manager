<?php

namespace App\Contracts;

use App\Models\BillDistribution;
use App\Http\Requests\API\BillDistributions\StoreRequest;

interface IBillDistributionService
{
    public function distribute(StoreRequest $request): BillDistribution;
}
