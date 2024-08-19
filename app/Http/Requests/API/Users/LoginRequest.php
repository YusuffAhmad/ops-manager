<?php

namespace App\Http\Requests\API\Users;

use App\Http\Requests\API\Request;

/**
 * @property string $email
 * @property string $password
 */
class LoginRequest extends Request
{
    /** @return array<mixed> */
    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'password' => 'required',
        ];
    }
}
