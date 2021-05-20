<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Mail;
use App\Http\Requests\User\UpdatePasswordRequest;
use App\Services\Interfaces\UserServiceInterface;

class UserController extends Controller
{
    protected $userService;
                                    
    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }
    
    public function edit() {
        if (Auth::user()) {
            $user = User::find(Auth::user()->id);
            if ($user) {
                return view('user.edit')->withUser($user);
            }
            else {
                return redirect()->back();
            }
        }
        else {
            return redirect()->back();
        }
    }
    public function update(Request $request) {
        if($this->userService->updateUser($request)) {
            $request->session()->flash('mess', 'update success');
        }  
        else {
            $request->session()->flash('error', 'update error');
        }
        return redirect()->back();
    }

    public function change_password() {
        return view('user.change_password');
    }
    public function update_password(Request $request) {
        
        if (Hash::check($request->old_password,$user->password)) {
            if($this->userService->updatePassword($request)) {
                return redirect()->back()->with('success', 'Change password success');
            }
            return redirect()->back()->with('error', 'Change password not success');

        }
        else {
            return redirect()->back()->with('error', 'Old password not matched');
        }
    }

    public function manager() {
        $user = Auth::user();
        if ($user->hasAnyRoles(['manager'])) {
            $users = User::where('permission_id', $user->permission_id)->get();
            return view('admin.users.index')->with('users', $users);
        }
        if ($user->hasAnyRoles(['admin'])) {
            return redirect()->route('admin.users.index');
        }
        return redirect()->back()->with('error', 'Not have access');  
    }
    
}
