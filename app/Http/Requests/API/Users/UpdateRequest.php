<?php

namespace App\Http\Requests\API\Users;

use App\Models\Role;
use App\Models\User;
use App\Http\Requests\API\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UpdateRequest extends Request
{
    /** @return array<mixed> */
    public function rules(): array
    {
        /** @var User $user */
        $user = $this->route('user');

        return [
            'email' => 'sometimes|required|email|unique:users,email,' . $user->id,
            'password' => ['nullable', Password::defaults()],
            'phone' => ['nullable', 'string', 'max:255'],
            'role_id' => ['nullable', Rule::in(Role::ROLE_ADMINISTRATOR, Role::ROLE_STAFF)],
            'store_id' => ['nullable', 'integer', 'max:255'],
            'first_name' => ['nullable', 'string', 'max:255'],
            'middle_name' => ['nullable', 'string', 'max:255'],
            'last_name' => ['nullable', 'string', 'max:255'],
            'date_of_birth' => ['nullable', 'date'],
            'status' => ['nullable', 'boolean'],
            'address' => ['nullable', 'string', 'max:255'],
            'State' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:255'],
            'LGA' => ['nullable', 'string', 'max:255'],
            'email_verified_at' => ['nullable', 'date'],
        ];
    }
}
