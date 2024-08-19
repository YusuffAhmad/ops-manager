<?php

namespace App\Http\Requests\API\BillDistributions;

use App\Http\Requests\API\Request;
use App\Rules\CurrentChargeMatchesBillAmount;

class StoreRequest extends Request
{
    /** @return array<mixed> */
    public function rules(): array
    {
        return [
            'customer_id' => ['required', 'exists:customers,id'],
            'bill_amount' => ['required', 'numeric', 'between:10,1000', new CurrentChargeMatchesBillAmount($this->input('customer_id'))],
            'lat' => ['required', 'numeric'],
            'lng' => ['required', 'numeric'],
        ];
    }
}
