<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Services\RoleService;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Resources\RoleResource;
use App\Repositories\RoleRepository;
use App\Http\Controllers\BaseResponse;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\API\Roles\StoreRequest;

class RoleController extends Controller
{
    public function __construct(private RoleRepository $_roleRepository, private RoleService $_roleService)
    {
    }

    public function index()
    {
        $response = RoleResource::collection($this->_roleRepository->getAll());
        return BaseResponse::sendResponse($response, "Roles successfully retrieved");
    }

    public function store(StoreRequest $request)
    {
        $response = RoleResource::make($this->_roleService->create($request->name, $request->description));
        return BaseResponse::sendResponse($response, "Role Created successfully.");
    }

    public function update(Request $request, Role $role)
    {
        $response = RoleResource::make($this->_roleService->update($role, $request->input('name'), $request->input('description')));
        return BaseResponse::sendResponse($response, "Role Updated successfully.");
    }

    public function destroy(Role $role)
    {
        $this->_roleService->delete($role);
        return BaseResponse::sendResponse("Role deleted successfully", "Role deleted successfully");
    }

    public function givePermission(Request $request, Role $role)
    {
        if ($role->hasPermissionTo($request->permission)) {
            return back()->with('message', 'Permission exists.');
        }
        $role->givePermissionTo($request->permission);
        return back()->with('message', 'Permission added.');
    }

    public function revokePermission(Role $role, Permission $permission)
    {
        if ($role->hasPermissionTo($permission)) {
            $role->revokePermissionTo($permission);
            return back()->with('message', 'Permission revoked.');
        }
        return back()->with('message', 'Permission not exists.');
    }
}
