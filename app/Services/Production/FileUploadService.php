<?php

namespace App\Services\Production;

use App\Services\Interfaces\FileUploadServiceInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class FileUploadService extends BaseService implements FileUploadServiceInterface
{
    public function uploadFile(Request $request) {
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
        return $avatar_upload;
    }
    
    

}





