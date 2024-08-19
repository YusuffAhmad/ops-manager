<?php

namespace App\Services;

use App\Contracts\CustomerStatusInterface;
use App\Models\CustomerStatus;
use App\Models\Customer;
use App\Http\Requests\StoreCustomerStatusRequest;
use App\Http\Requests\UpdateCustomerStatusRequest;
use App\Http\Resources\CustomerStatusResources;

class CustomerStatusService implements CustomerStatusInterface
{
    public function create(StoreCustomerStatusRequest $request):CustomerStatusResources
    {
        $validatedData = $request->validated();

        $customerStatus = CustomerStatus::create([
            'account_number' =>  $validatedData['account_number'],
            'bill_is_distributed' =>  $validatedData['bill_is_distributed'],
            'last_bill_distributed' =>  $validatedData['last_bill_distributed'],
            'meter_is_read' =>  $validatedData['meter_is_read'],
            'last_meter_read' =>  $validatedData['last_meter_read'],
            'customer_is_enumerated' =>  $validatedData['customer_is_enumerated'],
        ]);
            return new CustomerStatusResources($customerStatus);
    }

    // public function getAllCustomerStatus(): CustomerStatusResources
    // {
        
    // }

    // public function getCustomerStatus(): CustomerStatusResources
    // {
        
    // }   
    

    public function update(CustomerStatus $customerStatus, UpdateCustomerStatusRequest $request): CustomerStatusResources
    {
        $customerStatus->update($request->all());
        
        return new CustomerStatusResources($customerStatus);
    }

    public function delete(CustomerStatus $user): void
    {
        $user->delete();
    }
}