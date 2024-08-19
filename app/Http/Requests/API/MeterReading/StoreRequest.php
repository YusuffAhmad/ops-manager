<?php

namespace App\Http\Requests\API\MeterReading;

use App\Http\Requests\API\Request;

class StoreRequest extends Request
{
    /** @return array<mixed> */
    public function rules(): array
    {
        return [
            'tariff_class' => ['required', 'string', 'max:255'],
            'band' => ['required', 'string', 'max:255'],
            'hours_of_supply' => ['required', 'string', 'max:255'],
            'tariff_rate' => ['required', 'numeric'],
            'tariff_category' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
        ];
    }
}