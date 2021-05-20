<?php

namespace App\Services\Interfaces;

use App\Models\User;
use App\Http\Requests\User\CreateUserRequest;
use Illuminate\Http\Request;

interface UserServiceInterface
{
    public function createUser(CreateUserRequest $request);
    public function updateUser(Request $request);
    public function deleteUser(User $user);
    public function updatePassword(Request $request)
}


