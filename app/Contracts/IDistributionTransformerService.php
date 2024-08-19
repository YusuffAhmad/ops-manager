<?php

namespace App\Contracts;

use App\Http\Requests\API\DistributionTransformers\StoreRequest;
use App\Http\Requests\API\DistributionTransformers\UpdateRequest;
use App\Models\DistributionTransformer;

interface IDistributionTransformerService
{
    public function create(StoreRequest $request): DistributionTransformer;
    
    public function update(DistributionTransformer $distributionTransformer, UpdateRequest $request): DistributionTransformer;

    public function delete(DistributionTransformer $user): void;
}
