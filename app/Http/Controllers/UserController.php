<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Mail;
class UserController extends Controller
{
    public function send_mail(){
        $to_name = "bui phuong";
        $to_email = "buithiphuong07031999@gmail.com";

        $data = array("name" => "Mail tu tai khoan khach hang" ,"body"=>'Mail gui ve van de hang hoa');
        Mail::send('user.send_mail', $data, function($message) use($to_name,$to_email){
            $message->to($to_email)->subject('test thu gui mail');// send this mail with subject
            $message->from($to_email, $to_name);// send from this mail
        });
        return redirect('/')-> with('message', '');
    }
    public function edit(){
        if(Auth::user()){
            $user = User::find(Auth::user()->id);
            if($user){
                return view('user.edit')->withUser($user);
            }
            else{
                return redirect()->back();
            }
        }
        else{
            return redirect()->back();
        }
    }
    public function update(Request $request){
        $user = User::find(Auth::user()->id);
        if($user){
            $validate = $request->validate([
                'avatar'  => ['sometimes', 'image', 'mimes:jpg,jpeg,bmp,svg,png', 'max:5000'],
            ]);
            $user->description = $request['description'];

            $get_image = $request->file('avatar');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = 'public/images/' . time() . '.' . $get_image->getClientOriginalExtension();
        
            $get_image->move('public/images/',$new_image);
            $user->avatar = $new_image;
        }
            $user->save();

            $request->session()->flash('mess', 'update success');
            return redirect()->back();
        }
        else{
            return redirect()->back();
        }
    }

    public function change_password(){
        return view('user.change_password');
    }
    public function update_password(Request $request){
        $user = User::find(Auth::user()->id);
        
        if(Hash::check($request->old_password,$user->password)){
            $user->update([
                'password' =>Hash::make($request->new_password)
            ]);
            return redirect()->back()->with('success', 'Change password success');

        }else{
            return redirect()->back()->with('error', 'Old password not matched');
        }
    }
}


// trang 56