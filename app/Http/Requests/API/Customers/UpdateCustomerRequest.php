<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
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
            'meter_number' => 'required' ,
            'customer_type' => ['required', 'string', 'max:255'],
            'account_type' => 'required',
            'first_name' => ['required', 'date'],
            'middle_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required' ,
            'email' => ['required', 'email', 'max:255'],
            'address' => 'required',
            'city' => ['required', 'date'],
            'state' => 'required',
            'lga' => 'required' ,
            'lng' => ['required', ],
            'lat' => 'required',
            'dt_id' => ['required', 'integer'],
            'tariff_id' => 'required',
            
        ];
    }
}
