<?php

namespace App\Contracts;

use App\Http\Requests\GetCustomersRequest;
use App\Models\Customer;
use App\Http\Requests\UpdateCustomerRequest;
use App\Http\Resources\CustomerResource;


interface ICustomerService
{
    // public function create(StoreCustomerRequest $request): CustomerStatusResources;

    public function getAllCustomers();
    
    public function getCustomer(Customer $customer):CustomerResource;
    
    public function update(Customer $customer, UpdateCustomerRequest $request): CustomerResource;

    public function delete(Customer $customer): void;
}