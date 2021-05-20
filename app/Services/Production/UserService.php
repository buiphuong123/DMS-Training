<?php

namespace App\Services\Production;

use App\Services\Interfaces\UserServiceInterface;
use App\Http\Requests\User\CreateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Services\Interfaces\FileUploadServiceInterface;

class UserService extends BaseService implements UserServiceInterface
{
    protected $fileService;
                                    
    public function __construct(FileUploadServiceInterface $fileService)
    {
        $this->fileService = $fileService;
    }
    public function createUser(CreateUserRequest $request) {
        $user = User::create([
            'username' => $request->get('username', ''),
            'email' => $request->input('email'),
            'password' => Hash::make($request->password),
            'description' => $request->input('description'),
            'avatar' =>  $this->fileService->uploadFile($request),
        ]);
        $role = Role::select('id')->where('name', 'user')->first();
        $user->roles()->attach($role);
        return $user;
    }
    
    public function updateUser(Request $request) {
        $user = User::find(Auth::user()->id);
        $get_image = $request->file('avatar');
        if ($get_image) {
            $user->update([
                'description' => $request->description,
                'avatar' => $this->fileService->uploadFile($request),
            ]);
        }
        return $user;
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





