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
        $this->userService->createUser($request);   
        $request->session()->flash('successTS','register success');
        return redirect()->route('sheet.index');
   }
}

