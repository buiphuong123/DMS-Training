<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;
class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }
   public function store(UserRequest $request)
   {
        $avatar = $request->file('avatar');
        $avatar_name = time() . '.' . $avatar->getClientOriginalExtension();
        $avatarpath = public_path('/images/');
        $avatar->move($avatarpath, $avatar_name);
        $user = User::create([
            'username' => $request->get('username', ''),
            'email' => $request->input('email'),
            'password' => Hash::make($request->password),
            'description' => $request->input('description'),
            'avatar' => '/images/' . $avatar_name,
        ]);
        $role = Role::select('id')->where('name', 'user')->first();
        $user->roles()->attach($role);
        $request->session()->flash('successTS','register success');
        return redirect('/sheet');
   }
}


