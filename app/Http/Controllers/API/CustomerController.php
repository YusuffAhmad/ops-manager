<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Imports\CustomersImport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\BaseResponse;
use App\Http\Requests\API\Customers\CustomerImportRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use App\Services\CustomerService;

class CustomerController extends Controller
{
    protected $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    public function index(){
        return $this->customerService->getAllCustomers();
    }

    public function importSubmittedCustomersFile(CustomerImportRequest $request)
    {
        $response = Excel::import(new CustomersImport, $request->file('import_file')->store('temp'));

        return BaseResponse::sendResponse($response, session()->get("excelImport"));
    }

     /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return $this->customerService->getCustomer($customer);
    }

    public function update(Customer $customer, UpdateCustomerRequest $request)
    {
        return $this->customerService->update($customer, $request);
    }

    public function destroy(Customer $customer)
    {
        return $this->customerService->delete($customer);
    }


}
