<?php

namespace App\Contracts;

use App\Models\Role;
use App\Models\User;

interface IRoleService
{
    public function create(string $name, string $description): Role;

    public function update(Role $role, ?string $name = null, ?string $description = null): Role;

    public function delete(Role $role): void;
}
