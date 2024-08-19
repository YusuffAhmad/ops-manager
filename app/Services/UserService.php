<?php

namespace App\Services;

use App\Models\User;
use App\Models\Store;
use App\DTOs\UserDataDTO;
use App\Http\Requests\API\Users\StoreRequest;
use App\Repositories\UserRepository;
use Illuminate\Contracts\Hashing\Hasher;

class UserService
{
    public function __construct(private Hasher $hash, private UserRepository $_userRepository)
    {
    }

    public function getAllUsers()
    {
        return $this->_userRepository->getAll();
    }

    public function create(StoreRequest $userData): User
    {
        $store = Store::findOrFail($userData->store_id);

        $user = User::create([
            'first_name' => $userData->first_name,
            'middle_name' => $userData->middle_name,
            'last_name' => $userData->last_name,
            'email' => $userData->email,
            'password' => $this->hash->make($userData->plainTextPassword),
            'phone' => $userData->phone,
            'store_id' => $store->id,
            'store_name' => $store->name,
            'date_of_birth' => $userData->date_of_birth,
            'address' => $userData->address,
            'State' => $userData->State,
            'city' => $userData->city,
            'LGA' => $userData->LGA,
        ]);

        $user->assignRole($userData->role_id);

        return $user;
    }

    public function update(User $user, UserDataDTO $userData): User
    {
        $fields = $userData->toArray();

        $data = array_filter($fields, function ($value) {
            return $value !== null;
        });

        if ($userData->store_id !== null) {
            $store = Store::findOrFail($userData->store_id);
            $data['store_id'] = $store->id;
            $data['store_name'] = $store->name;
        }

        if (!empty($data)) {
            $user->update($data);
        }

        if ($userData->role_id !== null) {
            $user->syncRoles([$userData->role_id]);
        }

        return $user;
    }

    public function delete(User $user): void
    {
        $user->delete();
    }
}
