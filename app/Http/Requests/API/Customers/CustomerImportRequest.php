<?php

namespace App\Http\Requests\API\Customers;

use Illuminate\Foundation\Http\FormRequest;

class CustomerImportRequest extends FormRequest
{
    /** @return array<mixed> */
    public function rules(): array
    {
        return [
            'import_file' => 'required|mimes:xlsx,csv|max:10240'
        ];
    }
}
