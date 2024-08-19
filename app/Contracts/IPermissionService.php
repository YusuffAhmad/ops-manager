<?php

namespace App\Contracts;

use App\Models\Role;
use App\Models\Permission;
use App\Http\Requests\Request;
use App\Http\Requests\API\Permissions\AssignRoleRequest;

interface IPermissionService
{
    public function create(
    ): Permission;

    
    public function update(
    ): Permission;

    public function delete(Permission $permission): void;

    public function assignRole(AssignRoleRequest $request, Permission $permission);

    public function removeRole(Permission $permission, Role $role);
}
