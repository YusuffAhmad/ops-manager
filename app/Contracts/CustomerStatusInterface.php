<?php

namespace App\Contracts;

use App\Models\CustomerStatus;
use App\Models\Customer;
use App\Http\Requests\StoreCustomerStatusRequest;
use App\Http\Requests\UpdateCustomerStatusRequest;
use App\Http\Resources\CustomerStatusResources;

interface CustomerStatusInterface
{
    public function create(StoreCustomerStatusRequest $request): CustomerStatusResources;

    // public function getAllCustomerStatus():CustomerStatusResources;
    
    // public function getCustomerStatus():CustomerStatusResources;
    
    public function update(CustomerStatus $distributionTransformer, UpdateCustomerStatusRequest $request): CustomerStatusResources;

    public function delete(CustomerStatus $user): void;
}