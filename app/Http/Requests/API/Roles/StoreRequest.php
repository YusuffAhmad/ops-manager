<?php

namespace App\Http\Requests\API\Roles;

use App\Http\Requests\API\Request;

class StoreRequest extends Request
{
    /** @return array<mixed> */
    public function rules(): array
    {
        return [
            ['name' => ['required', 'min:3']],
            ['description' => 'required|string'],
        ];
    }
}
