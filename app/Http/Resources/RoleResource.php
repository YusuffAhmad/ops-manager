<?php

namespace App\Http\Resources;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RoleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    public function __construct(private Role $role, private bool $includePreferences = false)
    {
        parent::__construct($role);
    }

    /** @return array<mixed> */
    public function toArray($request): array
    {
        return [
            'name' => $this->name,
            'guard_name' => $this->guard_name,
            'description' => $this->description,
            'uid' => $this->uid,
            'is_active' => $this->is_active,
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString()
        ];
    }
}
