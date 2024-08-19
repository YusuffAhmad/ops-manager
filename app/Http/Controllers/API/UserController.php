<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Services\UserService;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Controllers\BaseResponse;
use App\Http\Requests\API\Users\StoreRequest;
use App\Http\Requests\API\Users\UpdateRequest;
use App\DTOs\UserDataDTO;

class UserController extends Controller
{
    public function __construct(private UserService $_userService)
    {
    }

    public function index()
    {
        $users = $this->_userService->getAllUsers();
        $response = UserResource::collection($users);
        return BaseResponse::sendResponse($response, "Users successfully retrieved");
    }

    public function store(StoreRequest $request)
    {
        $response = UserResource::make($this->_userService->create($request));
        return BaseResponse::sendResponse($response, "User created successfully");
    }
    
    public function update(UpdateRequest $request, User $user)
    {
        $userData = $this->mapRequestToUserDataDTO($request);
        $response = UserResource::make($this->_userService->update($user, $userData));
        return BaseResponse::sendResponse($response, "User updated successfully");
    }

    public function destroy(User $user)
    {
        $this->_userService->delete($user);
        return BaseResponse::sendResponse("User deleted successfully", "User deleted successfully");
    }

    private function mapRequestToUserDataDTO($request): UserDataDTO
    {
        $userData = new UserDataDTO();
        $userData->email = $request->email;
        $userData->plainTextPassword = $request->password;
        $userData->phone = $request->phone;
        $userData->role_id = $request->role_id;
        $userData->first_name = $request->first_name;
        $userData->middle_name = $request->middle_name;
        $userData->last_name = $request->last_name;
        $userData->date_of_birth = $request->date_of_birth;
        $userData->address = $request->address;
        $userData->State = $request->State;
        $userData->city = $request->city;
        $userData->LGA = $request->LGA;
        $userData->store_id = $request->store_id;
        return $userData;
    }
}
