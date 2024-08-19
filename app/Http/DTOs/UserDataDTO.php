<?php

namespace App\DTOs;

class UserDataDTO
{
    public string $email;
    public string $plainTextPassword;
    public string $phone;
    public int $role_id;
    public ?int $store_id;
    public string $first_name;
    public ?string $middle_name;
    public ?string $last_name;
    public ?string $date_of_birth;
    public ?string $address;
    public ?string $State;
    public ?string $city;
    public ?string $LGA;

    public function toArray(): array
    {
        return [
            'email' => $this->email,
            'plainTextPassword' => $this->plainTextPassword,
            'phone' => $this->phone,
            'role_id' => $this->role_id,
            'store_id' => $this->store_id,
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'date_of_birth' => $this->date_of_birth,
            'address' => $this->address,
            'State' => $this->State,
            'city' => $this->city,
            'LGA' => $this->LGA,
        ];
    }
}
