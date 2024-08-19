<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function __construct(private User $user, private bool $includePreferences = false)
    {
        parent::__construct($user);
    }

    /** @return array<mixed> */
    public function toArray($request): array
    {
        return [
            'role' => $this->user->getRoleNames(),
            'uid' => $this->user->uid,
            'name' => $this->user->first_name,
            'email' => $this->user->email,
            'store' => $this->user->store_name,
            'phone' => $this->user->phone,
            'avatar' => $this->user->avatar,
        ];
    }
}
