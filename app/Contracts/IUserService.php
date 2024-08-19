<?php

namespace App\Contracts;

use App\Models\User;

interface IUserService
{
    public function create(
        string $email,
        string $plainTextPassword,
        string $phone,
        int $role_id,
        int $store_id,
        string $first_name,
        ?string $middle_name,
        ?string $last_name,
        ?string $date_of_birth,
        ?string $address,
        ?string $State,
        ?string $city,
        ?string $LGA
    ): User;

    
    public function update(
        User $user,
        ?string $email = null,
        ?string $password = null,
        ?string $phone = null,
        ?int $role_id = null,
        ?int $store_id = null,
        ?string $first_name = null,
        ?string $middle_name = null,
        ?string $last_name = null,
        ?string $date_of_birth = null,
        ?string $address = null,
        ?string $State = null,
        ?string $city = null,
        ?string $LGA = null,
        ?string $email_verified_at = null,
        ?bool $status = null
    ): User;

    public function delete(User $user): void;
}
