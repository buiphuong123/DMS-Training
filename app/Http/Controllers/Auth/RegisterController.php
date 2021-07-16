<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Permissions;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\User\CreateUserRequest;
use App\Services\Interfaces\UserServiceInterface;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    protected $userService;
                                    
    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }
    public function create()
    {
        return view('auth.register');
    }
   public function store(CreateUserRequest $request)
   {
        if ($this->userService->createUser($request->except('_token'))) {
            $request->session()->flash('successTS','register success');
        }
        else {
            $request->session()->flash('error','register error');
        }
        return redirect()->route('login');
   }
}

