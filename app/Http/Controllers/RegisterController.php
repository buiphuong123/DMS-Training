<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;
class RegisterController extends Controller
{
    //
    public function create(){
        
        return view('auth.register');
           
   }
   public function store(UserRequest $request){
       $user = new User();
      
       if(request()->hasFile('avatar')){
           $avataruploaded = request()->file('avatar');
           $avatarname = time() . '.' . $avataruploaded->getClientOriginalExtension();
           $avatarpath = public_path('/images/');
           $avataruploaded->move($avatarpath, $avatarname);
           $user->avatar = '/images/' . $avatarname;
           $user->username = $request->username;
           $user->email = $request->email;
           $user->password = Hash::make($request->password);
           $user->description = $request->input('description');
           
       }
       $user->username = $request->username;
       $user->email = $request->email;
       $user->password = Hash::make($request->password);
       $user->description = $request->input('description');
       $user->save();
       $request->session()->flash('successTS','edit User success');
       return redirect('/sheet');
   
}
}
