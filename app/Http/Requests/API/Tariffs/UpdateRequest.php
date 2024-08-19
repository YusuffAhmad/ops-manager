<?php

namespace App\Http\Requests\API\Tariffs;

use App\Http\Requests\API\Request;

class UpdateRequest extends Request
{
    /** @return array<mixed> */
    public function rules(): array
    {
        return [
            'tariff_class' => ['sometimes', 'required', 'string', 'max:255'],
            'band' => ['sometimes', 'required', 'string', 'max:255'],
            'hours_of_supply' => ['sometimes', 'required', 'string', 'max:255'],
            'tariff_rate' => ['sometimes', 'required', 'numeric'],
            'tariff_category' => ['sometimes', 'required', 'string', 'max:255'],
            'name' => ['sometimes', 'required', 'string', 'max:255'],
        ];
    }
}
