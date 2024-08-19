<?php

namespace App\Services;

use App\Contracts\ICustomerService;
use App\Http\Requests\GetCustomersRequest;
use App\Models\CustomerStatus;
use App\Models\Customer;
use App\Http\Requests\StoreCustomerStatusRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Http\Resources\CustomerResource;
use App\Models\DistributionTransformer;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Auth;

class CustomerService implements ICustomerService
{
    // public function create(StoreCustomerStatusRequest $request): CustomerResource
    // {
    //     $validatedData = $request->validated();

    //     $customerStatus = CustomerStatus::create([
    //         'account_number' =>  $validatedData['account_number'],
    //         'bill_is_distributed' =>  $validatedData['bill_is_distributed'],
    //         'last_bill_distributed' =>  $validatedData['last_bill_distributed'],
    //         'meter_is_read' =>  $validatedData['meter_is_read'],
    //         'last_meter_read' =>  $validatedData['last_meter_read'],
    //         'customer_is_enumerated' =>  $validatedData['customer_is_enumerated'],
    //     ]);
    //     return new CustomerResource($customerStatus);
    // }

    public function getAllCustomers()
    {

        $user_store = Auth::user()->store_id;
        $customer_dt_ids = DistributionTransformer::where('store_id', $user_store)->pluck('id');
        return CustomerResource::collection(

            Customer::whereIn('dt_id', [11])->get()
        );
    }

    public function getCustomer(Customer $customer): CustomerResource
    {

        return new CustomerResource($customer);
    }


    public function update(Customer $customer, UpdateCustomerRequest $request): CustomerResource
    {
        $customer->update($request->all());
        
        return new CustomerResource($customer);
    }

    public function delete(Customer $customer): void
    {
        $customer->delete();
    }
}
