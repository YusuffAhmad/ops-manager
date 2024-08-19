<?php

namespace App\Http\Requests\API\Permissions;

use App\Http\Requests\API\Request;

class UpdateRequest extends Request
{
    /** @return array<mixed> */
    public function rules(): array
    {
        return [
            'name' => ['sometimes', 'required', 'string'],
            'guard_name' => ['sometimes', 'required', 'string'],
        ];
    }
}
