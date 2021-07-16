<?php

namespace App\Services\Production;

use App\Services\Interfaces\FileUploadServiceInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class FileUploadService extends BaseService implements FileUploadServiceInterface
{   
    public function uploadFile(string $inputName, Request $request)
    {
        if ($request->hasFile($inputName)) {
            $file = $request->file($inputName);

            $fileName = \Carbon\Carbon::now()->timestamp . '_' . $file->getClientOriginalName();

            $file->move(public_path('/public/images'), $fileName);

            return asset('/public/images/' . $fileName);
        }

        return '';
    }
    

}





