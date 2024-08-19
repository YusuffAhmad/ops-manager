<?php

namespace App\Http\Controllers\API;

use Spatie\Permission\Models\Role;
use App\Services\PermissionService;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseResponse;
use Spatie\Permission\Models\Permission;
use App\Http\Resources\PermissionResource;
use App\Repositories\PermissionRepository;
use App\Http\Requests\API\Permissions\StoreRequest;
use App\Http\Requests\API\Permissions\UpdateRequest;
use App\Http\Requests\API\Permissions\AssignRoleRequest;

class PermissionController extends Controller
{

    public function __construct(private PermissionRepository $_permissionRepository, private PermissionService $_permissionService)
    {
    }
    
    public function index()
    {
        $response = PermissionResource::collection($this->_permissionRepository->getAll());
        return BaseResponse::sendResponse($response, "Permissions successfully retrieved");
    }
    
    public function store(StoreRequest $request)
    {
        $response = PermissionResource::make($this->_permissionService->create($request));
        return BaseResponse::sendResponse($response, "Permission Created successfully.");
    }

    public function update(UpdateRequest $request, Permission $permission)
    {
        $response = PermissionResource::make($this->_permissionService->update($permission, $request));
        return BaseResponse::sendResponse($response, "Permission Updated successfully.");
    }

    public function destroy(Permission $permission)
    {
        $this->_permissionService->delete($permission);
        return BaseResponse::sendResponse("Permission deleted successfully", "Permission deleted successfully");
    }
    
    public function assignRole(AssignRoleRequest $request, Permission $permission)
    {
        if ($permission->hasRole($request->role)) {
            return BaseResponse::sendResponse("Role already exists", "Role already exists");
        }
        
        $permission->assignRole($request->role);
        return BaseResponse::sendResponse("Role assigned successfully", "Role assigned successfully");
    }
    
    public function removeRole(Permission $permission, Role $role)
    {
        if ($permission->hasRole($role)) {
            $permission->removeRole($role);
            return BaseResponse::sendResponse("Role removed successfully", "Role removed successfully");
        }

        return BaseResponse::sendResponse("Role not exists", "Role not exists");
    }
}
