<?php

namespace App\Imports;

use App\Models\Customer;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class CustomersImport implements ToCollection
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $rows)
    {
        ini_set('memory_limit', '800M'); // Allow much resource allocation due to possible size of processes 
        ini_set('max_execution_time', 0); // Allow infinite execution time 
        set_time_limit(0);

        // $user = request()->user();
        // $currentCompany = $user->currentCompany();
        // $customersFailed = $customersImported = [];

        foreach ($rows as $row) {
            $customerData = [
                'uid' => \Illuminate\Support\Str::uuid(),
                'first_name' => $row[1],
                'last_name' => $row[2],
                'middle_name' => $row[3],
                'account_number' => $row[4],
                'email' => $row[5],
                'phone' => $row[6],
                'address' => $row[7] ?? null,
                'city' => $row[8] ?? null,
                'address_state' => $row[9] ?? null,
                'tariff_code' => $row[10] ?? null,
                'meter_no' => $row[11],
                'is_md' => $row[12],
            ];

            // Intersect with fillable fields to ensure only fillable fields are included
            $fillableCustomerData = array_intersect_key($customerData, array_flip((new Customer())->getFillable()));

            
            // Create customer with fillable fields
            return Customer::create($fillableCustomerData);
        }
    }
}
