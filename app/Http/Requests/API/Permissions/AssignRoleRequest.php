<?php

namespace App\Http\Requests\API\Permissions;

use App\Http\Requests\API\Request;

class AssignRoleRequest extends Request
{
    /** @return array<mixed> */
    public function rules(): array
    {
        return [
            'role' => ['required', 'string']
        ];
    }
}
