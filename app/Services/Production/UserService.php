<?php

namespace App\Services\Production;

use App\Services\Interfaces\UserServiceInterface;
use App\Http\Requests\User\CreateUserRequest;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserService extends BaseService implements UserServiceInterface
{
    public function createUser(CreateUserRequest $request) {
        $avatar_name = '';
        if ($request->hasFile('avatar')){
            $avatar = $request->avatar;
            $avatarpath = '/public/images/';
            $avatar_name = time() . '.' . $avatar->getClientOriginalExtension();
            $avatar->move(public_path($avatarpath), $avatar_name);  
            $avatar_upload = $avatarpath . $avatar_name;
        }
        else {
            $avatar_upload = './images/user.png';
        }
        $user = User::create([
            'username' => $request->get('username', ''),
            'email' => $request->input('email'),
            'password' => Hash::make($request->password),
            'description' => $request->input('description'),
            'avatar' =>  $avatar_upload,
        ]);
        $role = Role::select('id')->where('name', 'user')->first();
        $user->roles()->attach($role);
        return $user;
    }
    
    public function updateUser(Request $request) {
        $user = User::find(Auth::user()->id);
        $get_image = $request->file('avatar');
        if ($get_image) {
            $avatar = $request->avatar;
            $avatarpath = '/public/images/';
            $avatar_name = time() . '.' . $avatar->getClientOriginalExtension();
            $avatar->move(public_path($avatarpath), $avatar_name);  
            $avatar_upload = $avatarpath . $avatar_name;
            $user->update([
                'description' => $request->description,
                'avatar' => $avatar_upload,
            ]);
        }
        return $user;
    }

  
}





