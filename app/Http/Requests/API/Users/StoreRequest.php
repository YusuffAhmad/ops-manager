<?php

namespace App\Http\Requests\API\Users;

use App\Models\Role;
use Illuminate\Validation\Rule;
use App\Http\Requests\API\Request;
use Illuminate\Validation\Rules\Password;

class StoreRequest extends Request
{
    /** @return array<mixed> */
    public function rules(): array
    {
        return [
            'email' => 'required|email|unique:users',
            'password' => ['required', Password::defaults()],
            'phone' => ['required', 'string', 'max:255'],
            'role_id' => ['required', Rule::in(Role::ROLE_ADMINISTRATOR, Role::ROLE_STAFF)],
            'store_id' => ['required', 'integer', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['nullable', 'string', 'max:255'],
            'last_name' => ['nullable', 'string', 'max:255'],
            'date_of_birth' => ['required', 'date'],
            'address' => ['nullable', 'string', 'max:255'],
            'State' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:255'],
            'LGA' => ['nullable', 'string', 'max:255'],
            'email_verified_at' => ['nullable', 'date'],
        ];
    }
}
