<?php

namespace App\Http\Requests\API\Permissions;

use App\Http\Requests\API\Request;

class StoreRequest extends Request
{
    /** @return array<mixed> */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'guard_name' => ['required', 'string'],
        ];
    }
}
