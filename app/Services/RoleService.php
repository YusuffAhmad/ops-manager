<?php

namespace App\Services;

use App\Models\Role;
use Illuminate\Support\Str;
use App\Contracts\IRoleService;
use Illuminate\Contracts\Hashing\Hasher;

class RoleService implements IRoleService
{
    public function create(string $name, string $description): Role
    {
        $role = Role::create([
            'uid' => Str::uuid(),
            'name' => $name,
            'description' => $description
        ]);
        
        return $role;
    }


    public function update(Role $role, ?string $name = null, ?string $description = null): Role
    {
        $role->fill([
            'name' => $name,
            'description' => $description,
        ])->save();
    
        return $role;
    }


    public function delete(Role $user): void
    {
        $user->delete();
    }
}
