<?php

namespace App\Services\Interfaces;

use App\Models\User;
use App\Http\Requests\User\CreateUserRequest;
use Illuminate\Http\Request;

interface UserServiceInterface
{
    public function createUser(array $data);
    public function updateUser(array $data);
    public function deleteUser(User $user);
    public function updatePassword(Request $request);
}


