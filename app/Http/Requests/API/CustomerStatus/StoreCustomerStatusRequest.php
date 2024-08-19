<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerStatusRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'acccount_number' => 'required',
            'bill_is_distributed' => 'required' ,
            'last_bill_distributed' => ['required', 'string', 'max:255'],
            'meter_is_read' => 'required',
            'last_meter_read' => ['required', 'date'],
            'customer_is_enumerated' => 'required',
            
        ];
    }
}
