<?php

namespace App\Services\Production;

use App\Services\Interfaces\UserServiceInterface;
use App\Http\Requests\User\CreateUserRequest;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Services\Interfaces\FileUploadServiceInterface;

class UserService extends BaseService implements UserServiceInterface
{
    public function createUser(array $data) {
        $avatar = '';
        
        if (request()->hasFile('avatar')) {
            $fileService = app()->make(FileUploadServiceInterface::class);
            $avatar = $fileService->uploadFile('avatar', request());
        }

        $user = User::create([
            'username' => \Arr::get($data, 'username', ''),
            'email' => \Arr::get($data, 'email'),
            'password' => Hash::make(\Arr::get($data, 'password'),),
            'description' => \Arr::get($data, 'description'),
            'avatar' =>  $avatar,
        ]);
        $role = Role::select('id')->where('name', 'user')->first();
        $user->roles()->attach($role);
        return $user;
    }

    public function updateUser(array $data) {
        $user = User::find(Auth::user()->id);
        $avatar = '';

        if (request()->hasFile('avatar')) {
            $fileService = app()->make(FileUploadServiceInterface::class);
            $avatar = $fileService->uploadFile('avatar', request());
        }
        
        return $user->update([
            'description' => \Arr::get($data, 'description'),
            'avatar' => $avatar,
        ]);
    }

    public function deleteUser(User $user) {
        $user->roles()->detach();
        $user->timesheet()->delete();
        $user->delete();
        return $user;
    }

    public function updatePassword(Request $request) {
        $user = User::find(Auth::user()->id);
        $user->update([
            'password' =>Hash::make($request->new_password)
        ]);
        return $user;
    }

}





