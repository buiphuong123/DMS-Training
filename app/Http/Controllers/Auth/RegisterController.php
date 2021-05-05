<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
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
       $user = new User();
       $user->username = $request->get('username','');
       $user->email = $request->email;
       $user->password = Hash::make($request->password);
       $user->description = $request->input('description');
       if (request()->hasFile('avatar'))
       {
           $avataruploaded = request()->file('avatar');
           $avatarname = time() . '.' . $avataruploaded->getClientOriginalExtension();
           $avatarpath = public_path('/images/');
           $avataruploaded->move($avatarpath, $avatarname);
           $user->avatar = '/images/' . $avatarname;
       }
       else
       {
         $user->avatar = '';
       }
       $user->save();
       $request->session()->flash('success','register User success');
       return route('sheet.index');
    }
}
