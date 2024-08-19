<?php

namespace App\Services;

use App\Models\Permission;
use Illuminate\Support\Str;
use App\Http\Requests\API\Permissions\StoreRequest;
use App\Http\Requests\API\Permissions\UpdateRequest;

class PermissionService //implements IPermissionService
{
    public function __construct()
    {
    }
    public function create(StoreRequest $request): Permission
    {
        // Retrieve validated data from the request
        $validatedData = $request->validated();

        // Create a new Permission instance with the validated data
        $permission = Permission::create([
            'name' => $validatedData['name'],
            'guard_name' => $validatedData['guard_name'],
        ]);

        // Return the created Permission instance
        return $permission;
    }

    public function update(Permission $permission, UpdateRequest $request): Permission
    {
        // Retrieve validated data from the request
        $validatedData = $request->validated();

        // Update the Permission instance with the validated data
        $permission->update($validatedData);

        // Return the updated Permission instance
        return $permission;
    }


    public function delete(Permission $user): void
    {
        $user->delete();
    }
}
