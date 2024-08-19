<?php

namespace App\Http\Requests\API\Roles;

use App\Http\Requests\API\Request;

class UpdateRequest extends Request
{
    /** @return array<mixed> */
    public function rules(): array
    {
        return [
            'name' => ['sometimes', 'required', 'min:3'],
            'description' => ['sometimes', 'required', 'string'],
        ];
    }
}

